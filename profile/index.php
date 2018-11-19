<?php
require_once '../setup.php';

if ( !empty($_SESSION) ){
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
    echo $_SESSION['usuario']['username'];
}else{
    echo "Nada que objetar";
}
