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
$sql="select * from income_name where id = '".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
?>
       <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update/Edit Income Name</h4></div>
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
	  
	  <form action="update_income_name.php" method="post">
	  
	  
	  <div class="form-group">
	    <label for="usr">Income Name</label>
		<input type="text"  name="income_name" value="<?php echo $row['income_name'];?>" class="form-control">
	  </div>
	  
	<div class="form-group">
	    <label for="usr">Added Date</label>
		<input type="date"  name="added_date" value="<?php echo $row['added_date'];?>" class="form-control">
	  </div>
	<input type="hidden" name="id" value="<?php echo $id;?>">
	 <input type="submit" class="btn btn-primary" value="Update Income Name"> 
	</form>
		</div>
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