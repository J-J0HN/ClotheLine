<?php
session_start();
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
    $prodName = $_POST['prod']['prodname']; 
    $fileName = $_FILES['prod']['name']['prodimg']; 
    $ext = pathinfo($fileName, PATHINFO_EXTENSION); 
    $newFileName = $prodName . '.' . $ext; 
    $targetDirectory = '../public/';
    $targetFile = $targetDirectory . $newFileName; 

    if (move_uploaded_file($_FILES['prod']['tmp_name']['prodimg'], $targetFile)) {
        $_POST['prod']['prodimg'] = $newFileName; 
        save($pdo, 'product', $_POST['prod'], 'prodid');
        header('location: index.php');
    } else {
        echo 'Failed to upload file.';
    }

} else {
    $output = loadTemplate('../templates/addProd.html.php', ['prod'=>$prod]);
}

require '../templates/mainTemp.html.php';
?>
