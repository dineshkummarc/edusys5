<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql="select * from subjects where id='".$id."' and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$subject_name=$row["subject_name"];
	$class=$row["class"];
	$id=$row["id"];
	
	
	}

?>

<div class="container-fluid">

<div class="row">
	<form action="update_subjects.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6 col-sm-offset-3">
	  
		<div class="panel panel-primary">
		
			  <div class="panel-body">
			  <h3>Update Subjects</h3>
			  
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Subject Name:</label>
					  <input type="text"  name="subject_name" value="<?php echo $row["subject_name"];?>" class="form-control">
					  
					</div>
					
					
					<div class="form-group">
				  
					<select class="form-control" name="class">
					<option value="<?php echo $row["class"];?>"><?php echo $row["class"];?></option>
					<?php require("selectclass.php");?>
					 <input type="hidden"  name="id" value="<?php echo $row["id"];?>">
					
					 <input type="submit"  class="btn btn-primary" value="Update"> <button class="btn btn-success" onclick="goBack()">Go Back</button>
</div>
</form>
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