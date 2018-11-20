<?php
    require_once '../setup.php';
    require_once '../database/conexion.php';

    if ( empty($_SESSION) ){
        header("Location: ".BASE_URL);
        die();
    }

    if( isset($_POST['new_list']) ){
        $listname = $_POST['listname'] ?? null;
        $description = $_POST['listdesc'] ?? null;
        $user_id = $_SESSION['usuario']['id'];

        // Array de errores
        $errors = [];

        // Validaciones
        // username:
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
            $sql = "INSERT INTO lists VALUES(NULL, $user_id, '$listname', '$description', NOW(), NOW())";

            $guardar = mysqli_query($db, $sql);

            if( $guardar ){
                // Redirigir a la página de Mis listas
                header("Location: ".BASE_URL);
                die();
            }

            echo "Error";
            die();   
        }
    }
    require_once 'crear_lista.view.php';