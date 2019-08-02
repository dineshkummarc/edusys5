<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
	error_reporting("0");
$cur_academic_year = $_SESSION['academic_year'];
	
require("header.php");
if(isset($_GET["id"])){
	$id = $_GET["id"];
}

if($_GET["edit"]=="yes"){
	$present_class=$_GET["class_edit"];
	$first_name=$_GET["name_edit"];
	$roll_no=$_GET["roll_no_edit"];
	}	
$sql="select * from student_fee where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
	    </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update/Edit Student Fee</h4></div>
      <div class="panel-body">
			<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
	
		?>
Name : <?php echo $value["name"];?> , Roll No : <?php echo $value["roll_no"];?> , Class : <?php echo $value["class"];?>			
							
<form action="update_student_fee.php" method="post">
      
	  <input type="hidden" name="name" value="<?php echo $value["name"];?>" class="form-control">

	   <input type="hidden" name="roll_no" value="<?php echo $value["roll_no"];?>" class="form-control">
	   <input type="hidden" name="id" value="<?php echo $value["id"];?>" class="form-control">
	
	  

	 
  <div class="form-group">
	   <input type="hidden" name="present_class" value="<?php echo $value["class"];?>" class="form-control">
	  </div>
 <div class="form-group">
	    <label for="usr">School Fee:</label>
		<input type="number" name="adm_fee" value="<?php echo $value["tot_paid"];?>" class="form-control">
	  </div>
	 
		<div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" value="<?php echo $value["rec_date"];?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="text" name="rec_no" value="<?php echo $value["rec_no"];?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Note (if any):</label>
		<input type="text" name="note" value="<?php echo $value["note"];?>" class="form-control">
	  </div>
	
	<input type="submit" name="student_fee" class="btn btn-success" value="Update Fee">
	</form><br>
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
	
	</div>
	</div>
	
	<div class="col-sm-3"><br>
	</div>
    </div>
    </div>

<?php 

	}
require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>