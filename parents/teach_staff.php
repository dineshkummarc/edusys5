<?php
session_start();

if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))

{
require("header.php");
error_reporting("0");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-12">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		<?php 
		require("connection.php");
		
		  echo '<select name="fac_dep" class="form-control" required>';
			echo '<option value="">Select Department</option>';
			$sql="select * from faculty";
			$result=mysqli_query($conn,$sql);
			foreach($result as $value)
			{
			?>
			<option value='<?php echo $value["fac_dep"];?>'><?php echo $value["fac_dep"];?></option>
			<?php
			}
			
			?>
			</select>
		</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	</form>
	</div>
	</div>
	
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2>All Staffs</h2></center>
     <div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Designation</span></td>
		
		<td><span style="font-weight: bold;">Departments</span></td>
	
		
		<td><span style="font-weight: bold;">Qualification</span></td>
		
		<td><span style="font-weight: bold;">Address</span></td>
		
		<td><span style="font-weight: bold;">Mobile</span></td>
		
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=20;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
	{
	if((isset($_GET["fac_dep"])))
	{
	$fac_dep=$_GET["fac_dep"];
	$sql="select * from faculty where fac_dep='".$fac_dep."' ORDER BY fac_id DESC LIMIT $start_from, $num_rec_per_page";
	}
	
	}
	else
	{
		
	$sql="select * from faculty ORDER BY fac_id DESC LIMIT $start_from, $num_rec_per_page";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
	
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'fac_description.php?fac_id='.$row['fac_id'];?>" ><?php echo $row["fac_fname"];?> <?php echo $row["fac_lname"];?></a></td>
		<td><?php echo $row["fac_desig"];?></td>
		<td><?php echo $row["fac_dep"];?></td>
		<td><?php echo $row["fac_quali"];?></td>
		<td><?php echo $row["fac_add"];?></td>
		<td><?php echo $row["parent_contact"];?></td>
		<td><div class="btn-group"><a href="<?php echo 'fac_description.php?fac_id='.$row['fac_id'];?>" ><button type="button" class="btn btn-success">View</button></a>
      
       </div></td>
		</tr>
		<?php $row_count++; 
		
	}
	
	
	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["fac_dep"])!="")
		{
			$fac_dep=$_GET["fac_dep"];
			$sql="select * from faculty where fac_dep='".$fac_dep."' ORDER BY fac_id DESC LIMIT $start_from, $num_rec_per_page";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$fac_dep." Employees = ".$total_students.'</p>';
		}
		}
	
	else
	{
		
	$sql="select * from faculty";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Employees = ".$total_students.'</p>';
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
