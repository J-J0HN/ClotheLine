<?php
require '../pdo.php';
require '../functions.php';

$title = 'ClotheLine';
$mainClass='loginMain';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = find($pdo, 'user', 'email', $email)[0];

    if ($user['password'] == $password) {
        session_start();
        $_SESSION['login'] = $user['userid'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        header("Location: index.php");
    }
}


$templateVars = [
    'title' => $title
];

$output = loadTemplate('../templates/login.html.php', $templateVars);
require '../templates/mainTemp.html.php';
