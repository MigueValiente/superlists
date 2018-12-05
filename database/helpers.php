<?php

/**
 * Función que guarda información sobre el resultado
 * de los logins en la aplicación.
 */
function guardarLogin($db, $username, $status){
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

/**
 * Detect if a user owns a list.
 * 
 * @param $db Database connection.
 * @param $user_id User id.
 * @param $list_id List id.
 */
function userOwnsList($db, $user_id, $list_id) {
    $sql = "SELECT * FROM lists WHERE id = $list_id AND user_id = $user_id LIMIT 1";
    $result = mysqli_query($db, $sql);
    if( mysqli_num_rows($result) == 0 ){
        return false;
    }
    return true;
}

/**
 * Detect if a item belongs to a list.
 * 
 * @param $db Database connection.
 * @param $item_id Item id.
 * @param $list_id List id.
 */
function itemBelongsToList($db, $item_id, $list_id) {
    $sql = "SELECT * FROM items WHERE id = $item_id AND list_id = $list_id LIMIT 1";
    $result = mysqli_query($db, $sql);
    if( mysqli_num_rows($result) == 0 ){
        return false;
    }
    return true;
}