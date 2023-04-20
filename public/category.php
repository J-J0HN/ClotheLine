<?php
require '../pdo.php';
require '../functions.php';
$mainClass='main';

$category=find($pdo, 'category', 'name', $_GET['f'])[0];

$title= "Clotheline - " . $category['name'];

$products = find($pdo, 'product', 'category', $_GET['f']);
$templateVars=[
    'category'=>$category,
    'products'=>$products
];

$output = loadTemplate('../templates/category.html.php',$templateVars);
require '../templates/mainTemp.html.php';

?>