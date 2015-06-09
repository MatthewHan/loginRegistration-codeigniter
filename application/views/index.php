<?php 
session_start();
require('connection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Register</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Register</h1>
	<?php
	var_dump($_SESSION);
	if(isset($_SESSION['errors']['register']))
	{
		?> <span class="error"><?= $_SESSION['errors']['register'] ?></span> 
	<?php
		unset($_SESSION['errors']['register']);
	} ?>
	<form action="process.php" method="POST">
			<p><label for="email" class="field">Email: </label><input name = "email" type="text" value = "<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" >
			<?php if(isset($_SESSION['errors']['email'])){
				?> <span class="error"><?= $_SESSION['errors']['email'] ?></span> 
			<?php
			} ?></p>
			<p><label for="first_name" class="field">First Name: </label><input name = "first_name" type="text" value = "<?php if(isset($_SESSION['first_name'])){echo $_SESSION['first_name'];} ?>" >
			<?php if(isset($_SESSION['errors']['first_name'])){
				?> <span class="error"><?= $_SESSION['errors']['first_name'] ?></span> 
			<?php
			} ?></p>
			<p><label for="last_name" class="field">Last Name: </label><input name = "last_name" type="text" value = "<?php if(isset($_SESSION['last_name'])){echo $_SESSION['last_name'];} ?>" >
			<?php if(isset($_SESSION['errors']['last_name'])){
				?> <span class="error"><?= $_SESSION['errors']['last_name'] ?></span> 
			<?php
			} ?></p>
			<p><label for="password" class="field">Password: </label><input name = "password" type="password">
			<?php if(isset($_SESSION['errors']['password'])){
				?> <span class="error"><?= $_SESSION['errors']['password'] ?></span> 
			<?php
			} ?></p>
			<p><label for="confirm_password" class="field">Confirm Password: </label><input name = "confirm_password" type="password">
			<?php if(isset($_SESSION['errors']['confirm_password'])){
				?> <span class="error"><?= $_SESSION['errors']['confirm_password'] ?></span> 
			<?php
			} ?></p>
			<button name="register" value="register">Register</button>
	</form>
	<h1>Login</h1>
	<form action="process.php" method="POST">
		<p><label for="email" class="field">Email: </label><input name="email" type="text"></p>
		<p><label for="password" class="field">Password: </label><input name="password" type="password"></p>
		<button name="login" value="login">Login</button>
	</form>
</body>
</html>

<?php
if(isset($_SESSION['errors']))
{
	unset($_SESSION['errors']);
}
if(isset($_SESSION['loginerrors']))
{
	unset($_SESSION['loginerrors']);
}
?>