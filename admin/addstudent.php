<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();
	$done = 0;
	if(isset($_POST["submit"]))
	{
		
		$admin = new task;
		if($admin->addStudent()){
		$done = 1;
		}
	}
?>
<?php require_once("headincludes.php"); ?>		

<body>
<script type="text/javascript">
		function loadcities()
		{
			var url;
			var st = document.getElementById("state").value;
			url = "getcities.php?stateid=" + st;
			var xmlhttp;
			var txt,x,xx,i;
			if (window.XMLHttpRequest)
			{
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					var select = document.getElementById("city");
					select.options.length = 0;
					//alert(xmlhttp.responseXML);
					x=xmlhttp.responseXML.documentElement.getElementsByTagName("city");
					//alert(x.length);
					
					for (i=0;i<x.length;i++)
					{
						var el = document.createElement("option");

						xx=x[i].getElementsByTagName("cityname");
						el.textContent = xx[0].firstChild.nodeValue;

						xx=x[i].getElementsByTagName("cityid");
						el.value = xx[0].firstChild.nodeValue;

						select.appendChild(el);
					}
				}
			}
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
		}
	</script>

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
								Students' List
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> New Student Form</h2>
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
									echo "Student record added successfully.";
								}
							?>
						</span>
						<form class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="return conf();">
							<fieldset>
							  
							  	<legend><h3 style="color:red;">Personal Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="name">First Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="fname" type="text" value="" name="fname" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="name">Last Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="lname" type="text" value="" name="lname" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="name">Middle Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="mname" type="text" value="" name="mname">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="name">Gender</label>
								<div class="controls">
									<select class="input-xlarge focused" name="gender" id="gender" required>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="name">Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="email" type="email" value="" name="email" required>
								</div>
							  </div>		
							  <div class="control-group">
								<label class="control-label" for="phone">Phone Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="phone" id="phone" type="text" value="" required>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="dob">DOB</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="dob" id="dob" type="date" value="" required>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="address" id="address" type="text" value="" required>
								</div>
							  </div>
							 
							  <div class="control-group">
								<label class="control-label" for="focusedInput">State <span style="color: red;">*</span></label>
								<div class="controls">
								  <select class="input-xlarge focused" name="state" id="state" onchange="loadcities();">
									<option value="">Select</option>
									<?php
										$query = "select * from states order by statename";
										$objState=new task();

										$data = $objState->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
											echo "<option value='$stateid'>$statename</option>";
										}
									?>
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">City <span style="color: red;">*</span></label>
								<div class="controls">
								  <select class="input-xlarge focused" name="city" id="city">
									<option value="">Select</option>
									
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="pincode">Pincode</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="pincode" id="pincode" type="text" value="" required>
								</div>
							  </div>

							  <div class="control-group">
							  	<label class="control-label" for="fileInput">Employee Snap</label>
								  <div class="controls">
									<input class="input-file uniform_on" name="snap" id="fileInput" type="file" >
								  </div>
							  </div>
							  <legend><h3 style="color:red;">Education Details</h3></legend>

							  <div class="control-group">
								<label class="control-label" for="qual">Qualification</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="qual" id="qual" type="text" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="experience">Joining Date</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="join_date" id="join_date" type="date" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Class</label>
								<div class="controls">
								  <select class="input-xlarge focused" name="class" id="class" >
								  	<option value="">select</option>
								  	
									<?php
										$query = "select * from classes";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
									?>
										<option value="<?=$id?>"><?=$obj1->getValue('courses', 'name', $course_id)." ".$obj1->getValue('courses', 'branch', $course_id)." Sem-$semester Sec-$section"?></option>
									<?php }?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="qual">Roll Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="roll_number" id="roll_number" type="text" value="" required>
								</div>
							  </div>
							  <legend><h3 style="color:red;">Parent's Details</h3></legend>

							  <div class="control-group">
								<label class="control-label" for="salary">Mother Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="mother" id="mother" type="text" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="salary">Father Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="father" id="father" type="text" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="salary">Parents Contact Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="parents_num" id="parents_num" type="number" value="" required>
								</div>
							  </div>
							  
  
							<legend><h3 style="color:red;">Login Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="username">Username</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="username" id="username" type="text" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="password">Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="password" id="password" type="password" value="" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="confirm">Confirm Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="confirmpassword" id="confirm" type="password" value="" required>
								</div>
							  </div>        
							  
							  <div class="form-actions">
								<button type="submit" name="submit" class="btn btn-primary">Add Student</button>
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
