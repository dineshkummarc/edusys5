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
			
				$count++;  
				
	
			$sql_fee="Select tot_fee from set_fee where academic_year='".$cur_academic_year."' and class='".$class."'";
			  $result_fee=mysqli_query($conn,$sql_fee);
			  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
				{
					$tot_fee=$row_fee["tot_fee"];
				}
				
				$name = mysqli_real_escape_string($conn,$data[0]);
				$parent_name = mysqli_real_escape_string($conn,$data[1]);
				$roll_no = mysqli_real_escape_string($conn,$data[2]);
				$academic_year = mysqli_real_escape_string($conn,$data[3]);
				
				$class = mysqli_real_escape_string($conn,$data[4]);
				$section = mysqli_real_escape_string($conn,$data[5]);
				
				$adm_fee = mysqli_real_escape_string($conn,$data[6]);
				
				$rec_date = mysqli_real_escape_string($conn,$data[7]);
				$rec_no = mysqli_real_escape_string($conn,$data[8]);
				
				$tot_paid = $adm_fee;
  				

            if($count>1){
			$sql="insert into student_fee (name,parent_name,roll_no,academic_year,class,section,adm_fee,tot_paid,rec_date,rec_no,tot_fee) values('$name','$parent_name','$roll_no','$cur_academic_year','$class','$section','$adm_fee','$tot_paid','$rec_date','$rec_no','$tot_fee')";
			
			if ($conn->query($sql) === TRUE) {
			$sql_upd="update students set tot_fee='".$tot_fee."' , tot_paid=tot_paid+'".$adm_fee."' where first_name='".$name."' and roll_no='".$roll_no."'";
			$conn->query($sql_upd);
			
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			}
			}
			fclose($handle);
			print "Import done";
			//header('Location: teach_staff.php');
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
     <div class="panel-heading"><h4>Import Bulk Establishment Fee (CSV format)</h4></div>
      <div class="panel-body">

<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Import">Upload</button>
</form><br>
<a href="uploads/import_est_fee.csv"> <i class="fa fa-download" aria-hidden="true"></i> Download CSV Template</a>
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
