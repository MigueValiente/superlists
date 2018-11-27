<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';

if( !isset($_GET['id']) ){
    header("Location: ".BASE_URL);
}

$list_id = $_GET['id']; // Validar esto

if( isset($_POST['saveitem']) ){
    $item = trim($_POST['item']) ?? null;

    // Validaciones
    // username:
    if ( empty($item) ){
        $errors['item']['empty'] = "Debes introducir un nombre.";
        $username = null;
    }

    if( empty($errors) ){
        // Guardar item en la base de datos
        
        // Insertar usuario en la base de datos
        $sql = "INSERT INTO items(list_id, description) VALUES($list_id, '$item')";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            header("Location: ".BASE_URL.'list/?id='.$list_id);
            die();
        }

        echo "Error";
        die();   
    }
}else{
    // Extraer los items de la lista
    $sql_items = "SELECT * FROM items WHERE list_id = $list_id;";
    $result_items = mysqli_query($db, $sql_items);

    $sql_list = "SELECT * FROM lists WHERE id = $list_id LIMIT 1";
    $result_list = mysqli_query($db, $sql_list);
    $list = mysqli_fetch_assoc($result_list);
}

require_once 'list.view.php';