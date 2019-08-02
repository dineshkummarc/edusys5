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
		<center><table class="table table-bordered">
			<tbody>
			<tr class="w3-blue">
				<th>Name & Roll No</th>
				<th>Leave from to</th>
				<th>action</th>
				<th>details</th>
			</tr>
	<?php
	
	$id=$row_tot["id"];
	$sql_status="select * from leave_reply where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and roll_no='".$roll_no."'";
	$result_status=mysqli_query($conn,$sql_status);
	$row_count=1;
	foreach($result_status as $row_tot)
	{
	$req_date= date('d-m-Y', strtotime( $row_tot['req_date'] ));
	$ready_date= date('d-m-Y', strtotime( $row_tot['ready_date'] ));
	$from_date= date('d-m-Y', strtotime( $row_tot['from_date'] ));
	$to_date= date('d-m-Y', strtotime( $row_tot['to_date'] ));
	?>
	<tr>
	<td style="text-align:center;"><?php echo $row_tot["first_name"];?><br><?php echo $row_tot["roll_no"];?></td>
	<td style="text-align:center;"><?php echo $from_date;?><br><?php echo $to_date;?></td>
	<td style="text-align:center;"><?php echo $row_tot["action"];?></td>
	<td style="text-align:center;"><?php echo $row_tot["details"];?></td>
	</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	
	</tbody>
	</table></center>
	
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
