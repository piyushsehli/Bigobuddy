<?php
	require_once("super/config.php");
	if (isset($_POST['username']))
	{
		$log = new task;
		$log->doClientLogin();	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bigobuddy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Ajay & Sukhjeet">

	<!-- The styles -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-top: 40px;
	  }
	</style>
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="super/img/favicon.ico">
		
</head>

<body>
		<div class="container">
		<div class="row">
		
				<div class="well col-md-4 col-md-offset-4 center login-box">
					<div class="alert alert-info">
						Welcome to Bigobuddy
					</div>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							<p>Enter Organization's Username</p>
							<div class="form-group">
								<input autofocus class="form-control" style="width:92%; margin-left:15px" name="username" id="username" type="text" />
							</div>
							<div class="form-group">
								<button type="submit" style="margin-left:15px" class="btn btn-primary">Next</button>
							</div>							
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
	</div><!--/.fluid-container-->


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>