<?php
	require_once('config.php');
	session_start();
	$obj=new task;
	$obj->checkUser();
	
	$id= $_GET["id"];
	$query ="select * from students where id='$id'";
	$obj->query($query);
	$obj->nextRecord();
	$get=new Task;

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
						<a href="students.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Student List
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Student Record</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<div style="margin-left:00px;">
								<img style="height:200px; width:150px; " src="<?php echo $obj->Record['photo'];?>"> 
								</div>
						  <ul class="dashboard-list">

								
								
								
								
							  	<legend><h3 style="color:red; margin-top:20px">Personal Details</h3></legend>
								<li>
									<strong> EMAIL</strong><br/>
										<?php echo $obj->Record['email']; ?><br>
								</li>

								<li>
									<strong> Username</strong><br/>
										<?php echo $obj->getValues("user_login","username",$obj->Record['login_id'],"id"); ?><br>
								</li>

								<li>
										<strong>FIRST NAME</strong><br/>
										<?php echo $obj->Record["f_name"];?><br>
										
								</li>
								<li>
										<strong>MIDDLE NAME</strong><br/>
										<?php echo $obj->Record["l_name"];?><br>
										
								</li>
								<li>
										<strong>LAST NAME</strong><br/>
										<?php echo $obj->Record["l_name"];?><br>
										
								</li>
								<li>
										<strong>GENDER</strong><br/>
										<?php echo $obj->Record["gender"];?><br>
										
								</li>
								<li>
										<strong>PHONE NUMBER</strong><br/>
										<?php echo $obj->Record["phone"];?><br>
										
								</li>
								<li>
										<strong>DOB</strong><br/>
										<?php echo $obj->Record["dob"];?><br>
										
								</li>
								<li>
										<strong>ADDRESS</strong><br/>
										<?php echo $obj->Record["address"];?><br>		
								</li>
								<li>
										<strong>STATE</strong><br/>
										<?php echo $get->getValues("states","statename",$obj->Record["state"],"stateid");?><br>
								</li>
								<li>
										<strong>CITY</strong><br/>
										<?php echo $get->getValues("cities","cityname",$obj->Record["city"],"cityid");?><br>
										
								</li>
								<li>
										<strong>PINCODE</strong><br/>
										<?php echo $obj->Record["pincode"];?><br>
										
								</li>
							  	<legend><h3 style="color:red; margin-top:20px">Parents Details</h3></legend>

							  	<li>
										<strong>MOTHER NAME</strong><br/>
										<?php echo $obj->Record["mother_name"];?><br>
								</li>

								<li>
										<strong>FATHER NAME</strong><br/>
										<?php echo $obj->Record["father_name"];?><br>
								</li>

								<li>
										<strong>PARENTS CONTACT NUMBER</strong><br/>
										<?php echo $obj->Record["parents_contact"];?><br>
								</li>
								
							  	<legend><h3 style="color:red; margin-top:20px">Education Details</h3></legend>

								<li>
										<strong>QUALIFICATIONS</strong><br/>
										<?php echo $obj->Record["qualification"];?><br>
										
								</li>

								<li>
										<strong>Class</strong><br/>
										<?php
											$class_id=$obj->Record["class_id"];
											$course_id=$obj->getValues('classes', 'course_id', $class_id, 'id');
											$sem=$obj->getValue('classes', 'semester', $class_id);
											$sec=$obj->getValue('classes', 'section', $class_id);
											$course=$obj->getValue('courses', 'name', $course_id).' '.$obj->getValue('courses', 'branch', $course_id);
											echo $course." Sem-".$sem." Sec-".$sec;
										?><br>
										
								</li>
								<li>
										<strong>Roll Number</strong><br/>
										<?php echo $obj->Record["roll_number"];?><br>
										
								</li>

								<li>
										<strong>Joining Date</strong><br/>
										<?php echo $obj->Record["joining_date"];?><br>
										
								</li>
								
										<a class='btn btn-success' href='student.php' style="margin-top:20px"><i class='icon-zoom-in icon-white'></i>Back</a>
																
								</ul>
						    </div>
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
