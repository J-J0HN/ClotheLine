<?php
require '../pdo.php';
require '../functions.php';

$category=find($pdo, 'category', 'name', $_GET['f'])[0];
$categories=findAll($pdo, 'category');

$title= "Clotheline - " . $category['name'];

$products = find($pdo, 'product', 'category', $_GET['f']);
$templateVars=[
    'category'=>$category,
    'products'=>$products
];

$output = loadTemplate('../templates/category.html.php',$templateVars);
require '../templates/mainTemp.html.php';

?>