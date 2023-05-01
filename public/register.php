<?php
require '../pdo.php';
require '../functions.php';

$title = 'ClotheLine';
$mainClass='registerMain';

if (isset($_POST['submit'])) {
    $values = [
        'Firstname' => $_POST['Firstname'],
        'Lastname' => $_POST['Lastname'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => sha1($_POST['password']),
    ];
    insert($pdo, 'user', $values);

    $users = find($pdo, 'user', 'email', $_POST['email']);
    $user = $users[0];
    session_start();
    $_SESSION['login'] = $user['userid'];
    $_SESSION['username'] = $user['username'];
    $user_registered = true; // set flag to true
}

$templateVars = array('title' => $title);

// Load the register HTML template
$output = loadTemplate('../templates/register.html.php', $templateVars);

if (isset($user_registered)) {
    header("location: login.php");
}

// Load the main template
$templateVars = array('title' => $title, 'output' => $output);
require '../templates/mainTemp.html.php';
?>
