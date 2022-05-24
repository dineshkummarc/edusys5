<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	require("header.php");	
	require("connection.php");	

?>
       <div class="container">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add Expense Name</h4></div>
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
	  
	  <form action="insert_expense_name.php" method="post">
	  
	  
	  <div class="form-group">
	    <label for="usr">Expense Name</label>
		<input type="text"  name="expense_name" value="" class="form-control">
	  </div>
	 
	
	 <input type="submit" class="btn btn-primary" value="Add Expense Name"> 
	</form><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
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