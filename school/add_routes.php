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
     <div class="panel-heading"><h4>Add Routes</h4></div>
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
	  
	  <form action="insert_routes.php" method="post">
	  <div class="form-group">
	    <label for="usr">Route Name</label>
		<input type="text"  name="route_name" value="" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Contact No</label>
		<input type="text"  name="route_contact" value="" class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="usr">Route Details</label>
		<textarea rows="6" name="route_det" class="form-control"></textarea>
	  </div>
	  

	 <input type="submit" class="btn btn-primary" value="Add Routes"> 
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