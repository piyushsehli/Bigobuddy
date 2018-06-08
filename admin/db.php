<?php
	if(isset($_GET['username'])){
		$username=$_GET['username'];
		$connect=mysqli_connect("localhost", "root", "", "clients");
		$query="select * from admin where c_username='$username'";
		$res=mysqli_query($connect,$query);
		if($res){
			$db=mysqli_fetch_assoc($res);
			extract($db);
			session_start();
			session_unset();
			$_SESSION['db_ip']=$db_ip;				
			$_SESSION['db_name']=$db_name;				
			$_SESSION['db_user']=$db_user;				
			$_SESSION['db_pass']=$db_pass;	
			mysqli_close($connect);
		}						
	}else{
		//header('location:../login.php');
	}
?>
