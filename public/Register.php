<?php
require '../pdo.php';
require '../functions.php';
$title = 'ClotheLine';

if (isset($_POST['submit'])) {
    $stmt = $pdo->prepare("INSERT INTO user (Firstname, Lastname, username, email, password)
        VALUES (:Firstname, :Lastname, :username, :email, :password)");
    $values = [
        'Firstname' => $_POST['Firstname'],
        'Lastname' => $_POST['Lastname'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => sha1($_POST['password']),
    ];
    $stmt->execute($values);
    $user_registered = true; // set flag to true

    $users = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $values = [
        'email' => $_POST['email']
    ];
    $users->execute($values);

    $user = $users->fetch();
    $_SESSION['login'] = $user['userid'];
    $_SESSION['username'] = $user['username'];
}

// Load the register HTML template
ob_start();
require '../templates/register.html.php';
$output = ob_get_clean();


if (isset($user_registered)) {
    $output .= '<p>You have registered!</p>';
    $output .= '<a href="login.php" class="back-home">Go To Login</a>';
}


require '../templates/mainTemp.html.php';
