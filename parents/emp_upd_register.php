<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{


require("header.php");	
require("connection.php");	


		if(isset($_GET["fac_id"]))
		{
		
		$fac_id=$_GET["fac_id"];
		
		$sql="select * from faculty where fac_id='".$fac_id."'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			
		}
		
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
								
							
<form action="update_faculty.php" method="post" enctype="multipart/form-data">
  
	
	
	
	   <div class="form-group">
	   <label for="usr">First Name:</label>
		<input type="text" name="fac_fname" value="<?php echo $row['fac_fname'];?>" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Last Name:</label>
		<input type="text" name="fac_lname" value="<?php echo $row['fac_lname'];?>" class="form-control" >
	  </div>
	 
	  <input type="hidden" name="fac_id" value="<?php echo $row['fac_id'];?>" class="form-control" required>
	 
	   <div class="form-group">
	    <label for="usr">DOB:</label>
		<input type="date" name="fac_dob" value="<?php echo $row['fac_dob'];?>" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="usr">Mobile:</label>
		<input type="text" name="fac_mob" value="<?php echo $row['parent_contact'];?>" class="form-control" >
	  </div>
	 
		
		 <div class="form-group">
	    <label for="usr">Email:</label>
		<input type="email" name="fac_email" value="<?php echo $row['fac_email'];?>" class="form-control">
		</div>
		
		
	   <div class="form-group">
	    <label for="usr">Faculty Sex:</label>
		<select name="fac_sex" class="form-control" value="<?php echo $row['fac_sex'];?>" required>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
	  </div>
	  <div class="form-group">
	    <label for="usr">Designation:</label>
		<input type="text" name="fac_desig" value="<?php echo $row['fac_desig'];?>" class="form-control" >
	  </div>
	 
	  
	 
	   <div class="form-group">
	    <label for="usr">Department:</label>
		<input type="text" name="fac_dep" value="<?php echo $row['fac_dep'];?>" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="usr">Previous Organization:</label>
		<input type="text" name="fac_prev_org" value="<?php echo $row['fac_prev_org'];?>" class="form-control" >
	  </div>
	
	  
	
	   <div class="form-group">
	    <label for="usr">Qualification:</label>
		<input type="text" name="fac_quali" value="<?php echo $row['fac_quali'];?>" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label for="usr">Joined Date:</label>
		<input type="date" name="fac_join" value="<?php echo $row['fac_join'];?>" class="form-control" >
	  </div>
	
		
		
		<div class="form-group">
	    <label for="usr">Address:</label>
		<textarea rows="6" name="fac_add"  class="form-control" ><?php echo $row['fac_add'];?></textarea>
		</div>
		<div class="form-group">
	    <label for="usr">Upload profile Photo:</label>
		<input type="file" name="fac_photo">
		</div>
		
		<div class="form-group">
	    <label for="usr">Upload Adhaar Card:</label>
			<input type="file" name="fac_adhar">
		</div>
			
		<div class="form-group">
	    <label for="usr">Upload any ID proof:</label>	
		<input type="file" name="fac_id">
		</div>
		
		<input type="submit" name="faculty" class="btn btn-success" value="Register">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
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


	}else{
		header("Location:login.php");
	}
	

?>