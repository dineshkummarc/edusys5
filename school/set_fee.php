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
        <div class="panel-heading"><h4>Setup School Fee Details</h4></div>
        <div class="panel-body">
<?php 
	if(isset($_GET["success"])){
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> Setup updated successfully.
     </div>
	<?php
	}
	?>
								
							
<form action="insert_set_fee.php" method="post">
 

	<div class="form-group">
	  <label for="sel1">Select Class</label>
	  <select class="form-control" name="class">
	<?php
        require("connection.php");
		 $sql_class="select distinct present_class from students where academic_year='".$cur_academic_year."'";
		 $result_class=mysqli_query($conn,$sql_class);
		 foreach($result_class as $value_class)
        {
        ?>
		<option value='<?php echo $value_class["present_class"];?>'><?php echo $value_class["present_class"];?></option>
		<?php
		}
		echo '</select>';
		?>
		</div>
		
	  <div class="form-group">
	    <label for="usr">School Fee:</label>
		<input type="number" name="adm_fee" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Fee Towards</label>
		<input type="text" name="fee_towards" class="form-control">
	  </div>
	  
	 <div class="form-group">
	   <input type="hidden" name="assign_date" value="<?php echo date('d-m-Y'); ?>" class="form-control">
		</div>
		
	  <input type="submit" name="set_fee" class="btn btn-success" value="Setup Fee">
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