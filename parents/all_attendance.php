<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];
$cur_academic_year = $_SESSION['academic_year'];
$present_class = $_SESSION['parents_class'];
error_reporting("0");
require("header.php");
require("connection.php");
?>
<head>
<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
			<div class="container-fluid">
                <div class="row">
                <div class="col-sm-12"><br>
				<?php
				if(isset($_GET['filter'])){
					$from=$_GET['from'];
					$to=$_GET['to'];
					?>	
					 
						<form class="form-inline" action="all_attendance.php" method="get">
					  
					  <div class="form-group">
						<label for="pwd">From</label>
						<input type="date" class="form-control" name="from" id="pwd">
					  </div>
					  <div class="form-group">
						<label for="pwd">To</label>
						<input type="date" class="form-control" name="to" id="pwd">
					  </div>
					 
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  
						
					</form>
					<br>
				
					</div>
					</div>
					
		
		
	<?php

$sql="select * from students where id='".$student_id."'";
$result=mysqli_query($conn,$sql);
//var_dump($sql);

if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$first_name=$row["first_name"];
$roll_no=$row["roll_no"];
$section=$row["section"];
}

	if(isset($_GET["from"])&&!empty($_GET["to"]))
		{
			$from=$_GET['from'];
			$to=$_GET['to'];
			
			$sql_tot="select att_date,student_id,sum(att_count) as tot_att_count,present_class from attendance where academic_year='".$cur_academic_year."' and  (att_date BETWEEN '$from' and '$to') group by student_id";
			
			$sql_tot_att="select distinct att_date from attendance where academic_year='".$cur_academic_year."' and present_class='".$present_class."' and section='".$section."' and (att_date BETWEEN '$from' and '$to') group by roll_no order by total_class desc";
			
		}
	 else
		{
			$sql_tot="select att_date,student_id,present_class,section,sum(att_count) as tot_att_count,present_class from attendance where academic_year='".$cur_academic_year."' group by student_id";
			//var_dump($sql_tot);
			
			$sql_tot_att="select distinct att_date from attendance where academic_year='".$cur_academic_year."' and present_class='".$present_class."'";
		}
	 
		$result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$student_id=$row_tot["student_id"];
			
			$present_class=$row_tot["present_class"];
		}

		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			//$tot_class=$row_att_tot["total_class"];
			$tot_class=mysqli_num_rows($result_att_tot);
		}
		
		$row_count =1;
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class Attended</th>
				<th>Total Class</th>
				<th>Percentage (%)</th>
			
				
				</tr>
	<?php
	
	foreach($result_tot as $row_tot)
	{
	$att_date= date('d-m-Y', strtotime( $row['att_date'] ));
	$per_tot_class=($row_tot["tot_att_count"]/$tot_class)*100;

	
	
	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><a href="<?php echo 'attendance_desc.php?student_id='.$student_id;?>"><?php echo $first_name;?></a></td>
				<td><?php echo $roll_no;?></td>
				<td><?php echo $row_tot["tot_att_count"];?></td>
				<td><?php echo $tot_class;?></td>
				<td><?php echo $per_tot_class;?></td>
				
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
	}
require("footer.php");	
}
else
{
header("Location:login.php");
}
?>			
