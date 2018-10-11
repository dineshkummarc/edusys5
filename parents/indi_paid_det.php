<?php
session_start();

if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))

{
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
				$class=$_GET['parents_class'];
				$parents_uname=$_SESSION['parents_uname'];
				$parents_pass=$_SESSION['parents_pass'];
				
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
					  
					  <div class="form-group">
						<input type="hidden" class="form-control" name="name" value="<?php echo $parents_uname;?>" >
					  </div>
					  
					  <div class="form-group">
						<input type="hidden" class="form-control" name="roll_no" value="<?php echo $parents_pass;?>" >
					  </div>
					  
					  <div class="form-group">
						<input type="hidden" class="form-control" name="present_class" value="<?php echo $class;?>" >
					  </div>
					 
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  
						
					</form>
					
					</div>
					</div>
					
		
		
		<?php
       $parents_uname=$_SESSION['parents_uname'];
		$parents_pass=$_SESSION['parents_pass'];
		//$present_class=$_GET['present_class'];		
		 if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$parents_uname=$_SESSION['parents_uname'];
		$parents_pass=$_SESSION['parents_pass'];
		//$present_class=$_GET['present_class'];
		
		$sql="select * from student_fee where (rec_date BETWEEN '$from' and '$to') and name='".$parents_uname."' and roll_no='".$parents_pass."'";
       		
		}
		else
		{
			
		$parents_uname=$_SESSION['parents_uname'];
		$parents_pass=$_SESSION['parents_pass'];
		//$present_class=$_GET['present_class'];
		$sql="select * from student_fee where name='".$parents_uname."' and roll_no='".$parents_pass."'";
        
	    }
		 $result=mysqli_query($conn,$sql);
		 $row_count =1;
		
	if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$sql_tot="select sum(adm_fee) as paid_fee_tot from student_fee where (rec_date BETWEEN '$from' and '$to') and name='".$parents_uname."' and roll_no='".$parents_pass."'";
       		
		}
		else
		{
		
		$sql_tot="select sum(adm_fee) as paid_fee_tot from student_fee where name='".$parents_uname."' and roll_no='".$parents_pass."'";
        
	    }		 
	
		
		$result_tot=mysqli_query($conn,$sql_tot);
		if($row=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	{
		$paid_fee_tot=$row["paid_fee_tot"];
	}
	$class=$_SESSION['parents_class'];
	
	$sql_fee_tot="select adm_fee  from set_fee where class='".$class."'";
	
		$result_fee_tot=mysqli_query($conn,$sql_fee_tot);
		if($row_fee_tot=mysqli_fetch_array($result_fee_tot,MYSQLI_ASSOC))
	{
		$paid_fee_total=$row_fee_tot["adm_fee"];
	}
	$balance=$paid_fee_total-$paid_fee_tot;
		
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
		<p style="color:blue;font-size:16px;">Total Fee : Rs <?php echo $paid_fee_total;?>  ,<span style="color:green;font-size:16px;">Total Fee Paid : Rs <?php echo $paid_fee_tot;?></span>, <span style="color:red;font-size:16px;">Balance Fee : Rs <?php echo $balance;?></span></p>
		
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
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
	
	foreach($result as $row_tot)
	{
	$rec_date= date('d-m-Y', strtotime( $row_tot['rec_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	

	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $row_tot["name"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $rec_date;?></td>
				<td style="text-align:center;"><?php echo $row_tot["rec_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["adm_fee"];?></td>
				
				<?php
				
				if(isset($_GET['delete']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>
			
				<?php 
					}
				?>
				
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
