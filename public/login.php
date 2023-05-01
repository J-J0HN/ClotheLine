<?php
require '../pdo.php';
require '../functions.php';

$title = 'ClotheLine';
$mainClass='loginMain';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $users = find($pdo, 'user', 'email', $email);

    foreach ($users as $user) {
        if ($user['password'] == $password) {
            session_start();
            $_SESSION['login'] = $user['userid'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];
            header("Location: index.php");
            exit;
        }
    }
}


$templateVars = [
    'title' => $title,
    'loggedIn' => isset($_SESSION['login']),
];

$output = loadTemplate('../templates/Login.html.php', $templateVars);
require '../templates/mainTemp.html.php';
