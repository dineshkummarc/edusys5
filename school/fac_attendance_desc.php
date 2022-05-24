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
                <div class="col-sm-12"><br>
				<?php
				
				$staff_id=$_GET['id'];
			
					?>	
					 
						<form class="form-inline" action="fac_attendance_desc.php" method="get">
					 
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
					  <a href="all_fac_attendance.php"><button class="btn btn-success">Go Back</button></a>
					</div>
					</div>
					
		
		
		<?php
		if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
	
		$sql="select * from fac_attendance where academic_year='".$cur_academic_year."' and (att_date BETWEEN '$from' and '$to') and staff_id='".$staff_id."'";
       		
		}
		else
		{
		
		$sql="select * from fac_attendance where academic_year='".$cur_academic_year."' and staff_id='".$staff_id."'";
		//var_dump($sql);
        
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
	$id=$row_tot["id"];
	$att_date= date('d-m-Y', strtotime( $row_tot['att_date'] ));
	$sql_staff="select * from faculty where fac_id='".$staff_id."'";
	$result_staff=mysqli_query($conn,$sql_staff);
	
	while($row_staff=mysqli_fetch_array($result_staff,MYSQLI_ASSOC))
	{
		$fac_fname=  $row_staff['fac_fname'];
		$adhaar_no=  $row_staff['adhaar_no'];
	}

	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><?php echo $fac_fname;?></td>
				<td style="text-align:center;"><?php echo $adhaar_no;?></td>
				<td style="text-align:center;"><?php echo $att_date;?></td>
				<td style="text-align:center;"><?php echo $row_tot["attendance"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["taken_by"];?></td>
				 <td><div class="btn-group">
				<a href="<?php echo 'edit_fac_attendance.php?id='.$id; ?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="<?php echo 'delete_fac_attendance.php?id='.$id; ?>">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
	require("footer.php");
	}

	else

	{

		header("Location:login.php");

	}

?>			
