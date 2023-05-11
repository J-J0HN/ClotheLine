<?php
session_start();

if(isset($_POST['logout'])) {
    session_unset();
    exit();
}else
{
    header("Location: login.php"); // Redirect to login page after logout
}
?>
