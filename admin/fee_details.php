<?php
 	session_start();
	require_once("config.php");
	$obj = new task();
	$obj->checkUser();
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
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Fee details</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<?php
							$today = date("d-M-Y");
							$toarr = explode("-", $today);
							$curyear = intval($toarr[2]);
							$end_year=0;

							if(isset($_GET["month"]))
								$month = $_GET["month"];
							else
								$month = intval($toarr[1]);
							
							if(isset($_GET["year"]))
								$year = $_GET["year"];
							else
								$year = intval($toarr[2]);
							
							$enid=0;

							if(isset($_GET["enid"]))
							{
								$enid = $_GET["enid"];
							}
							
							if(!($month <13 and $month >0)){
								$month =date("m");  // Current month as default month
							}
							
							if(!($year <=$end_year and $year >=$start_year)){
								$curyear =date("Y");  // Set current year as default year 
							}
							
							$d= 2; // To Finds today's date
							//$no_of_days = date('t',mktime(0,0,0,$month,1,$year)); //This is to calculate number of days in a month
							
							$no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);//calculate number of days in a month

							$j= date('w',mktime(0,0,0,$month,1,$year)); // This will calculate the week day of the first day of the month
							//echo $j;
							
							$adj=str_repeat("<td bgcolor='#ffffff'>*&nbsp;</td>",$j);  // Blank starting cells of the calendar 
							
							$blank_at_end=42-$j-$no_of_days; // Days left after the last day of the month
							
							if($blank_at_end >= 7){
								$blank_at_end = $blank_at_end - 7;
							} 
							
							$adj2=str_repeat("<td bgcolor='#ffffff'>*&nbsp;</td>",$blank_at_end); // Blank ending cells of the calendar

							/// Starting of top line showing year and month to select ///////////////

							echo "<form><table class='main'>";

							echo "<td colspan=6>";

							echo "<select name='month' value='' onchange='reload(this.form)' id='month'><option value=''>Select Month</option>";
							
							for($p=1;$p<=12;$p++){
								$dateObject = DateTime::createFromFormat('!m', $p);
								
								$monthName = $dateObject->format('F');
								if($month==$p){
									echo "<option value=$p selected>$monthName</option>";
								}else{
									echo "<option value=$p>$monthName</option>";
								}
							}

							echo "</select><select name='year' value='' onchange='reload(this.form)' id='year'>Select Year</option>";
							for($i=$curyear-5;$i<=$curyear;$i++){
								if($year==$i){
									echo "<option value='$i' selected>$i</option>";
								}else{
									echo "<option value='$i'>$i</option>";
								}
							}

							echo "</select>";
							echo "<button type='submit' style='margin:10px; margin-top:0px' class='btn btn-default' name='fee_details'>Submit</button></form>";
						?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <!-- <th>ID</th> -->
								  <th>Class</th>
								  <th>Amount</th>
								  <th>Fee Duration</th>
								  <th>Student Roll number</th>
								  <th>Fee Due Date</th>
								  <!-- <th class="center">Actions</th> -->
							  </tr>
						  </thead>   
						  <tbody>
							<?php
								$list = new task;
								$query = "select * from students where month(due_date)='$month' and year(due_date)='$year'";
								

								$list->query($query);
								
								while($list->nextRecord())
								{
									$class_id = $list->Record['class_id'];
									$roll = $list->Record['roll_number'];
									$fee_paid = $list->Record['fee_paid'];
									$full_fee = $list->Record['full_fee'];
									$date = $list->Record['due_date'];
									echo "<tr>";
									echo "<td class='center'>$class_id</td>";
									echo "<td class='center'>$roll</td>";
									echo "<td class='center'>$fee_paid</td>";
									echo "<td class='center'>$full_fee</td>";
									echo "<td class='center'>$date</td>";
									/*echo "<td class='center'>";*/
									//if($_SESSION['editright']=='y'){
										/*echo "<a class='btn btn-info' href='editfee.php?id=$id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
										//}
									//if($_SESSION['deleteright']=='y'){
										echo "<a onclick='return confirm(\"Are you sure to delete this record?\");' class='btn btn-danger' href='delfee.php?id=$id'><i class='icon-trash icon-white'></i>Delete</a>";*/
										//}
									/*echo "</td>";*/
									echo "</tr>";
								}
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
</div>
			
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