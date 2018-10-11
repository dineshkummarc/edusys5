<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-6">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		<?php 
		require("connection.php");
		
		  echo '<select name="fac_dep" class="form-control" required>';
			echo '<option value="">Select Department</option>';
			$sql="select distinct fac_dep from faculty";
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
	<div class="col-sm-6">
	
	<form action="export_staff.php" method="post" name="export_excel">
	<div class="control-group">
		<div class="controls">
			<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
		</div>
	</div>
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
		<td></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=100;
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
		
	$sql="select * from faculty  ORDER BY fac_id DESC LIMIT $start_from, $num_rec_per_page";	
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
		<td><div class="btn-group"><a href="<?php echo 'fac_description.php?fac_id='.$row['fac_id'];?>" > <i class="fa fa-eye fa-lg" style="color:#8ba83e;" aria-hidden="true"></i></a>
        <a href="<?php echo 'emp_upd_register.php?fac_id='.$row['fac_id']; ?>"> <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'del_confirm_fac.php?fac_id='.$row['fac_id']; ?>"> <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
 
<?php
			
}
else
{
header("Location:login.php");
}
?>  
