<?php
	require_once('config.php');
	session_start();
	$obj=new task;
	$obj->checkUser();

	$id= $_GET["id"];
	$query ="select * from tasks where id='$id'";
	$obj->query($query);
	$obj->nextRecord();
	$query= "update tasks set viewed=1 where id='$id'";
	$obj->query($query);
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
						<h2><i class="icon-user"></i>Task description</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
							  <legend><h3 style="color:red; margin-top:20px">Task Details</h3></legend>

								<li>
									<strong>Subject</strong><br/>
										<?php echo $obj->Record['title']; ?><br>
								</li>
								<li>
									<strong>Description</strong><br/>
										<?php echo $obj->Record['description']; ?><br>
								</li>
								<li>
									<strong>Category</strong><br/>
									<?php echo $obj->getValue("category","name",$obj->Record['cid']);?><br>	
								</li>
								<li>
									<strong>Priority</strong><br/>
									<?php echo $obj->Record["priority"];?><br>	
								</li>
								<li>
										<strong>Assigned By</strong><br/>
										<?php echo $obj->getValue("employee","username",$obj->Record["assigned_by"]);?><br>
										
								</li>
								<li>
										<strong>Date</strong><br/>
										<?php echo $obj->Record["deadline"];?><br>
										
								</li>
								
								<a class='btn btn-success' href='home.php' style="margin-top:20px"><i class='icon-zoom-in icon-white'></i>Back</a>
																
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
