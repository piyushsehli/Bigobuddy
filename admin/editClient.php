<?php
	session_start();
	require_once("../config.php");
	$obj1=new task;
/*	$obj1->checkUser();*/
	$obj=new task;	
	$id=$_GET['id'];
	$query="select * from admin where id=$id";
    $data= $obj->query($query);
    $row=mysqli_fetch_array($data);
    extract($row);
	$done = 0;
	if(isset($_POST["submit"]))
	{
	    $admin = new task;
		if($admin->editClient($id)){
			header("location:requests.php");
		}
	}
	require_once("headincludes.php"); ?>		
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
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Client's Form</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<span style="color:green;font-size:16px;">
						</span>
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<fieldset>
								
								
							  <legend><h3 style="color:red;">Organization's Details</h3></legend>

							  <div class="control-group">
								<label class="control-label" for="c_email">Organization's Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="c_email" id="c_email" type="email" value="<?php echo $c_email ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="c_username">Organization's User Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="c_username" id="c_username" type="text" value="<?php echo $c_username;?>" required>
								</div>
							  </div>	
							  	
							  <div class="control-group">
								<label class="control-label" for="c_name">Organization's Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="c_name" id="c_name" type="text" value="<?php echo $c_name ;?>" required>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="c_phone">Organization's Phone Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="c_phone" id="c_phone" type="text" value="<?php echo $c_contact ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="c_address">Organization's Address</label>
								<div class="controls">
								  <textarea class="input-xlarge focused" name="c_address" id="c_address" required=""><?php echo $c_address ;?></textarea>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="state">State <span style="color: red;">*</span></label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="state" id="state" type="text" value="<?php echo $state ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="city">City <span style="color: red;">*</span></label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="city" id="city" type="text" value="<?php echo $city ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="pincode">Pincode</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="pincode" id="pincode" type="text" value="<?php echo $pincode ;?>" required>
								</div>
							  </div>

							   <legend><h3 style="color:red;">Database's Details</h3></legend>

							  <div class="control-group">
								<label class="control-label" for="db_host">DB Host</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="db_host" id="db_host" type="text" value="<?php echo $db_ip ;?>" required>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="db_name">DB Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="db_name" id="db_name" type="text" value="<?php echo $db_name ;?>" required>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="db_user">DB User</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="db_user" id="db_user" type="text" value="<?php echo $db_user ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="db_pass">DB pass</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="db_pass" id="db_pass" type="text" value="<?php echo $db_pass ;?>">
								</div>
							  </div>



							  <legend><h3 style="color:red;">Employee Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="e_name">Employee's Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="e_name" id="e_name" type="text" value="<?php echo $e_name ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="e_username">Employee's User Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="e_username" id="e_username" type="text" value="<?php echo $e_username ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="e_email">Employee's Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="e_email" id="e_email" type="email" value="<?php echo $e_email;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="e_number">Employee's Phone Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="e_number" id="e_number" type="text" value="<?php echo $e_number ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="desg">Employee's Designation</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="desg" id="desg" type="text" value="<?php echo $designation ;?>" required>
								</div>
							  </div>
							</div>  
								
							  <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Update</button>
								<button class="btn">Cancel</button>
							  </div>  
							
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
