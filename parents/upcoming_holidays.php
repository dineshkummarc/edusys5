<?php
session_start();
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))
{
$academic_year=$_SESSION['academic_year'];
require("header.php");
require("connection.php");
?>

        <div id="page-wrapper">
<br>
        <div class="container-fluid">
        <div class="row">
        <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br>
        <div class="col-sm-12">
        <h2>Upcoming Holidays</h2>
        <table class="table table-bordered">
		<tr>
		<th style="width:5%;">SL No</th>
		<th style="width:40%;">Holiday</th>
		<th style="width:10%;">Date</th>
		<th>Details</th>
		</tr>
	<?php
			
	$sql_holi="select * from holiday where ho_date > now() ORDER BY id DESC LIMIT 3";	
	
	$result_holi=mysqli_query($conn,$sql_holi);
	$row_count =1;
	$total_holi=mysqli_num_rows($result_holi);
     $rowcount_ho=mysqli_num_rows($result_holi);
	 if($rowcount_ho>=1)
	 {
	foreach($result_holi as $row_holi)
	{
        $ho_date= date('d-m-Y', strtotime( $row_holi['ho_date'] ));
	 ?>
    <tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row_holi["ho_name"];?> <span class="badge badge-success" style="background-color:orange;"> Upcoming</span></td>
		
		<td><?php echo $ho_date;?></td>
		
		<td><?php echo $row_holi["ho_details"];?></td>
		
		
		</tr>
		
		
		<?php $row_count++; 
		}
		}else{
			echo "<tr><td colspan='4'><p style='color:red;'>There are no Holidays to display</p></td></tr>";
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
