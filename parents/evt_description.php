<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");
?>

        <div id="page-wrapper">
<br>
            <div class="container-fluid">
            <div class="row">
            <div class="col-sm-12">
			 <table class="table table-bordered">
		<tr>
		<td>SL No</td>
		<td>Event Name</td>
		<td>Event Details</td>
		<td>Event Date</td>
		<td>Event Time</td>
		<td>Event Venue</td>
		<td>Event Mobile</td>
		<td></td>
		</tr>
			<?php
			
	$sql="select * from events ORDER BY id DESC";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
		$evt_date = strtotime($row['evt_date']);
		$today_date = strtotime(date("d-m-Y"));
		if($evt_date >= $today_date){
			
		
	?>
       
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'evt_description.php?id='.$row['id'];?>" ><?php echo $row["evt_name"];?></a></td>
		<td><?php echo $row["evt_details"];?></td>
		<td><?php echo $row["evt_date"];?></td>
		<td><?php echo $row["evt_time"];?></td>
		<td><?php echo $row["evt_venue"];?></td>
		<td><?php echo $row["evt_mob"];?></td>
		<td><div class="btn-group"><a href="<?php echo 'evt_description.php?id='.$row['id'];?>" ><button type="button" class="btn btn-success">View</button></a>
        <a href="<?php echo 'evt_upd_register.php?id='.$row['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="<?php echo 'del_confirm_evt.php?id='.$row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
       </div></td>
		</tr>
		
		<?php $row_count++; 
		
	}
	}
			?>
			</table>
			</div>
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
