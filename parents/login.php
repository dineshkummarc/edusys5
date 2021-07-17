<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  
  <meta name="theme-color" content="#0f6256">
<link rel="apple-touch-icon" href="/school_latestc/parents/images/school192.png">
<link rel="manifest" href="/school_latestc/parents/manifest.json">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body style="background-color:#333333;">
<div class="container-fluid" id="marks_card" style="background-color:#333333;" >
 <div class="row"><br><br><br><br>
 
  	<div class="col-sm-4" >
	
	</div>
	<div class="col-sm-4">
	<div id="installContainer" class="hidden" style="text-align:center;">
	<button id="butInstall" type="button" class="btn btn-success"  style="padding:15px;border:1px solid #009900;border-radius:5px">
		 Install App for Mobile or Computer  <i class="fa fa-android" aria-hidden="true"></i> <i class="fa fa-apple" aria-hidden="true"></i> <i class="fa fa-windows" aria-hidden="true"></i>
	 </button>
 </div>
 <br><br>
	<div class="panel panel-primary">
      <div class="panel-heading"><h4>School Management</h4></div>
      <div class="panel-body">
	   <?php
	  if(isset($_GET["failed"])){
		  ?>
		  <div class="alert alert-danger">
		<strong>Login Failed!</strong> Incorrect Username or Password.
		</div>
		  <?php
	  }
	  ?>
	  
			<form role="form" action="login_check.php" method="post">
	<div class="form-group">
	<label role="email">Username:</label>
	<input type="text" name="parents_uname" class="form-control">
	</div>
	<div class="form-group">
	<label role="email">Password:</label>
	<input type="password" name="parents_pass" class="form-control">
	</div>
	<div class="form-group">
  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Academic Year:</label>
  <select class="form-control" name="academic_year">
	<option value="2021-2022">2021-2022</option>
	
 </select>
</div>
	<input type="submit" class="btn btn-primary btn-block" value="Login">
	</form>
	
	 
	  </div>
    </div>
	

	
	
	</div>
	<div class="col-sm-4">
	
	</div>
	</div>
	
	</div>
	
	<script src="script.js"></script>
 <script src="jquery.min.js"></script>
 <script src="bootstrap.min.js"></script>

	</body>
	</html>