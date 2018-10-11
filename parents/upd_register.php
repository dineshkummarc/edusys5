<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");
$id=$_GET['id'];


?>
<div class="container-fluid"><br>
<div class="row">
<div class="col-sm-3">
</div>
<?php 
$sql="select * from students where id='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{

?>
 <form action="update_student.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6">
	  
		<div class="panel panel-primary">
		
			  <div class="panel-body">
			  <h3>Edit Student Detials</h3>

					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Student Name:</label>
					  <input type="text" placeholder="Student Name" name="first_name" value="<?php echo $row["first_name"]; ?>"  class="form-control" id="usr">
					</div>
					
					
                     <div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Class Join:</label>
					  <input type="text" placeholder="Class Join" name="class_join" value="<?php echo $row["class_join"]; ?>"  class="form-control" id="usr">
					</div>
                    <!--
					<div class="form-group">
					  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Select Gender:</label>
					  <select class="form-control" name="sex"  id="sel1">
						<option value="<?php echo $row['sex']; ?>"><?php echo $row["sex"]; ?></option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					 </select>
					</div>
                    -->
					
					<div class="form-group">
					  <label for="usr"><span style="color:red;font-size:18px;">*</span>Date of Birth:</label>
					  <input type="date" class="form-control" value="<?php echo $row["dob"]; ?>" name="dob"  id="usr">
					</div>
				

					<div class="form-inline ">
					<p><b>Parents Contact No</b></p>
					<div class="form-group ">
					  <input type="text" placeholder="Contact No" value="<?php echo $row["parent_contact"]; ?>" name="parent_contact"  class="form-control" id="usr">
					</div>
	
					
					<div class="form-group">
					  <label for="usr"><span style="color:red;font-size:18px;">*</span>Father Name:</label>
					  <input type="text" class="form-control" value="<?php echo $row["father_name"]; ?>" name="father_name"  >
					</div>	
					</div><br>	

					
					<div class="form-inline">
					<div class="form-group">
					  <label for="usr">Section:</label>
					  <input type="text" class="form-control" value="<?php echo $row["section"]; ?>" name="section">
					</div>
					
					
					<div class="form-group">
					  <label for="usr">Adhaar No:</label>
					  <input type="text" class="form-control" value="<?php echo $row["adhaar_no"]; ?>" name="adhaar_no">
					</div>
					</div><br>
					
					
					
					<div class="form-group">
					  <label for="usr"><span style="color:red;font-size:18px;">*</span>Address:</label>
					  <textarea rows="4" class="form-control" name="address"><?php echo $row["address"]; ?></textarea>
					</div>		
					
					<div class="form-group">
					  <input type="hidden" class="form-control" value="<?php echo $row["id"]; ?>" name="id">
					</div>			

					<div class="form-group">
					<label>Admission NO</label>
					 <input type="text" name="roll_no" value="<?php echo $row["roll_no"]; ?>"  placeholder="Admission No" class="form-control">
					</div>
					
                    <div class="form-group">
					<label>Blood Group</label>
					 <input type="text" name="blood" value="<?php echo $row["blood"]; ?>"  class="form-control">
					</div>

					<div class="form-group">
					<label>Roll No</label>
					 <input type="text" name="rollno" value="<?php echo $row["rollno"]; ?>"  class="form-control">
					</div>

					
					
			</div>
		</div>
	</div>
	<Input type="submit" class="btn btn-primary" name="upd_register" value="Update" >
	</form>
   
	</div>
    
  </div>
  </form>
  <div class="col-sm-3">
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
}
else
{
header("Location:login.php");
}
?>  

			