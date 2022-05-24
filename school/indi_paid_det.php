<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	error_reporting("0");
	require("header.php");
	require("connection.php");
	?>
	<head>
<script>
function printStudentFeeIndi(student_fee_indi) {
     var printContents = document.getElementById('student_fee_indi').innerHTML;
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
				if(isset($_GET['student_id'])){
					$student_id=$_GET['student_id'];
				}
				

	$sql_student="select * from students where id='".$student_id."'";
	$result_student=mysqli_query($conn,$sql_student);
	//var_dump($sql);
	
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
	$class=$row_student["present_class"];
	$section=$row_student["section"];
	$first_name=$row_student["first_name"];
	$roll_no=$row_student["roll_no"];
	$present_class=$row_student["present_class"];
	$student_type=$row_student["student_type"];
	$mob=$row_student["parent_contact"];
	}
	?>	
					 
						<form class="form-inline" action="indi_paid_det.php" method="get">
					 
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
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printStudentFeeIndi('student_fee_indi')">Print</button> 
					  
						
					</form>
					<br>
					  <button class="btn btn-success" onclick="goBack()">Go Back</button>
					</div>
					</div>
					
		
		
		<?php
		//$present_class=$_GET['present_class'];		
		if((!empty($_GET['from']))&&!empty($_GET['to']))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		//$present_class=$_GET['present_class'];
		
		$sql="select * from student_fee where academic_year='".$cur_academic_year."' and student_id='".$student_id."' and  (DATE(rec_date) BETWEEN '$from' and '$to')";

		//var_dump($sql);

    $sql_tot="select sum(tot_paid) as paid_fee_tot from student_fee where academic_year='".$cur_academic_year."'  and student_id='".$student_id."' and (DATE(rec_date) BETWEEN '$from' and '$to')";   		
		}
		else
		{

		$sql="select * from student_fee where academic_year='".$cur_academic_year."' and student_id='".$student_id."'";
		$sql_tot="select sum(tot_paid) as paid_fee_tot from student_fee where academic_year='".$cur_academic_year."' and student_id='".$student_id."'";

		//var_dump($sql);
    }

		$result=mysqli_query($conn,$sql);
		$row_count =1;
	
		$result_tot=mysqli_query($conn,$sql_tot);
		if($row=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
		{
			$paid_fee_tot=$row["paid_fee_tot"];
		}
	
	
	$sql_fee_tot="select adm_fee  from set_fee where academic_year='".$cur_academic_year."' and class='".$present_class."' order by id desc limit 1";
	//var_dump($sql_fee_tot);
		$result_fee_tot=mysqli_query($conn,$sql_fee_tot);
		if($row_fee_tot=mysqli_fetch_array($result_fee_tot,MYSQLI_ASSOC))
	{
		$paid_fee_total=$row_fee_tot["adm_fee"];
	}
	$balance=$paid_fee_total-$paid_fee_tot;
		
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="student_fee_indi"><br>
				<h3>Student Name: <?php echo $first_name;?>, Roll No: <?php echo $roll_no;?></h3>
		<p style="color:blue;font-size:16px;">Total Fee : Rs &#8377;<?php echo $paid_fee_total;?>  ,<span style="color:green;font-size:16px;">Total Fee Paid : Rs &#8377;<?php echo $paid_fee_tot;?></span>, <span style="color:red;font-size:16px;">Balance Fee : Rs &#8377;<?php echo $balance;?></span></p>
		
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Amount</th>
				<th></th>
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$rec_date= date('d-m-Y', strtotime( $row_tot['rec_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	

	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $rec_date;?></td>
				<td><?php echo $row_tot["rec_no"];?></td>
				<td>&#8377;<?php echo $row_tot["tot_paid"];?></td>
				<td><div class="btn-group">
				<a href="<?php echo 'edit_student_fee.php?id='.$row_tot["id"].'&edit=yes&name_edit='.$row_tot["name"].'&roll_no_edit='.$row_tot["roll_no"].'&class_edit='.$row_tot["class"];?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="<?php echo 'delete_fee_paid.php?id='.$row_tot["id"];?>">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
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
