<?php
session_start();

if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))
{
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
				<th>Status</th>
				<th>Collect Date</th>
			</tr>
	<?php
	
	
	$sql_status="select * from request_study where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and admission_no='".$roll_no."'";
	$result_status=mysqli_query($conn,$sql_status);
	$row_count=1;
	foreach($result_status as $row_tot)
	{
	$id=$row_tot["id"];
	$status=$row_tot["status"];
	$req_date= date('d-m-Y', strtotime( $row_tot['req_date'] ));
	if($row_tot["ready_date"]=="0000-00-00"){
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
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $row_tot["first_name"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["admission_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["class"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["certi_name"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["reason"];?></td>
				<td style="text-align:center;"><?php echo $req_date;?></td>
				<td style="text-align:center;"><?php echo $badge;?></td>
				<td style="text-align:center;"><?php echo $ready_date;?></td>
			
				
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

<!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

	<?php
	
	}

	else

	{

		header("Location:login.php");

	}

?>			
