<?php include('function.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<link rel="stylesheet" href="stylesheet.css">
<body>

<div class="header">
	<h2>Register</h2>
</div>

<form method="post" action="register.php">
	<?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>User type</label>
		<select name="user_type" id="user_type" >
			<option value=""></option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
		</select>
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p stye = "font-family: arial;">
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>

</body>
</html>
