<?php
	require_once('config.php');
	session_start();
	$obj1=new task;
	$obj1->checkUser();
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
					if($_SESSION['type']=='admin'){
						if($_SESSION['ir']==1){
					?>
				<ul class="breadcrumb">
					<li>
						<a href="addemployee.php" style="text-decoration:none;">
							<img src="img/add.png" />
							&nbsp;
							<span style="font-weight:bold;">
								Add New Employee
							</span>
						</a>
					</li>
				</ul>
				<?php
					}
				}
					?>
			</div>
		
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Employees List</h2>
						<div class="box-icon">
							<a href="#myModel" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>Id</th>
								  <th>User Name</th>
								  <th>Email</th>
								  <th>Department</th>
								  <th>Designation</th>
								  <th>Phone</th>
								  <th>Type</th>
								  <th>Actions</th>
								
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  		//$id=$_SESSION['id'];
								$obj=new task;
								$query = "select * from employee";
								$data = $obj->query($query);
								$toggle = 0;
								while($row=mysqli_fetch_array($data))
								{ 
									$id=$row['id'];
						  ?>
							<tr>
								<td class="center"><?php echo $id; ?></td>
								<td class="center"><?php echo $row['username'];  ?></td>
								<td class="center"><?php echo $row['email'];  ?></td>
								<td class="center"><?php 
									echo $obj->getValue("department","name",$row['dept_id']);
								?></td>
								<td class="center"><?php 
									echo $obj->getValue("designation","position",$row['des_id']);
								?></td>
								<td class="center"><?php echo $row['phone'];?></td>
								<td class="center"><?php echo $row['type'];?></td>
								

									<?php
										
									?>
								<?php
										echo "<td class='center'>";
										if($_SESSION['vr']==1){
											echo "<a class='btn btn-success' href='viewemployee.php?id=$id'><i class='icon-zoom-in icon-white'></i>View</a>&nbsp;";
										}
										if($_SESSION['ur']==1){
											echo "<a class='btn btn-info' href='editemployee.php?id=$id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
										}
										if($_SESSION['dr']==1){
											echo "<a class='btn btn-danger' href='delemployee.php?id=$id'><i class='icon-trash icon-white'></i>Delete</a>";
										}
										if($_SESSION['dr']!=1 && $_SESSION['vr']!=1 && $_SESSION['ur']!=1){
											echo "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>No rights</a>";
										}
										echo "</td>";
								?>
							</tr>
							<?php
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

		<!-- <div class="modal hide fade" id="myModal">
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
		</div> -->
		<?php require_once("footer.php"); ?>
	</div><!--/.fluid-container-->

	<?php require_once("includes.php"); ?>
	
		
</body>
</html>
