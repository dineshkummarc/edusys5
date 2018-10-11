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
				$first_name = mysqli_real_escape_string($conn,$data[0]);
				$last_name = mysqli_real_escape_string($conn,$data[1]);
				$roll_no = mysqli_real_escape_string($conn,$data[2]);
				$blood = mysqli_real_escape_string($conn,$data[3]);
				$parent_contact = mysqli_real_escape_string($conn,$data[4]);
				$section = mysqli_real_escape_string($conn,$data[5]);
				$admission_no = mysqli_real_escape_string($conn,$data[6]);
				$join_date = mysqli_real_escape_string($conn,$data[7]);
				$present_class = mysqli_real_escape_string($conn,$data[8]);
				$dob = mysqli_real_escape_string($conn,$data[9]);
				$sex = mysqli_real_escape_string($conn,$data[10]);
				$village = mysqli_real_escape_string($conn,$data[11]);
				$city = mysqli_real_escape_string($conn,$data[12]);
				$taluk = mysqli_real_escape_string($conn,$data[13]);
				$district = mysqli_real_escape_string($conn,$data[14]);
				$father_name = mysqli_real_escape_string($conn,$data[15]);
				$mother_name = mysqli_real_escape_string($conn,$data[16]);
				$academic_year = mysqli_real_escape_string($conn,$data[17]);
				$address = mysqli_real_escape_string($conn,$data[18]);
				$caste = mysqli_real_escape_string($conn,$data[19]);
				$caste_cat = mysqli_real_escape_string($conn,$data[20]);
				$phys_chal = mysqli_real_escape_string($conn,$data[21]);
				
				
				
				$count++;                                      

               if($count>1){ 
				$sql="insert into students (first_name,last_name,roll_no,blood,parent_contact,section,admission_no,join_date,present_class,dob,sex,village,town,taluk,district,father_name,mother_name,academic_year,caste,caste_cat,phys_chal,address)values('$first_name','$last_name','$roll_no','$blood','$parent_contact','$section','$admission_no','$join_date','$present_class','$dob','$sex','$village','$city','$taluk','$district','$father_name','$mother_name','$academic_year','$caste','$caste_cat','$phys_chal','$address')";
				$conn->query($sql);
				//var_dump($sql);
			}
			}
			fclose($handle);
			print "Import done";
			header('Location: all_students.php');
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
     <div class="panel-heading"><h4>Import Bulk Students (CSV format)</h4></div>
      <div class="panel-body">

<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Import">Upload</button>
</form>
<br>
<a href="uploads/importstudents.csv"> <i class="fa fa-download" aria-hidden="true"></i> Download CSV Template</a>
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
