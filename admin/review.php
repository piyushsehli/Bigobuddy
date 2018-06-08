<?php
	require_once('config.php');
	$obj= new task; 
	//var_dump($_POST);
	$status=$_POST['status_now'];
	$id=$_POST['id'];
	
	
	if($_POST['review']=='done'){
		$query="UPDATE `attend` SET `status`='$status' WHERE id='$id'";
		if($obj->query($query)){
			echo "Attendance Marked as $status";
		}
		else{
			echo "Not";
		}
	}
	else{

	}
	
?>