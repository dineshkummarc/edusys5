<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add Admin</h4></div>
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
								
							
<form action="insert_ad_members.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Username:</label>
		<input type="text" name="user_name" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Password:</label>
		<input type="password" name="password" class="form-control" required>
	  </div>

	  <div class="form-group">
	    <label for="usr">Select User Type</label>
		<select name="user_access" class="form-control" required>
			<option value="">Select User Type</option>
			<option value="staff">Class Teachers</option>
			<option value="admin">Main Admin</option>			
		</select>
	  </div>
	  
			
	 <div class="form-group">
	    <label for="usr">Select Academic Year:</label>
		<select name="academic_year" class="form-control" required>
			<option value="2020-2021">2020-2021</option>
			<option value="2021-2022">2021-2022</option>			
		</select>
	  </div>
	  
	 

	  
	<input type="submit" name="admin" class="btn btn-success" value="Register">
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
