<?php
session_start();
require '../pdo.php';
require '../functions.php';
$mainClass='admin';

if (isset($_GET['id'])){
    $admin = find($pdo, 'user', 'userid', $_GET['id'])[0];
}else{
    $admin = false;
}

if (isset($_POST['submit'])){
    save($pdo, 'user', $_POST['admin'], 'userid');

    header('location: adminList.php');
}
else{
    $output=loadTemplate('../templates/adminAdmins.html.php', ['admin' => $admin]);

    $title= "Add an admin";
}

require '../templates/mainTemp.html.php';
?>