<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	
	if(isset($_GET["first_name"])){
		$first_name=$_GET["first_name"];
		$roll_no=$_GET["roll_no"];
	}

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
		 $sql="select first_name,roll_no,present_class,section from students where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";
		$result=mysqli_query($conn,$sql);
		

	if(isset($_GET["success"])){
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> Setup updated successfully.
     </div>
	<?php
	}
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	?>
								
	<p style="font-size:16px;color:green;font-weight:bold;">Student Name : <?php echo $first_name;?> and Roll No is <?php echo $roll_no;?></p>						
	<form action="insert_set_fee.php" method="post">
 
	<div class="form-group">
	    <label for="usr">Fee Amount:</label>
		<input type="number" name="adm_fee" class="form-control">
	  </div>
	  
	  <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Fee Towards:</label>
	<select class="form-control" name="fee_towards">
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
	  
	   <input type="hidden" name="first_name" value="<?php echo $first_name; ?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>" class="form-control">
	   <input type="hidden" name="present_class" value="<?php echo $row['present_class']; ?>" class="form-control">
	   <input type="hidden" name="section" value="<?php echo $row['section']; ?>" class="form-control">
	
		
	  <input type="submit" name="set_fee" class="btn btn-success" value="Setup Fee">
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