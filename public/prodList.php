<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='adminProd';
$title ='Categories List';

$products = findAll($pdo, 'product');

$output=loadTemplate('../templates/prodList.html.php', ['products'=>$products]);

require '../templates/mainTemp.html.php';