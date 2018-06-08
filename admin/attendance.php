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
		$client->AddAttend();
		$done = 1;
	}
	$year = date("Y"); 
	$mon = date("n");
	$mday = date("j");
	$date = $year."-".$mon."-".$mday;
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
								View employee's attendance
							</span>
						</a>
					</li>
				</ul>
			</div>

			<?php 
				if($_SESSION['type']=="admin"){
			?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="reviewattendance.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Review Attendance
							</span>
						</a>
					</li>
				</ul>
			</div>
			<?php }?>
			
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Mark attendance</h2>
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
								<label class="control-label" for="focusedInput">Date</label>
								<div class="controls">
								  <input name="date" class="input-xlarge focused" style="width:70px" value="<?php echo $date; ?>" id="date" type="text">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Time</label>
								<div class="controls">
								<input type="time" name="time" style="width:70px"></input>
								  <!-- <input name="hours" style="width:40px" placeholder="HH" type="number"> :
								  <input name="minutes" style="width:40px" placeholder="MM"  type="number"> -->
								</div>
							  </div>							  
							  <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Submit Now</button>
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
