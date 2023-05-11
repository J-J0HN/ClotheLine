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

// Retrieve latest 2 product IDs
$stmt = $pdo->prepare('SELECT * FROM clotheline.product ORDER BY prodid DESC LIMIT 2');
$stmt->execute();

$popularItemHtml = '';
while ($row = $stmt->fetch()) {
    $prodid = $row['prodid'];
    $prodname = $row['prodname'];
    $prodprice = $row['prodprice'];
    $category = $row['category'];
    $prodimg = $row['prodimg'];

    $popularItemHtml .= '<div class="popular-item">';
    $popularItemHtml .= '<a href="product.php?id=' . $prodid . '"><img src="' . $prodimg . '" alt="' . $prodname . '"></a>';
    $popularItemHtml .= '<a href="#"><h4>' . $prodname . '</h4></a>';
    $popularItemHtml .= '<p>' . '£' . $prodprice . '</p>';
    $popularItemHtml .= '<a href="#" class="add-to-basket-btn">Add to basket</a>';
    $popularItemHtml .= '</div>';
}


// Load template with banner images and popular items
$output = loadTemplate('../templates/index.html.php', [
    'banners' => $banners,
    'popularItemsHtml' => $popularItemHtml
]);


require '../templates/mainTemp.html.php';
?>