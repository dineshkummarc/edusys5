<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year'])){
$academic_year = $_SESSION['academic_year'];
	require("header.php");	
	require("connection.php");	

?>
       <div class="container">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-primary">
     <div class="panel-heading"><h4>Add Category Name</h4></div>
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
	  
	  <form action="insert_entry_name.php" method="post">
	  
	  
	  <div class="form-group">
	  <label>Select Account</label>
	  <select class="form-control account_name" name="account_name" required>
		  
		  <option value="">Select Account</option>
		  <?php
		  require("connection.php");
		  $sql="select id,account_name from account_names order by account_name desc";
		  $result=mysqli_query($conn,$sql);
		  foreach($result as $row){
		  ?>
		  <option value="<?php echo $row["id"]; ?>"><?php echo $row["account_name"]; ?>
		  </option>
		  <?php
		  }
		  ?>

	  </select>
  </div>
	  
	  <div class="form-group">
	    <label for="usr">Category Name</label>
		<input type="text"  name="entry_name" value="" class="form-control" required>
	  </div>
	 
	
	 <input type="submit" class="btn btn-primary" value="Add Category Name"> 
	</form><br>
	<button onclick="goBack()" class="btn btn-default">Go Back</button>
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