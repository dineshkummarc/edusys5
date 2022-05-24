<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];

$first_name = $_SESSION['parents_uname'];
$roll_no = $_SESSION['parents_pass'];
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
					 <a href="all_gate_pass.php" class="btn btn-primary">View all</a>
					  
						
					</form><br>
					  <button class="btn btn-default" onclick="goBack()">Go Back</button>
					 
					</div>
					</div>
					
		
		
		<?php
		$sql="select * from students where id='".$student_id."'";
		$result=mysqli_query($conn,$sql);
		//var_dump($sql);
		
		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		$class=$row["present_class"];
		$section=$row["section"];
		$first_name=$row["first_name"];
		$roll_no=$row["roll_no"];
		$cur_academic_year=$row["academic_year"];
		}
	   if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$num_rec_per_page=150;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		$sql="select * from gate_pass where (DATE(created_at) BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."' and student_id='".$student_id."' ORDER BY id desc LIMIT $start_from, $num_rec_per_page";
       		
		}
		else
		{
	$num_rec_per_page=150;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		$sql="select * from gate_pass where academic_year='".$cur_academic_year."'  and student_id='".$student_id."' ORDER BY id desc LIMIT $start_from, $num_rec_per_page";	
        //var_dump($sql);
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
				<th>Roll No</th>
				<th>Reason</th>
				<th>Permitted to go</th>
				<th>With</th>
				<th>Issued Date & Time</th>
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$id=$row_tot["id"];
	$date_time= date('d-m-Y @ h:i:s', strtotime( $row_tot['created_at'] ));
	
    ?>
    <tr>
    <td><?php echo $row_count;?></td>
    <td><?php echo $first_name;?></td>
    <td><?php echo $roll_no;?></td>
    <td><?php echo $row_tot["gate_reason"];?></td>
    <td><?php echo $row_tot["gate_permit_go"];?></td>
    <td><?php echo $row_tot["gate_with"];?></td>
    <td><?php echo $date_time;?></td>
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
		

	echo "<a href='all_gate_pass.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_gate_pass.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_gate_pass.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
	require("footer.php");
	}
	else
	{
header("Location:login.php");

	}

?>			
