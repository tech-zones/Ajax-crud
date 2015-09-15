<?php
	include('connection.php');
	session_start();
	
	$item = array(
			"name"=>$_POST['name'],
			"manager"=>$_POST['manager'],
			"address"=>$_POST['address'],
			"phone"=>$_POST['phone']
			);

		
		$warehouse = $connection->query("INSERT INTO `warehouse`(`warehouse_name`, `manager_name`, `address`, `phone`) VALUES ('".$item['name']."', '".$item['manager']."', '".$item['address']."', '".$item['phone']."')");
		echo json_encode($item, true);




?>