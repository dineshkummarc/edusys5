<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
require("header.php");	
if(isset($_GET["id"])){
$id=$_GET["id"];
}
$sql="select * from routes where id ='".$id."' and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
	$id=$row["id"];
	
	}
?>     <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Routes</h4></div>
      <div class="panel-body">
	  
	  <form action="update_routes.php" method="post">
	  <div class="form-group">
	    <label for="usr">Route Name</label>
		<input type="text"  name="route_name" value="<?php echo $row["route_name"];?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Contact No</label>
		<input type="text"  name="route_contact" value="<?php echo $row["route_contact"];?>"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="usr">Route Details</label>
		<textarea rows="6" name="route_det" value="<?php echo $row["route_det"];?>" class="form-control"></textarea>
	  </div>
	  

	 <input type="hidden" name="id" value="<?php echo $row["id"];?>"> 
	 <input type="submit" class="btn btn-primary" value="Update"> 
	</form>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		</div>
		
    </div>
    </div>



<?php 



	}else{
		header("Location:login.php");
	}
	



?>