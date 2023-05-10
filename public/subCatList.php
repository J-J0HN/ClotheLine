<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='admin';
$title ='Subcategories List';

$subcategories = findAll($pdo, 'subcategory');

$output=loadTemplate('../templates/subcatList.html.php', ['subcategories'=>$subcategories]);

require '../templates/mainTemp.html.php';