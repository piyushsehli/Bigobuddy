<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();

	$done = 0;
	$check = 0;
	if(isset($_POST["mark_submit"]))
	{
		$client = new task;
		$client->markAttendance();
		$done = 1;
	}
	if(isset($_POST['check_submit'])){

		$roll_num=$_POST['roll_num'];
		$q="select * from students where roll_number='$roll_num'";
		if($row=mysqli_query($obj1->con, $q)){
			$data=mysqli_fetch_assoc($row);
			$student_name=$data['f_name'].' '.$data['l_name'];
			$class_id=$data['class_id'];
			$student_id=$data['id'];
			$sem=$obj1->getValue('classes','semester',$class_id);
			$sec=$obj1->getValue('classes','section',$class_id);
			$course_id=$obj1->getValue('classes','course_id',$class_id);
			$c_name=$obj1->getValue('courses','name',$course_id);
			$branch=$obj1->getValue('courses','branch',$course_id);
			$student_class=$c_name.' '.$branch.' Sem-'.$sem.' Sec-'.$sec;
			$check = 1;	
		}
		else{
			echo "<script>alert('Incorrect roll number');</script>";

		}
	}
?>
<?php require_once("headincludes.php"); ?>
<body>
		<!-- topbar starts -->
		<?php require_once("topbar.php"); ?>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<?php require_once("sidemenu.php"); ?>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="attendancereport.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Attendance Report
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Daily attendance form</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<span style="color:green;font-size:16px;">
							<?php
								if($done==1)
								{
									echo "Attendance  marked successfully.";
								}
							?>
						</span>
						<form class="form-horizontal" name="newclient" action="dailyattendance.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<legend><h3 style="color:red;">Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Enter Your Roll Number</label>
								<?php
									if(isset($student_id)){
								?>
								<input type="hidden" value="<?=$student_id?>" name="student_id"></input>
								<?php }?>
								<div class="controls">
								  <input name="roll_num" class="input-xlarge focused" id="focusedInput" type="text" value="<?php if(isset($roll_num)){ echo $roll_num;}else{echo '';}?>">
								</div>
							  </div>
							  <?php
							  	if($check==0){
							  ?>
							  <div class="controls">
								<button type="submit" name="check_submit" class="btn btn-primary">Click here!</button>
							  </div>
							  <?php }?>

							  <?php 
							  		if(isset($check) && $check==1){
							  ?>
							  <ul class="dashboard-list">
							  	
							  	<li>
									<strong>Your Name</strong><br/>
									<?php echo $student_name; ?><br>
								</li>
								<li>
									<strong>Your Class</strong><br>
										<?php echo $student_class; ?><br>
								</li>

							  </ul>
							  <div class="form-actions">
								<button type="submit" name="mark_submit" class="btn btn-primary">Confirm!</button>
							  </div>
							  <?php }?>

							  
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<?php require_once("footer.php"); ?>
	</div><!--/.fluid-container-->

	<?php require_once("includes.php"); ?>
	
		
</body>
</html>
