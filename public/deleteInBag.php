<?php
session_start();
require '../pdo.php';
require '../functions.php';

if(empty($_GET['id'])){
    //Do nothing
} else {
    for ($i = 0; $i < count($_SESSION['bag']); $i++){
        $item = $_SESSION['bag'][$i];
        if (strcmp($item['prodid'], $_GET['id']) == 0 && strcmp($item['size'], $_GET['size']) == 0){
            array_splice($_SESSION['bag'], $i, 1);
        }
    }
}

require 'bag.php';
?>