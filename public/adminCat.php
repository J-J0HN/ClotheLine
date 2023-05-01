<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='admin';

if (isset($_GET['id'])){
    $cat = find($pdo, 'category', 'catid', $_GET['id'])[0];
}else{
    $cat = false;
}

if (isset($_POST['submit'])){
    save($pdo, 'category', $_POST['category'], 'catid');

    header('location: categories.php');
}
else{
    $output=loadTemplate('../templates/adminCat.html.php', ['cat' => $cat]);

    $title= "Add a category";
}






require '../templates/mainTemp.html.php';
?>