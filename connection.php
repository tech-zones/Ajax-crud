<?php
	$connection = new mysqli('localhost', 'root', '1234', 'wblog');

	if(!$connection) {
		echo 'ERROR ON CONNECTING WITH DATABASE'; 
	}
?>