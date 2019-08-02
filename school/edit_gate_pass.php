<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
date_default_timezone_set("Asia/Kolkata");
error_reporting("0");
$today_date=date("Y-m-d");
require("header.php");	
if(isset($_GET["id"])){
	$id=$_GET["id"];

}
$sql_student = "SELECT * FROM gate_pass where id='".$id."'  and academic_year='".$cur_academic_year."'";
$result_student=mysqli_query($conn,$sql_student);
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
		
		$first_name= $row_student['first_name'];
	    $roll_no= $row_student['roll_no'];
		$address= $row_student['address'];
		$gate_reason= $row_student['gate_reason'];
		$gate_permit_go= $row_student['gate_permit_go'];
		$gate_with= $row_student['gate_with'];
		$parent_contact= $row_student['parent_contact'];
		$relation= $row_student['relation'];
		$section= $row_student['section'];
		$present_class= $row_student['present_class'];
		$academic_year= $row_student['academic_year'];
		
		
	}	
	
?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-yellow">
        <div class="panel-heading"><h4>Edit Student Gate Pass</h4></div>
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
								
							
<form action="update_gate_pass.php" method="post">
 
	  <div class="form-group">
	    <label for="usr">Reason:</label>
		<input type="text" name="gate_reason" value="<?php echo $gate_reason;?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Permitted to go:</label>
		<input type="text" name="gate_permit_go" value="<?php echo $gate_permit_go;?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">With:</label>
		<input type="text" name="with" value="<?php echo $gate_with;?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Relation:</label>
		<input type="text" name="relation" value="<?php echo $relation;?>" class="form-control">
	  </div>
	  <input type="hidden" name="first_name" value="<?php echo $first_name;?>" class="form-control">
	  <input type="hidden" name="roll_no" value="<?php echo $roll_no;?>" class="form-control">
	  <input type="hidden" name="present_class" value="<?php echo $present_class;?>" class="form-control">
	  <input type="hidden" name="section" value="<?php echo $section;?>" class="form-control">
	  <input type="hidden" name="address" value="<?php echo $address;?>" class="form-control">
	  <input type="hidden" name="academic_year" value="<?php echo $academic_year;?>" class="form-control">
	  <input type="hidden" name="parent_contact" value="<?php echo $parent_contact;?>" class="form-control">
	  <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
	  
		
	  <input type="submit" name="gate_pass" class="btn btn-success" value="Update Gate Pass">
	  <button class="btn btn-success" onclick="goBack()">Go Back</button>
	</form>
		
		</div>
		</div>
		</div>
		<div class="col-sm-3"><br></div>
    </div>
    </div>
	</div>
</div>
<?php 
require("footer.php");
}
else
{
header("Location:login.php");
}
?>