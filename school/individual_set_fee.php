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
 $id = $_GET["id"];
 $sql="select * from students where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$class=$row["present_class"];
	$section=$row["section"];
	$first_name=$row["first_name"];
	$roll_no=$row["roll_no"];

	}
 
	if(isset($_GET["failed"])){
	?>
	<div class="alert alert-danger">
    <strong>Failed!</strong> Some Error Occured.
     </div>
	<?php
	}
	?>
	<p style="color:red;font-weight:bold;">Name: <?php echo $first_name;?>, Roll No: <?php echo $roll_no;?>  Class : <?php echo $class;?></p>							
							
<form action="individual_insert_set_fee.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Individual Fee:</label>
		<input type="number" name="individual_fee" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Fee Towards:</label>
		<input type="text" name="fee_towards" class="form-control">
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id;?>">
		
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