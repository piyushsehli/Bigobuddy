<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();

	$done = 0;
	$cat = new task;

	if(isset($_POST["submit"]))
	{
		if($cat->editFee())
		{
			$done=1;
		}
	}

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$cat->connect();
		$query = "select * from fee where id='$id'";
		$data = mysqli_query($cat->con,$query);
		$row = mysqli_fetch_array($data);
		extract($row);
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
						<a href="fee.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Add new fee
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Fee details</h2>
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
									echo "Fee updated successfully.";
								}
							?>
						</span>
						<form class="form-horizontal" name="newclient" method="post" enctype="multipart/form-data">
							<?php echo "<input type='hidden' name='id' value='$id' />"; ?>
							<fieldset>
								<legend><h3 style="color:red;">Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Course</label>
								<div class="controls">
								  <select name="course" id="select1" >
									<?php
										$query = "select * from courses";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row1 = mysqli_fetch_assoc($data))
										{
											?>
										<option value='<?php echo $row1['id']?>' <?php if ($course_id==$row1['id']) { echo "selected"; } ?>><?php echo $row1['name'].' '.$row1['branch']; ?></option>";
										<?php
											}
										?>

									
								  </select> 
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Course Fee</label>
								<div class="controls">
								  <input name="fee" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $amount; ?>" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Student Rollnumber</label>
								<div class="controls">
								  <input name="roll_number" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $roll_number; ?>" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Fee Duration</label>
								<div class="controls">
								  <select name="fee_type" class="input-xlarge focused" required>
								  	<option value="">Select duration</option>
								  	<option value="monthly" <?php if($fee_type=='monthly'){echo 'selected';}?>>Monthly</option>
								  	<option value="quarterly" <?php if($fee_type=='quarterly'){echo 'selected';}?>>Quarterly</option>
								  	<option value="semester" <?php if($fee_type=='semester'){echo 'selected';}?>>Semester</option>
								  	<option value="yearly" <?php if($fee_type=='yearly'){echo 'selected';}?>>Yearly</option>
								  	<option value="full_fee" <?php if($fee_type=='full_fee'){echo 'selected';}?>>Full course fee</option>
								  </select>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Update Now</button>
								<button class="btn"><a href="course.php">Cancel</a></button>
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