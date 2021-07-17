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
		<option value="2019-2020">2019-2020</option>
		<option value="2020-2021">2020-2021</option>
		<option value="2021-2022">2021-2022</option>		
	 </select>
	</div>

	<div class="form-group">
	 <label for="usr">Select Class</label>
		<select class="form-control" name="class_teach">
			<option value="<?php echo $class_teach;?>"><?php echo $class_teach;?></option>
			<option value="prekg">PreKG</option>
			<option value="lkg">LKG</option>
			<option value="ukg">UKG</option>
			<option value="first standard">1st Standard</option>
			<option value="second standard">2nd Standard</option>
			  <option value="third standard">3rd Standard</option>
			  <option value="fourth standard">4th Standard</option>
			  <option value="fifth standard">5th Standard</option>
			  <option value="sixth standard">6th Standard</option>
			  <option value="seventh standard">7th Standard</option>
			  <option value="eighth standard">8th Standard</option>
			   <option value="ninth standard">9th Standard</option>
			  <option value="tenth standard">10th Standard</option>
			  <option value="first puc arts">1st PUC Arts</option>
			  <option value="first puc commerce">1st PUC Commerce</option>
			  <option value="first puc science">1st PUC Science</option>
			  <option value="second puc arts">2nd PUC Arts</option>
			  <option value="second puc commerce">2nd PUC Commerce</option>
			  <option value="second puc science">2nd PUC Science</option>
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
