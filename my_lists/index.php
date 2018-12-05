<?php

require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';

// Comprobar que la sesión está creada
if ( empty($_SESSION) ){
    header("Location: ".BASE_URL.'login');
    die();
}
$user_id = $_SESSION['usuario']['id'];

$sql_lists = "SELECT * FROM lists WHERE user_id = $user_id";
$result_lists = mysqli_query($db, $sql_lists);

require_once 'my_lists.view.php';