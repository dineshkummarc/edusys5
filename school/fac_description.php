<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");


	require("connection.php");
	if(isset($_GET["fac_id"]))
	{
		
		$fac_id=$_GET["fac_id"];
	
	$sql="select * from faculty where academic_year='".$cur_academic_year."' and fac_id='".$fac_id."'";
	$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$fac_dob= date('d-m-Y', strtotime( $row['fac_dob'] ));
		$fac_join= date('d-m-Y', strtotime( $row['fac_join'] ));
	
	
	?>
				
	
		<div class="container-fluid" >
		<div class="row" >
		<div class="col-sm-2" >
		</div>
		 <div class="col-sm-8" id="income">   <br>
			
		<div class="panel panel-primary">


		<div class="panel-body">
					<h2>Faculty Details</h2>
		
		<center><img width="150" height="150" alt="" class="img img-thumbnail" src="<?php echo $row['fac_photo_path'];?>"></center>
					
<div class="table-responsive">
<table class="table table-bordered">
<tbody>
<tr>

<td>First Name</td>

<td><?php echo $row['fac_fname'];?></td>

<td>Last Name</td>

<td><?php echo $row['fac_lname'];?></td>
</tr>
<tr>

<td>Sex</td>

<td><?php echo $row['fac_sex'];?></td>

<td>DOB</td>

<td><?php echo $fac_dob;?></td>
</tr>
<tr>

<td>Address</td>

<td><?php echo $row['fac_add'];?></td>

<td>Previous Work</td>

<td><?php echo $row['fac_prev_org'];?></td>
</tr>
<tr>

<td>Department</td>

<td><?php echo $row['fac_dep'];?></td>

<td>Designation</td>

<td><?php echo $row['fac_desig'];?></td>
</tr>
<tr>

<td>Qualification</td>

<td><?php echo $row['fac_quali'];?></td>

<td>Joined Date</td>

<td><?php echo $fac_join;?></td>
</tr>
<tr>

<td>Email</td>

<td><?php echo $row['fac_email'];?></td>

<td>Mobile</td>

<td><?php echo $row['parent_contact'];?></td>
</tr>
</tbody>
</table>
</div>

<h2 style="text-align: center; ">Submitted Certificates</h2>

<p style="text-align: center; ">Adhaar Card&nbsp;<a href="<?php echo $row['fac_adhar_path'];?>">Click here</a></p>

<p style="text-align: center; ">ID Card&nbsp;<a href="<?php echo $row['fac_id_path'];?>">Click here</a></p>

<p style="text-align: center; ">
<button class="btn btn-success" onclick="printDiv('income')">Print this page</button>
<a href="teach_staff.php"><button class="btn btn-success">Go Back</button></a>

</div>
</div>
</div>
<div class="col-sm-2" >
</div>
</div>
</div>
  


<?php
}
}
					
require("footer.php");			
}
else
{
header("Location:login.php");
}
	
?>