<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
if(isset($_GET["id"])){
	$id=$_GET["id"];

}
$sql_student = "SELECT * FROM gate_pass where id='".$id."'";
$result_student=mysqli_query($conn,$sql_student);
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
		$gate_reason= $row_student['gate_reason'];
		$gate_permit_go= $row_student['gate_permit_go'];
		$gate_with= $row_student['gate_with'];
		$relation= $row_student['relation'];
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