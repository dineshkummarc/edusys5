<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];


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
				$student_id=$_GET['student_id'];
				//echo $student_id;
				
				if(isset($_GET['filter'])){
					$from=$_GET['from'];
					$to=$_GET['to'];
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
		$student_id=$_GET['student_id'];
		
		$sql="select * from attendance where (att_date BETWEEN '$from' and '$to') and student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
		//var_dump($sql);
       		
		}
		else
		{
		$student_id=$_GET['student_id'];
		$sql="select * from attendance where student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
    }

		$result=mysqli_query($conn,$sql);
		$row_count =1;

	$sql_student="select * from students where id='".$student_id."'";
	$result_student=mysqli_query($conn,$sql_student);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
	$first_name=$row["first_name"];
	$roll_no=$row["roll_no"];

	}
	
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
				
				<th></th>
				
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$att_date= date('d-m-Y', strtotime( $row_tot['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$id = $row_tot["id"];

	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $first_name;?></td>
				<td><?php echo $roll_no;?></td>
				<td><?php echo $att_date;?></td>
				<td><?php echo $row_tot["attendance"];?></td>
				<td><?php echo $row_tot["taken_by"];?></td>
				
                <td><div class="btn-group">
				<a href="<?php echo 'edit_attendance.php?id='.$id; ?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
			

				<a href="#" onclick="deleteAttendance(<?php echo $id;?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
				</tr>
			<script>
		  function deleteAttendance(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_attendance.php?id='+id+'';
			  }
		  }
		  
		  </script>
			
				
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
