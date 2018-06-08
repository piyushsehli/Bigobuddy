<?php
	session_start();
	require_once("config.php");

	$obj = new task();
	$obj->checkUser();

	$obj->connect();
	$id = $_GET["id"];
	$q="select login_id from teachers where id='$id'";
	$row=mysqli_query($obj->con,$q);
	$data=mysqli_fetch_assoc($row);
	$login=$data['login_id'];	
	
	$query = "delete from user_login where id='$login'";
	$query.="delete from teachers where id='$id'";
	
	if(mysqli_multi_query($obj->con,$query)){
		header("location:teacher.php");
	}

?>