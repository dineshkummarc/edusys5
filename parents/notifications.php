<?php
session_start();

if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))

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
				$parents_uname=$_SESSION['parents_uname'];
		        $parents_pass=$_SESSION['parents_pass'];
		        $parents_class=$_SESSION['parents_class'];
					?>	
					 
						<form class="form-inline" action="notifications.php" method="get">
					 
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
					 
					</div>
					</div>
					
		
		
		<?php
        $parents_uname=$_SESSION['parents_uname'];
		$parents_pass=$_SESSION['parents_pass'];
		$parents_class=$_SESSION['parents_class'];
		
		$num_rec_per_page=75;
	   if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	   $start_from = ($page-1) * $num_rec_per_page; 
			
		 if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		
		
		$sql="select * from notifications where (notifi_date BETWEEN '$from' and '$to') and class='".$parents_class."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
       		
		}
		else
		{
			
		$first_name=$_GET['name'];
		$roll_no=$_GET['roll_no'];
		$present_class=$_GET['present_class'];
		$sql="select * from notifications where class='".$parents_class."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
        
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
				
				<th>Title</th>
				<th>Description</th>
				<th>Posted Date</th>
				
				
				
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
	
	foreach($result as $row_tot)
	{
	$notifi_date= date('d-m-Y', strtotime( $row_tot['notifi_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	

	?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $row_tot["notifi_title"];?></td>
				<td><?php echo $row_tot["notifi_desc"];?></td>
				<td><?php echo $notifi_date;?></td>
				
				
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
				
				<?php 
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='notifications.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='notifications.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='notifications.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
				
				
				?>
				
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
