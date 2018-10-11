<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
date_default_timezone_set("Asia/Kolkata");
error_reporting("0");
$today_date=date("Y-m-d");
require("header.php");	
if((isset($_GET["first_name"]))&&(isset($_GET["roll_no"]))&&(isset($_GET["section"]))){
	$first_name=$_GET["first_name"];
	$roll_no=$_GET["roll_no"];
	
}else{
$section="";
}
$sql_student = "SELECT * FROM students where first_name='".$first_name."' and roll_no='".$roll_no."'";
$result_student=mysqli_query($conn,$sql_student);
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row_student['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row_student['join_date'] ));
		$first_name= $row_student['first_name'];
		$class_join= $row_student['class_join'];
		$present_class= $row_student['present_class'];
		$section= $row_student['section'];
		$academic_year= $row_student['academic_year'];
		$father_name= $row_student['father_name'];
		$roll_no= $row_student['roll_no'];
		$address= $row_student['address'];
		$caste= $row_student['caste'];
		$record_no= $row_student['roll_no'];
		$parent_contact= $row_student['parent_contact'];
		
	}	
	
	$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	
	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sch_name=$row["sch_name"];
		$location=$row["location"];
		$city=$row["location"];
		
	}
?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-yellow">
        <div class="panel-heading"><h4>Issue Student Gate Pass</h4></div>
        <div class="panel-body">
<?php
	if((isset($_GET["success"]))=="success")
	 {
 ?>
	   <div class="alert alert-success">
  <strong>Success!</strong> Alert message sent.
</div>
<?php
		}
		else if((isset($_GET["failed"]))=="failed")

		{
		?>
				<div class="alert alert-danger">
		  <strong>Error!</strong> Something went wrong!!!.
		</div>
<?php
		}
?>
								
							
<form action="insert_gate_pass.php" method="post">
 
	  <div class="form-group">
	    <label for="usr">Reason:</label>
		<input type="text" name="gate_reason" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Permitted to go:</label>
		<input type="text" name="gate_permit_go" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">With:</label>
		<input type="text" name="with" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Relation:</label>
		<input type="text" name="relation" class="form-control">
	  </div>
	  <input type="hidden" name="first_name" value="<?php echo $first_name;?>" class="form-control">
	  <input type="hidden" name="roll_no" value="<?php echo $roll_no;?>" class="form-control">
	  <input type="hidden" name="present_class" value="<?php echo $present_class;?>" class="form-control">
	  <input type="hidden" name="section" value="<?php echo $section;?>" class="form-control">
	  <input type="hidden" name="address" value="<?php echo $address;?>" class="form-control">
	  <input type="hidden" name="academic_year" value="<?php echo $academic_year;?>" class="form-control">
	  <input type="hidden" name="parent_contact" value="<?php echo $parent_contact;?>" class="form-control">
	  
		
	  <input type="submit" name="gate_pass" class="btn btn-success" value="Issue Gate Pass">
	  <button class="btn btn-success" onclick="goBack()">Go Back</button>
	</form>
		
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



	}else{
		header("Location:login.php");
	}
	



?>