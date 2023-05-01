<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='admin';
$title = 'ClotheLine - Admin Dashboard';







$output = loadTemplate('../templates/adminDash.html.php',[]);
require '../templates/mainTemp.html.php';
?>