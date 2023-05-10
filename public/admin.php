<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='adminMain';
$title = 'Product Add';

if (isset($_GET['id'])){
    $prod = find($pdo, 'product', 'prodid', $_GET['id'])[0];
    if (isset($prod['prodimg'])) {
        $prod['prodimg'] = basename($prod['prodimg']); // Extract the file name from the path
    }
}else{
    $prod = false;
}

if (isset($_POST['submit'])) {
    $prodName = $_POST['prod']['prodname'];
    $fileName = $_FILES['prod']['name']['prodimg'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = $prodName . '.' . $ext;
    $targetDirectory = '../public/';
    $targetFile = $targetDirectory . $newFileName;

    if (!empty($_FILES['prod']['tmp_name']['prodimg'])) {
        // A new file has been selected, upload it and set the new filename
        if (move_uploaded_file($_FILES['prod']['tmp_name']['prodimg'], $targetFile)) {
            $_POST['prod']['prodimg'] = $newFileName;
        } else {
            echo 'Failed to upload file.';
        }
    } elseif (isset($_POST['use_current_image']) && $_POST['use_current_image'] == 'on' && isset($prod['prodimg'])) {
        // Use the current image, set the filename to the existing filename
        $_POST['prod']['prodimg'] = $prod['prodimg'];
    }

    save($pdo, 'product', $_POST['prod'], 'prodid');
    header('location: prodList.php');
} else {
    $output = loadTemplate('../templates/addProd.html.php', ['prod'=>$prod]);
}


require '../templates/mainTemp.html.php';
?>
