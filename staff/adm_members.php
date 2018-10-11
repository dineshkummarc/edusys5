<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
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
		<td></td>
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
		<td><div class="btn-group"><a href="<?php echo 'adm_description.php?fac_id='.$row['id'];?>" ><button type="button" class="btn btn-success">View</button></a>
        <a href="<?php echo 'adm_upd_register.php?id='.$row['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="<?php echo 'del_confirm_adm.php?id='.$row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
else
{
header("Location:login.php");
}
?>  
