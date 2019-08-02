<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
?>

<div class="container">
 
	 <div class="row">
    <div class="col-md-6"><br><br>

	<a href="" onclick="printDiv('student_details')" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
	<form action="export.php" method="post" name="export_excel">
               <br>
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
				</div>
			</div>
	</form>
	</div>


	<div class="row" id="student_details">
	
    <div class="col-sm-12">
	
	<center><h2>All Students</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
	<tbody>
	<tr>
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Photo</span></td>
		<td><span style="font-weight: bold;">Student Name <br> Father Name</span></td>
		<td><span style="font-weight: bold;">Admission No</span></td>
		<td><span style="font-weight: bold;">DOB</span></td>
		<td><span style="font-weight: bold;">Mobile</span></td>
		<td><span style="font-weight: bold;">Address</span></td>
	</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=500;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	$sql="select * from students where academic_year='".$cur_academic_year."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);

	foreach($result as $row)
	{
	$dob= date('d-m-Y', strtotime( $row['dob'] ));
	?>
    <tr>
		<td><?php echo $row_count;?></td>
		
		<td>
		<?php if(($row["photo_path"])!="photo/"){?>
		<img class="img-responsive img-thumbnail" src="<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?>
		</td>
		<td>Name: <?php echo $row["first_name"];?><br>
		Father Name: <?php echo $row["father_name"];?>
		</td>
		<td>STS No: <?php echo $row["roll_no"];?><br>
		Admission No: <?php echo $row["admission_no"];?></td>
		<td><?php echo $dob;?></td>
		<td><?php echo $row["parent_contact"];?></td>
		<td><?php if($row['address']!=""){echo $row["address"];}else{ echo $row["village"]." ".$row["district"];}?></span></td>
		
	</tr>
	
	<?php 
		$row_count++; 
	}
	
		$sql="select * from students where academic_year='".$cur_academic_year."'";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>All Students = ".$total_students.'</p>';
	
	?>
	</table></center>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
</div>

</div>




<?php
require("footer.php");
?>
<script>
function printDiv(student_details) {
     var printContents = document.getElementById('student_details').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php		
}
else
{
header("Location:login.php");
}
?>  
