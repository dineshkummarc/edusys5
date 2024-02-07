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
     <div class="panel-heading"><h4>Add Exams</h4></div>
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
	  <form action="insert_exams.php" method="post">
	  
	 <div class="form-group">
	   <label>Select Class</label>
		<select class="form-control" name="class" required>
		<?php require("selectclass.php");?>
		
		 <div class="form-group">
	   <label>Select Academic Year</label>
		<select class="form-control" name="academic_year" required>
		<option value="">Select Academic Year</option>
			<option value="2022-2023">2022-2023</option>
			</select>
			</div>
			
		
		
	  <div class="form-group">
	    <label for="usr">Number of Exams: (Max. 10)</label>
		<input type="text" id="exams" name="exams" value="" class="form-control">
	  </div>
	  <a id="filldetails" onclick="addExams()">Fill Details</a>
	 <br><br>
    <div id="container">
	</div>
	 <input type="submit" class="btn btn-primary" value="Add Exams"> 
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