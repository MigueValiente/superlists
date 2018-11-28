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
//      http://localhost:8080/superlists/delete_list/?id=3
if( !userOwnsList($db, $user_id, $list_id) ){
    header("Location: ".BASE_URL."my_lists");
    die();
}

// En caso afirmativo borrar la lista
$sql = "DELETE FROM lists WHERE id = $list_id AND user_id = $user_id LIMIT 1";
$result = mysqli_query($db, $sql);

if( $result ) {
    header("Location: ".BASE_URL."my_lists");
    die();
}else{
    echo "Error borrando la lista";
    die();
}