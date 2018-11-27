<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';

$item_id = $_GET['item_id'];
$list_id = $_GET['list_id'];

if( isset($_GET['list_id']) && isset($_GET['item_id']) ){

    // Comprobar que el usuario es propietario de la lista, el item existe y pertenece a la lista


    // Borrar el item id
    $sql = "DELETE FROM items WHERE id = $item_id";

    $result =  mysqli_query($db, $sql);

    if($result){
        header("Location: ".BASE_URL."list/?id=".$list_id);
    }else{
        die("Error");
    }
}else{
    header("Location: ".BASE_URL);
}