<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
require("header.php");
$sql="select * from ad_members where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$username=$row["username"];
	$log_pas=$row["log_pas"];
	$email=$row["email"];
	$user_access=$row["user_access"];
	$id=$row["id"];
	$academic_year=$row["academic_year"];
	$class_teach=$row["class_teach"];
	
	}
?>

<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Admin</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{
                  echo '<div class="alert alert-success">
                   <strong>Success!</strong> Admin has been added successfully
                  </div>';
					

				}
		if(isset($_GET["failed"]))

				{

					echo '<div class="alert alert-danger">
                   <strong>Sorry!</strong> Something went wrong. try again.or contact your webmaster.
                  </div>';
			
				}
				?>
								
							
<form action="update_ad_members.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Username:</label>
		<input type="text" name="user_name" value="<?php echo $username;?>" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Password:</label>
		<input type="password" name="password" value="<?php echo $log_pas;?>" class="form-control" required>
	  </div>

	  <div class="form-group">
	    <label for="usr">Select User Type</label>
		<select name="user_access" class="form-control" required>
			<option value="<?php echo $user_access;?>"><?php echo $user_access;?></option>
			<option value="staff">Class Teachers</option>
			<option value="admin">Main Admin</option>			
		</select>
	  </div>
	 
	  <div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Academic Year:</label>
	  <select class="form-control" name="academic_year">
		<option value="<?php echo $academic_year;?>"><?php echo $academic_year;?></option>
		<option value="2021-2022">2021-2022</option>		
	 </select>
	</div>
	
		<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="submit" name="admin" class="btn btn-success" value="Update Admin">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>
<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
