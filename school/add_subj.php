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
     <div class="panel-heading"><h4>Add Subjects</h4></div>
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
	  
	  <form action="insert_subjects.php" method="post">
	  
	 <div class="form-group">
	   <label>Select Class</label>
		<select class="form-control" name="class">
		<?php require("selectclass.php");?>
		
		
	  <div class="form-group">
	    <label for="usr">Number of Subjects: (Max. 10)</label>
		<input type="text" id="subject" name="subject" value="" class="form-control">
	  </div>
	  <a id="filldetails" onclick="addFields()">Fill Details</a>
	 <br><br>
    <div id="container">
	</div>
	 <input type="submit" class="btn btn-primary" value="Add Subjects"> 
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