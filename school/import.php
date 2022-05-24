<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
error_reporting("0");
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
			
			$dobdate = date("Y-m-d", strtotime(substr($dob, -4) . "-" . substr($dob, 3, 2) . "-" . substr($dob, 0, 2)));
			
			$sex = mysqli_real_escape_string($conn,$data[10]);
			$address = mysqli_real_escape_string($conn,$data[11]);
			$father_name = mysqli_real_escape_string($conn,$data[12]);
			$mother_name = mysqli_real_escape_string($conn,$data[13]);
			$caste = mysqli_real_escape_string($conn,$data[14]);
			$academic_year = mysqli_real_escape_string($conn,$data[15]);
			
			
			$count++;                                      

		   if($count>1){ 
			$sql="insert into students (first_name,last_name,roll_no,blood,parent_contact,section,admission_no,join_date,present_class,dob,sex,address,father_name,mother_name,caste,academic_year)values('$first_name','$last_name','$roll_no','$blood','$parent_contact','$section','$admission_no','$join_date','$present_class','$dobdate','$sex','$address','$father_name','$mother_name','$caste','$cur_academic_year')";
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
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
