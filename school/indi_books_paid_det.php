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
				$class=$_GET['class'];
				$first_name=$_GET['name'];
				$roll_no=$_GET['roll_no'];
				
				if(isset($_GET['filter'])){
					//$present_class=$_GET['present_class'];
					$from=$_GET['from'];
					$to=$_GET['to'];
				}
					?>	
					 
						<form class="form-inline" action="indi_books_paid_det.php" method="get">
					 
					  <div class="form-group">
						<label for="pwd">From</label>
						<input type="date" class="form-control" name="from" >
					  </div>
					  <div class="form-group">
						<label for="pwd">To</label>
						<input type="date" class="form-control" name="to" >
					  </div>
					  
					  <div class="form-group">
						<input type="hidden" class="form-control" name="name" value="<?php echo $first_name;?>" >
					  </div>
					  
					  <div class="form-group">
						<input type="hidden" class="form-control" name="roll_no" value="<?php echo $roll_no;?>" >
					  </div>
					  
					  <div class="form-group">
						<input type="hidden" class="form-control" name="present_class" value="<?php echo $present_class;?>" >
					  </div>
					 
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  
						
					</form>
					<br>
					  <button class="btn btn-success" onclick="goBack()">Go Back</button>
					</div>
					</div>
					
		
		
		<?php
        $first_name=$_GET['name'];
		$roll_no=$_GET['roll_no'];
		//$present_class=$_GET['present_class'];		
		 if((isset($_GET['from']))&&(!empty($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$first_name=$_GET['name'];
		$roll_no=$_GET['roll_no'];
		//$present_class=$_GET['present_class'];
		
		$sql="select * from student_books_fee where academic_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to') and name='".$first_name."' and roll_no='".$roll_no."'";
       		
		}
		else
		{
			
		$first_name=$_GET['name'];
		$roll_no=$_GET['roll_no'];
		//$present_class=$_GET['present_class'];
		$sql="select * from student_books_fee where academic_year='".$cur_academic_year."' and name='".$first_name."' and roll_no='".$roll_no."'";
        
	    }
		 $result=mysqli_query($conn,$sql);
		 $row_count =1;
		
	if((isset($_GET['from']))&&(!empty($_GET['to'])))
		{
		
		$sql_tot="select sum(adm_fee) as paid_fee_tot from student_books_fee where academic_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to') and name='".$first_name."' and roll_no='".$roll_no."'";
       		
		}
		else
		{
		
		$sql_tot="select sum(adm_fee) as paid_fee_tot from student_books_fee where academic_year='".$cur_academic_year."' and name='".$first_name."' and roll_no='".$roll_no."'";
        
	    }		 
	
		
		$result_tot=mysqli_query($conn,$sql_tot);
		if($row=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	{
		$paid_fee_tot=$row["paid_fee_tot"];
	}
	$class=$_GET['class'];
	
	$sql_fee_tot="select adm_fee  from set_books_fee where academic_year='".$cur_academic_year."' and class='".$class."' order by id desc limit 1";
	//var_dump($sql_fee_tot);
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
				<th></th>
			
				
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
				<td><div class="btn-group">
				<a href="<?php echo 'student_books_fee.php?id='.$row_tot["id"].'&edit=yes&name_edit='.$row_tot["name"].'&roll_no_edit='.$row_tot["roll_no"].'&class_edit='.$row_tot["class"];?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="<?php echo 'delete_books_fee_paid.php?id='.$row_tot["id"];?>">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
