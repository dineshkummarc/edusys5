<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year'])){
$academic_year = $_SESSION['academic_year'];

	require("header.php");	
	require("connection.php");	
	if(isset($_GET["id"])){
		$id=$_GET["id"];
	}
$sql="select * from entry_name where id = '".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
		$account_name_id = $row["account_name_id"];
		$sql_account_name = "select account_name from account_names where id='".$account_name_id."'";
		$result_account_name = mysqli_query($conn,$sql_account_name);
		if($row_account_name=mysqli_fetch_array($result_account_name,MYSQLI_ASSOC))
		{
		  $account_name = $row_account_name["account_name"];
		}
		
		
?>
       <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update/Edit Category Name</h4></div>
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
	  
	  <form action="update_entry_name.php" method="post">
	  
	   <div class="form-group">
	  <label>Select Account</label>
	  <select class="form-control account_name" name="account_name">
		  <option value="<?php echo $account_name_id;?>"><?php echo $account_name;?></option>
		  <?php
		  $sql="select id,account_name from account_names order by account_name desc";
		  $result=mysqli_query($conn,$sql);
		  foreach($result as $account_row){
		  ?>
		  <option value="<?php echo $account_row["id"]; ?>"><?php echo $account_row["account_name"]; ?>
		  </option>
		  <?php
		  }
		  ?>

	  </select>
  </div>
	  
	  
	  <div class="form-group">
	    <label for="usr">Category Name</label>
		<input type="text"  name="entry_name" value="<?php echo $row['entry_name'];?>" class="form-control">
	  </div>
	  
	
	<input type="hidden" name="id" value="<?php echo $id;?>">
	 <input type="submit" class="btn btn-primary" value="Update Category Name"> 
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