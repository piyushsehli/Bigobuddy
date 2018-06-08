<?php
	require_once('config.php');
	session_start();
	$obj=new task;
	$obj->checkUser();

	
	$id= $_GET["id"];
	$query ="select * from teachers where id='$id'";
	$obj->query($query);
	$obj->nextRecord();
	$get=new Task;
	$login=$obj->Record['login_id'];
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
						<a href="admins.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Administrator List
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Teacher Record</h2>
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
							  <legend><h3 style="color:red; margin-top:20px">Login Details</h3></legend>

								<li>
									<strong> USER NAME</strong><br/>
										<?php echo $obj->getValues("user_login","username",$login,"id");?> <br>
								</li>
								<li>
									<strong> EMAIL</strong><br/>
										<?php echo $obj->Record['email']; ?><br>
								</li>
								
								
							  	<legend><h3 style="color:red; margin-top:20px">Personal Details</h3></legend>
								
								<li>
										<strong>FIRSTNAME</strong><br/>
										<?php echo $obj->Record["firstname"];?><br>
										
								</li>
								<li>
										<strong>LASTNAME</strong><br/>
										<?php echo $obj->Record["lastname"];?><br>
										
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
							  	<legend><h3 style="color:red; margin-top:20px">Employment Details</h3></legend>

								<li>
										<strong>QUALIFICATIONS</strong><br/>
										<?php echo $obj->Record["qualification"];?><br>
										
								</li>

								<li>
										<strong>EXPERIENCE</strong><br/>
										<?php echo $obj->Record["experience"];?><br>
										
								</li>
								<li>
										<strong>DEPARTMENT</strong><br/>
										<?php echo $get->getValue("department","name",$obj->Record["dept_id"])?><br>
										
								</li>

								<li>
										<strong>DESIGNATION</strong><br/>
										<?php echo $get->getValue("designation","position",$obj->Record["des_id"])?><br>
										
								</li>
								<li>
										<strong>SALARY</strong><br/>
										<?php echo $obj->Record["salary"];?><br>
										
								</li>
								<li>
										<strong>Joining Date</strong><br/>
										<?php echo $obj->Record["joining_date"];?><br>
										
								</li>
										<a class='btn btn-success' href='teacher.php' style="margin-top:20px"><i class='icon-zoom-in icon-white'></i>Back</a>
																
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
