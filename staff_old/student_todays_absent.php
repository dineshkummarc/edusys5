<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

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
		
	$sql="select id,student_id from attendance where att_date='".$today."' and academic_year='".$cur_academic_year."' and attendance='Absent'";

	$result=mysqli_query($conn,$sql);
	
	$row_count =1;
	$total_students=mysqli_num_rows($result);

	foreach($result as $row)
	{
		$student_id = $row["student_id"];
		$sql_student="select * from students where id='".$student_id."'";
		$result_student=mysqli_query($conn,$sql_student);
		//var_dump($sql);
		
		if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
		{
		$first_name=$row_student["first_name"];
		$roll_no=$row_student["roll_no"];
	
		}

	?>
    
		<tr>
		
			<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><a href="<?php echo 'description.php?id='.$student_id;?>" ><?php echo $first_name;?></a></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $roll_no;?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row_student["present_class"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row_student["section"];?></span></td>
		
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
