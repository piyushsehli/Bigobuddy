<?php
	require_once('config.php');
	$obj= new task; 
	//var_dump($_POST);
	$lecture_id=$_POST['lecture_id'];
	$status=$_POST['status'];
	$time=$_POST['time'];
	$date=$_POST['date'];
	$student_id=$_POST['student_id'];

	if($_POST['check']=="verify"){
		$query="INSERT INTO `attend`(`lecture_id`, `student_id`, `date`, `time`, `status`,`created_at`) VALUES ('$lecture_id','$student_id','$date','$time','$status',NOW())";
	
		if($obj->query($query)){
			echo "Attendance marked";
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