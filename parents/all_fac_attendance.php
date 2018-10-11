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
                <div class="col-sm-12">
				<h3>Staff Attendance</h3>
				
				<?php
				if(isset($_GET['filter'])){
					
					$from=$_GET['from'];
					$to=$_GET['to'];
					?>	
					 
					<form class="form-inline" action="all_attendance.php" method="get">
					 
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
					  
						
					</form>
					</div>
					</div>
					
		
		
		<?php 
		 if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		
		$sql_tot="select att_date,first_fname,roll_no,sum(att_count)as tot_att_count from fac_attendance where  (att_date BETWEEN '$from' and '$to') group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$first_name=$row_tot["first_fname"];
			$roll_no=$row_tot["roll_no"];
			
			
		}	
		
	
		$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance where  (att_date BETWEEN '$from' and '$to')  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		
		}


		
		$num_rec_per_page=50;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		
		$sql_tot="select att_date,first_fname,roll_no,sum(att_count)as tot_att_count from fac_attendance where  (att_date BETWEEN '$from' and '$to') group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$first_name=$row_tot["first_fname"];
			$roll_no=$row_tot["roll_no"];
			
		}	
		
	
		$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance where  (att_date BETWEEN '$from' and '$to')  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		}
	
		
		
		//$result=mysqli_query($conn,$sql_tot_att);
		$row_count =1;
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
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
	$att_date= date('d-m-Y', strtotime( $row['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	$per_tot_class=($row_tot["tot_att_count"]/$tot_class)*100;
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><a href="<?php echo 'fac_attendance_desc.php?name='.$row_tot["first_fname"].'&roll_no='.$row_tot["roll_no"];?>"><?php echo $row_tot["first_fname"];?></a></td>
				<td style="text-align:center;"><?php echo $row_tot["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["tot_att_count"];?></td>
				<td style="text-align:center;"><?php echo $tot_class;?></td>
				<td style="text-align:center;"><?php echo $per_tot_class;?></td>
				<?php
				
				if(isset($_GET['delete']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>
			
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
	
	if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
	
        $from=$_GET['from'];
		$to=$_GET['to'];		
		$sql_tot="select att_date,first_name,roll_no,present_class,sum(att_count)as tot_att_count,present_class from attendance where present_class='".$present_class."' and (att_date BETWEEN '$from' and '$to') group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$first_name=$row_tot["first_name"];
			$roll_no=$row_tot["roll_no"];
			
			
		}	
		
		
		$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance where (att_date BETWEEN '$from' and '$to')  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		}
		
		
		
		
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='all_fac_attendance.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_attendance.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_fac_attendance.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';

	

	require("footer.php");
	}
	else if(!isset($_GET['filter']))
	{
		

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
		
		$sql_tot="select att_date,first_fname,roll_no,sum(att_count)as tot_att_count from fac_attendance  group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$first_name=$row_tot["first_fname"];
			$roll_no=$row_tot["roll_no"];
			
			
		}	
		
	
		$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance   group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		
		


		
		$num_rec_per_page=50;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
	
		$sql_tot="select att_date,first_fname,roll_no,sum(att_count)as tot_att_count from fac_attendance group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$first_name=$row_tot["first_fname"];
			$roll_no=$row_tot["roll_no"];
			
		}	
		
	
		$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
	
	
		
		
		//$result=mysqli_query($conn,$sql_tot_att);
		$row_count =1;
	
	?>	
        <div class="row">
        <div class="col-sm-12" id="income"><br>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
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
	$att_date= date('d-m-Y', strtotime( $row['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	$per_tot_class=($row_tot["tot_att_count"]/$tot_class)*100;
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><a href="<?php echo 'fac_attendance_desc.php?name='.$row_tot["first_fname"].'&roll_no='.$row_tot["roll_no"];?>"><?php echo $row_tot["first_fname"];?></a></td>
				<td style="text-align:center;"><?php echo $row_tot["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["tot_att_count"];?></td>
				<td style="text-align:center;"><?php echo $tot_class;?></td>
				<td style="text-align:center;"><?php echo $per_tot_class;?></td>
				<?php
				
				if(isset($_GET['delete']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>
			
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
				
	    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

	<?php 
		
		$sql_tot="select att_date,first_name,roll_no,present_class,sum(att_count)as tot_att_count,present_class from attendance  group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			$first_name=$row_tot["first_name"];
			$roll_no=$row_tot["roll_no"];
			
			
		}	
		
		
		$sql_tot_att="select distinct att_date,sum(tot_class) as tot_class from fac_attendance  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		
		
		
		
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='all_fac_attendance.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_attendance.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_fac_attendance.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';

	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	
	}
	

	else

	{

		header("Location:login.php");

	}