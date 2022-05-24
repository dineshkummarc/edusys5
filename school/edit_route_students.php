<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
require("header.php");	
require("connection.php");	
if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
$sql="select * from route_students where id ='".$id."'  and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
	$id=$row["id"];
	
	}
?>
       <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Stages</h4></div>
      <div class="panel-body">
	  
	  <form action="update_route_students.php" method="post">
	 
	  <div class="form-group">
	    <label for="usr">First Name</label>
		<input type="text"  name="first_name" value="<?php echo $row["first_name"];?>" class="form-control">
	  </div>
	<div class="form-group">
	    <label for="usr">Roll No</label>
		<input type="text"  name="roll_no" value="<?php echo $row["roll_no"];?>" class="form-control">
	  </div>
	<div class="form-group">
	    <label for="usr">Route Name</label>
		<input type="text"  name="route_name" value="<?php echo $row["route_name"];?>" class="form-control">
	  </div>
	<div class="form-group">
	    <label for="usr">Stage Name</label>
		<input type="text"  name="stage_name" value="<?php echo $row["stage_name"];?>" class="form-control">
	  </div>
	<div class="form-group">
	    <label for="usr">Present Class</label>
		<input type="text"  name="present_class" value="<?php echo $row["present_class"];?>" class="form-control">
	  </div>
	<div class="form-group">
	    <label for="usr">Section</label>
		<input type="text"  name="section" value="<?php echo $row["section"];?>" class="form-control">
	  </div>
	
	 <input type="hidden" name="id" value="<?php echo $id;?>"> 
	 <input type="submit" class="btn btn-primary" value="Update Stage"> 
	</form>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		</div>
		
    </div>
    </div>
<?php 
require("footer.php");
}else{
header("Location:login.php");
	}
	



?>