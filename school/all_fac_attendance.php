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
                <div class="col-sm-12">
				<h3>Staff Attendance</h3>
				
					<form action="export_staff_att.php" method="post" name="export_excel">
					<div class="control-group">
						<div class="controls">
							<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
						</div>
					</div>
					</form><br>
			
					 
					<form class="form-inline" action="all_fac_attendance.php" method="get">
					 
					  <div class="form-group">
						<label for="pwd">From</label>
						<input type="date" class="form-control" name="from" id="pwd">
					  </div>
					  <div class="form-group">
						<label for="pwd">To</label>
						<input type="date" class="form-control" name="to" id="pwd">
					  </div>
					 
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  <a href="all_fac_attendance.php" class="btn btn-primary">View all</a>
						
					</form>
					
					</div>
					</div>
					
		
		
		<?php 
		 if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		
		$sql_tot="select att_date,staff_id,sum(att_count)as tot_att_count from fac_attendance where  (att_date BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."' group by staff_id";
    $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$staff_id=$row_tot["staff_id"];
		}	
		
	
		$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance where  (att_date BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."'  group by staff_id";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		
		}else{
			$sql_tot="select att_date,staff_id,sum(att_count)as tot_att_count from fac_attendance where   academic_year='".$cur_academic_year."' group by staff_id";
			$result_tot=mysqli_query($conn,$sql_tot);		
			if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
				{
				$tot_att_count=$row_tot["tot_att_count"];
				$staff_id=$row_tot["staff_id"];
			}	
			
		
			$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance where   academic_year='".$cur_academic_year."'  group by staff_id";
			$result_att_tot=mysqli_query($conn,$sql_tot_att);
			//$tot_class=mysqli_num_rows($result_att_tot);
			if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
				{
				$tot_class=$row_att_tot["tot_class"];
				
			}	
		}

 
		$row_count =1;
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Aadhaar No</th>
				<th>Class Attended</th>
				<th>Total Class</th>
				<th>Percentage (%)</th>
				
				
				<?php
				if(isset($_GET['delete']))
				{
				?>
				<th>Delete</th>
				<?php
				}
				?>
				
				</tr>
	<?php
	
	foreach($result_tot as $row_tot)
	{
		$id = $row_tot["id"];
		$staff_id = $row_tot["staff_id"];
	$att_date= date('d-m-Y', strtotime( $row['att_date'] ));
	
	$per_tot_class=($row_tot["tot_att_count"]/$tot_class)*100;


	$sql_staff="select * from faculty where fac_id='".$staff_id."'";
	$result_staff=mysqli_query($conn,$sql_staff);
	//var_dump($sql_staff);
	while($row_staff=mysqli_fetch_array($result_staff,MYSQLI_ASSOC))
	{
		$fac_fname=  $row_staff['fac_fname'];
		$adhaar_no=  $row_staff['adhaar_no'];
	}
	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><a href="<?php echo 'fac_attendance_desc.php?id='.$staff_id;?>"><?php echo $fac_fname;?></a></td>
				<td><?php echo $adhaar_no;?></td>
				<td><?php echo $row_tot["tot_att_count"];?></td>
				<td><?php echo $tot_class;?></td>
				<td><?php echo $per_tot_class;?></td>
				<?php
				
				if(isset($_GET['delete']))
					{
				?>
                <td><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>
			
				<?php 
					}
				?>
				
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
		
require("pagination_bottom.php");

	require("footer.php");
	}
	else

	{

		header("Location:login.php");

	}