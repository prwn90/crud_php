<?php 

session_start();


$name = "";
$address = "";
$id = 0;
$update = false;

//database 
$db = mysqli_connect('localhost','root','daniel1990', 'crud');


// if clicked save
if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		$query = "INSERT INTO info (name, address) VALUES ('$name', '$address')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Saved! :)";
		header('location: index.php');  
	}

	//update

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['msg'] = "Address updated! :)"; 
		header('location: index.php');
	}

	//delete

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['msg'] = "Address deleted! :("; 
		header('location: index.php');
	}


	$results = mysqli_query($db, "SELECT * FROM info");


?>