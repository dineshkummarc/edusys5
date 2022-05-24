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
			<h2>All Holidays</h2>
			 <table class="table table-bordered">
		<tr>
		<td>SL No</td>
		<td>Holiday</td>
		<td>Details</td>
		<td>Date</td>
		
		</tr>
			<?php
			$today_date = strtotime(date("d-m-Y"));
			
	$sql="select * from holiday  where ho_date>='".$today_date."' ORDER BY id DESC";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
		$ho_date = strtotime($row['ho_date']);
	
	if($ho_date >= $today_date){
		$badge = '<span class="badge badge-success" style="background-color:#28a745;"> Active</span>';
	}else{
		$badge = '<span class="badge badge-danger" style="background-color:#dc3545;"> Completed</span>';
	}
	$updated_date= date('d-m-Y', strtotime( $row['updated_at'] ));	
			
		
	?>
       
		<tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row["ho_name"];?><?php echo "  ".$badge;?><br><small>Updated on: <?php echo $updated_date;?></small></td>
		<td><?php echo $row["ho_details"];?></td>
		<td><?php echo $row["ho_date"];?></td>
		
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
