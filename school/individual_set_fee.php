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
        <div class="panel-heading"><h4>Add Individual Fee</h4></div>
        <div class="panel-body">
<?php 
 $first_name = $_GET["first_name"];
 $roll_no = $_GET["roll_no"];
 $class = $_GET["class"];
 
	if(isset($_GET["failed"])){
	?>
	<div class="alert alert-danger">
    <strong>Failed!</strong> Some Error Occured.
     </div>
	<?php
	}
	?>
	<h4>Name: <?php echo $first_name;?>, Roll No: <?php echo $roll_no;?> <br> Class : <?php echo $class;?></h4>							
							
<form action="individual_insert_set_fee.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Individual Fee:</label>
		<input type="number" name="adm_fee" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Fee Towards:</label>
		<input type="text" name="fee_towards" class="form-control">
	  </div>
	  <input type="hidden" name="first_name" value="<?php echo $first_name;?>">
	  <input type="hidden" name="roll_no" value="<?php echo $roll_no;?>">
	  <input type="hidden" name="class" value="<?php echo $class;?>">
		
	  <input type="submit" name="set_fee" class="btn btn-success" value="Add Individual Fee">
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