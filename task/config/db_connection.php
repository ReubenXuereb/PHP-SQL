<?php 

	//connect to db
	$con_to_db = mysqli_connect('localhost', 'reuben', 'test1234', 'itemmaster');

	//check connection
	if(!$con_to_db){
		echo 'Connection error: ' . mysqli_connect_error();
	}

 ?>
