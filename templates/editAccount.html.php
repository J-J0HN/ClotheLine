<div class="title-container">
  <h1>Update Account Information</h1>
</div>
<div class="form-container">
<form method="post" action="">
<input type="hidden" name = "userid" value = "<?= $user['userid']?>">  
<label for="Firstname">First Name:</label>
    <input type="text" name="Firstname" value="<?= $user['Firstname'] ?>" required>
    <br>
    <label for="Lastname">Last Name:</label>
    <input type="text" name="Lastname" value="<?= $user['Lastname'] ?>" required>
    <br>
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?= $user['username'] ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $user['email'] ?>" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password"required>
    <br>
    <button type="submit" name="submit" class="login-btn">Update Information</button>
    
</div>
</form>