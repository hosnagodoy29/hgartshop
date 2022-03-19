<?php
include_once('function.php');

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<?php
include_once('dbcontroller.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM products WHERE id=$id");

		if ($record->num_rows == 1) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$code = $n['code'];
			$image = $n['image'];
			$price = $n['price'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

	<div class="topnav">
		<h2 id = header>HG's ARTSHOP</h2>
		<a href="users.php">Users</a>
		<a class="active" href="#product">Product</a>
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

		<?php $results = mysqli_query($db, "SELECT * FROM products"); ?>

		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Code</th>
					<th>Image</th>
					<th>Price</th>
					<th colspan="4">Action</th>
				</tr>
			</thead>

			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['code']; ?></td>
					<td><?php echo $row['image']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td>
						<a href="admin.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
					</td>
					<td>
						<a href="dbcontroller.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</table>

		<form method="post" action="dbcontroller.php" >
			<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo $name; ?>">
				</div>
				<div class="input-group">
					<label>Code</label>
					<input type="text" name="code" value="<?php echo $code; ?>">
				</div>
				<div class="input-group">
					<label>Image</label>
					<input type="text" name="image" value="<?php echo $image; ?>">
				</div>
				<div class="input-group">
					<label>Price</label>
					<input type="text" name="price" value="<?php echo $price; ?>">
				</div>
				<div class="input-group">
					<?php if ($update == true): ?>
						<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
					<?php else: ?>
						<button class="btn" type="submit" name="save" >Add Product</button>
					<?php endif ?>
				</div>
			</form>

<style>
table{
	width: 50%;
	margin: 30px auto;
	border-collapse: collapse;
	text-align: left;
}
tr {
	border-bottom: 1px solid #cbcbcb;
}
th, td{
	border: none;
	height: 30px;
	padding: 2px;
}
tr:hover {
	background: #F5F5F5;
}

form {
	width: 45%;
	margin: 50px auto;
	text-align: left;
	padding: 20px;
	border: 1px solid #bbbbbb;
	border-radius: 5px;
}

.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.edit_btn {
	text-decoration: none;
	padding: 2px 5px;
	background: #2E8B57;
	color: white;
	border-radius: 3px;
}

.del_btn {
	text-decoration: none;
	padding: 2px 5px;
	color: white;
	border-radius: 3px;
	background: #800000;
}
.msg {
	margin: 30px auto;
	padding: 10px;
	border-radius: 5px;
	color: #3c763d;
	background: #dff0d8;
	border: 1px solid #3c763d;
	width: 50%;
	text-align: center;
}
</style>

</body>
</html>
