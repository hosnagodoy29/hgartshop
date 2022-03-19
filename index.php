<?php
include_once('function.php');

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

	<div class="topnav">
		<h2 id = header>HG's ARTSHOP</h2>
		<a href="product.php">Product</a>
		<a class="active" href="#home">Home</a>
	</div>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="pics/profile.jpg" style = "margin-top: 2px;">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						<br>
						<a href="index.php?logout='1'" style="color: red;">Log Out</a>
					</small>

				<?php endif ?>
			</div>
		</div>

		<div class = "homapage">
		<p id = "text">Arts and Crafts <br> for Everyone! <br> <a href = "product.php"><button id = "shop">Shop Now!</button></a> </p>
		<img class = "home" src="pics/home.png">
		</div>

</body>
</html>
