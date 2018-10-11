<?php
session_start();

if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))

{
	$cur_academic_year=$_SESSION['academic_year'];
require("header.php");
error_reporting("0");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
 
	
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2>Administrative Members</h2></center>
     <div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Designation</span></td>
		
		<td><span style="font-weight: bold;">Location</span></td>
	
		
		<td><span style="font-weight: bold;">Email</span></td>
		
		<td><span style="font-weight: bold;">Member Since</span></td>
		
		<td><span style="font-weight: bold;">Mobile</span></td>
	
		</tr>
								
	<?php
	require("connection.php");
	
	$sql="select * from administration";
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	
    
	foreach($result as $row)
	{
	
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'adm_description.php?id='.$row['id'];?>" ><?php echo $row["adm_name"];?></a></td>
		<td><?php echo $row["adm_desig"];?></td>
		<td><?php echo $row["adm_loc"];?></td>
		<td><?php echo $row["adm_email"];?></td>
		<td><?php echo $row["memb_since"];?></td>
		<td><?php echo $row["parent_contact"];?></td>
		<td><div class="btn-group"><a href="<?php echo 'adm_description.php?id='.$row['id'];?>" ><button type="button" class="btn btn-success">View</button></a>
       
       </div></td>
		</tr>
		<?php $row_count++; 
		
	}
?>
		
		</table>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
</div>

</div>

<?php
			
}
else
{
header("Location:login.php");
}
?>  
