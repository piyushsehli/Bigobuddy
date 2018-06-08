<?php
	require_once('config.php');
	session_start();
	$obj1=new task;
	$obj1->checkUser();
	$class='';
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
				<?php
						/*if($_SESSION['type']=='admin'){
							echo $_SESSION['ir'];
							if($_SESSION['ir']==1){*/

							
					?>

				<ul class="breadcrumb">
					<li>
						<a href="addstudent.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Add New Students
							</span>
						</a>
					</li>
				</ul>
				<?php
			/*		}
				}*/
					?>
			</div>
			<?php
			if(isset($_GET['a']))
					{
						echo"<b style='color:green'>Updated Successfully</b>";
					}
					?>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Students' List</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php
							if(isset($_POST['submit'])){
								$class=$_POST['class'];
							}
						?>
						<form action="students.php" method="post">
							<select name="class" class="input-xlarge focused" required="" id="class">
								<option value="">Select Class</option>
								<?php
										$query = "select * from classes";
										$obj1->connect();
										$data = $obj1->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
											$course=$obj1->getValue('courses', 'name', $course_id).' '.$obj1->getValue('courses', 'branch', $course_id);
								?>
										<option value="<?=$id?>" <?php if($class==$id){echo 'selected';}
											?>><?=$course.' '.$semester.' '.$section?></option>
									<?php }?>
							</select>
							<button type="submit" name="submit" style="margin-top:-9px" class="btn btn-primary">Search</button>
						</form>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Roll Number</th>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Class</th>								  
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  		if(isset($class)){

						  		
								$obj=new task;
								$query = "select * from students where class_id='$class'";
								$data = $obj->query($query);
								$toggle = 0;
								while($obj->nextRecord())
								{ 
									$id=$obj->Record['id'];
									$class_id=$obj->Record['class_id'];
									$course_id=$obj1->getValues('classes', 'course_id', $class_id, 'id');
									$sem=$obj1->getValue('classes', 'semester', $class_id);
									$sec=$obj1->getValue('classes', 'section', $class_id);
									$course=$obj1->getValue('courses', 'name', $course_id).' '.$obj1->getValue('courses', 'branch', $course_id);
						  ?>
							<tr>
								<td class="center"><?php echo $obj->Record['roll_number'];  ?></td>
								<td class="center"><?php echo $obj->Record['f_name'].' '.$obj->Record['l_name'];  ?></td>
								<td class="center"><?php echo $obj->Record['email'];  ?></td>
								<td class="center"><?php echo $course." Sem-".$sem." Sec-".$sec;  ?></td>
								<!-- <td class="center">
									<?php
										//$type = $obj->Record['type'];
										//	echo "<span class='label label-success'>$type</span>";
									?>
								</td> -->
								<?php

									//if($_SESSION['logintype']=='super'){
										echo "<td class='center'>";
										echo "<a class='btn btn-success' href='viewstudent.php?id=$id'><i class='icon-zoom-in icon-white'></i>View</a>&nbsp;";
										echo "<a class='btn btn-info' href='editstudent.php?id=$id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
										echo "<a class='btn btn-danger' href='delstudent.php?id=$id'><i class='icon-trash icon-white'></i>Delete</a>";
										echo "</td>";
									//}
								?>
							</tr>
							<?php
								}
								}
							?>
						  </tbody>
					  </table>            
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
