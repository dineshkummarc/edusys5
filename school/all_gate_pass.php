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
function printGatePass(gatepass) {
     var printContents = document.getElementById('gatepass').innerHTML;
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
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printGatePass('gatepass')">Print</button> 
					 
					  
						
					</form><br>
					  <button class="btn btn-success" onclick="goBack()">Go Back</button>
					 
					</div>
					</div>
					
		
		
		<?php
	   if((isset($_GET['from']))&&(isset($_GET['to'])))
		{
		
		$from=$_GET['from'];
		$to=$_GET['to'];
		$num_rec_per_page=150;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		$sql="select * from gate_pass where (created_at BETWEEN '$from' and '$to') and academic_year='".$cur_academic_year."' ORDER BY id desc LIMIT $start_from, $num_rec_per_page";
       		
		}
		else
		{
	$num_rec_per_page=150;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		$sql="select * from gate_pass where academic_year='".$cur_academic_year."' ORDER BY id desc LIMIT $start_from, $num_rec_per_page";}
		 $result=mysqli_query($conn,$sql);
		 $row_count =1;
		
	?>	
        <div class="row">
        <div class="col-sm-12" id="gatepass"><br>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Reason</th>
				<th>Permitted to go</th>
				<th>With</th>
				<th>Issued Date & Time</th>
				<th>Actions</th>
				
			
				
				</tr>
	<?php
	
	foreach($result as $row_tot)
	{
	$id=$row_tot["id"];
	$created_at= date('d-m-Y', strtotime( $row_tot['created_at'] ));
	
	$student_id=$row_tot["student_id"];
	$sql="select * from students where id='".$student_id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$present_class=$row["present_class"];
	$first_name=$row["first_name"];
	$roll_no=$row["roll_no"];

	}
	

 ?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $first_name;?></td>
				<td><?php echo $roll_no;?></td>
				<td><?php echo $row_tot["gate_reason"];?></td>
				<td><?php echo $row_tot["gate_permit_go"];?></td>
				<td><?php echo $row_tot["gate_with"];?></td>
				<td><?php echo $created_at;?></td>
				
        <td><div class="btn-group">
				<a href="<?php echo 'edit_gate_pass.php?id='.$row_tot['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="#" onclick="deleteGatePass(<?php echo $row_tot['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
				</tr>
			<script>
		  function deleteGatePass(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_gate_pass.php?id='+id+'';
			  }
		  }
		  
		  </script>
				    
	<?php
				
	$row_count++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
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
