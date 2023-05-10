<?php
session_start();
require '../functions.php';
require '../pdo.php';

delete($pdo, 'category','catid', $_POST['catid']);
header('location: catList.php');

?>