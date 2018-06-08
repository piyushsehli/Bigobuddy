<?php
	include('config.php');
	$date=date("Y-m-d");
	$obj=new Task;
	$query="select teacher_id from teacher_attend where date='2017-08-04'";
	$res=mysqli_query($obj->con, $query);
	$teachers=[];
	while($data=mysqli_fetch_assoc($res)){
		$teachers[]=$data['teacher_id'];
	}
	$absent=implode(",",$teachers);
	$query="select id from teachers where id NOT IN($absent)";
	$res=mysqli_query($obj->con, $query);
	$teacher_ab=[];
	while($data=mysqli_fetch_assoc($res)){
		$teacher_ab[]=$data['id'];
	}
	foreach($teacher_ab as $teacher){

		$query="INSERT INTO `teacher_attend`(`teacher_id`, `date`, `status`) VALUES ($teacher,'$date','absent')";
		mysqli_query($obj->con, $query);
	}
?>