<?php
//pdo requires a schema called clotheline
session_start();
require '../pdo.php';
require '../functions.php';
$title='ClotheLine';

$output = loadTemplate('../templates/index.html.php',[]);

require '../templates/mainTemp.html.php';
?>