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
		
		  echo '<select name="cat" class="form-control" required>';
			echo '<option value="">Select Category</option>';
			$sql="select distinct cat from inventory";
			$result=mysqli_query($conn,$sql);
			foreach($result as $value)
			{
			?>
			<option value='<?php echo $value["cat"];?>'><?php echo $value["cat"];?></option>
			<?php
			}
			
			?>
			</select>
		</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	</form>
	
	</div>
	
	<div class="col-sm-6">
	
	<form action="export_inventory.php" method="post" name="export_excel">
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
	<center><h2>All Inventory List</h2></center>
     <div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
		
		
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Item Name</span></td>
		
		<td><span style="font-weight: bold;">Category</span></td>
		
		<td><span style="font-weight: bold;">Available Quantity</span></td>
	
		
		<td><span style="font-weight: bold;">Store Location </span></td>
		
		<td><span style="font-weight: bold;">Item Condition</span></td>
		
		<td><span style="font-weight: bold;">Added Date</span></td>
		<td><span style="font-weight: bold;">Added By</span></td>
		<td><span style="font-weight: bold;">Last Updated on</span></td>
		<td></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=100;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
	{
	if((isset($_GET["cat"])))
	{
	$cat=$_GET["cat"];
	$sql="select * from inventory where cat='".$cat."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
	}
	
	}
	else
	{
		
	$sql="select * from inventory  ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_inventory=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
	$added_date= date('d-m-Y', strtotime( $row['added_date'] ));
	$last_updated= date('d-m-Y', strtotime( $row['last_updated'] ));
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'inv_description.php?id='.$row['id'];?>" ><?php echo $row["item_name"];?></a></td>
		<td><?php echo $row["cat"];?></td>
		<td><?php echo $row["avl_quantity"];?></td>
		<td><?php echo $row["ware_stock_loc"];?></td>
		<td><?php echo $row["item_condition"];?></td>
		<td><?php echo $added_date;?></td>
		<td><?php echo $row["added_by"];?></td>
		<td><?php echo $last_updated;?></td>
		<td><div class="btn-group"><a href="<?php echo 'inv_description.php?id='.$row['id'];?>" title="View"> <i class="fa fa-eye fa-lg" style="color:#8ba83e;" aria-hidden="true"></i></a>
        <a href="<?php echo 'edit_inventory.php?id='.$row['id']; ?>" title="Edit"> <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="#" title="Delete" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
				</tr>
				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_inventory.php?id='+id+'';
					  }
				  }
				  
				  </script>
		<?php $row_count++; 
		
	}
	
	
	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["cat"])!="")
		{
			$cat=$_GET["cat"];
			$sql="select * from inventory where cat='".$cat."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
		$result=mysqli_query($conn,$sql);
		$total_inventory=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$cat." items = ".$total_inventory.'</p>';
		}
		}
	
	else
	{
		
	$sql="select * from inventory";
	$result=mysqli_query($conn,$sql);
	
	$total_inventory=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Items = ".$total_inventory.'</p>';
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
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
