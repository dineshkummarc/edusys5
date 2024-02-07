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

					 <div class="container-fluid">
					
						
					<div class="row"><br>
					<div class="col-sm-12">
						
                        
					<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
					   <div class="form-group">
					 
					 <select class="form-control" name="route_name">
						<option value="">Select Route</option>
						<?php

						 $sql_name="select distinct route_name from student_van_fee";

						 $result_name=mysqli_query($conn,$sql_name);

						 foreach($result_name as $value)

						 {

					?>
					<option value='<?php echo $value["route_name"];?>'><?php echo $value["route_name"];?></option>
					<?php
					}
					echo '</select>';
					?></div>
					
					 <div class="form-group">
					  <label for="sel1">Select Stage</label>
					   <?php echo '<select class="form-control" name="stage_name">';
						echo '<option value="">------</option>';
						$sql_stage="select distinct stage_name from student_van_fee";
						$result_stage=mysqli_query($conn,$sql_stage);
						 foreach($result_stage as $value_stage)
						{
						?>
						<option value='<?php echo $value_stage["stage_name"];?>'><?php echo $value_stage["stage_name"];?></option>
						<?php
						}
						echo '</select>';
						?>
					</div>
									
					
					 <div class="form-group">
					 <label>From</label>
	                   <input type="date" name="from" class="form-control">
		             </div>
					<div class="form-group">
					 <label>To</label>
	                   <input type="date" name="to" class="form-control">
		             </div>
					
					
					  <input type="submit" class="btn btn-primary" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md" onclick="printDiv('study')">Print</button> 
					   </form>
					   
				<br>
					<form action="export_van_fee.php" method="post" name="export_excel">
					<div class="control-group">
						<div class="controls">
							<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
						</div>
					</div>
					</form>
					</div>
					</div>
					
		
		<?php 
		if(isset($_GET['route_name'])&&(!empty($_GET['from']))&&(!empty($_GET['to']))&&(!empty($_GET['stage_name'])))
		{
			
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			$sql_tot="select * from student_van_fee where academic_year='".$cur_academic_year."' and  route_name='".$route_name."' and (rec_date BETWEEN '$from' and '$to')";
		  
			$sql_set_fee="select van_fee from set_van_fee where academic_year='".$cur_academic_year."' and route_name='".$route_name."' and stage_name='".$stage_name."'";	
			
		}
		else if(!empty($_GET['route_name'])&&(!empty($_GET['stage_name'])))
		{
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			
			$sql_tot="select * from student_van_fee where academic_year='".$cur_academic_year."' and  route_name='".$route_name."' and stage_name='".$stage_name."'";
			//var_dump($sql_tot);

		  $sql_set_fee="select van_fee from set_van_fee where academic_year='".$cur_academic_year."' and route_name='".$route_name."' and stage_name='".$stage_name."'";	
		
		}
	
		$result_tot=mysqli_query($conn,$sql_tot);
		
				
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
		{
			$van_fee=$row_set_fee["van_fee"];
			
		}
	?>
     
		
	<div class="row" id="income"><br>
	<div class="col-sm-12">
	<h3 style="color:red;"><?php echo strtoupper($route_name);?>: Collected School Van Fee Details</h3>
	<table class="table table-bordered table-striped" >
	<tbody>
	<tr>
	<th>SL No</th>
	<th>Name</th>
	<th>Academic Year</th>
	<th>Receipt Date</th>
	<th style="color:green;">Total Fee</th>
	<th style="color:blue;">Fee Paid</th>
	<th style="color:red;">Balance</th>
	</tr>
	<?php
	$row_count = 1;
	foreach($result_tot as $row)
	{

	$total_van_fee += $row["tot_paid"];
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$id=$row["id"];
	$academic_year=$row["academic_year"];
	//$mob=$row["mob"];
  $tot_adm_fee=$row["tot_paid"];
	
	$rec_no=$row["rec_no"];
	$student_id=$row["student_id"];
	

	$sql="select * from students where id='".$student_id."'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		$first_name = $row["first_name"];
		$roll_no = $row["roll_no"];
		}

	$balance=$van_fee-$tot_adm_fee;
	
	?>
	<tr>
	<td><?php echo $row_count;?></td>
	<td style="color:blue;"><a href="<?php echo 'description.php?id='.$student_id;?>"><?php echo $first_name;?></a></td>
	<td><?php echo $cur_academic_year;?></td>
	<td><?php echo $reciept_date;?></td>
	
	<td style="color:green;">&#8377;<?php echo $van_fee;?></td>
	<td style="color:blue;">&#8377;<?php echo $tot_adm_fee;?></td>
	<td style="color:red;">&#8377;<?php echo $balance;?></td>
	</tr>
				
	<?php
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs. &#8377;<?php echo $total_van_fee;?></span></tr>
				</tbody>
				</table></div>
				
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
