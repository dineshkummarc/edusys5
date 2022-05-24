<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	
	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-yellow">
        <div class="panel-heading"><h4>Edit Individual Fee</h4></div>
        <div class="panel-body">
<?php 
 $id = $_GET["id"];

 $sql="select * from set_individual_fee where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$student_id=$row["student_id"];
  }

 $sql_student="select * from students where id='".$student_id."'";
	$result_student=mysqli_query($conn,$sql_student);
	//var_dump($sql);
	
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
	$class=$row_student["present_class"];
	$section=$row_student["section"];
	$first_name=$row_student["first_name"];
	$roll_no=$row_student["roll_no"];

	}
 
	if(isset($_GET["failed"])){
	?>
	<div class="alert alert-danger">
    <strong>Failed!</strong> Some Error Occured.
     </div>
	<?php
	}
	?>
	<p style="color:red;font-weight:bold;">Name: <?php echo $first_name;?>, Roll No: <?php echo $roll_no;?>,  Class : <?php echo $class;?></p>							
							
<form action="individual_update_set_fee.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Individual Fee:</label>
		<input type="number" name="individual_fee" value="<?php echo $row['individual_fee']; ?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Fee Towards:</label>
		<input type="text" name="fee_towards" value="<?php echo $row['fee_towards']; ?>" class="form-control">
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="hidden" name="student_id" value="<?php echo $student_id;?>">
		
	  <input type="submit" name="set_fee" class="btn btn-success" value="Update Individual Fee">
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
require("footer.php");
	}else{
		header("Location:login.php");
	}
?>