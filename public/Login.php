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

$output = '
<div class="title-container">
  <h1>Login</h1>
</div>
<div class="form-container">
  <form action="" method="POST">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Enter your email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" required>

    <button type="submit" name="submit" class="login-btn">Login</button>
  </form>
</div>';

if (isset($message)) {
    $output .= "<p>{$message}</p>";
} elseif (isset($_SESSION['login'])) {
    session_start();
    $output .= "<p>You have successfully logged in!</p>";
}

require '../templates/mainTemp.html.php';
