<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];
	error_reporting("0");
	require("header.php");
	require("connection.php");
	?>
	<head>
<script>
function printAttendance(attendance) {
     var printContents = document.getElementById('attendance').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
			<div class="container-fluid">
                <div class="row">
                <div class="col-sm-12 inline"><br>
				<?php
				
				if(isset($_GET['filter'])){
					$from=$_GET['from'];
					$to=$_GET['to'];
				}

				$sql_student="select * from students where id='".$student_id."'";
				$result_student=mysqli_query($conn,$sql_student);
				//var_dump($sql_student);
				
				if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
				{
				$first_name=$row_student["first_name"];
				$roll_no=$row_student["roll_no"];
				$cur_academic_year=$row_student["academic_year"];
			
				}
					?>	
					 
						<form class="form-inline" action="attendance_desc.php" method="get">
					 
					  <div class="form-group">
						<label for="pwd">From</label>
						<input type="date" class="form-control" name="from" >
					  </div>
					  <div class="form-group">
						<label for="pwd">To</label>
						<input type="date" class="form-control" name="to" >
					  </div>
						<input type="hidden" name="student_id" value="<?php echo $student_id;?>">
					 
					 
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printAttendance('attendance')">Print</button> 
					 
					  
						 <a href="<?php echo 'attendance_desc.php?student_id='.$student_id;?>" class="btn btn-primary">View all</a>	
					</form>
				
					<br>
					  <button class="btn btn-default" onclick="goBack()">Go Back</button>
					</div>
					</div>
					
		
		
		<?php		
		if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$sql="select * from attendance where (att_date BETWEEN '$from' and '$to') and student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
		//var_dump($sql);
       		
		}
		else
		{
		$sql="select * from attendance where student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
		//var_dump($sql);
    }

		$result=mysqli_query($conn,$sql);
		$row_count =1;


	
	?>	
        <div class="row">
        <div class="col-sm-12" id="attendance"><br>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Attendance Date</th>
				<th>Attendance</th>
				<th>Taken By</th>
				
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$att_date= date('d-m-Y', strtotime( $row_tot['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$id = $row_tot["id"];
	$attendance = $row_tot["attendance"];


	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $first_name;?></td>
				<td><?php echo $roll_no;?></td>
				<td><?php echo $att_date;?></td>
				<?php if($attendance=="Present"){ ?>
				<td style="background-color:green;color:white;"><?php echo $attendance;?></td>
				<?php } else if($attendance=="Absent"){?>
					<td style="background-color:red;color:white;"><?php echo $attendance;?></td>
			<?php	} ?>
				<td><?php echo $row_tot["taken_by"];?></td>
			
				</tr>
		
			
				
	<?php
				
	$row_count++; 
	}
	
	?>
	</tbody>
	</table></center>
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
