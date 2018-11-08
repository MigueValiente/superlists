<?php

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Comprobar si hay error de conexión
// if( mysqli_connect_errno() ){
//     echo "La conexión a la BD ha fallado".myqli_connect_error();
// }else{
//     echo "Conexión a la BD realizada correctamente";
// }

// Consulta para establecer la codificación de caracteres
mysqli_query($db, "SET NAMES 'utf8'");