<?php
session_start();
require '../functions.php';
require '../pdo.php';

delete($pdo, 'user','userid', $_POST['userid']);
header('location: adminList.php');

?>