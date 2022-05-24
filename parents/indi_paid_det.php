<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id']) && !empty($_SESSION['academic_year'])) 
{
$student_id=$_SESSION['student_id'];
$cur_academic_year = $_SESSION['academic_year'];
	error_reporting("0");
	require("header.php");
	require("connection.php");
	$class=$_SESSION['parents_class'];
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
					//$present_class=$_GET['present_class'];
					$from=$_GET['from'];
					$to=$_GET['to'];
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
					  
				
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  
						
					</form>
					
					</div>
					</div>
					
		
		
<?php	
		if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		$from=$_GET['from'];
		$to=$_GET['to'];
		$sql="select * from student_fee where (rec_date BETWEEN '$from' and '$to') and student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
    }
		else
		{
		$sql="select * from student_fee where student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
    }
		$result=mysqli_query($conn,$sql);
		$row_count =1;
		
	$sql_set_fee="select adm_fee  from set_fee where class='".$class."' and academic_year='".$cur_academic_year."'";
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
			foreach($result_set_fee as $row_set)
			{
				$set_fee += $row_set["adm_fee"];
			}
?>	
    
		<div class="row">
    <div class="col-sm-12" id="income"><br>
		<table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Amount</th>
				
				
				<?php
				if(isset($_GET['delete']))
				{
				?>
				<th>Delete</th>
				<?php
				}
				?>
				
				</tr>
	<?php
	
	foreach($result as $row)
	{
	$rec_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$total_tot_paid += $row["tot_paid"];
		$balance = $set_fee-$total_tot_paid;
	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $rec_date;?></td>
				<td><?php echo $row["rec_no"];?></td>
				<td>&#8377;<?php echo $row["tot_paid"];?></td>
				
				<?php
				
				if(isset($_GET['delete']))
					{
				?>
                <td><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>
			
				<?php 
					}
				?>
				
				</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr>
	<span style="color:blue;font-size:16px;">Total Fee : Rs &#8377;<?php echo $set_fee;?>  ,<span style="color:green;font-size:16px;">Total Fee Paid : Rs &#8377;<?php echo $total_tot_paid;?></span>, <span style="color:red;font-size:16px;">Balance Fee : Rs &#8377;<?php echo $balance;?></span></span>
	</tr>
				</tbody>
				</table>
			
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
