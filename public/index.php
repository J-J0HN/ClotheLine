<?php
//mysql must have a schema called clotheline
session_start();
require '../pdo.php';
require '../functions.php';
$title='ClotheLine';
$mainClass='indexmain';

$bannersDir = "banners";
$files = scandir($bannersDir);
$num_files = count($files) - 2; // Subtract 2 to exclude . and ..

for($i = 0; $i < $num_files; $i++){
    $banners[$i] = '/banners/'.$files[$i+2];
}

$output = loadTemplate('../templates/index.html.php', [
    'banners' => $banners
]);

$stmt = $pdo->prepare('SELECT * FROM clotheline.product LIMIT 2');
$stmt->execute();
while ($row = $stmt->fetch()) {
    $prodid = $row['prodid'];
    $prodname = $row['prodname'];
    $prodprice = $row['prodprice'];
    $category = $row['category'];
    $prodimg = $row['prodimg'];
    echo '<img src="' . $prodimg . '" alt="' . $prodname . '">';
}

require '../templates/mainTemp.html.php';
?>