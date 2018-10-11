<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
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
				<?php
				$present_class=$_GET['present_class'];
				$first_name=$_GET['name'];
				$roll_no=$_GET['roll_no'];
				
				if(isset($_GET['filter'])){
					$present_class=$_GET['present_class'];
					$from=$_GET['from'];
					$to=$_GET['to'];
				}
					?>	
					 
						<form class="form-inline" action="attendance_desc.php" method="get">
					 
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
					 
					  
						
					</form><br>
					  <button class="btn btn-success" onclick="goBack()">Go Back</button>
					</div>
					</div>
					
		
		
		<?php
        $first_name=$_GET['name'];
		$roll_no=$_GET['roll_no'];
		$present_class=$_GET['present_class'];		
		 if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$first_name=$_GET['name'];
		$roll_no=$_GET['roll_no'];
		$present_class=$_GET['present_class'];
		
		$sql="select * from orph_attendance where (att_date BETWEEN '$from' and '$to') and first_name='".$first_name."' and roll_no='".$roll_no."' and present_class='".$present_class."'";
       		
		}
		else
		{
			
		$first_name=$_GET['name'];
		$roll_no=$_GET['roll_no'];
		$present_class=$_GET['present_class'];
		$sql="select * from orph_attendance where first_name='".$first_name."' and roll_no='".$roll_no."' and present_class='".$present_class."'";
        
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
				<th>Attendance Date</th>
				<th>Attendance</th>
				<th>Taken By</th>
				
				<th></th>
				
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$att_date= date('d-m-Y', strtotime( $row_tot['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$id = $row_tot["id"];

	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $row_tot["first_name"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $att_date;?></td>
				<td style="text-align:center;"><?php echo $row_tot["attendance"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["taken_by"];?></td>
				
                <td><div class="btn-group">
				<a href="<?php echo 'edit_attendance.php?id='.$id; ?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="<?php echo 'delete_attendance.php?id='.$id; ?>">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
	
	}

	else

	{

		header("Location:login.php");

	}

?>			
