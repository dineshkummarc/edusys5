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
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Collect Student Fee</h4></div>
      <div class="panel-body">
<?php

if(isset($_GET["success"]))

	{
	$success=$_GET["success"];
	echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Fee setup has been updated successfully</span><br></p>';
	}
	if(isset($_GET["failed"]))

	{
	$failed=$_GET["failed"];
	echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';
	}
	
	$id=$_GET["id"];
	$sql="select * from students where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$present_class=$row["present_class"];
	$first_name=$row["first_name"];
	$roll_no=$row["roll_no"];

	}
		
	?>
	Name : <?php echo $first_name;?> , Roll No : <?php echo $roll_no;?> , Class : <?php echo $present_class;?>			
							
<form action="insert_student_fee.php" method="post">
    
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="hidden" name="present_class" value="<?php echo $present_class;?>">
	 
 		<div class="form-group">
	  <label for="usr">School Fee:</label>
		<input type="number" name="adm_fee" class="form-control">
	  </div>
	 
		<div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="text" name="rec_no" class="form-control">
	  </div> 
	  
	  <div class="form-group">
	    <label for="usr">Note (if any):</label>
		<input type="text" name="note" class="form-control">
	  </div>
	<input type="submit" name="student_fee" class="btn btn-success" value="Collect Fee">
	</form><br>

	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
	
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
	}else{
		header("Location:login.php");
	}
?>