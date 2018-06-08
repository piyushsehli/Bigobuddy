<?php
 	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();
	require_once("headincludes.php"); 
	$class='';
	?>
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
						//if($_SESSION['insertright']=='y'){

					?>
						<ul class="breadcrumb">

							<li>
								<a href="addlecture.php" style="text-decoration:none;">
									<img src="img/add.png" />
									&nbsp;
									<span style="font-weight:bold;">
										Add New Lecture
									</span>
								</a>
							</li>
						</ul>
					<?php
						//}
					?>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>List of Lectures</h2>
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
						<form action="lectures.php" method="post">
							<select name="class" class="input-xlarge focused" required="" id="class">
								<option value="">Select Class</option>
								<?php
										$query = "select * from classes";
										$obj->connect();
										$data = $obj->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);
											$course=$obj->getValue('courses', 'name', $course_id).' '.$obj->getValue('courses', 'branch', $course_id);
										
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
								  <th>Lecture ID</th>
								  <th>Class</th>
								  <th>Subject</th>
								  <th>Teacher</th>
								  <th>Day</th>
								  <th>Time Slot</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							if(isset($class)){

							
								$list = new task;
								$query = "select * from lectures where class_id='$class'";
								$list->query($query);
								
								while($list->nextRecord())
								{
									$id = $list->Record['id'];

									$class_id = $list->Record['class_id'];
									$course_id=$obj->getValue('classes','course_id',$class_id);
									$class=$obj->getValue('courses','name',$course_id).' '.$obj->getValue('courses','branch',$course_id).' Sem-'.$obj->getValue('classes','semester',$class_id).' Sec-'.$obj->getValue('classes','section',$class_id);
									$subject_id = $list->Record['subject_id'];
									$subject = $obj->getValue('subjects','name',$subject_id);

									$teacher_id = $list->Record['teacher_id'];
									$teacher = $obj->getValue('teachers','firstname',$teacher_id).' '.$obj->getValue('teachers','lastname',$teacher_id);

									$day = $list->Record['day'];
									$slot_id = $list->Record['slot_id'];
									$timings=$obj->getValue('slots','timings',$slot_id);
									
									echo "<tr>";
									echo "<td>$id</td>";
									echo "<td class='center'>$class</td>";
									echo "<td class='center'>$subject</td>";
									echo "<td class='center'>$teacher</td>";
									echo "<td class='center'>$day</td>";
									echo "<td class='center'>$timings</td>";
									echo "<td class='center'>";
									//if($_SESSION['editright']=='y'){
									echo "<a class='btn btn-info' href='editlecture.php?id=$id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
									//}
									//if($_SESSION['deleteright']=='y'){
									echo "<a onclick='return confirm(\"Are you sure to delete this record?\");' class='btn btn-danger' href='dellecture.php?id=$id'><i class='icon-trash icon-white'></i>Delete</a>";
									//}									
									echo "</td>";
									echo "</tr>";
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