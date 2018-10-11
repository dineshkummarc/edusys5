<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row">
<div class="col-sm-3">
	
    </div>
 <form action="insert_student.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6">
	  
		<div class="panel panel-primary">
		
			  <div class="panel-body">
			  <h3>Orphan Registration Form</h3>
			  
			        
					<div class="form-group">
					<label><span style="color:red;font-size:18px;">*</span>Enter Admission No</label>
					 <input type="text" name="admission" required placeholder="Admission No" class="form-control" id="usr">
					</div>

					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Student Name:</label>
					  <input type="text" placeholder="Student Name" name="first_name" required class="form-control" id="usr">
					</div>
					
			<div class="form-group">
		 <label for="usr"><span style="color:red;font-size:18px;">*</span>Select Class:</label>
		  <select class="form-control" name="class_join" id="sel1">
		<?php require("selectclass.php");?>
		

					<div class="form-group">
					  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Section:</label>
					  <select class="form-control" name="section"  id="sel1">
						<option value="">Select Section</option>
						<option value="Section A">Section A</option>
						<option value="Section B">Section B</option>
						<option value="Section C">Section C</option>
					 </select>
					</div>
					
					<div class="form-group">
					  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Select Gender:</label>
					  <select class="form-control" name="sex"  id="sel1">
						<option value="male">Male</option>
						<option value="female">Female</option>
					 </select>
					</div>
                   
					<div class="form-group">
					  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Academic Year:</label>
					  <select class="form-control" name="academic_year"  id="sel1">
						<option value="2016-2017">2016-2017</option>
						<option value="2017-2018">2017-2018</option>
						<option value="2018-2019">2018-2019</option>
						<option value="2019-2020">2019-2020</option>
						<option value="2020-2021">2020-2021</option>
						
					 </select>
					</div>
                   
					

				
					<div class="form-group">
						<label>Enrollment No</label>
					  <input type="text" placeholder="Enrollment No" name="rollno"  class="form-control">
					</div>
					
					<div class="form-group">
						<label>Caste</label>
					  <input type="text" placeholder="Caste" name="caste"  class="form-control">
					</div>
					
					<div class="form-group">
					  <label for="usr"><span style="color:red;font-size:18px;">*</span>Date of Birth:</label>
					  <input type="date" class="form-control" name="dob" required id="usr">
					</div>
					
					<div class="form-group">
						<label>Blood Group</label>
					  <input type="text" placeholder="Blood group" name="blood"  class="form-control">
					</div>
					
					<div class="form-group">
					 <label>Father Name</label>
					  <input type="text" class="form-control" placeholder="Father Name" name="father_name"  id="usr">
					</div>	
					
					<div class="form-group">
					 <label>Mother Name</label>
					  <input type="text" class="form-control" placeholder="Mother Name" name="mother_name"  id="usr">
					</div>	
					
					<div class="form-group">
					  <label for="usr"><span style="color:red;font-size:18px;">*</span>Address:</label>
					  <textarea rows="4" class="form-control" name="address"></textarea>
					</div>
					
					<div class="form-group">
						<label><span style="color:red;font-size:18px;">*</span>Mobile</label>
					  <input type="text" placeholder="Contact No" name="parent_contact"  class="form-control" id="usr">
					</div>
	
				    <div class="form-group">
						<label>Adhaar No</label>
					  <input type="text" placeholder="Adhaar No" name="adhaar_no"  class="form-control" id="usr">
					</div>
	
					<div class="form-group">
						<label for="usr">Upload Photo:</label>
						<input type="file" value="Photo" name="photo">
					</div>


					
					<div class="form-group">
					 <input type="date" name="join_date" placeholder="Join Date"  class="form-control" id="usr">
					</div>
					
					
					 
					
	<Input type="submit" class="btn btn-primary" name="register" value="Register" >
	  </form>
			</div>
		</div>
	</div>
    <div class="col-sm-3">
	
    </div>
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
