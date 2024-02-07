<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];
	error_reporting("0");
	require("header.php");
	require("connection.php");
	$first_name = $_SESSION['parents_uname'];
	$roll_no = $_SESSION['parents_pass'];
	$cur_academic_year = $_SESSION['academic_year'];
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
                <div class="row"><br><br>
                <div class="col-sm-3">
				</div> 
				<div class="col-sm-6" style="padding:20px;border:1px solid grey;">
				<h2>Request Certificate</h2>
				<form action="insert_study_req.php" method="post">
				
				<div class="form-group">
	           <label for="usr">Certificate Name:</label>
		       <input type="text" name="certi_name" class="form-control">
	            </div>
				<div class="form-group">
	           <label for="usr">Reason:</label>
		       <input type="text" name="reason" class="form-control">
	            </div>
				
				<input type="submit" name="study" class="btn btn-success" value="Send Request">
		
				</form>
				
				
				</div>
				<div class="col-sm-3">
				</div>
				</div>
				
		<div class="row">
        <div class="col-sm-12" id="income"><br>
		<center>
	<?php
	
	
	$sql_status="select * from request_study where academic_year='".$cur_academic_year."' and student_id='".$student_id."'";
	$result_status=mysqli_query($conn,$sql_status);
	$row_count=1;
	if(mysqli_num_rows($result_status)>0){ ?>
	<table class="table table-bordered">
			<tbody>
			<tr class="w3-blue">
				<th>SL No</th>
				<th>Certificate</th>
				<th>Purpose</th>
				<th>Collect Date</th>
			</tr>
	<?php }
	foreach($result_status as $row_tot)
	{
	$id=$row_tot["id"];
	$status=$row_tot["status"];
	$req_date= date('d-m-Y', strtotime( $row_tot['req_date'] ));
	if($row_tot["ready_date"]=="NULL"){
		$ready_date= "NIL";	
	}else{
		$ready_date= date('d-m-Y', strtotime( $row_tot['ready_date'] ));
	}
	

	if($status == "approved"){
		$badge = '<span class="badge badge-success" style="background-color:#28a745;"> Approved</span>';
	}else if($status == "rejected"){
		$badge = '<span class="badge badge-danger" style="background-color:#dc3545;"> Rejected</span>';
	}else{
		$badge = '<span class="badge badge-default" style="background-color:grey;"> Pending</span>';
	}
	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $row_tot["certi_name"];?><br><?php echo $badge;?></td>
				<td><?php echo $row_tot["reason"];?><br><small>Requested Date: <?php echo $req_date;?></small></td>
				<td><?php	if($status == "approved"){ echo $ready_date; } ?></td>
			
				
				</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	
	</tbody>
	</table></center>
	
	</div>
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
