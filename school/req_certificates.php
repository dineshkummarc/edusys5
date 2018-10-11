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
                <div class="col-sm-12 inline"><br>
				<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
					 
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
					 
					  
						
					</form><br>
					  <button class="btn btn-success" onclick="goBack()">Go Back</button>
					</div>
					</div>
					
		
		
		<?php
	   if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$num_rec_per_page=150;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		$sql="select * from request_study where academic_year='".$cur_academic_year."' and (req_date BETWEEN '$from' and '$to') ORDER BY id desc LIMIT $start_from, $num_rec_per_page";
       		
		}
		else
		{
	$num_rec_per_page=150;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		$sql="select * from request_study where academic_year='".$cur_academic_year."' ORDER BY id desc LIMIT $start_from, $num_rec_per_page";	
        
	    }
		 $result=mysqli_query($conn,$sql);
		 $row_count =1;
		
			 
	
		
		//$result=mysqli_query($conn,$sql_tot_att);
		
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class</th>
				<th>Certificate</th>
				<th>Purpose</th>
				<th>Requested Date</th>
				<th>Send action & Collect Date</th>
				<th>Actions</th>
			
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$id=$row_tot["id"];
	$sql_status="select status from certificate_status where academic_year='".$cur_academic_year."' and certi_id='".$id."'";
	$result_status=mysqli_query($conn,$sql_status);
	if($row_status=mysqli_fetch_array($result_status,MYSQLI_ASSOC))
	{
	$status=$row_status["status"];
	}
	$req_date= date('d-m-Y', strtotime( $row_tot['req_date'] ));
	

	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $row_tot["first_name"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["admission_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["class"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["certi_name"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["reason"];?></td>
				<td style="text-align:center;"><?php echo $req_date;?></td>
				<td style="text-align:center;">
				
					<form class="form-inline" action="req_certi_sms.php" method="post">
					<div class="form-group">
					 
					  <select class="form-control" name="status">
						<option value="">Action</option>
						<option value="approved">Approve</option>
						<option value="rejected">Reject</option>
					 </select>
					</div>
					<div class="form-group">
						<input type="date" name="collect_date" class="form-control">
						<input type="hidden" name="first_name" value="<?php echo $row_tot["first_name"];?>" class="form-control">
						<input type="hidden" name="admission_no" value="<?php echo $row_tot["admission_no"];?>" class="form-control">
						<input type="hidden" name="id" value="<?php echo $row_tot["id"];?>" class="form-control">
					  </div>
					  <input type="submit" name="submit" value="Send" class="btn btn-success btn-sm">
					  </form>
					
					</td>
				<td style="text-align:center;"><a href="<?php echo 'delete_certi.php?id='.$id;?>" title="Delete"><i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a> <span style="color:green;"><?php echo $status;?></span></td>
			
				
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
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='leave_applications.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='leave_applications.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='leave_applications.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
	}
	else
	{
header("Location:login.php");

	}

?>			
