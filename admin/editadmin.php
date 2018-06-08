<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();
	$obj=new task;	
	$id=$_GET['id'];
	$query="select * from admins where id=$id";
    $data= $obj->query($query);
    $row=mysqli_fetch_array($data);
    extract($row);
	$done = 0;
	if(isset($_POST["submit"]))
	{
	    $admin = new task;
		if($admin->updateadmin()){
		header("location:admins.php");
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
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="admins.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Administrators List
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> New Administrator Form</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<span style="color:green;font-size:16px;">
						</span>
						<form class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="return conf();">
							<fieldset>
								<legend><h3 style="color:red;">Login Details</h3></legend>
								
								<div style="margin-left:100px;">
								<img style="height:200px; width:150px; " src="<?php echo $snap;?>"> 
								</div>
							  <div class="control-group">
								<label class="control-label" for="username">Username</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="name" value="<?php echo $name;?>" id="username" type="text" required>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="username">Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="email" value="<?php echo $email;?>" id="email" type="text" required>
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
