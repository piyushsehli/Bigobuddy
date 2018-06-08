<?php 
	require_once("config.php"); 
	$obj = new task;
	session_start();
?>
<?php require_once("headincludes.php"); ?>
	<script type="text/javascript">
		function post_value(mm,dt,yy){
			opener.document.f1.p_name.value = mm + "/" + dt + "/" + yy;
			/// cheange the above line for different date format
			self.close();
		}

		function reload(form){
			var month_val=document.getElementById('month').value; // collect month value
			var year_val=document.getElementById('year').value;      // collect year value
			var enid=document.getElementById('enid').value;      // collect year value
			self.location='teacher_att_report.php?month=' + month_val + '&year=' + year_val + '&enid=' + enid ; // reload the page
		}
	</script>
	
	<style type="text/css">
	table.main {
		width: 100%; 
		border: 1px solid black;
	}
	table.main td {
		font-family: verdana,arial, helvetica,  sans-serif;
		font-size: 11px;
	}
	table.main th {
		border-width: 1px 1px 1px 1px;
		padding: 0px 0px 0px 0px;
		background-color: #ccb4cd;
		color: black;
	}
	table.main a{TEXT-DECORATION: none;}
	table,td{ border: 1px solid #ffffff; height: 40px; text-align: center; font-size: 18px; font-weight: bold; }

	.empty{background-color: #f2f2f2; color: black; width: 14%;}
	.present{background-color: #daffb3; color: black; width: 14%;}
	.absent{background-color: #ff8080; color: black; width: 14%;}
	.leave{background-color: #b3daff; color: black; width: 14%;}
</style>

<body>
		<!-- topbar starts -->
		<?php //require_once("topbar.php"); ?>
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
						<h2><i class="icon-user"></i>Monthly Attendance Report</h2>
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

						echo "<table class='main'>";

						echo "<td colspan=6 >
							<select name='enid' onchange='reload(this.form)' id='enid'><option value=''>Select Employee</option>";

						$user=new Task;
						$query="select * from teachers";		
						$data=$user->query($query);
						while($row=mysqli_fetch_assoc($data)){
							extract($row);
							
						
						?>
							<option value='<?php echo $id;?>' <?php if($id==$enid){echo 'selected';}?> ><?php echo $id.' - '.$firstname.' '.$lastname;?></option>
						<?php
							}
						echo "</select>";
							
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

						echo " </td><td align='center'><a href=# onClick='self.close();'>X</a></td></tr><tr>";
						echo "<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";
							for($i=1;$i<=$no_of_days;$i++){
								$attdate = $year."-".$month."-".$i;
								if(isset($_GET['enid'])){

									$query = "select * from teacher_attend where date='$attdate' and teacher_id='$enid'";
									$data = $obj->query($query);
								}
								$tdclass = "empty";
								$marking='';
								if($row = mysqli_fetch_array($data))
								{
									//die(var_dump($row));
									extract($row);
									if($status == "present")
										$tdclass = "present";
									else if($status == "absent")
										$tdclass = "absent";
									else if($status == "leave")
										$tdclass = "leave";
								}
								$pv="'$month'".","."'$i'".","."'$year'";
								//var_dump($pv);
								echo $adj."<td class='$tdclass'>$i</td>";
								$adj='';
								$j ++;
								if($j==7){echo "</tr><tr>"; // start a new row
								$j=0;	
								}
							}
							
						echo $adj2;   // Blank the balance cell of calendar at the end 
						echo "<tr><td colspan='7'></td></tr>";
						echo "<tr><td class='present'>Present</td><td class='absent'>Absent</td><td class='leave'>Leave</td></tr>"; 
						echo "</tr></table>";
						echo "<center><a href=attendancereport.php>Reset Current Month Attendance</a></center>";

						?>

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