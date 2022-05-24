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
					  <a href="replied_actions.php"><button class="btn btn-primary">View all Reply</button></a>
					</div>
					</div>
					
		
		
		<?php
	   if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$num_rec_per_page=25;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		$sql="select * from leave_appli where academic_year='".$cur_academic_year."' and (applied_date BETWEEN '$from' and '$to') ORDER BY id desc LIMIT $start_from, $num_rec_per_page";
       		
		}
		else
		{
	$num_rec_per_page=25;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		$sql="select * from leave_appli where academic_year='".$cur_academic_year."' ORDER BY id desc LIMIT $start_from, $num_rec_per_page";	
        
	    }
		 $result=mysqli_query($conn,$sql);
		 $row_count =1;
		
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
		<table class="table table-bordered">
		<tbody>
		<tr class="w3-blue">
		<th>SL No</th>
		<th>Name</th>
		<th>Date</th>
		<th>Reason</th>
		<th>Actions</th>
		<th></th>
	
		
		</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$id=$row_tot["id"];
	$student_id=$row_tot["student_id"];
	$read_status=$row_tot["status"];
	$leave_status=$row_tot["leave_status"];
	$from_date= date('d-m-Y', strtotime( $row_tot['from_date'] ));
	$to_date= date('d-m-Y', strtotime( $row_tot['to_date'] ));
	$applied_date= date('d-m-Y', strtotime( $row_tot['applied_date'] ));

	$sql_name="select * from students where id='".$student_id."'";
	$result_name=mysqli_query($conn,$sql_name);
	
	if($row_name=mysqli_fetch_array($result_name,MYSQLI_ASSOC))
	{
	$class=$row_name["present_class"];
	$section=$row_name["section"];
	$first_name=$row_name["first_name"];
	$roll_no=$row_name["roll_no"];
	
	}
	
	
 ?>

	<tr>
	<td><?php echo $row_count;?></td>
	<td><?php echo $first_name;?> <?php if($read_status==''){ ?><span class="w3-badge w3-red" style="color:#fff;">New</span><?php } ?><br>Roll No: <?php echo $roll_no;?><br>
<small>Applied Date : <?php echo $applied_date;?></small>
</td>
	<td>From: <?php echo $from_date;?><br>To: <?php echo $to_date;?></td>
	<td style="width:40%;"><?php echo $row_tot["reason"];?></td>

	<td style="width:20%;"><a href="<?php echo 'send_leave.php?id='.$id;?>" ><i class="fa fa-reply" aria-hidden="true"></i> Click for Action</a> <?php if($read_status==''){ ?><span class="badge badge-default" style="background-color:red;"> Pending</span><?php } else { ?> <span class="badge badge-default" style="background-color:grey;"> Completed</span><?php } ?><br>
	<?php 
		if($leave_status == "approved"){
			$badge = '<span class="badge badge-success" style="background-color:#28a745;"> Approved</span>';
		}else if($leave_status == "rejected"){
			$badge = '<span class="badge badge-danger" style="background-color:#dc3545;"> Rejected</span>';
		}else{
			$badge = '<span class="badge badge-default" style="background-color:grey;"> Pending</span>';
		}
		//echo $badge;
	?>
	
	
	</td>
	
	<td><a href="<?php echo 'delete_leave.php?id='.$id;?>" title="Delete"><i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a></td>

	
	</tr>
				    
	<?php
				
	$row_count++; 
	}
	
	?>
	
	</tbody>
	</table>
	
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
	echo '</article></div></div>';
	require("footer.php");
	}
	else
	{
header("Location:login.php");

	}

?>			
