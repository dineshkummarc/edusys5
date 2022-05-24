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
			  <h3>Student Registration Form</h3>
			  
			        <label><span style="color:red;font-size:18px;">*</span>Enter Admission No</label>
					<div class="form-group">
					 <input type="text" name="admission" required placeholder="Admission No" class="form-control" id="usr">
					</div>

					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Student Name:</label>
					  <input type="text" placeholder="Student Name" name="first_name" required class="form-control" id="usr">
					</div>
					
			<div class="form-group">
		 <label for="usr"><span style="color:red;font-size:18px;">*</span>Select Class:</label>
		  <select class="form-control" name="class_join" id="sel1">
			<option value="">By Class</option>
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
			  <option value="first puc">1st PUC</option>
			  <option value="second puc">2nd PUC</option>
		  </select>
		</div>

					<div class="form-group">
					  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Section:</label>
					  <select class="form-control" name="section"  id="sel1">
						<option value="Section A">Section A</option>
						<option value="Section B">Section B</option>
						<option value="Section C">Section C</option>
					 </select>
					</div>
					
					
					<!--
					<div class="form-group">
					  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Select Gender:</label>
					  <select class="form-control" name="sex"  id="sel1">
						<option value="male">Male</option>
						<option value="female">Female</option>
					 </select>
					</div>
                    -->
					
					

				
					<div class="form-group">
						<label>Roll No</label>
					  <input type="text" placeholder="Roll No" name="rollno"  class="form-control">
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


					<?php 
					$date = date_default_timezone_set('Asia/Kolkata');
                     			$today = date("Y/m/d");
					
					?>
					
					<div class="form-group">
					 <input type="hidden" name="join_date" placeholder="Join Date" value="<?php echo $today;?>" class="form-control" id="usr">
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>



<?php
			
}
else
{
header("Location:login.php");
}
?>  
