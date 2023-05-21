<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass = 'checkout';
$title='Checkout';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

$output = loadTemplate('../templates/checkout.html.php', ['pricetag'=>$_POST['totalPrice']]);
require '../templates/mainTemp.html.php';