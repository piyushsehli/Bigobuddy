<?php
	require_once('../config.php');
	session_start();
	$obj=new task;
	/*$obj->checkUser();*/

	
	$id= $_GET["id"];
	$query ="select * from admin where id='$id'";
	$obj->query($query);
	$obj->nextRecord();
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
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Client's Record</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<div style="margin-left:0px;">
						  <ul class="dashboard-list">
							  <legend><h3 style="color:red; margin-top:20px">Login Details</h3></legend>

								<li>
									<strong>ORGANIZATION's USER NAME</strong><br/>
									<?php echo $obj->Record['c_username']; ?><br>
								</li>
								<li>
									<strong>ORGANIZATION's EMAIL</strong><br/>
										<?php echo $obj->Record['c_email']; ?><br>
								</li>
								
								
							  	<legend><h3 style="color:red; margin-top:20px">Personal Details</h3></legend>
								
								<li>
										<strong>ORGANIZATION's NAME</strong><br/>
										<?php echo $obj->Record["c_name"];?><br>
										
								</li>
								<li>
										<strong>ORGANIZATION's NUMBER</strong><br/>
										<?php echo $obj->Record["c_contact"];?><br>
										
								</li>
								<li>
										<strong>ORGANIZATION's ADDRESS</strong><br/>
										<?php echo $obj->Record["c_address"];?><br>		
								</li>
								<li>
										<strong>STATE</strong><br/>
										<?php echo $obj->Record["state"];?><br>	
								</li>
								<li>
										<strong>CITY</strong><br/>
										<?php echo $obj->Record["city"];?><br>	
								</li>
								<li>
										<strong>PINCODE</strong><br/>
										<?php echo $obj->Record["pincode"];?><br>
										
								</li>
							  	<legend><h3 style="color:red; margin-top:20px">Employee Details</h3></legend>
								<li>
									<strong>EMPLOYEE'S NAME</strong><br/>
									<?php echo $obj->Record["e_name"];?>
								</li>	

								<li>
									<strong>EMPLOYEE'S EMAIL</strong><br/>
									<?php echo $obj->Record["e_email"];?>
								</li>	
								
								<li>
									<strong>EMPLOYEE'S CONTACT</strong><br/>
									<?php echo $obj->Record["e_number"];?>
								</li>	

								<li>
									<strong>EMPLOYEE'S USERNAME</strong><br/>
									<?php echo $obj->Record["e_username"];?>
								</li>	
							
							

								<li>
										<strong>Joining Date</strong><br/>
										<?php echo $obj->Record["user_registered_on"];?><br>
										
								</li>
										<a class='btn btn-success' href='requests.php' style="margin-top:20px"><i class='icon-zoom-in icon-white'></i>Back</a>
																
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
