<?php

/**
 * Función que guarda información sobre el resultado
 * de los logins en la aplicación.
 */
function guardarLogin($db, $username, $status){
    // Guardar login

    // 192.168.64.1:8080/superlists

    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }

    $browser = $_SERVER['HTTP_USER_AGENT'];

    $sql = "INSERT INTO logins VALUES(NULL, '$username', '$ip', '$browser', '$status', NOW())";

    $guardar_login = mysqli_query($db, $sql);
}