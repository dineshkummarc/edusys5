<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
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
	    <label for="usr">User Access:</label>
		<select name="user_access" class="form-control" required>
			<option value="admin">Admin</option>
			<option value="library">Library</option>
			<option value="fee_management">Fee Management</option>
			<option value="attendance">Attendance</option>
			<option value="bulk_sms">Bulk SMS</option>
		</select>
	  </div>
	 
	 <div class="form-group">
	    <label for="usr">Email:</label>
		<input type="email" name="email" class="form-control">
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
			
}
else
{
header("Location:login.php");
}
?>  
