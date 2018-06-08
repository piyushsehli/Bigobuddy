<?php
	require_once('../config.php');
	session_start();
	$obj1=new task;
	/*$obj1->checkUser();*/
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
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Requests</h2>
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
								  <th>Organization's name</th>
								  <th>Organization's email</th>
								  <th>Organization's username</th>
								  <th>Organization's contact</th>
								  <th>Employee's name</th>
								  <th>Date/Time</th>
						  </thead>   
						  <tbody>
						  <?php
						  		//$id=$_SESSION['id'];
								$obj=new task;
								$query = "select * from admin";
								$data = $obj->query($query);
								$toggle = 0;
								while($row=mysqli_fetch_array($data))
								{ 
									$id=$row['id'];
						  ?>
							<tr>
								<td class="center"><?php echo $id; ?></td>
								<td class="center"><?php echo $row['c_name'];  ?></td>
								<td class="center"><?php echo $row['c_email'];?></td>
								<td class="center"><?php echo $row['c_username'];?></td>
								<td class="center"><?php echo $row['c_contact'];?></td>
								<td class="center"><?php echo $row['e_name'];?></td>
								<td class="center"><?php echo $row['user_registered_on'];?></td>
								<?php
										echo "<td class='center'>";
										
											echo "<a class='btn btn-success' href='viewClient.php?id=$id'><i class='icon-zoom-in icon-white'></i>View</a>&nbsp;";
										
											echo "<a class='btn btn-info' href='editClient.php?id=$id'><i class='icon-edit icon-white'></i>Edit</a>&nbsp;";
									
											echo "<a class='btn btn-danger' href='delClient.php?id=$id'><i class='icon-trash icon-white'></i>Delete</a>";
										
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
		<?php require_once("footer.php"); ?>
	</div><!--/.fluid-container-->

	<?php require_once("includes.php"); ?>
	
		
</body>
</html>
