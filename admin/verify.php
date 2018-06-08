<?php
	require_once('config.php');
	$obj= new task; 
	//var_dump($_POST);
	$emp_id=$_POST['emp_id'];
	$status=$_POST['status'];
	$time=$_POST['time'];
	$date=$_POST['date'];
	if($_POST['check']=="verify"){
		$query="UPDATE `attendance` SET `status`='{$status}', `time`='{$time}', `date`='{$date}', `verify`=1 WHERE `emp_id` = '{$emp_id}' and `date` = '{$date}'";
		if($obj->query($query)){
			echo "Updated";
		}
		else{
			echo "Not";
		}
	}
	else{
		$query="UPDATE `attendance` SET `status`='{$status}', `time`='{$time}',`date`='{$date}',`verify`=0 WHERE emp_id='{$emp_id}' and date='{$date}'";
		if($obj->query($query)){
			echo "Updated";
		}
		else{
			echo "Not";
		}
	}
?>