<?php
 	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();
	$class='';
	$teacher='';
	$subject='';
	$flag=0;
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
					<?php
						//if($_SESSION['insertright']=='y'){

					?>
						<ul class="breadcrumb">

							<li>
								<a href="addlecture.php" style="text-decoration:none;">
									<img src="img/add.png" />
									&nbsp;
									<span style="font-weight:bold;">
										Lecture Attendance
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
						<h2><i class="icon-user"></i>Select Lecture</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php
							if(isset($_POST['lecture_submit'])){
								$class=$_POST['class'];
								$subject=$_POST['subject'];
								$date=$_POST['date'];
								$teacher=$_POST['teacher'];
								
								$query="select id from lectures where class_id='$class' && subject_id='$subject' && date='$date' && teacher_id='$teacher'";
								if($row=mysqli_query($obj->con, $query)){
									$data=mysqli_fetch_assoc($row);
									$lecture_id=$data['id'];
									$flag=0;
								}
							}
							if(isset($_POST['review_submit'])){
								$class=$_POST['class'];
								$subject=$_POST['subject'];
								$date=$_POST['date'];
								$teacher=$_POST['teacher'];
								$query="select id from lectures where class_id='$class' && subject_id='$subject' && date='$date' && teacher_id='$teacher'";
								if($row=mysqli_query($obj->con, $query)){
									$data=mysqli_fetch_assoc($row);
									$lecture_id=$data['id'];
									$flag=1;
								}
							}
						?>
						<form action="lectureattendance.php" method="post">
							<fieldset>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Enter Date</label>
								<div class="controls">
								  <input name="date" class="input-xlarge focused" id="focusedInput" type="date" value="<?php if(isset($date)){echo $date;}?>">
								</div>
						    </div>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Select Class</label>
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
							</div>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Subject</label>
								<div class="controls">
									<select class="input-xlarge focused" name="subject" id="subject" >
								  	<option value="">select</option>
									<?php
										$query = "select * from subjects";
										$obj->connect();
										$data = $obj->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);					
									?>
										<option value="<?=$id?>" <?php if($subject==$id){echo 'selected';}
											?>><?=$name?></option>
									<?php }?>
									</select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Teacher</label>
								<div class="controls">
								<select class="input-xlarge focused" name="teacher" id="teacher" >
								  	<option value="">select</option>
									<?php
										$query = "select * from teachers";
										$obj->connect();
										$data = $obj->query($query);
										while($row = mysqli_fetch_assoc($data))
										{
											extract($row);					
									?>
										<option value="<?=$id?>" <?php if($teacher==$id){echo 'selected';}
											?>><?=$firstname.' '.$lastname?></option>
									<?php }?>
									</select>
								</div>
							  </div>
						      <div class="form-actions">
								<button type="submit" class="btn btn-primary" name="lecture_submit">Mark Attendance</button>
								<button type="submit" class="btn btn-primary" name="review_submit">Review Attendance</button>
							  </div>
							</fieldset>
						</form>
						<?php
							if($flag==1){
						?>

							<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<label>Review Attendance</label>
						  <thead>
							  <tr>
							  	  <th>Student Name</th>
								  <th>Roll Number</th>
								  <th>Status</th>
								  <th>Verify</th>  
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
								$obj=new task;
								$query = "select * from attend where `date`='$date' && `lecture_id`='$lecture_id'";
								$data = $obj->query($query);
								$inc=0;
								while($review=mysqli_fetch_array($data))
								{ 
									$inc=$inc+1;
									$id=$review['id'];
									$student_id=$review['student_id'];
						  ?>
						 
								
							<tr>
							 <form id="form<?php echo $inc;?>">
								<input type="hidden" value="<?php echo $id;?>" name="id" id="id"></input>
								<input type="hidden" value="<?php echo $review['status'];?>" id="status_previous" name="status_previous"></input>
								
								<td class="center"><?php echo $obj->getValue("students","f_name", $student_id).' '.$obj->getValue("students","l_name", $student_id);  ?></td>
								
								<td class="center"><?php echo $obj->getValue("students","roll_number", $student_id);  ?></td>
								
								<td class="center">
									<select name="status_now" id="status_now">
										<option value="present" <?php if($review['status']=="present"){echo 'selected';}?>>Present</option>
										<option value="absent" <?php if($review['status']=="absent"){echo 'selected';}?>>Absent</option>
										<option value="leave" <?php if($review['status']=="leave"){echo 'selected';}?>>Leave</option>
									</select>
								</td>

								<td class="center">
									<input id="review" value="1" type="checkbox" name="review[]" onclick="review('form<?php echo $inc;?>')" <?php if($row['verify']==1){echo 'checked';}?>></input>
								</td>
							</form>			
							</tr>
							<?php
								}
							?>
						  </tbody>
					  </table>            

						<?php
							}
						?>
						<script>
			function review(id){
				form = document.getElementById(id);
				pre_status = document.getElementById('status_previous');
				now_status = document.getElementById('status_now');
				
				var check="";
				var review="";
				f = new FormData(form);
				if(pre_status==now_status){
					check="same";
					alert('Records already updated');
					return;
				}
				else{
					if($('#review').attr('checked')){
						review="done";
					}
					else{
						review="";
						alert('Recheck the checkbox to update attendance');
						return;
					}
					myData={
						id: f.get('id'),
						status_now: f.get('status_now'),
						check: check,
						review: review
					}
					$.ajax({
						type: 'post',
						url: 'review.php',
						/*processData:false,
						contentType:false,*/
						data: myData,
						success: function(result){
							alert(result);
						}
					});
				}
			}		
		</script>
						<?php if($flag==0){?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<label>Mark Attendance</label>
						  
						  <thead>
							  <tr>
								  <th>Student Name</th>
								  <th>Roll Number</th>
								  <th>Status</th>
								  <th>Mark Attendance</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php

								$stu_query="select * from students where class_id='$class'";
								/*$stu_query="select s.id, s.f_name, s.l_name, s.roll_number, a.student_id, a.date, a.lecture_id from students s, attend a where s.id=a.student_id and a.date='2017-07-04' and a.lecture_id='1'";*/
								$stu_data=mysqli_query($obj->con, $stu_query);
								
								$inc=0;
								while($stu_rows=mysqli_fetch_assoc($stu_data)){
									$inc=$inc+1;
							?>
							<tr>
							 <form id="form<?php echo $inc;?>">
								<input type="hidden" value="<?php echo $stu_rows['id'];?>" name="student_id"></input>
								<input type="hidden" name="time" value="<?php date("h:i");?>"></input>
								<input type="hidden" name="date" value="<?php echo $date;?>"></input>
								<?php
								/*var_dump($date);*/
								?>
								<input type="hidden" name="lecture_id" value="<?php echo $lecture_id;?>"></input>
								<td class="center"><?php echo $stu_rows['f_name'].' '.$stu_rows['l_name'];  ?></td>
								
								<td class="center"><?php echo $stu_rows['roll_number'];  ?></td>
								
								<td class="center">
									<select name="status">
										<option value="present" <?php //if($row['status']=="present"){echo 'selected';}?>>Present</option>
										<option value="absent" <?php //if($row['status']=="absent"){echo 'selected';}?>>Absent</option>
										<option value="leave" <?php //if($row['status']=="leave"){echo 'selected';}?>>Leave</option>
									</select>
								</td>
								<td class="center">
									<input id="verify" value="1" type="checkbox" name="verify[]" onclick="verify('form<?php echo $inc;?>')" <?php //if($row['verify']==1){echo 'checked';}?>></input>
								</td>
							</form>			
							</tr>
							<?php }?>
						  </tbody>
					  </table>     
					  <?php }?>       
					</div>
				</div><!--/span-->
				<script>
			function verify(id){
				form = document.getElementById(id);
				f = new FormData(form);
				var check="";
				if($('#verify').attr('checked')){
					//alert("true");
					check="verify";
				}
				else{
					check="";
				}
				myData={
						student_id: f.get('student_id'),
						status: f.get('status'),
						check: check,
						date: f.get('date'),
						time: f.get('time'),
						lecture_id: f.get('lecture_id')
				}
				$.ajax({
					type: 'post',
					url: 'markattend.php',
					/*processData:false,
					contentType:false,*/
					data: myData,
					success: function(result){
						alert(result);
					}
				});
			}		
		</script>
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