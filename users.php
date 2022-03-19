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
	<title>Users Page</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

	<div class="topnav">
		<h2 id = header>HG's ARTSHOP</h2>
		<a class="active" href="#users">Users</a>
		<a href="admin.php">Product</a>
	</div>

<br><br>
<h2 style = "font-family: arial; text-align: center;">Website Admin and Users Table List</h2>
	<title>Table with database</title>
	<style>
	table {
	border-collapse: collapse;
	width: 100%;
	color: black;
	font-family: monospace;
	font-size: 20px;
	text-align: left;
	}
	th {
	background-color: #81007F;
	color: white;
	}
	tr:nth-child(even) {background-color: #f2f2f2}
	</style>
	</head>
	<body>
	<table>
	<tr>
	<th>Username</th>
	<th>Email</th>
	<th>User Type</th>
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "hgartshop");
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT username, email, user_type FROM users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	echo "<tr><td>" . $row["username"]. "</td><td>" . $row["email"] . "</td><td>"
	. $row["user_type"]. "</td></tr>";
	}
	echo "</table>";
	} else { echo "0 results"; }
	$conn->close();
	?>
	</table>

</body>

</html>

</body>
</html>
