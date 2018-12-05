<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';

 // Comprobar que hay sesión
if ( empty($_SESSION) ){
    header("Location: ".BASE_URL.'login');
    die();
}
$user_id = $_SESSION['usuario']['id'];

// Comprobamos que recibimos el id por GET
if ( !isset($_GET['id']) ){
    header("Location: ".BASE_URL.'login');
    die();
}
$list_id = $_GET['id'];

// Comprobar que el usuario es propietario de la lista
// La url será de la forma:
//      http://localhost:8080/superlists/edit_list/?id=3
if( !userOwnsList($db, $user_id, $list_id) ){
    header("Location: ".BASE_URL."my_lists");
    die();
}

// Extraer la información de la lista
$sql_list = "SELECT * FROM lists WHERE id = $list_id LIMIT 1";
$result_list = mysqli_query($db, $sql_list);
$list = mysqli_fetch_assoc($result_list);

if( isset($_POST['edit_list']) ){
    $listname = trim($_POST['listname']) ?? null;
    $description = trim($_POST['listdesc']) ?? null;

    // Array de errores
    $errors = [];

    // Validaciones
    // listname:
    if ( empty($listname) ){
        $errors['listname']['empty'] = "Debes introducir un nombre para la lista.";
        $username = null;
    }

    if ( strlen($listname) < 4 ) {
        $errors['listname']['length'] = "El nombre de la lista debe tener al menos 4 caracteres.";
        $username = null;
    }

    if( empty($errors) ){
        // Insertar usuario en la base de datos
        // $sql = "INSERT INTO lists(user_id, name, description) VALUES( $user_id, '$listname', '$description')";
        $sql = "UPDATE lists SET name = '$listname', description = '$description' WHERE id = $list_id";
        $actualizar = mysqli_query($db, $sql);

        if( $actualizar ){
            $id = mysqli_insert_id($db);
            // Redirigir a la página de Mis listas
            header("Location: ".BASE_URL.'list/?id='.$list_id);
            die();
        }

        echo "Error: ".mysqli_error($db);
        die();   
    }
}

require_once 'editar_lista.view.php';