<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");


	require("connection.php");
	if(isset($_GET["id"]))
	{
		
		$id=$_GET["id"];
	
	$sql="select * from administration where id='".$id."' and academic_year='".$cur_academic_year."'";
	$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		
		$memb_since= date('d-m-Y', strtotime( $row['memb_since'] ));
	
	
	?>
				
	
		<div class="container-fluid" >
		<div class="row" >
		<div class="col-sm-2" >
		</div>
		 <div class="col-sm-8" >   <br>
			
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Member Details</h4></div>
      <div class="panel-body">
		
		<center><img width="150" height="150" alt="" class="img img-thumbnail" src="<?php echo $row['adm_photo_path'];?>"></center>
					
<div class="table-responsive">
<table class="table table-bordered">
<tbody>
<tr>

<td>Name</td>

<td><?php echo $row['adm_name'];?></td>

<td>Location</td>

<td><?php echo $row['adm_loc'];?></td>
</tr>
<tr>

<td>Designation</td>

<td><?php echo $row['adm_desig'];?></td>

<td>Mobile</td>

<td><?php echo $row["parent_contact"];?></td>
</tr>
<tr>

<td>Email</td>

<td><?php echo $row['adm_email'];?></td>

<td></td>

<td></td>
</tr>

</tbody>
</table>
</div>
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
					
			
}
else
{
header("Location:login.php");
}
	
			?>