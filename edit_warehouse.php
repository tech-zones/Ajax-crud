<?php 
	include('connection.php');

	$ids = $_GET['warehouse_id'];

	$manager  = $_POST['manager'];
	$warehouse_name  = $_POST['warehouse_name'];
	$phone  = $_POST['phone'];

	// echo "<pre>";
	// print_r($_POST);
	// exit();
	$update = $connection->query("UPDATE warehouse SET warehouse_name = '$warehouse_name', manager_name='$manager', phone='$phone' WHERE warehouse_id = '$ids'");
	header('location:index.php');
?>