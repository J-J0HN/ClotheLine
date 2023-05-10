<?php
require '../pdo.php';
require '../functions.php';

$title = 'ClotheLine';
$mainClass = 'registerMain';

session_start();
$user_id = $_SESSION['login'];

if (isset($_POST['submit'])) {
    $values = [
        'userid' => $_POST['userid'],
        'Firstname' => $_POST['Firstname'],
        'Lastname' => $_POST['Lastname'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
   update($pdo, 'user', $values, 'userid');
    $user_updated = true;

     // Update the username value in the $user array
     $user['username'] = $_POST['username'];

     // Update the username value in the session
     $_SESSION['username'] = $_POST['username'];
}

$users = find($pdo, 'user', 'userid', $user_id);
$user = $users[0];

$templateVars = array('title' => $title, 'user' => $user);
$output = loadTemplate('../templates/editAccount.html.php', $templateVars);

if (isset($user_updated)) {
    $message = 'Your information has been updated!';
    $output .= loadTemplate('../templates/message.html.php', array('message' => $message));
}

$templateVars = array('title' => $title, 'output' => $output);
require '../templates/mainTemp.html.php';
?>
