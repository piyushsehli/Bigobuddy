<?php
 	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();
	$done = 0;
	if(isset($_POST["submit"]))
	{
		require_once("config.php");
		$client = new task;
		$client->AddTasks();
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

			<!-- <div>
				<ul class="breadcrumb">
					<li>
						<a href="#" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								View your tasks
							</span>
						</a>
					</li>
				</ul>
			</div> -->
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Assign Tasks</h2>
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
									echo "Done successfully.";
								}
							?>
						</span>
						<script type="text/javascript">
							var dt=new Date();
							//alert(dt);
							var twoDigitMonth = ((dt.getMonth().length+1) === 1)? (dt.getMonth()+1) : '0' + (dt.getMonth()+1);
 
							var currentDate = dt.getDate() + "-" + twoDigitMonth + "-" + dt.getFullYear();
							//alert(currentDate);
							
							document.getElementById("date");
						</script>
						<form class="form-horizontal" name="newclient" method="post" enctype="multipart/form-data">
							<fieldset>
								<legend><h3 style="color:red;">Fill all</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Subject</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="subject" id="subject" type="text">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Description</label>
								<div class="controls">
								  <textarea name="description" class="input-xlarge"></textarea> 
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Date</label>
								<div class="controls">
								  <input class="input-xlarge" name="date" id="date" type="date">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Category <span style="color: red;">*</span></label>
								<div class="controls">
									<select name="category" id="category">
										<option value="">Select</option>
										<?php
											$query = "select * from category";
											$obj1=new Task;
											$data = $obj1->query($query);
											while($row = mysqli_fetch_assoc($data))
											{
												extract($row);
												
											?>
											<option value='<?php echo $id; ?>'><?php echo $name; ?></option>
										<?php
										}	
										?>
									</select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Priority <span style="color: red;">*</span></label>
								<div class="controls">
								<select name="priority" id="priority">
									<option value="high">High</option>
									<option value="medium">Medium</option>
									<option value="low">Low</option>
								</select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Send to <span style="color: red;">*</span></label>
								<div class="controls">

								<select name="send[]" id="send" multiple>
									<?php
											$userId=$_SESSION['id'];
											$query = "select id, username from employee where type='emp' and $id<>$userId";
											$obj=new Task;
											$data = $obj->query($query);
											while($row = mysqli_fetch_assoc($data))
											{
												extract($row);
											?>
											<option value='<?php echo $id;?>'><?php echo $username; ?></option>
										<?php
										}	
										?>
								</select>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Submit Now</button>
								<button class="btn"><a href="home.php">Cancel</a></button>
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
