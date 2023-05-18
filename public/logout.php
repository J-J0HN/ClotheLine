<?php
session_start();
$logoutDets = ['login', 'username', 'admin'];
foreach ($logoutDets as $det){
    if(isset($_SESSION[$det])){
        unset($_SESSION[$det]);
    }
}
session_unset();
header("Location: login.php");
?>