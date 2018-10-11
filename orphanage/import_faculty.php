<?php 
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");
if(isset($_POST["submit"])){
	if($_FILES['file']['name']){
		$filename = explode(".",$_FILES['file']['name']);
		if($filename[1] == 'csv'){
			$handle = fopen($_FILES['file']['tmp_name'],"r");
			$count = 0;
			while($data = fgetcsv($handle))
			{
				$fac_fname = mysqli_real_escape_string($conn,$data[0]);
				$fac_lname = mysqli_real_escape_string($conn,$data[1]);
				$fac_email = mysqli_real_escape_string($conn,$data[2]);
				$fac_dob = mysqli_real_escape_string($conn,$data[3]);
				$parent_contact = mysqli_real_escape_string($conn,$data[4]);
				$fac_desig = mysqli_real_escape_string($conn,$data[5]);
				$class_teach = mysqli_real_escape_string($conn,$data[6]);
				$fac_dep = mysqli_real_escape_string($conn,$data[7]);
				$fac_prev_org = mysqli_real_escape_string($conn,$data[8]);
				$fac_quali = mysqli_real_escape_string($conn,$data[9]);
				$fac_join = mysqli_real_escape_string($conn,$data[10]);
				$fac_add = mysqli_real_escape_string($conn,$data[11]);
				$fac_sex = mysqli_real_escape_string($conn,$data[12]);
				$staff_pass = mysqli_real_escape_string($conn,$data[13]);
				$academic_year = mysqli_real_escape_string($conn,$data[14]);
				
				
				
				
				$count++;                                      

               if($count>1){ 
				$sql="insert into faculty (fac_fname,fac_lname,fac_email,fac_dob,parent_contact,fac_desig,class_teach,fac_dep,fac_prev_org,fac_quali,fac_join,fac_add,fac_sex,staff_pass,academic_year)values('$fac_fname','$fac_lname','$fac_email','$fac_dob','$parent_contact','$fac_desig','$class_teach','$fac_dep','$fac_prev_org','$fac_quali','$fac_join','$fac_add','$fac_sex','$staff_pass','$academic_year')";
				$conn->query($sql);
				var_dump($sql);
			}
			}
			fclose($handle);
			print "Import done";
			header('Location: teach_staff.php');
		}
	}
}
?>
<div class="container">
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-6"><br><br>
<div class="panel panel-primary">
     <div class="panel-heading"><h4>Import Bulk Staff's (CSV format)</h4></div>
      <div class="panel-body">

<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Import">Upload</button>
</form><br>
<a href="uploads/importfaculty.csv"> <i class="fa fa-download" aria-hidden="true"></i> Download CSV Template</a>
</div>

</div>
</div>
<div class="col-sm-3">
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
