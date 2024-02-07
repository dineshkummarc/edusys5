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
 <div class="panel-heading"><h4>Faculty Registration</h4></div>
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
								
<form action="insert_faculty.php" method="post" enctype="multipart/form-data">
  
	<div class="form-group">
	   <label for="usr">First Name:</label>
		<input type="text" name="fac_fname" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">DOB:</label>
		<input type="date" name="fac_dob" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Mobile:</label>
		<input type="text" name="parent_contact" class="form-control">
	  </div>
	  
	  
	  
	  <div class="form-group">
	    <label for="usr">Designation:</label>
		<input type="text" name="fac_desig" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	   <label>Class Teacher for : </label>
		<select class="form-control" name="class_teach" id="sel1">
		<?php require("selectclass.php");?>
	  
	  <div class="form-group">
	    <label for="usr">Department:</label>
		<input type="text" name="fac_dep" class="form-control" >
	  </div>
	
	   <div class="form-group">
	    <label for="usr">Qualification:</label>
		<input type="text" name="fac_quali" class="form-control" >
	  </div>
	  
	   <div class="form-group">
	    <label for="usr">Adhaar Card No:</label>
		<input type="text" name="adhaar_no" class="form-control" >
	  </div>
	
	  
       <div class="form-group">
	    <label for="usr">Address:</label>
		<textarea rows="6" name="fac_add" class="form-control" ></textarea>
		</div>
		
		<div class="form-group">
	    <label for="usr">Faculty Sex:</label>
		<select name="fac_sex" class="form-control">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
	  </div>
		
		<div class="form-group">
	    <label for="usr">Staff Type:</label>
		<select name="staff_type" class="form-control">
		<option value="teaching">Teaching Staff</option>
		<option value="non_teaching">Admin(Non Teaching) Staff</option>
		</select>
	  </div>
		
		<div class="form-group">
	    <label for="usr">Upload profile Photo:</label>
		<input type="file" name="photo">
		</div>
		
		<input type="submit" name="faculty" class="btn btn-success" value="Register">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" ></div>
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
