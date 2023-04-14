<?php

require '../pdo.php';
require '../functions.php';

$category=find($pdo, 'category', 'name', $_GET['f']);

$categories=findAll($pdo, 'category');

$title= "Clotheline - " . $category['name'];

$products = find($pdo, 'products', 'category', $_GET['f']);

?>