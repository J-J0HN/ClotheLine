<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='admin';

if (isset($_GET['id'])){
    $subcat = find($pdo, 'subcategory', 'subcatid', $_GET['id'])[0];
}else{
    $subcat = false;
}

if (isset($_POST['submit'])){
    save($pdo, 'subcategory', $_POST['subcategory'], 'subcatid');

    header('location: subcatList.php');
}
else{
    $output=loadTemplate('../templates/adminSubCat.html.php', ['subcat' => $subcat]);

    $title= "Add a category";
}






require '../templates/mainTemp.html.php';
?>