<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  
</head>

<body style="background-color:#333333;">
<div class="container-fluid" id="marks_card" style="background-color:#fff;" >
 <div class="row"><br><br><br><br>
 
  	<div class="col-sm-4" >
	
	</div>
	<div class="col-sm-4">
	<div class="panel panel-primary">
      <div class="panel-heading"><h4>Student Marks Update</h4></div>
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
		<!--<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">-->
<form role="form" action="login_check_marks.php" method="post">
	<div class="form-group">
	<label role="email">Username:</label>
	<input type="text" name="username" class="form-control">
	</div>
	<div class="form-group">
	<label role="email">Password:</label>
	<input type="password" name="log_pas" class="form-control">
	</div>
	
	 <div class="form-group">
	 <label for="usr">Select Class</label>
		<select class="form-control" name="class_teach">
			<option value="">Select Class</option>
			<option value="prekg">PreKG</option>
			<option value="lkg">LKG</option>
			<option value="ukg">UKG</option>
			<option value="first standard">1st Standard</option>
			<option value="second standard">2nd Standard</option>
			  <option value="third standard">3rd Standard</option>
			  <option value="fourth standard">4th Standard</option>
			  <option value="fifth standard">5th Standard</option>
			  <option value="sixth standard">6th Standard</option>
			  <option value="seventh standard">7th Standard</option>
			  <option value="eighth standard">8th Standard</option>
			   <option value="ninth standard">9th Standard</option>
			  <option value="tenth standard">10th Standard</option>
			  <option value="first puc arts">1st PUC Arts</option>
			  <option value="first puc commerce">1st PUC Commerce</option>
			  <option value="first puc science">1st PUC Science</option>
			  <option value="second puc arts">2nd PUC Arts</option>
			  <option value="second puc commerce">2nd PUC Commerce</option>
			  <option value="second puc science">2nd PUC Science</option>
			</select>
	  </div>	

	 <div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Academic Year:</label>
	  <select class="form-control" name="academic_year">
		<option value="2018-2019">2018-2019</option>
	</select>
	</div>
	
	<input type="submit" class="btn btn-success btn-block" value="Login">
	</form>
	
	</div>
    </div>
	
	
	</div>
	<div class="col-sm-4">
	
	<?php
	/* $user=$_GET["username"];
	$academic_year=$_GET["academic_year"];
	$log_pas=$_GET["log_pas"];
	$class_teach=$_GET["class_teach"];
	
	$sql='select username,log_pas,class_teach from class_ad_members where username="'.$user.'" and academic_year="'.$academic_year.'" and log_pas="'.$log_pas.'" and class_teach="'.$class_teach.'"';
	$result=mysqli_query($conn,$sql);
	var_dump($sql); */
	?>
	</div>
	</div>
	
	</div>

	</body>
	</html>