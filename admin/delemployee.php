<?php
	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();


	$obj->connect();
	$id = $_GET["id"];
	$query = "delete from employee where id=".$id;
	mysqli_query($obj->con,$query);

	$query="delete from rights where emp_id='$id'";
	mysqli_query($obj->con, $query);
	
	header("location:employee.php");
?>