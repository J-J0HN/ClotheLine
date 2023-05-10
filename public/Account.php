<?php
require '../pdo.php';
require '../functions.php';

$title = 'ClotheLine';
$mainClass = 'title-container';

session_start();
$user_id = $_SESSION['login'];

$templateVars = array('title' => $title, 'user_id' => $user_id);
$output = loadTemplate('../templates/Account.html.php', $templateVars);

if (isset($user_updated)) {
    $message = 'Your information has been updated!';
    $output .= loadTemplate('../templates/message.html.php', array('message' => $message));
}

$templateVars = array('title' => $title, 'output' => $output);
require '../templates/mainTemp.html.php';
?>
