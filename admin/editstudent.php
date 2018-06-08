<?php
	session_start();
	require_once("config.php");
	$obj1=new task;
	$obj1->checkUser();
	$obj=new task;	
	$id=$_GET['id'];
	$query="select * from students where id=$id";
    $data= $obj->query($query);
    $row=mysqli_fetch_array($data);
    extract($row);
	$done = 0;

	/*$right =new task;
	$query2 ="select * from rights where emp_id='$id'";
	$data2 = $right->query($query2);
    $row2=mysqli_fetch_array($data2);*/
    
    /*extract($row2);*/
	if(isset($_POST["submit"]))
	{
	    $admin = new task;
		if($admin->updateStudent()){
			header("location:students.php");
		}
	}
	require_once("headincludes.php"); ?>	
	<script type="text/javascript">
		function loadcities()
		{
			var url;
			var st = document.getElementById("state").value;
			//console.log(st);
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
						<a href="students.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Students List
							</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Student Updation Form</h2>
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
								
								<div style="margin-left:100px;">
									<img style="height:200px; width:150px; " src="<?php echo $photo;?>">
									<input type="hidden" value="<?php echo $photo;?>" name="photo"></input> 
								</div>
								<input type="hidden" name="id" value="<?php echo $id;?>"></input>
								<input type="hidden" name="login_id" value="<?php echo $login_id;?>"></input>
							  

							  
											  	
							  <legend><h3 style="color:red;">Personal Details</h3></legend>

							  <div class="control-group">
								<label class="control-label" for="firstname">First Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="firstname" id="firstname" type="text" value="<?php echo $f_name ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="middlename">Middle Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="middlename" id="middlename" type="text" value="<?php echo $m_name ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="lastname">Last Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="lastname" id="lastname" type="text" value="<?php echo $l_name ;?>" required>
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="price">Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="email" id="email" type="email" value="<?php echo $email ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="price">Username</label>
								<div class="controls">
										<input type="hidden" name="user_check" value="<?php echo $obj->getValues("user_login","username",$login_id,"id");?>"></input>
								  <input class="input-xlarge focused" style="height:28;" name="username" id="username" type="text" value="<?php 
								  echo $obj->getValues("user_login","username",$login_id,"id");?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Gender <span style="color: red;">*</span></label>
								<div class="controls">
								<select name="gender" id="gender">
									<option value="MALE" <?php if($gender=="MALE"){echo "selected";}?> >MALE</option>
									<option value="FEMALE" <?php if($gender=="FEMALE"){echo "selected";}?> >FEMALE</option>
								</select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="phone">Phone Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="phone" id="phone" type="text" value="<?php echo $phone ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="dob">DOB</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="dob" id="dob" type="date" value="<?php echo $dob ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="address" id="address" type="text" value="<?php echo $address ;?>" required>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">State <span style="color: red;">*</span></label>
								<div class="controls">
								  <select name="state" id="state" onchange="loadcities();">
									<option value="">Select</option>

									<?php

										$query = "select * from states";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row1 = mysqli_fetch_assoc($data))
										{
									?>
										

											<option value='<?php echo $row1['stateid'];?>' <?php if ($state==$row1['stateid']) { echo "selected"; } ?>><?php echo $row1['statename']; ?></option>";
										<?php
										 	} 
										?>
									
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">City <span style="color: red;">*</span></label>
								<div class="controls">
								  <select name="city" id="city">
									<option value="">Select</option>
									<?php

										$query = "select * from cities";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row1 = mysqli_fetch_assoc($data))
										{
									?>
										

											<option value='<?php echo $row1['cityid']?>' <?php if ($city==$row1['cityid']) { echo "selected"; } ?>><?php echo $row1['cityname']; ?></option>";
										<?php
										 	} 
										?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="pincode">Pincode</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="pincode" id="pincode" type="text" value="<?php echo $pincode ;?>" required>
								</div>
							  </div>

							  <legend><h3 style="color:red;">Education Details</h3></legend>


							  <div class="control-group">
								<label class="control-label" for="focusedInput">Class</label>
								<div class="controls">
									<select name="class" id="class" >
									<?php
										$query = "select * from classes";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
									?>
										<option value="<?=$id?>" <?php if ($class_id==$id) { echo "selected"; } ?> ><?=$obj1->getValue('courses', 'name', $course_id)." ".$obj1->getValue('courses', 'branch', $course_id)." Sem-$semester Sec-$section"?></option>
									<?php }?>
									
								  </select> 
								</div>
							  </div>

											  
							  <div class="control-group">
								<label class="control-label" for="qual">Qualification</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="qual" id="qual" type="text" value="<?php echo $qualification ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="qual">Roll Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="roll_num" id="roll_num" type="text" value="<?php echo $roll_number ;?>" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="experience">Joining Date</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="join_date" id="join_date" type="date" value="<?php echo $joining_date ;?>" required>
								</div>
							  </div>
							  
							  <div class="control-group">
							  	<label class="control-label" for="fileInput">Student Snap</label>
								  <div class="controls">
									<input class="input-file uniform_on" name="snap" id="fileInput" type="file" >
								  </div>
							  </div>

							  <legend><h3 style="color:red;">Parents Details</h3></legend>
							  <div class="control-group">
								<label class="control-label" for="qual">Mother Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="mother" id="mother" type="text" value="<?php echo $mother_name ;?>" required>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="qual">Father Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="father" id="father" type="text" value="<?php echo $father_name ;?>" required>
								</div>
							  </div>

							   <div class="control-group">
								<label class="control-label" for="qual">Parents Contact Number</label>
								<div class="controls">
								  <input class="input-xlarge focused" style="height:28;" name="parents_contact" id="parents_contact" type="text" value="<?php echo $parents_contact ;?>" required>
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
