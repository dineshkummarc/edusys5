<?php
session_start();

if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))

{
require("header.php");
error_reporting("0");
$today_date= date("d/m/Y");

?>
<div id="page-wrapper">
<div class="container-fluid">
  
  
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2>Upcoming Holidays</h2></center>
	<div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
	    <td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Day</span></td>
		<td><span style="font-weight: bold;">Date</span></td>
	    <td><span style="font-weight: bold;">Name</span></td>
		<td><span style="font-weight: bold;">Details</span></td>
		
		<td></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=20;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	$sql="select * from holiday where ho_date>=now() ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
		/*
		$ho_date = strtotime($row['ho_date']);
		$today_date = strtotime(date("d-m-Y"));
		
		if($ho_date >= $today_date){
		*/	
		
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'ho_description.php?id='.$row['id'];?>" ><?php echo $row["ho_day"];?> </a></td>
		
		<td><?php echo $row["ho_date"];?></td>
		<td><?php echo $row["ho_name"];?></td>
		<td><?php echo $row["ho_details"];?></td>
		
		<td><div class="btn-group"><a href="<?php echo 'ho_description.php?id='.$row['id'];?>" ><button type="button" class="btn btn-success">View</button></a>
        <a href="<?php echo 'ho_upd_register.php?id='.$row['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="<?php echo 'del_confirm_ho.php?id='.$row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
       </div></td>
		</tr>
		<?php $row_count++; 
		
	//}
	}
		
	$sql="select * from holiday";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Holidays = ".$total_events.'</p>';
	
		
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

<?php
			
}
else
{
header("Location:login.php");
}
?>  
