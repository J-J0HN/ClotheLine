<?php
session_start();
require '../functions.php';
require '../pdo.php';

delete($pdo, 'subcategory','subcatid', $_POST['subcatid']);
header('location: subCatList.php');

?>