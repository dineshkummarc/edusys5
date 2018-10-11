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
	<center><h2>Non Teaching Staff</h2></center>
     <div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Designation</span></td>
		
	
		
		<td><span style="font-weight: bold;">Address</span></td>
		
		<td><span style="font-weight: bold;">Mobile</span></td>
	
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=20;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	$sql="select * from non_teach ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";	

	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
	
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'non_description.php?id='.$row['id'];?>" ><?php echo $row["first_name"]." ";?><?php echo $row["last_name"];?></a></td>
		<td><?php echo $row["desig"];?></td>
		
		<td><?php echo $row["address"];?></td>
		<td><?php echo $row["contact"];?></td>
		<!--
		<td><div class="btn-group"><a href="<?php echo 'non_description.php?id='.$row['id'];?>" ><button type="button" class="btn btn-success">View</button></a>
        <a href="<?php echo 'upd_non_teach.php?id='.$row['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="<?php echo 'del_non_teach.php?id='.$row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
       </div></td>
	   -->
	   
	   
		</tr>
		<?php $row_count++; 
		
	}
	

		
	$sql="select * from non_teach";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Employees = ".$total_students.'</p>';
		
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
