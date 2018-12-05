<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';
require_once '../functions/validation.php';

 // Comprobar que hay sesión
 if ( empty($_SESSION) ){
    header("Location: ".BASE_URL.'login');
    die();
}
$user_id = $_SESSION['usuario']['id'];

// Comprobamos que recibimos el id por GET
if ( !isset($_GET['section']) ){
    header("Location: ".BASE_URL.'login');
    die();
}
$section = $_GET['section'];

// Comprobamos si la sección es válida
$sections = ['name', 'email', 'password'];
if( !in_array($section, $sections) ){
    header("Location: ".BASE_URL.'login');
    die();
}

$sql_list = "SELECT * FROM users WHERE id = $user_id LIMIT 1";
$result_list = mysqli_query($db, $sql_list);
$user = mysqli_fetch_assoc($result_list);

if( isset($_POST['update_name']) ){
    $username = trim($_POST['username']) ?? null;

    if ( empty($username) ){
        $errors['username']['empty'] = "Debes introducir un nombre.<br>";
        $username = null;
    }

    if ( strlen($username) < 8 ) {
        $errors['username']['length'] = "El nombre de usuario debe tener al menos 8 caracteres.<br>";
        $username = null;
    }

    if ( !preg_match("/[0-9a-z]+$/",$username) ){
        $errors['username']['format'] = "El usuario solo admite números y letras minúsculas.<br>";
        $username = null;
    }

    if( empty($errors) ){
        // Actualizar datos
        $sql = "UPDATE users SET username = '$username', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // Actualizar la información de sesión
            $_SESSION['usuario']['username'] = $username;
            header("Location: ".BASE_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();   
    }
}

if( isset($_POST['update_email']) ){
    $email = trim($_POST['email']) ?? null;

    // Validación
    if ( empty($email) ){
        $errors['email']['empty'] = "Debes introducir un email.<br>";
        $email = null;
    }

    if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $errors['email']['format'] = "Debes introducir un email válido.<br>";
        $email = null;
    }

    if( empty($errors) ){
        // Actualizar datos
        $sql = "UPDATE users SET email = '$email', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // Actualizar la información de sesión
            $_SESSION['usuario']['email'] = $email;
            header("Location: ".BASE_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();   
    }
}

if( isset($_POST['update_password']) ){
    $current_password = trim($_POST['current_password']) ?? null;
    $password = trim($_POST['password']) ?? null;
    $passwordconf = trim($_POST['password-conf']) ?? null;

    // Validaciones
    if ( empty($current_password) ){
        $errors['current_password']['empty'] = "Debes facilitar la contraseña actual.<br>";
    }

    if ( strlen($current_password) < 6 ) {
        $errors['current_password']['length'] = "La contraseña actual es de al menos 6 caracteres.<br>";
    }

    // Compruebo la contraseña actual
    if( !password_verify($current_password, $user['password']) ){
        $errors['current_password']['fault'] = "Las contraseña actual no es correcta.<br>";
    }

    if ( empty($password) ){
        $errors['password']['empty'] = "Debes facilitar una nueva contraseña.<br>";
    }

    if ( strlen($password) < 6 ) {
        $errors['password']['length'] = "La contraseña nueva debe tener al menos 6 caracteres.<br>";
    }

    if ( empty($passwordconf) ){
        $errors['passwordconf']['empty'] = "Debes confirmar la contraseña.<br>";
    }

    if ( $password != $passwordconf ){
        $errors['passwordconf']['match'] = "Las contraseñas no coinciden.<br>";
    }

    if( empty($errors) ){
        // Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT);

        // Actualizar datos
        $sql = "UPDATE users SET password = '$password_segura', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // PELIGRO INMINENTE: Actualizamos la contraseña en la info de sesión
            $_SESSION['usuario']['password'] = $password_segura;
            header("Location: ".BASE_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();  
    }
}

require_once 'profile.view.php';