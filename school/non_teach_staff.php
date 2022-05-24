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
     <div class="panel-heading"><h4>Register Non teaching staff </h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Faculty has been added successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_non_teach_staff.php" method="post" enctype="multipart/form-data">
  
	
	
	
	   <div class="form-group">
	   <label for="usr">First Name:</label>
		<input type="text" name="first_name" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Last Name:</label>
		<input type="text" name="last_name" class="form-control" required>
	  </div>
	 
	  
	 
	   <div class="form-group">
	    <label for="usr">DOB:</label>
		<input type="date" name="dob" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label for="usr">Mobile:</label>
		<input type="text" name="contact" class="form-control" required>
	  </div>
	 
		
		 <div class="form-group">
	    <label for="usr">Email:</label>
		<input type="email" name="email" class="form-control">
		</div>
		
		
	   <div class="form-group">
	    <label for="usr">Sex:</label>
		<select name="sex" class="form-control" required>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
	  </div>
	  <div class="form-group">
	    <label for="usr">Designation:</label>
		<input type="text" name="desig" class="form-control" required>
	  </div>
	 
	
	  <div class="form-group">
	    <label for="usr">Joined Date:</label>
		<input type="date" name="join_date" class="form-control" required>
	  </div>
	
		
		
		<div class="form-group">
	    <label for="usr">Address:</label>
		<textarea rows="6" name="add" class="form-control" required></textarea>
		</div>
		<div class="form-group">
	    <label for="usr">Upload profile Photo:</label>
		<input type="file" name="photo_name">
		</div>
		
		<div class="form-group">
	    <label for="usr">Upload Adhaar Card:</label>
			<input type="file" name="adhar_name">
		</div>
			
		<div class="form-group">
	    <label for="usr">Upload any ID proof:</label>	
		<input type="file" name="id_name">
		</div>
		
		<input type="submit" name="non_teach" class="btn btn-success" value="Register">
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
