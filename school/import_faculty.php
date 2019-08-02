<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
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
			$fac_dob = mysqli_real_escape_string($conn,$data[1]);
			$parent_contact = mysqli_real_escape_string($conn,$data[2]);
			$fac_desig = mysqli_real_escape_string($conn,$data[3]);
			$class_teach = mysqli_real_escape_string($conn,$data[4]);
			$fac_dep = mysqli_real_escape_string($conn,$data[5]);
			$fac_quali = mysqli_real_escape_string($conn,$data[6]);
			$adhaar_no = mysqli_real_escape_string($conn,$data[7]);
			$fac_add = mysqli_real_escape_string($conn,$data[8]);
			$fac_sex = mysqli_real_escape_string($conn,$data[9]);
			$staff_type = mysqli_real_escape_string($conn,$data[10]);
			
			$count++;                                      

		   if($count>1){ 
			$sql="insert into faculty (fac_fname,fac_dob,parent_contact,fac_desig,class_teach,fac_dep,fac_quali,adhaar_no,fac_add,fac_sex,staff_type)values('$fac_fname','$fac_dob','$parent_contact','$fac_desig','$class_teach','$fac_dep','$fac_quali','$adhaar_no','$fac_add','$fac_sex','$staff_type')";
			$conn->query($sql);
			}
			}
			fclose($handle);
			print "Import done";
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
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
