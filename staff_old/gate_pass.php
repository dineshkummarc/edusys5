<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];
require("header.php");	
if(isset($_GET["id"])){
	$id=$_GET["id"];
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
	  <input type="hidden" name="student_id" value="<?php echo $id;?>">
	  
		
	  <input type="submit" name="gate_pass" class="btn btn-success" value="Issue Gate Pass">
	 
	</form><br>
	 <button class="btn btn-success" onclick="goBack()" >Go Back</button>
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
require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>