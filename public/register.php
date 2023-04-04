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

$output = '
<div class="title-container">
  <h1>Account Details</h1>
</div>
<div class="form-container">
  <form action="" method="POST">

  <label for="Firstname">Firstname:</label>
    <input type="text" name="Firstname" id="Firstname" placeholder="Enter your Firstname" required>

    <label for="Lastname">Lastname:</label>
    <input type="text" name="Lastname" id="Lastname" placeholder="Enter your Lastname" required>
    
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" placeholder="Enter your username" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Enter your email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" required>

    <button type="submit" name="submit" class="register-btn">Register</button>
  </form>
</div>';

// check if user has registered and display link if true
if (isset($user_registered)) {
    $output .= '<p>You have registered!</p>';
    $output .= '<a href="login.php" class="back-home">Go To Login</a>';
}

require '../templates/mainTemp.html.php';