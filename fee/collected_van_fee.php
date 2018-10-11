<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

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
					
					 <div class="container-fluid">
					
						
                        <div class="row"><br>
                        <div class="col-sm-12">
						
                        
					<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
					   <div class="form-group">
					 
					 <select class="form-control" name="route_name">
						<option value="">Select Route</option>
						<?php

						 $sql_name="select distinct route_name from routes";

						 $result_name=mysqli_query($conn,$sql_name);

						 foreach($result_name as $value)

						 {

					?>
					<option value='<?php echo $value["route_name"];?>'><?php echo $value["route_name"];?></option>
					<?php
					}
					echo '</select>';
					?></div>
					
					 <div class="form-group">
					  <label for="sel1">Select Stage</label>
					   <?php echo '<select class="form-control" name="stage_name">';
						echo '<option value="">------</option>';
						$sql_stage="select distinct stage_name from stages";
						$result_stage=mysqli_query($conn,$sql_stage);
						 foreach($result_stage as $value_stage)
						{
						?>
						<option value='<?php echo $value_stage["stage_name"];?>'><?php echo $value_stage["stage_name"];?></option>
						<?php
						}
						echo '</select>';
						?>
					</div>
									
					
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
					   
				<br>
					<form action="export_van_fee.php" method="post" name="export_excel">
					<div class="control-group">
						<div class="controls">
							<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
						</div>
					</div>
					</form>
					</div>
					</div>
					
		
		<?php 
		if(isset($_GET['route_name'])&&(isset($_GET['from']))&&(isset($_GET['to']))&&(isset($_GET['stage_name'])))
		{
			
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			$sql_tot="select sum(van_fee) as total_van_fee,route_name,stage_name from student_van_fee where route_name='".$route_name."' and (rec_date BETWEEN '$from' and '$to')";
		    $sql_set_fee="select van_fee from set_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."'";	
			
		}
		if(isset($_GET['route_name'])&&(isset($_GET['stage_name'])))
		
		{
			if(($_GET['from']=="")&&($_GET['to']=="")){
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			
			$sql_tot="select sum(van_fee) as total_van_fee,route_name,stage_name from student_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."'";
		    $sql_set_fee="select van_fee from set_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."'";	
			
		}
		}
	if(isset($_GET['route_name']))
		
		{ 
		if(($_GET['stage_name']=="")&&($_GET['from']=="")&&($_GET['to']=="")){
		
			$route_name=$_GET["route_name"];
			
			
			$sql_tot="select sum(van_fee) as total_van_fee,route_name,stage_name from student_van_fee where route_name='".$route_name."'";
		    $sql_set_fee="select van_fee from set_van_fee where route_name='".$route_name."'";	
			
		}
		}
	
			    $result_tot=mysqli_query($conn,$sql_tot);
				if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
				{
				
				$total_van_fee= $row_tot["total_van_fee"];
				}
				
				$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
	{
		$van_fee=$row_set_fee["van_fee"];
		
	}
	?>
	</div>       
	<?php
		$num_rec_per_page=100;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		
	if(isset($_GET['route_name'])&&(isset($_GET['from']))&&(isset($_GET['to']))&&(isset($_GET['stage_name'])))
		{
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			
		$sql_det="select id,first_name,roll_no,present_class,academic_year ,rec_date,sum(van_fee) as total_van_fee,route_name,stage_name from student_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."' and (rec_date BETWEEN '$from' and '$to') group by roll_no ORDER BY first_name LIMIT $start_from, $num_rec_per_page ";
		$result_det=mysqli_query($conn,$sql_det);
		
		$sql_set_fee="select van_fee from set_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
		
		}
		
	
		
		if(isset($_GET['route_name']))
		
		{
		
		$route_name=$_GET["route_name"];
		$sql_det="select id,first_name,roll_no,present_class,academic_year ,rec_date,sum(van_fee) as total_van_fee,route_name,stage_name from student_van_fee where route_name='".$route_name."' group by roll_no ORDER BY first_name LIMIT $start_from, $num_rec_per_page ";
		$sql_set_fee="select van_fee from set_van_fee where route_name='".$route_name."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
		$result_det=mysqli_query($conn,$sql_det);
		//var_dump($sql_det);
	
		}
		
		if(isset($_GET['route_name'])&&(isset($_GET['stage_name'])))
		
		{
			if(($_GET['from']=="")&&($_GET['to']=="")){
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			
		$sql_det="select id,first_name,roll_no,present_class,academic_year ,rec_date,sum(van_fee) as total_van_fee,route_name,stage_name from student_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."' group by roll_no ORDER BY first_name LIMIT $start_from, $num_rec_per_page ";
		$sql_set_fee="select van_fee from set_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page ";
		$result_det=mysqli_query($conn,$sql_det);
		//var_dump($sql_det);
			
		}
		}
		
		
		$result_set_fee=mysqli_query($conn,$sql_set_fee);
		if($row_set_fee=mysqli_fetch_array($result_set_fee,MYSQLI_ASSOC))
	{
		//$tot_adm_fee=$row_set_fee["tot_adm_fee"];
		//echo $tot_adm_fee;
		//echo "dkjf;lsajf;s";
		
	}
		
		
		
		$row_count =1;
	
	?>	
                <div class="row" id="income"><br>
                <div class="col-sm-12">
				<h3 style="color:red;"><?php echo strtoupper($route_name);?>: Collected School Van Fee Details</h3>
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
				<th style="color:blue;">Total Fee</th>
				<!--<th style="color:red;">Balance</th>-->
				
				
				<?php
				if(isset($_GET['delete'])||($_GET['route_name']))
				{
				?>
				<th>Delete</th>
				<?php
				}if(isset($_GET['edit'])||($_GET['route_name']))
				{
				?>
				<th>Edit</th>
				<?php
				}if(isset($_GET['remind']))
				{
				
				echo '<th>Remind Fee</th>';
				}
				?>
				</tr>
	<?php
	foreach($result_det as $row)
	{
	$reciept_date= date('d-m-Y', strtotime( $row['rec_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$id=$row["id"];
	$name=$row["first_name"];
	$roll_no=$row["roll_no"];
	$academic_year=$row["academic_year"];
	$mob=$row["mob"];
    $tot_adm_fee=$row_set_fee["van_fee"];
	
	$rec_no=$row["rec_no"];
	
	$class=$row["present_class"];
	//$tot_fee=$row["tot_fee"];
	$tot_paid=$row["tot_paid"];
	$balance=$row_set_fee["van_fee"]-$row["paid_van_fee"];
	
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count;?></td>
				
				<td style="text-align:center;"><a href="<?php echo 'indi_van_paid_det.php?name='.$row["first_name"].'&roll_no='.$row["roll_no"].'&route_name='.$row["route_name"].'&stage_name='.$row["stage_name"];?>"><?php echo $row["first_name"];?></a></td>
				<td style="text-align:center;"><?php echo $row["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row["present_class"];?></td>
				<td style="text-align:center;"><?php echo $row["academic_year"];?></td>
				<td style="text-align:center;"><?php echo $reciept_date;?></td>
				<td style="text-align:center;color:green;"><?php echo $row["total_van_fee"];?></td>
				<td style="text-align:center;color:blue;"><?php echo $tot_adm_fee;?></td>
				<!--<td style="text-align:center;color:red;"><?php echo $balance;?></td>-->
				
				
				<?php 
				
				if(isset($_GET['delete'])||($_GET['route_name']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_van_fee.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a></td>
			
				<?php 
					}
					//.($_GET['class']).($_GET['academic_year']))
					if(isset($_GET['edit'])||($_GET['route_name']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'edit_school_van_fee.php?id='.$id.'&edit=yes';?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a></td>
			
				<?php 
					}
				
					if(isset($_GET['remind']))
					{
						if($balance>0){
						
				?>
                <td style="text-align:center;"><a href="<?php echo 'rem_fee.php?class='.$class.'&name='.$name.'&roll_no='.$roll_no.'&mob='.$mob.'&balance='.$balance;?>"><button type="button" class="btn btn-sm btn-danger">Remind Fee</button></a></td>
			
				<?php 
					}
					}
				?>
			
				
				</tr>
				
	<?php
				
	$row_count++; 
	}
	
	?>
	<tr><span style="color:#006699;font-size:18px;">Total Fee Paid Rs.<?php echo $total_van_fee;?></span></tr>
				</tbody>
				</table></div>
				
				</div>

	<?php 
	
		if(isset($_GET['route_name'])&&(isset($_GET['from']))&&(isset($_GET['to']))&&(isset($_GET['stage_name'])))
		{
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			$sql="select sum(van_fee) as total_van_fee from student_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."' and (rec_date BETWEEN '$from' and '$to')";
		    
			
		}
		if(isset($_GET['route_name']))
		
		{
			if(($_GET['stage_name']=="")&&($_GET['from']=="")&&($_GET['to']=="")){
			$route_name=$_GET["route_name"];
			$sql="select sum(van_fee) as total_van_fee from student_van_fee where route_name='".$route_name."'";
		   //var_dump($sql);
			
		}
		}
		
		if(isset($_GET['route_name'])&&(isset($_GET['stage_name'])))
		{
			if(($_GET['from']=="")&&($_GET['to']=="")){
			$route_name=$_GET["route_name"];
			$stage_name=$_GET["stage_name"];
			
			$sql="select sum(van_fee) as total_van_fee from student_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."'";
		   
			
		}
		}
		
		$result = mysqli_query($conn,$sql); //run the query
		$total_records = mysqli_num_rows($result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='collected_van_fee.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='collected_van_fee.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='collected_van_fee.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
	
	?>
				
				
			

                </div>
            </div>
	




<?php
			
}
else
{
header("Location:login.php");
}
?>  
