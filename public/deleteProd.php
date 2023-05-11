<?php
session_start();
require '../functions.php';
require '../pdo.php';

delete($pdo, 'product','prodid', $_POST['prodid']);
header('location: prodList.php');

?>