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
<div class="container-fluid" id="marks_card" style="background-color:#333333;" >
 <div class="row"><br><br><br><br>
 
  	<div class="col-sm-4" >
	
	</div>
	<div class="col-sm-4">
	<div class="panel panel-primary">
      <div class="panel-heading"><h4>School Management</h4></div>
      <div class="panel-body">
			<form role="form" action="login_check.php" method="post">
	<div class="form-group">
	<label role="email">Username:</label>
	<input type="text" name="class_uname" class="form-control">
	</div>
	<div class="form-group">
	<label role="email">Password:</label>
	<input type="password" name="class_pass" class="form-control">
	</div>
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Class:</label>
	
		   <?php 
		   require("connection.php");
		   
		   echo '<select class="form-control" name="class">';
		   echo '<option value="">Select Type</option>';
			

			$sql="select distinct present_class from students";

			 $result=mysqli_query($conn,$sql);

			foreach($result as $value)
			{
			?>
			<option value='<?php echo $value["present_class"];?>'><?php echo $value["present_class"];?></option>
			<?php
			}
			echo '</select><br>';

			?>
			
	 
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