<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();

	$done = 0;
	if(isset($_POST["submit"]))
	{
		$client = new task;
		$client->addFee();
		$done = 1;
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
						<a href="fee_details.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Fee Details
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Fee form</h2>
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
									echo "Fee added successfully.";
								}
							?>
						</span>
						<form class="form-horizontal" name="newclient" method="post" enctype="multipart/form-data">
							<fieldset>
							  <legend><h3 style="color:red;">Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Course</label>
								<div class="controls">
									<select class="input-xlarge focused" name="course" id="course" >
								  	<option value="">select</option>
								  	
									<?php
										$query = "select * from courses";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
										
									?>
										<option value="<?=$id?>"><?=$name.' '.$branch?></option>
									<?php }?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Fee Duration</label>
								<div class="controls">
								  <select name="fee_type" class="input-xlarge focused" required>
								  	<option value="">Select duration</option>
								  	<option value="monthly">Monthly</option>
								  	<option value="quarterly">Quarterly</option>
								  	<option value="semester">Semester</option>
								  	<option value="yearly">Yearly</option>
								  	<option value="full_fee">Full course fee</option>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Course Fee</label>
								<div class="controls">
								  <input name="fee" class="input-xlarge focused" id="focusedInput" type="text" value="" required="">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Student Rollnumber</label>
								<div class="controls">
								  <input name="roll_number" class="input-xlarge focused" id="focusedInput" type="text" value="" required="">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Next Due Date</label>
								<div class="controls">
								  <input name="due_date" class="input-xlarge focused" id="focusedInput" type="date" value="" required="">
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Add Now</button>
								<button class="btn">Cancel</button>
							  </div>
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
