<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2 style="color:red;">Todays Absent Faculties</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Roll No</span></td>
		
		<td><span style="font-weight: bold;">Attendance</span></td>
	
		
		
		
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=75;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	date_default_timezone_set('Asia/Kolkata');
    $today=date('Y-m-d');
    $today_md=date('m-d');
		
	 $sql_stf_abs="select id,first_fname,roll_no,attendance,att_date from fac_attendance where att_date='".$today."' and academic_year='".$cur_academic_year."' and attendance='Absent'";
     $result_stf_abs=mysqli_query($conn,$sql_stf_abs);
	
	$row_count =1;
	//$total_students=mysqli_num_rows($result);

	foreach($result_stf_abs as $row)
	{
		//$dob= date('d-m-Y', strtotime( $row['dob'] ));
		
	
	
	?>
    
		<tr>
		
		
		
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><a href="<?php echo 'fac_description.php?fac_id='.$row['id'];?>" ><?php echo $row["first_fname"];?></a></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["roll_no"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["attendance"];?></span></td>
		
		
		
		
		
		
		
		
		</tr>
		<?php $row_count++; 
		
		?>
	
		
		<?php
	}
	
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
}
else
{
header("Location:login.php");
}
?>  
