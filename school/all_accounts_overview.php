<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	require("header.php");
	require("connection.php");
	error_reporting("0");
	$from=$_GET["from"];
	$to=$_GET["to"];
	
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

			<div class="container">
			<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
			
  
				<?php
			///////////////////////////////////////////////////////////////////////////////////////////////////////
			$sql_est="select sum(tot_paid) as tot_est_fee from student_fee where academic_year='".$cur_academic_year."'";
			$result_est=mysqli_query($conn,$sql_est);
			if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
			{
				$tot_est_fee=$row_est["tot_est_fee"];
			}
			
			////////////////////////////////////////////////////////////////////////////////
			
			
			/////////////////////////////////////Start of total income ////////////////////////////////////////////
			
			$sql_tot="select sum(amount) as total_amount from income where academic_year='".$cur_academic_year."'";
		   
			//var_dump($sql_amount);
			$result_tot=mysqli_query($conn,$sql_tot);
			if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
			{
			
			$total_income= $row_tot["total_amount"];
			}
			/////////////////////////////////////End of total income ////////////////////////////////////////////





			/////////////////////////////////////Start of total Expense ////////////////////////////////////////////
			
			$sql_exp="select sum(amount) as total_amount from expense where academic_year='".$cur_academic_year."'";
		   
			//var_dump($sql_exp);
			$result_exp=mysqli_query($conn,$sql_exp);
			if($row_exp=mysqli_fetch_array($result_exp,MYSQLI_ASSOC))
			{
			
			$total_expense= $row_exp["total_amount"];
			}
			/////////////////////////////////////End of total Expense ////////////////////////////////////////////
			?>			
					
			<div class="row">
				<div class="col-sm-12"><br>
				<center><h1 style="font-weight:bold;color:red;text-transform: uppercase;text-decoration:underline;">Total Accounts Overview</h1></center>
				
				<br>
				<div class="table-reponsive">
					<table class="table table-bordered">
						<tr style="background:yellow;color:black;font-weight:bold;padding:5px;">
							<th>CATEGORY</th>
							<th>AMOUNTS <?php echo $cur_academic_year;?></th>
						</tr>
						<tr style="background:green;color:white;font-weight:bold;padding:5px;">
							<td>School Fee</td>
							<td><?php echo $tot_est_fee;?></td>
						</tr>
						
						
						<tr style="background:yellow;color:black;font-weight:bold;padding:5px;">
							<td>Total Fee Collected</td>
							<td><?php echo $tot_est_fee+$tot_adm_fee+$tot_cca_fee+$tot_van_fee;?></td>
						</tr>
						
						<tr style="background:green;color:white;font-weight:bold;padding:5px;">
							<td>Total Income</td>
							<td><?php echo $total_income;?></td>
						</tr>
						
						
						<tr style="background:yellow;color:black;font-weight:bold;padding:5px;">
							<td>Total Fee & Income</td>
							<td><?php echo $total_income+$tot_est_fee+$tot_adm_fee+$tot_cca_fee+$tot_van_fee;?></td>
						</tr>
						
						<tr style="background:red;color:white;font-weight:bold;padding:5px;">
							<td>Total Expense</td>
							<td><?php echo $total_expense;?></td>
						</tr>
						
						<tr style="background:blue;color:white;font-weight:bold;padding:5px;">
							<td>Balance</td>
							<td><?php echo ($tot_est_fee+$total_income)-$total_expense;?></td>
						</tr>
						
					</table>				
				</div>
				 <button class="btn btn-success" onclick="goBack()">Go Back</button>
				</div>
			</div>
		
	</div> 
	<div class="col-md-2">
	</div>
	</div> 
	</div> 

	
	
<?php
			
}


else
{
header("Location:login.php");
}
?>  
