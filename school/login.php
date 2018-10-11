<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  <style>
body {
    background-image: url("images/login.jpg");
    background-repeat: no-repeat, repeat;
   
}
</style>
</head>

<body>
<div class="container-fluid" id="marks_card">
 <div class="row"><br><br><br><br><br><br>
  
  	<div class="col-sm-4" >
	
	</div>
	<div class="col-sm-4" >
	 <div style="padding:10px;background-color:#3172c5;"><p style="color:#fff;text-align:center;font-size:30px;font-weight:bold;text-shadow: 2px 2px black;">WELCOME TO SCHOOL MANAGEMENT </h1></div>
	<div class="panel panel-primary" style="opacity:0.95">
    
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
	<input type="text" name="uname" class="form-control">
	</div>
	<div class="form-group">
	<label role="email">Password:</label>
	<input type="password" name="pass" class="form-control">
	</div>
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Academic Year:</label>
	  <select class="form-control" name="academic_year">
		<option value="2017-2018">2017-2018</option>
		<option value="2018-2019">2018-2019</option>
		<option value="2019-2020">2019-2020</option>
		<option value="2020-2021">2020-2021</option>
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

	</body>
	</html>