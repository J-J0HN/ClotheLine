<?php

if(isset($_POST['logout'])) {
    session_destroy();
    exit();
}else
{
    header("Location: login.php"); // Redirect to login page after logout
}
?>
