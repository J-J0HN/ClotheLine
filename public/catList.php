<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='admin';
$title ='Categories List';

$categories = findAll($pdo, 'category');

$output=loadTemplate('../templates/catList.html.php', ['categories'=>$categories]);

require '../templates/mainTemp.html.php';