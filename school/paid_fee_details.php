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
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
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
                        <div class="col-sm-12">
						
					<form action="export_fee.php" class="form-inline" method="post" name="export_excel">
              
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
				</div>
				
			</div>
			
		</form>
					</div>
					</div>
					
				
	<?php
		$num_rec_per_page=100;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
	
		$sql="select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_fee where  academic_year='".$cur_academic_year."' and rec_date='".$today_date."' group by id ORDER BY name LIMIT $start_from, $num_rec_per_page";
		
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
		{
			
		}
		$result=mysqli_query($conn,$sql);
		$row_count =1;
	?>	
                <div class="row" id="income"><br>
                <div class="col-sm-12">
				<table class="table table-bordered table-striped" >
				<tbody>
				<tr>
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class</th>
				<th>Receipt No</th>
				<th>Receipt Date</th>
				<th style="color:green;">Fee Paid</th>
				
				</tr>
	<?php
	foreach($result as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	$id=$row["id"];
	$rec_no=$row["rec_no"];
	$paid_adm_fee+=$row["tot_paid"];
	
	?>
			<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><a href="<?php echo 'indi_paid_det.php?name='.$row["name"].'&roll_no='.$row["roll_no"].'&class='.$row["class"];?>"><?php echo $row["name"];?></a></td>
				<td style="text-align:center;"><?php echo $row["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row["class"];?></td>
				<td style="text-align:center;"><?php echo $row["rec_no"];?></td>
				<td style="text-align:center;"><?php echo $row["rec_date"];?></td>
				<td style="text-align:center;color:green;"><?php echo $row["tot_paid"];?></td>
			</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs.<?php echo $paid_adm_fee;?></span></tr>
	</tbody>
	</table></div>
	</div>

	<?php 
	$result = mysqli_query($conn,$sql); //run the query
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<a href='accounts.php?page=1'>".' First '."</a> "; // Goto 1st page  
	for ($i=1; $i<=$total_pages; $i++) { 
	echo "<a href='accounts.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='accounts.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</div>';		
}

else
{
header("Location:login.php");
}
?>  
