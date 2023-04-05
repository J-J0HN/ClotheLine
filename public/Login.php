<?php
require '../pdo.php';
require '../functions.php';
$title = 'ClotheLine';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        session_start();
        $_SESSION['login'] = $user['userid'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $message = "Invalid email or password. Please try again.";
    }
}

ob_start();
include '../templates/Login.html.php';
$output = ob_get_clean();

if (isset($message)) {
    $output .= "<p>{$message}</p>";
} elseif (isset($_SESSION['login'])) {
    session_start();
    $output .= "<p>You have successfully logged in!</p>";
}

ob_start();
include '../templates/mainTemp.html.php';
echo ob_get_clean();
