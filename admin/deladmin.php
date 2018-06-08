<?php
 	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();
	
	
	$obj->connect();
	$id=$_GET['id'];
	$query="select login_id from admins where id='$id'";
	$data=mysqli_query($obj->con,$query);
	$login=(int)mysqli_fetch_assoc($data);

	$query2="delete from user_login where id='$login'";
	$query2.="delete from rights where id='$login'";
	$query2.="delete from admins where id='$id'";
	if(mysqli_multi_query($obj->con,$query)){
		header("location:admins.php");
	}
	else{
		echo "failed";
	}
?>