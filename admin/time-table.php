<?php
	require_once("config.php");
	session_start();
	$obj1=new task;
	if($obj1->checkUser()){
		echo "working";
	}
	$timestamp = strtotime('2009-10-22');

	$day = date('l', $timestamp);


?>
<?php require_once("headincludes.php"); ?>		
<body>
		<!-- topbar starts -->
		<?php require_once("topbar.php"); ?>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid" style="min-height:6super00px;">
				
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
						<a href="home.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="span9 tasks-con">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Time Table for students</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php
						$flag=0;
							if(isset($_POST['submit'])){
								$class=$_POST['class'];	
								$flag=1;							
							}
						?>
						<form action="time-table.php" method="post">
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
										<option value="<?=$id?>" <?php if(isset($class)){if($class==$id){echo 'selected';}}
											?>><?=$course.' '.$semester.' '.$section?></option>
									<?php }?>
							</select>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</form>
						<?php if($flag==1):?>
						<table border="2" cellspacing="3" align="center">
						<tr>
						 <td align="center"> ##### </td>
						 <?php
						 	$q_lec="select * from lectures where class_id='$class'";
						 	$l=mysqli_query($obj1->con, $q_lec);
						 	$l_data = [];
						 	while($data = mysqli_fetch_assoc($l)){
						 		$l_data[] = $data; 
						 	}

						 	$q_slot="select * from slots";
						 	$res=mysqli_query($obj1->con, $q_slot);
						 	$t = [];
						 	while($data = mysqli_fetch_assoc($res)){
						 		$t[] = $data; 
						 	}
						 	
						 	foreach($t as $times){

						 	
						 	?>
						 		<td align="center"><?=$times['timings']?></td>

						 	<?php }
						 		$days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

					 			foreach ($days as $day) {

						 			echo "</tr><tr><td align='center'>$day</td>";
						    ?>
						 	
						 	<?php 
						 		//while($t){						 			
					 			foreach($t as $slot){

					 				$time=$slot['timings'];
					 				/*var_dump($time);*/
					 				echo "<td align='center'>";
						 			foreach($l_data as $lec){

						 				$slot_id=$lec['slot_id'];
						 				$c_time=$obj1->getValue('slots','timings',$slot_id);
						 				/*var_dump($c_time.' '.$time);
						 				var_dump($lec['day'].' '.$day);*/
						 				if($c_time===$time && $lec['day']===strtolower($day)){
						 	?>
						 					<?=$obj1->getValue('subjects','name',$lec['subject_id'])?><br>
						 					<?=$obj1->getValue('teachers','firstname',$lec['teacher_id']).' '.$obj1->getValue('teachers','lastname',$lec['teacher_id'])?>
						 	<?php 
										break;}/*else{
											echo "<td>-----</td>";
										} */
										
						 				}
						 				echo "</td>";
						 			}
						 			echo "</tr>";
						 		}
						 	?>
						</table>
					<?php endif;?>
					</div>
				</div>				
			</div>
			</div>
				</div>
				
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