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
	<center><h2 style="color:red;">Todays Absent Students</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Roll No</span></td>
		
		<td><span style="font-weight: bold;">Present Class</span></td>
	
		<td><span style="font-weight: bold;">Section</span></td>
		
		
		
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=75;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	date_default_timezone_set('Asia/Kolkata');
    $today=date('Y-m-d');
    $today_md=date('m-d');
		
	$sql="select first_name,roll_no,section,parent_contact,present_class,attendance,att_date from attendance where att_date='".$today."' and academic_year='".$cur_academic_year."' and attendance='Absent'";

	$result=mysqli_query($conn,$sql);
	
	$row_count =1;
	$total_students=mysqli_num_rows($result);

	foreach($result as $row)
	{
		//$dob= date('d-m-Y', strtotime( $row['dob'] ));
		
	
	
	?>
    
		<tr>
		
		
		
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" ><?php echo $row["first_name"];?></a></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["roll_no"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["present_class"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["section"];?></span></td>
		
		
		
		
		
		
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
			
}
else
{
header("Location:login.php");
}
?>  
