<?php
require '../pdo.php';
require '../functions.php';
$mainClass='adminMain';
$title = 'Product Add';

if (isset($_GET['id'])){
    $prod = find($pdo, 'product', 'prodid', $_GET['id'])[0];
}else{
    $prod = false;
}

if (isset($_POST['submit'])){
    save($pdo, 'product', $_POST['prod'], 'id');

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    $sql = "INSERT INTO product (prodimg) VALUES ('$filename')";
    $sql->execute();

    header('location: index.php');
}
else{
    $output = loadTemplate('../templates/addProd.html.php', ['prod'=>$prod]);
}
require '../templates/mainTemp.html.php';