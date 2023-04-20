<?php
require '../pdo.php';
require '../functions.php';
$mainClass='main';


if(isset($_GET['subcatid'])){
    $category=find($pdo, 'category', 'name', $_GET['f'])[0];
    $subcat=find($pdo, 'subcategory', 'subcatid', $_GET['subcatid'])[0];
    $title= "Clotheline - " . $category['name'] . ' ' . $subcat['name'];
    $products = findAnd($pdo, 'product', 'category', $_GET['f'], 'subcategory', $_GET['subcatid']);
    $templateVars=[
        'category'=>$category,
        'products'=>$products,
        'subcat'=>$subcat
    ];
}else{
    $category=find($pdo, 'category', 'name', $_GET['f'])[0];
    $title= "Clotheline - " . $category['name'];
    $products = find($pdo, 'product', 'category', $_GET['f']);
    $templateVars=[
        'category'=>$category,
        'products'=>$products
    ];
}

$output = loadTemplate('../templates/category.html.php',$templateVars);
require '../templates/mainTemp.html.php';

?>