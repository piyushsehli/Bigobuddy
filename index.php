<?php
	include('super/config.php');

	$form = new Task();
	if(isset($_POST['submit'])){
	$res = $form->createClient();
	if($res){
		echo "Done";
	}
	else{
		echo "Try";
	}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="index.php" method="post">
				<div class="col-md-6">
					<div class="form-group">
						<label>Organizational Details</label>
					</div>
					<div class="form-group">
					    <label for="c_name">Organization's Name</label>
					    <input type="text" class="form-control" name="c_name" id="c_name" required>
					</div>
					<div class="form-group">
					    <label for="email">Email address</label>
					    <input type="c_email" class="form-control" name="c_email" id="email" required>
				  	</div>
					  <div class="form-group">
					    <label for="c_number">Contact Number</label>
					    <input type="text" class="form-control" id="c_number" name="c_number" required>
					  </div>
					  <div class="form-group">
					    <label for="c_address">Address</label>
					    <textarea class="form-control" id="c_address" name="c_address" required></textarea>
					  </div>
					  <div class="form-group">
					    <label for="city">City</label>
					    <input type="text" class="form-control" id="city" name="city" required>
					  </div>
					  <div class="form-group">
					    <label for="state">State</label>
					    <input type="text" class="form-control" id="state" name="state" required>
					  </div>	 	  	  
					  <div class="form-group">
					    <label for="pincode">Pincode</label>
					    <input type="text" class="form-control" id="pincode" name="pincode" required>
					  </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Employee Details</label>
					</div>
					  <div class="form-group">
					    <label for="e_name">Name</label>
					    <input type="text" class="form-control" id="e_name"  name="e_name" required>
					  </div>
					  <div class="form-group">
					    <label for="e_email">Email</label>
					    <input type="email" class="form-control" id="e_email" name="e_email" required>
					  </div>
					  <div class="form-group">
					    <label for="desg">Designation</label>
					    <input type="text" class="form-control" id="desg" name="desg" required>
					  </div>
					  <div class="form-group">
					    <label for="e_number">Contact Number</label>
					    <input type="number" class="form-control" id="e_number" name="e_number" required>
					  </div>
					  <div class="form-group">
					    <label for="e_address">Address</label>
					    <input type="number" class="form-control" id="e_address" name="e_address" required>
					  </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Login Details</label>
					</div>
				  <div class="form-group">
				    <label for="c_username">Organization's Username</label>
				    <input type="text" class="form-control" id="c_username" name="c_username" required>
				  </div>
				  <div class="form-group">
				    <label for="e_username">Employee's Username</label>
				    <input type="text" class="form-control" id="e_username" name="e_username" required>
				  </div>
				  <div class="form-group">
				    <label for="e_pass">Employee's Password</label>
				    <input type="password" class="form-control" id="e_pass" name="e_pass" required>
				  </div>
				  <button type="submit" name="submit" class="btn btn-default">Submit</button>
			</div>
			</form>
		</div>	
	</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>