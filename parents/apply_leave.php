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
                <div class="row">
                
				<div class="col-sm-4">
				<?php
				if(isset($_GET["success"])){
				?>
				<br>
				<div class="alert alert-success">
				  <strong>Success!</strong> Leave Application has been submitted successfully.
				</div>
				<?php
				}
				?>
				<h2>Send Leave letter</h2>
				<form action="insert_leave.php" method="post">
				
				<div class="form-group">
	           <label for="usr">Reason:</label>
		       <input type="text" name="reason" class="form-control">
	            </div>
				
				<div class="form-group">
	            <label for="usr">Date from:</label>
		        <input type="date" name="from_date" class="form-control" >
	            </div>
				
	            <div class="form-group">
	            <label for="usr">Date to:</label>
		        <input type="date" name="to_date" class="form-control" >
	            </div>
	 
	              <div class="form-group">
	              <label for="usr">Details:</label>
		          <textarea rows="6" name="details" class="form-control"></textarea>
		           </div>
				   
				   	<input type="submit" name="leave" class="btn btn-success" value="Send Leave letter">
		
				</form>
		</div>
				
        <div class="col-sm-8"><br>
		<table class="table table-bordered">
			<tbody>
			<tr class="w3-blue">
				<th>Name & Roll No</th>
				<th>Leave date</th>
				<th>Leave Status</th>
				<th>Note</th>
			</tr>
	<?php
	$today_date = date("Y-m-d");
	$sql_status="select * from leave_appli where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and admission_no='".$roll_no."' order by id desc";
	$result_status=mysqli_query($conn,$sql_status);
	$row_count=1;
	foreach($result_status as $row_tot)
	{
	$id=$row_tot["id"];
	$leave_status=$row_tot["leave_status"];
	$from_date= date('d-m-Y', strtotime($row_tot['from_date'] ));
	$to_date= date('d-m-Y', strtotime($row_tot['to_date'] ));

	if($leave_status == "approved"){
		$badge = '<span class="badge badge-success" style="background-color:#28a745;"> Approved</span>';
	}else if($leave_status == "rejected"){
		$badge = '<span class="badge badge-danger" style="background-color:#dc3545;"> Rejected</span>';
	}else{
		$badge = '<span class="badge badge-default" style="background-color:grey;"> Pending</span>';
	}
	?>
	<tr>
	<td><?php echo $row_tot["first_name"];?><br><?php echo $row_tot["admission_no"];?></td>
	<td>From: <?php echo $from_date;?><br>To: <?php echo $to_date;?></td>
	<td><?php echo $badge;?></td>
	<td><?php echo $row_tot["reason"];?></td>
	</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	
	</tbody>
	</table>
	
	</div>
	</div>
	<br><br><br><br><br><br>
	</div>


	<?php
	
	}

	else

	{

		header("Location:login.php");

	}

?>			
