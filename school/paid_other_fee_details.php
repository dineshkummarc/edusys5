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
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
			<div class="dc-layout-wrapper">
                <div class="dc-content-layout">
				<?php
				if(isset($_GET['filter'])){
					$class=$_GET['class'];
					
					?>	
					 <div class="container-fluid">
					
						
                        <div class="row"><br>
                        <div class="col-sm-12">
						
                        
					<form class="form-inline" action="paid_other_fee_details.php" method="get">
					   <div class="form-group">
					 
					 <select class="form-control" name="class">
						<option value="">Select Class</option>
						<?php

						 $sql_name="select distinct class from other_fee where academic_year='".$cur_academic_year."'";

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
					   <button type="button"  class="btn btn-success btn-md" onclick="printDiv('study')">Print</button> 
					
					</form>
					<form action="export_other_fee.php" method="post" name="export_excel">
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
		
		
		if((isset($_GET['class']))&&!empty($_GET['from'])&&!empty($_GET['to']))
		{
			$class=$_GET["class"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			$sql_tot="select sum(tot_paid) as total_paid_fee from other_fee where class='".$class."' and academic_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')";
		   
		}
		else if(isset($_GET['class']))
		{
			$class=$_GET["class"];
			$sql_tot="select sum(tot_paid) as total_paid_fee from other_fee where class='".$class."' and academic_year='".$cur_academic_year."'";
		  	
			
		}
	
		$result_tot=mysqli_query($conn,$sql_tot);
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
		{
		
		$total_paid_fee= $row_tot["total_paid_fee"];
		}
				
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
	{
		$tot_adm_fee=$row_set_fee["tot_adm_fee"];
		
	}
	?>
	</div> 
	
	<?php
		
		
		$num_rec_per_page=100;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		
		
		if((isset($_GET['class']))&&!empty($_GET['from'])&&!empty($_GET['to']))
		{
		//echo "inside";
		$class=$_GET["class"];
		$academic_year=$_GET["academic_year"];
		$from=$_GET["from"];
		$to=$_GET["to"];
			
		$sql="select id,roll_no,name,towards,class,academic_year,rec_date,sum(adm_fee) as paid_adm_fee from other_fee where class='".$class."' and academic_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to') group by roll_no ORDER BY name LIMIT $start_from, $num_rec_per_page ";
		
		}
		else if(isset($_GET['class']))
		{
		$class=$_GET["class"];
		
		$sql="select id,roll_no,name,class,towards,academic_year,rec_date,sum(adm_fee) as paid_adm_fee from other_fee where class='".$class."' and academic_year='".$cur_academic_year."' group by roll_no ORDER BY name LIMIT $start_from, $num_rec_per_page ";
		//var_dump($sql);
		
		}
		
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
		{
		
		}
			
		
		$result=mysqli_query($conn,$sql);
		$row_count =1;
	
	?>	
                <div class="container-fluid">
                <div class="row" id="income"><br>
				
                <div class="col-sm-12">
				<h3>Books ,Uniform and Other Fee Details</h3>
				<table class="table table-bordered table-striped" >
				<tbody>
				<tr>
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class</th>
				<th>Academic Year</th>
				<th>Receipt Date</th>
				<th style="color:green;">Fee Paid</th>
				<th style="color:blue;">Towards</th>
				<th></th>
				</tr>
	<?php
	foreach($result as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	
	$id=$row["id"];
	$name=$row["name"];
	$roll_no=$row["roll_no"];
	$academic_year=$row["academic_year"];
	$mob=$row["mob"];
$tot_adm_fee=$row_set_fee["adm_fee"];
	
	$rec_no=$row["rec_no"];
	
	$class=$row["class"];
	$tot_paid=$row["tot_paid"];
	$balance=$row_set_fee["adm_fee"]-$row["paid_adm_fee"];
	
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				
				<td style="text-align:center;"><a href="<?php echo 'indi_paid_det.php?name='.$row["name"].'&roll_no='.$row["roll_no"].'&class='.$row["class"];?>"><?php echo $row["name"];?></a></td>
				<td style="text-align:center;"><?php echo $row["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row["class"];?></td>
				<td style="text-align:center;"><?php echo $row["academic_year"];?></td>
				<td style="text-align:center;"><?php echo $row["rec_date"];?></td>
				<td style="text-align:center;color:green;"><?php echo $row["paid_adm_fee"];?></td>
				<td style="text-align:center;color:green;"><?php echo $row["towards"];?></td>
				<td><div class="btn-group">
				<a href="<?php echo 'edit_other_fee.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
				</tr>
				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_other_fee.php?id='+id+'';
					  }
				  }
				  
				  </script>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs.<?php echo $total_paid_fee;?></span></tr>
	</tbody>
	</table></div>
	</div>

	<?php 
	
	
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='paid_other_fee_details.php.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='paid_other_fee_details.php.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='paid_other_fee_details.php.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
	}
	else
	{
	?>
				
				
			
<!---------//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////----------->  
	
                    <div class="container-fluid" >
					
                        <div class="row"><br>
                        <div class="col-sm-12">
                      
						<form class="form-inline" action="paid_other_fee_details.php" method="get">
					  <div class="form-group">
					 
					 <select class="form-control" name="class">
						<option value="">Select Class</option>
						<?php

						 $sql_name="select distinct class from other_fee where academic_year='".$cur_academic_year."'";
 
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
					
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Filter">
					   <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  
					</form>
					<form action="export_fee.php" method="post" name="export_excel">
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
			
				
				
				$sql_tot="select sum(tot_paid) as tot_paid_fee from other_fee where academic_year='".$cur_academic_year."'";
				$result_tot=mysqli_query($conn,$sql_tot);
				if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
				{
				
				$tot_paid_fee= $row_tot["tot_paid_fee"];
				
				

				}
				?>
				
				
				</div>       
						
						
						
	<?php
		if(isset($_GET["today"])){
		//echo "Today collected";
		/////////////////////////////////////////////Start Today Collected Fee//////////////////////////////////////////////////
		$num_rec_per_page=100;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		ob_start();
		date_default_timezone_set("Asia/Kolkata");
		$today_date=date("Y-m-d");
		$academic_year=$_GET["academic_year"];
			
		
		$sql="select id,roll_no,name,class,towards,academic_year,rec_date,adm_fee from other_fee where rec_date='".$today_date."' and adm_fee IS NOT NULL  UNION ALL select id,roll_no,name,class,academic_year,rec_date,adm_fee from student_adm_fee where rec_date='".$today_date."' and adm_fee IS NOT NULL UNION ALL select id,roll_no,name,class,academic_year,rec_date,adm_fee from student_books_fee where rec_date='".$today_date."' and adm_fee IS NOT NULL UNION ALL select id,roll_no,name,class,academic_year,rec_date,adm_fee from student_software_fee where rec_date='".$today_date."' and adm_fee IS NOT NULL UNION ALL select id,roll_no,name,class,academic_year,rec_date,adm_fee from student_shoe_fee where rec_date='".$today_date."' and adm_fee IS NOT NULL UNION ALL select id,roll_no,name,class,academic_year,rec_date,adm_fee from student_uniform_fee where rec_date='".$today_date."' and adm_fee IS NOT NULL UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_date,van_fee from student_van_fee where rec_date='".$today_date."' and van_fee IS NOT NULL UNION ALL select id,roll_no,name,class,academic_year,rec_date,adm_fee from student_cca_fee where rec_date='".$today_date."' and adm_fee IS NOT NULL ORDER BY name LIMIT $start_from, $num_rec_per_page ";
		//var_dump($sql);
		
		
		$result=mysqli_query($conn,$sql);
		
		
		
		$row_count =1;
	
	?>	
                <div class="row" id="income"><br>
                <div class="col-sm-12">
				<table class="table table-bordered table-stripped">
				<tbody>
				<tr>
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class</th>
				<th>Academic Year</th>
				<th>Receipt Date</th>
				<th style="color:green;">Fee Paid</th>
				<th style="color:green;">Towards</th>
				
				
				</tr>
				
				
	<?php
	
	foreach($result as $row)
	{
	$rec_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	$id=$row["id"];
	$name=$row["name"];
	$roll_no=$row["roll_no"];
	$academic_year=$row["academic_year"];
	
	$rec_no=$row["rec_no"];
	$mob=$row["mob"];
	

	$class=$row["class"];
	$id=$row['id'];
	$tot_fee=$row["tot_fee"];
	$tot_paid=$row["adm_fee"];
	$balance=$tot_adm_fee-$tot_paid;
	$tot_today_fee+=$row["adm_fee"];
	if($name!=""){
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				<td style="text-align:center;"><a href="<?php echo 'indi_paid_det.php?name='.$row["name"].'&roll_no='.$row["roll_no"].'&class='.$row["class"];?>"><?php echo $row["name"];?></a></td>
				<td style="text-align:center;"><?php echo $row["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row["class"];?></td>
				<td style="text-align:center;"><?php echo $row["academic_year"];?></td>
				<td style="text-align:center;"><?php echo $rec_date;?></td>
				<td style="text-align:center;color:green;"><?php echo $tot_paid;?></td>
				<td style="text-align:center;color:green;"><?php echo $row["towards"];?></td>
				<td><div class="btn-group">
				<a href="<?php echo 'edit_other_fee.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
				</tr>
				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_other_fee.php?id='+id+'';
					  }
				  }
				  
				  </script>
	<?php
				
	$row_count++; 
;
	}

	}
  
   
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs <?php echo $tot_today_fee;?></span></tr>
				</tbody>
				</table>
				
				</div>
				</div>
				
		<!--/////////////////////////////////////////////End Today Collected Fee//////////////////////////////////////////////////	-->
		<?php
		}
		?>
		

	<?php 
	$sql = "SELECT * FROM other_fee where academic_year='".$cur_academic_year."'"; 
	$result = mysqli_query($conn,$sql); //run the query
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 

	echo "<a href='paid_other_fee_details.php.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='paid_other_fee_details.php.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='paid_other_fee_details.php.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	
	?>
	</article></div>
    </div>
	<?php
	}
	?>
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
