<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='admin';
$title ='Admins List';

$admins = find($pdo, 'user', 'admin', 1);

$output=loadTemplate('../templates/adminList.html.php', ['admins'=>$admins]);

require '../templates/mainTemp.html.php';