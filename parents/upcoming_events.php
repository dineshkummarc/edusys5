<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];
require("header.php");
require("connection.php");
?>

        <div id="page-wrapper">
<br>
            <div class="container-fluid">
            <div class="row">
            <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br>
            <div class="col-sm-12">
			<h2>All Events</h2>
			 <table class="table table-bordered">
		<tr>
		<td>SL No</td>
		<td>Event Name</td>
		<td>Event Details</td>
		<td>Event Date</td>
		<td>Event Time</td>
		<td>Event Venue</td>
		<td>Event Mobile</td>
		
		</tr>
			<?php
			$today_date = strtotime(date("d-m-Y"));
			
	$sql="select * from events  where evt_date>='".$today_date."' ORDER BY id DESC";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
		$evt_date = strtotime($row['evt_date']);
	
	if($evt_date >= $today_date){
		$badge = '<span class="badge badge-success" style="background-color:#28a745;"> Active</span>';
	}else{
		$badge = '<span class="badge badge-danger" style="background-color:#dc3545;"> Completed</span>';
	}
		
			
		
	?>
       
		<tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row["evt_name"];?><?php echo "  ".$badge;?></td>
		<td><?php echo $row["evt_details"];?></td>
		<td><?php echo $row["evt_date"];?></td>
		<td><?php echo $row["evt_time"];?></td>
		<td><?php echo $row["evt_venue"];?></td>
		<td><?php echo $row["evt_mob"];?></td>
		
		</tr>
		
		<?php $row_count++; 
	
	}
			?>
			</table>
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
