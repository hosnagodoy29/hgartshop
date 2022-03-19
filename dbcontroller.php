<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "hgartshop";
	private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}

}
?>

<?php
		$db = mysqli_connect('localhost', 'root', '', 'hgartshop');

	$name = "";
	$code = "";
	$image = "";
	$price = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$code = $_POST['code'];
		$image = $_POST['image'];
		$price = $_POST['price'];

		mysqli_query($db, "INSERT INTO products (name, code, image, price) VALUES ('$name', '$code', '$image', '$price')");
		$_SESSION['message'] = "Address saved";
		header('location: admin.php');
	}

	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$code = $_POST['code'];
	$image = $_POST['image'];
	$price = $_POST['price'];

	mysqli_query($db, "UPDATE products SET name='$name', code='$code', image='$image', price='$price' WHERE id=$id");
	$_SESSION['message'] = "Address updated!";
	header('location: admin.php');
	}

	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM products WHERE id=$id");
	$_SESSION['message'] = "Address deleted!";
	header('location: admin.php');
	}


?>
