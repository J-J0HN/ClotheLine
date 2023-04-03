<?php
require '../pdo.php';
require '../functions.php';
$title='ClotheLine';

$output = loadTemplate('../templates/index.html.php',[]);

require '../templates/mainTemp.html.php';

if (isset($_POST['submit'])) 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validate if email exists
    $emailCheck = $pdo->query("SELECT * FROM user WHERE email='$email'");
    if($emailCheck) {
        echo "Email aready in use";
    }
    else {        
        $stmt = $pdo->prepare("INSERT INTO user (username,email, password)
            VALUES (:username, :email, :password)
        ");
        $values = [
            'username'     => $username,
            'email'         => $email,
            'password'      => sha1($password),
        ];
        $stmt->execute($values);

        echo "Account created successfully";
    }
}
?>

<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required placeholder="Enter your username"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required placeholder="Enter your email"><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required placeholder="Enter your password"><br>

    <input type="submit" name="submit" value="Register">
</form>
