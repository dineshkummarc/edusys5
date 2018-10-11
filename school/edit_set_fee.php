<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");
	
	if(isset($_GET["id"])){
		$id=$_GET["id"];
	}

		$sql_set="select *  from set_fee where id='".$id."'";
	    $result_set=mysqli_query($conn,$sql_set);
		if($row_set=mysqli_fetch_array($result_set,MYSQLI_ASSOC))
			{
?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-yellow">
        <div class="panel-heading"><h4>Setup Fee Details</h4></div>
        <div class="panel-body">
<?php

   require("connection.php");
	if(isset($_GET["success"])){
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> Setup updated successfully.
     </div>
	<?php
	}

	?>
								
	<p style="font-size:16px;color:green;font-weight:bold;">Student Name : <?php echo $row_set["first_name"]; ?> and Roll No is <?php echo $row_set["roll_no"]; ?></p>						
	<form action="update_set_fee.php" method="post">
 
	<div class="form-group">
	    <label for="usr">Fee Amount:</label>
		<input type="number" name="adm_fee" <?php echo $row_set["adm_fee"]; ?> class="form-control">
	  </div>
	  
	  <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Fee Towards:</label>
	<select class="form-control" name="fee_towards">
	<option value="<?php echo $row_set["fee_towards"]; ?>"><?php echo $row_set["fee_towards"]; ?></option>
	  <?php
	  $sql_name="select distinct fee_name from fee_name order by fee_name";
	  $result_name=mysqli_query($conn,$sql_name);
	  foreach($result_name as $row_name){
	  ?>
	  <option value="<?php echo $row_name["fee_name"]; ?>"><?php echo $row_name["fee_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	  
	   <input type="hidden" name="first_name" value="<?php echo $row_set['first_name']; ?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $row_set['roll_no']; ?>" class="form-control">
	   <input type="hidden" name="present_class" value="<?php echo $row_set['class']; ?>" class="form-control">
	   <input type="hidden" name="section" value="<?php echo $row_set['section']; ?>" class="form-control">
	   <input type="hidden" name="id" value="<?php echo $row_set['id']; ?>" class="form-control">
	
		
	  <input type="submit" name="set_fee" class="btn btn-success" value="Update Setup Fee">
	</form><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>	
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		
	  </div>
    </div>
    </div>
	 </div>
</div>
<?php 
	}
	}else{
		header("Location:login.php");
	}
	



?>