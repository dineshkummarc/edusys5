<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("header.php");
?>

                               
                                                
  <div class="container-fluid"><br>
   <div class="row">
    <div class="col-sm-4">
        
    </div>
	
	<div class="col-sm-4">
	<div class="panel panel-primary">
      <div class="panel-heading">Confirm Delete</div>
      <div class="panel-body">

	
	<!--///////////////////////////////// Start Single Member ///////////////////////////////////////////-->
	<?php
	require("connection.php");
	if(isset($_GET['fac_id'])){
		
		$fac_id=$_GET['fac_id'];
	}
	
	$sql="select fac_id,fac_fname,fac_email,fac_lname,fac_dep,fac_desig,fac_dob,fac_quali,parent_contact,fac_photo_path from faculty where fac_id='".$fac_id."'";
	
	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		
	?>

	<table class="table table-bordered">
	<tr><center><img width="150" height="auto" src="<?php echo $row['fac_photo_path'];?>"></center>	<br></tr>
	<tr>
	<th>Name</th>
	<td><?php echo $row['fac_fname'];?></td>
	</tr>
	<tr>
	<th>Faculty ID</th>
	<td><?php echo $row['fac_id'];?></td>
	</tr>
	<tr>
	<th>Email</th>
	<td><?php echo $row['fac_email'];?></td>
	</tr>
	<tr>
	<th>Departments</th>
	<td><?php echo $row['fac_dep'];?></td>
	</tr>
	<tr>
	<th>Designation</th>
	<td><?php echo $row['fac_desig'];?>  , <?php echo $row['fac_dob'];?></td>
	</tr>
	<tr>
	<th>Qualification</th>
	<td><?php echo $row['fac_quali'];?> </td>
	</tr>
	
	<tr>
	<th>Mobile</th>
	<td><?php echo $row['parent_contact'];?></td>
	</tr>
	</table>
	
   <div class="inline"><a href="teach_staff.php"><button type="button" class="btn btn-sm btn-success">Cancel</button></a>
                <a href="<?php echo 'del_faculty.php?fac_id='.$fac_id;?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a></div>
	<?php
	}
	?>
	
	
	
    </div>
    </div>
    </div>
	
	<div class="col-sm-4">
        <p><br></p>
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
