<?php
require '../pdo.php';
require '../functions.php';
$mainClass='main';

$subcategory=find($pdo, 'subcategory', 'name', $_GET['subcategoryid'])[0];

$title= "Clotheline - " . $subcategory['name'];

$products = findAnd($pdo, 'product', 'category', $_GET['f'], 'subcategory', $value2);
$templateVars=[
    'category'=>$category,
    'products'=>$products
];


$output = loadTemplate('../templates/category.html.php', $templateVars);

require '../templates/mainTemp.html.php';