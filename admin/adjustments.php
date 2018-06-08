<?php
	include('config.php');
	$date=date("Y-m-d");
	$obj=new Task;
	$day=strtolower(date('l', strtotime(str_replace('-','/', $date))));
 	$slots=[];
	//fetching all records who are absent
	$query="select * from teacher_attend where date='$date' and status='absent'";
	$res=mysqli_query($obj->con, $query);
	$absents=[];
	$teachers_ab = [];
 	while($data = mysqli_fetch_assoc($res)){
 		$teachers_ab[] = $data; 
 		$absents[]=$data['teacher_id'];
 	}

 	//select their lectures
 	$subjects=[];
 	foreach($teachers_ab as $teacher){
 		$id=$teacher['teacher_id'];
 		$query="select * from lectures where teacher_id='$id' and day='$day'";
		$res=mysqli_query($obj->con, $query);
		while($data = mysqli_fetch_assoc($res)){
 			$subjects[] = $data; 
 		}
 	}
 	//die(var_dump($subjects));

 	//Checking slots
 	$getteachers=[];
 	foreach($subjects as $subject){
 		$slots = [];
 		$id=$subject['teacher_id'];
 		$sub_id=$subject['subject_id'];
 		$sub_slot_id=$subject['slot_id'];
		$class_id=$subject['class_id'];
 		$subject=$obj->getValue('subjects','name',$sub_id);
 		$ab=implode(",",$absents);
 		$getteachers=[];
		$query="select * from lectures l, subjects s where l.teacher_id not IN($ab) and l.subject_id=s.id and s.name like '%$subject%'";
		$res=mysqli_query($obj->con, $query);	
		while($data = mysqli_fetch_assoc($res)){
 			$getteachers[] =[
						'teacher_id' =>  $data['teacher_id']
				];
 		}	

 		if(empty($getteachers)){
	 		//foreach($subjects as $subject){
		 		$ab=implode(",",$absents);
				$query="select DISTINCT teacher_id from lectures where teacher_id not IN($ab) and class_id='$class_id'";
				$res=mysqli_query($obj->con, $query);	
				while($data = mysqli_fetch_assoc($res)){
		 			$getteachers[] =[
						'teacher_id' =>  $data['teacher_id']
					];
		 		}
	 		//}
 		}
 		echo "<br>";	
 		if(!empty($getteachers)){
	 		foreach($getteachers as $getteacher){
		 		$id=$getteacher['teacher_id'];
				$query="select count(*) as count from lectures where teacher_id='$id' and slot_id='$sub_slot_id' and day='$day'";
				$res=mysqli_query($obj->con, $query);	
				$count=mysqli_fetch_assoc($res)['count'];
				if($count<=0){	
					$query="select count(*) as count from lectures where teacher_id='$id' and day='$day'";
					$res=mysqli_query($obj->con, $query);	
					$load=mysqli_fetch_assoc($res)['count'];
					// $slots[$sub_id][]= [ 
					$slot = [ 
						'teacher_id' => $id, 
						'load' => $load
					];
					$slots[]= $slot;						
				}	
	 		}
	 		$finalslot=[];
	 		foreach($slots as $slot){
	 			if(empty($finalslot)){
	 				$finalslot=$slot;
	 			}else{
	 				if($finalslot['load']>$slot['load']){
	 					$finalslot=$slot;
	 				}
	 			}
	 		}
	 		var_dump($finalslot);
	 		if(!empty($finalslot)){
	 			$query="INSERT INTO `adjustments`(`subject_id`, `class_id`, `teacher_id`, `date`, `slot_id`) VALUES ('$sub_id', '$class_id', '{$finalslot['teacher_id']}', '$date', '$sub_slot_id')";
	 			var_dump(mysqli_query($obj->con, $query));
	 			$absents[]=$finalslot['teacher_id'];
	 		}
 		}

	 	var_dump($slots);
	 	echo'-----------------------------------------------------------------------------------------------';
 	}
 	//die(var_dump($getteachers));

 	
?>