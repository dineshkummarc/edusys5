<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	require("header.php");
	require("connection.php");
	error_reporting("0");
	$from=$_GET["from"];
	$to=$_GET["to"];
	
	?>
	<head>
<script>
function printStudentFee(student_fee) {
     var printContents = document.getElementById('student_fee').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
					 <div class="container-fluid">
					
						
                        <div class="row"><br>
                        <div class="col-sm-12">
						
                        
					<form class="form-inline" action="accounts.php" method="get">
					   <div class="form-group">
					 
					 <select class="form-control" name="class">
						<option value="">Select Class</option>
						<?php

						 $sql_name="select distinct class from student_fee where academic_year='".$cur_academic_year."'";
					
						 $result_name=mysqli_query($conn,$sql_name);

						 foreach($result_name as $value)

						 {

					?>
					<option value='<?php echo $value["class"];?>'><?php echo $value["class"];?></option>
					<?php
					}
					echo '</select>';
					?></div>
					
					 <div class="form-group">
					 <label>From</label>
	                   <input type="date" name="from" class="form-control">
		             </div>
					<div class="form-group">
					 <label>To</label>
	                   <input type="date" name="to" class="form-control">
		             </div>
					
					
					  <input type="submit" class="btn btn-primary" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md" onclick="printStudentFee('student_fee')">Print</button> 
					<a href="accounts.php" class="btn btn-primary">View All</a>
					</form>
					<form action="export_fee.php" class="form-inline" method="post" name="export_excel">
               <br>
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
				</div>
				
			</div>
			
		</form>
	</div>
	</div>
				
	<?php
		$num_rec_per_page=100;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 

		if((isset($_GET['class']))&&!empty($_GET['from'])&&!empty($_GET['to']))
		{
			$class=$_GET["class"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			$sql="select id,student_id,academic_year,rec_no,rec_date,sum(tot_paid) as paid_adm_fee from student_fee where  academic_year='".$cur_academic_year."' and class='".$class."' and (rec_date BETWEEN '$from' and '$to') group by student_id ORDER BY id LIMIT $start_from, $num_rec_per_page";
		
		}
		
		else if((!empty($_GET['from']))&&!empty($_GET['to']))
		{
			$from=$_GET["from"];
			$to=$_GET["to"];
			$sql="select id,student_id,academic_year,rec_no,rec_date,sum(tot_paid) as paid_adm_fee from student_fee where academic_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to') group by student_id ORDER By id LIMIT $start_from, $num_rec_per_page";
		
		}
		else if(!empty($_GET['class']))
		{
		$class=$_GET["class"];
		
			$sql="select id,student_id,academic_year,rec_no,rec_date,sum(tot_paid) as paid_adm_fee from student_fee where  academic_year='".$cur_academic_year."' and class='".$class."' group by student_id ORDER BY id LIMIT $start_from, $num_rec_per_page";
		
		}
		else
		{
			$sql="select id,student_id,academic_year,rec_no,rec_date,sum(tot_paid) as paid_adm_fee from student_fee where  academic_year='".$cur_academic_year."' group by student_id ORDER BY id LIMIT $start_from, $num_rec_per_page";
		
		}

	
		$result=mysqli_query($conn,$sql);
		$row_count =1;

	?>	
  <div class="row" id="student_fee"><br>
  <div class="col-sm-12">
				<table class="table table-bordered table-striped" >
				<tbody>
				<tr>
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class</th>
				<th style="color:green;">Fee Paid</th>
				
				</tr>
	<?php
	foreach($result as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	
	$id=$row["id"];
	$student_id=$row["student_id"];


$sql_student="select * from students where id='".$student_id."'";
$result_student=mysqli_query($conn,$sql_student);
//var_dump($sql);

if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
{
$class=$row_student["present_class"];
$section=$row_student["section"];
$first_name=$row_student["first_name"];
$roll_no=$row_student["roll_no"];
$student_type=$row_student["student_type"];
$mob=$row_student["parent_contact"];
}

	$tot_adm_fee=$row["tot_paid"];
	
	$rec_no=$row["rec_no"];
	$paid_adm_fee+=$row["paid_adm_fee"];
	

	$tot_paid=$row["tot_paid"];
	$balance=$row["tot_paid"]-$row["paid_adm_fee"];
	
	?>
				<tr>
				<td><?php echo $row_count;?></td>
				
				<td><a href="<?php echo 'indi_paid_det.php?student_id='.$student_id;?>"><?php echo $first_name;?></a></td>
				<td><?php echo $roll_no;?></td>
				<td><?php echo $class;?></td>
				<td style="color:green;">&#8377;<?php echo $row["paid_adm_fee"];?></td>
				
				
			
				
				</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs.&#8377;<?php echo $paid_adm_fee;?></span></tr>
	</tbody>
	</table></div>
	</div>

	<?php 
	$result = mysqli_query($conn,$sql); //run the query
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='accounts.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='accounts.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='accounts.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</div>';
require("footer.php");	
}
else
{
header("Location:login.php");
}
?>  
