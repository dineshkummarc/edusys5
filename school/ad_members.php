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
	    <label for="usr">User Access:</label>
		<select name="user_access" class="form-control" required>
			<option value="admin">Admin</option>
			<option value="library">Library</option>
			<option value="marks">Marks</option>
			<option value="fee_management">Fee Management</option>
			<option value="attendance">Attendance</option>
			<option value="bulk_sms">Bulk SMS</option>
			<option value="orphanage">Orphanage</option>
		</select>
	  </div>
	 
	 <div class="form-group">
	    <label for="usr">Email:</label>
		<input type="email" name="email" class="form-control">
		</div>
		
	 <div class="form-group">
	    <label for="usr">Select Academic Year:</label>
		<select name="academic_year" class="form-control" required>
			<option value="2017-2018">2017-2018</option>
			<option value="2018-2019">2018-2019</option>
			<option value="2019-2020">2019-2020</option>
			<option value="2020-2021">2020-2021</option>
			<option value="2021-2022">2021-2022</option>
			
		</select>
	  </div>
	  
	   <div class="form-group">
	 <label for="usr">Select Class</label>
		<select class="form-control" name="class_teach">
			<option value="">Select Class</option>
			<option value="prekg">PreKG</option>
			<option value="lkg">LKG</option>
			<option value="ukg">UKG</option>
			<option value="first_standard">1st Standard</option>
			<option value="second_standard">2nd Standard</option>
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
