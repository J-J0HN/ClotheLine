<h1>Alter Admin</h1>
<div class="form-container">

				<form action="" method="POST">

					<input type="hidden" name="admin[userid]" value="<?=isset($admin['usearid'])? $admin['userid'] : '' ?>" />

                    <label for="Firstname">Firstname:</label>
					<input type="text" id="Firstname" name="admin[Firstname]" value="<?=$admin['Firstname'] ?? ''?>"placeholder="Enter your Firstname" />

                    <label for="Lastname">Lastname:</label>
					<input type="text" id="Lastname" name="admin[Lastname]" value="<?=$admin['Lastname'] ?? ''?>"placeholder="Enter your Lastname" />

                    <label for="username">Username:</label>
					<input type="text" id="username" name="admin[username]" value="<?=$admin['username'] ?? ''?>" placeholder="Enter your username"/>

                    <label for="email">Email:</label>
					<input type="text" id="email" name="admin[email]" value="<?=$admin['email'] ?? ''?>" placeholder="Enter your email"/>

                    <label for="password">Password:</label>
					<input type="text" id="password" name="admin[password]" value="<?=$admin['password'] ?? ''?>"placeholder="Enter your password" />

					<input type="hidden" name="admin[admin]" value="1" />


					<input type="submit" name="submit" value="Save Admin" />

				</form>
</div>


                