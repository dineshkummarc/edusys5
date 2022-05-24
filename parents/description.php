<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];
$cur_academic_year=$_SESSION['academic_year'];
$first_name=$_SESSION['parents_uname'];
$present_class=$_SESSION['parents_class'];
$roll_no=$_SESSION['parents_pass'];
error_reporting("0");
require("header.php");
require("connection.php");

//////////////////////Start Fee Balance ////////////////////////////////////////////////////////////
	
	////////////////////// Start Total Fee ////////////////////////////////////////////////////////////
	$sql_fee="select * from set_fee where class='".$present_class."' and academic_year='".$cur_academic_year."'";
	$result_fee=mysqli_query($conn,$sql_fee);
	foreach($result_fee as $row_fee){
		$adm_fee+=$row_fee["adm_fee"];
		
	}
	////////////////////// End Total Fee ////////////////////////////////////////////////////////////
	
	////////////////////// Start Total Fee Paid ////////////////////////////////////////////////////////////
	$sql_paid="select * from student_fee where student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
	$result_paid=mysqli_query($conn,$sql_paid);
	foreach($result_paid as $row_paid){
		$tot_paid+=$row_paid["tot_paid"];
		
	}
	////////////////////// End Total Fee Paid ////////////////////////////////////////////////////////////
	$fee_blance=$adm_fee-$tot_paid;
	//echo $adm_fee."Adm Fee <br>";
	//echo $tot_paid." Tot paid <br> ";
	//////////////////////End Fee Balance ////////////////////////////////////////////////////////////

//////////////////////////////////////Start of Searched variables /////////////////////////////////////////////////
	
$sql_route="select route_name,stage_name from route_students where student_id='".$student_id."'  and academic_year='".$cur_academic_year."'";
//var_dump($sql_route);
$result_route=mysqli_query($conn,$sql_route);
if($row_route=mysqli_fetch_array($result_route,MYSQLI_ASSOC))
	{
	$route_name=$row_route["route_name"];
	$stage_name=$row_route["stage_name"];
	}else{
	$route_name="";
	$stage_name="";
	}

	$sql="select * from students where id='".$student_id."'  and academic_year='".$cur_academic_year."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
		$class=$row["present_class"];
		$section=$row["section"];
		$student_type=$row["student_type"];
		
		
	
	
	?>
	<head>
		<script>
function goBack() {
    window.history.back();
}
</script>
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
	<br>
	
	 <center><div class="panel panel-primary" style="width:80%;">
      <div class="panel-heading"><center>Student Details , Name: <?php echo $row["first_name"];?> </span></center>

	<button onclick="goBack()" class="btn btn-default">Go Back</button>

	  </div>
		  <div class="panel-body" id="income">
				<center>
					<?php if(($row["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="../school/<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?><br>
				
				 
				 <div class="table-responsive"> 
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
					<?php 
					if(($row['student_type'])!="")
					{ 
						$student_type=$row['student_type'];
					}
					else
					{
						$student_type="Normal";
					}
					
					?>
					<tbody>
					  <tr>
						<td style="width:15%;">Student Name<br>Student Type</td>
						<td style="color:blue;width:25%;"><?php echo $row['first_name']."<br>".strtoupper($student_type);?></td>
						<td style="width:15%;">Enrollment No</td>
						<td style="color:blue;width:25%;"><?php echo $row['roll_no'];?>
						
						
						</td>
					   
					  </tr>
					  <tr>
						<td style="width:15%;">Joined Date</td>
						<td style="color:blue;width:25%;"><?php echo $row['join_date'];?></td>
						<td style="width:15%;">Blood Group</td>
						<td style="color:blue;width:25%;"><?php echo $row['blood'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Gender</td>
						<td style="color:blue;width:25%;"><?php echo $row['sex'];?></td>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $row['dob'];?></td>
						
					  </tr>
					   <tr>
						<td style="width:15%;">Admission No</td>
						<td style="color:blue;width:25%;"><?php echo $row['admission_no'];?></td>
						<td style="width:15%;">Caste</td>
						<td style="color:blue;width:25%;"><?php echo $row['caste'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['village']."<br>".$row['taluk']." ".$row['district']." ".$row['address'];?></td>
						<td style="width:15%;">Mobile</td>
						<td style="color:blue;width:25%;"><?php echo $row['parent_contact'];?></td>
						
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Class & Section</td>
						<td style="color:blue;width:25%;"><?php echo $row['present_class']." , ".$section;?></td>
						<td style="width:15%;">Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['adhaar_no'];?></td>
						
					  </tr>
					 
					  
					  <tr>
						<td style="width:15%;">Fahter Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['father_name'];?></td>
						<td style="width:15%;">Mother Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['mother_name'];?></td>
						
					  </tr>
					  
					<?php 
					//echo $student_type;
					  if(($row['student_type'])==""){
					?>
						<tr>
						<td style="width:15%;">School Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $fee_blance;?></td>
						<td style="width:15%;">Van Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $van_fee_blance;?></td>
						
					  </tr>
					<?php						
					  }else if($student_type=="rte"){
						
					?>
					<tr>
						<td style="width:15%;">RTE Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $adm_fee_blance;?></td>
						<td style="width:15%;">Van Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $van_fee_blance;?></td>
					</tr>
					
					<?php
					  }					
					  if($student_type=="staff children"){
					?>
					<tr>
						<td style="width:15%;">Staff Children Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $cca_fee_blance;?></td>
						<td style="width:15%;">Van Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $van_fee_blance;?></td>
					</tr>
					
					<?php						
					  }
						
					?>
					  
					
				
					  <tr>
						<td style="width:15%;">Route Name</td>
						<td style="color:blue;width:25%;"><?php echo $route_name;?></td>
						<td style="width:15%;">Stage Name</td>
						<td style="width:15%;color:blue;"><?php echo $stage_name;?></td>
					 </tr>
					 
					</tbody>
				  </table> 
				  </div>
				  
				  </center>
				  
				   
<!------------------------------------------------------Start Attendance details----------------------------------------------->
<?php 

	$sql_tot_att="select distinct att_date from attendance where academic_year='".$cur_academic_year."' and present_class='".$present_class."' and section='".$section."'";
	$result_att_tot=mysqli_query($conn,$sql_tot_att);
	$tot_class=mysqli_num_rows($result_att_tot);
	if($tot_class>0){
		
		$sql_tot="select sum(att_count) as tot_att_count from attendance where academic_year='".$cur_academic_year."' and student_id='".$student_id."'";
		//var_dump($sql_tot);
		$result_tot=mysqli_query($conn,$sql_tot);	
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	  {
			$tot_att_count=$row_tot["tot_att_count"];
		}

		$per_tot_class=($tot_att_count/$tot_class)*100;
	

?>

<div class="row">
        <hr><div class="col-sm-12">
		 <h3>Attendance Details</h3>
		  <div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>Name</th>
				<th>Class Attended</th>
				<th>Total Class</th>
				<th>Percentage (%)</th>
				
				
				</tr>

				<tr>
				<td><a href="<?php echo 'attendance_desc.php?student_id='.$student_id;?>"><?php echo $first_name;?></a></td>
				<td><?php echo $tot_att_count;?></td>
				<td><?php echo $tot_class;?></td>
				<td><?php echo $per_tot_class;?></td>
				
				
				</tr>
		
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>
				<?php
	}
				?>
			

<!---------------------------End of Attendance details-------------------------------------------------->
	<!------------------------Start of student Remarks------------------------------------------->
		  <?php
		
					$sql_remarks="select * from remarks where student_id='".$student_id."'  and academic_year='".$cur_academic_year."' order by id desc";
					$result_remarks=mysqli_query($conn,$sql_remarks);
					  ?>
					     <div class="row">
        <div class="col-sm-12">
			 <hr><div class="table-responsive"> 
			 <h3>Student Remarks</h3>
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
                       <?php 
					  if(mysqli_num_rows($result_remarks)==0){
						echo "<tr>No Remarks to display</tr>"; 
					  }else{
					?>
					  <tr> 
					  <th>SL No</th>
					  <th>Remarks Title</th>
					  <th>Details</th>
					  <th>Added Date</th>
					  
					  </tr>
					  
					  <?php 
					  
					  $row_count=1;
					  foreach($result_remarks as $remarks){
						  $remarks_date= date('d-m-Y', strtotime( $remarks['remarks_date'] ));
					?>
					 <tr> 
					  <td><?php echo $row_count;?></td>
					  <td><?php echo $remarks["remarks_title"];?></td>
					  <td><?php echo $remarks["remarks_desc"];?></td>
					  <td><?php echo $remarks_date;?></td>
					 
					  </tr>
					
					<?php
					$row_count++;
					  }
					  }
					  
					  ?>
					 
		
					  </table>
					  </div>
					  </div>
					  </div>
					  				  
					  
<!------------------------Start Fee Student Fee details--------------------------->
<!---------------Start of Individual Fee paid details----------------------->
		  <hr><h3 style="font-weight:bold;color:red;">FEE DETAILS</h3>
			
		   <?php 
		   
		  $sql_ind_all_fee="select * from set_fee where class='".$present_class."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
		  
		   //var_dump($sql_ind_fee);
		    $result_ind_all_fee=mysqli_query($conn,$sql_ind_all_fee);
		foreach($result_ind_all_fee as $row_all_ind_fee)
		{
		$total_adm_fee+=$row_all_ind_fee["adm_fee"];	
		}
		   ?>
		   <div class="row">
           <div class="col-sm-12">
		   <center>
		   <span style="color:red;font-weight:bold;font-size:16px;">All Student Fee : <?php echo $total_adm_fee;?></span>,
		   </center>
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<?php 
				if((mysqli_num_rows($result_ind_all_fee))==0){
				echo "<tr>No Fee details to display</tr>"; 
				}
				else if((mysqli_num_rows($result_ind_all_fee))>0)
				{
				
				?>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Fee Amount</th>
				<th>Fee Towards</th>
				<th>Updated Date</th>
				
				</tr>
	<?php
	 $row_ind_count_fee=1;
	
	foreach($result_ind_all_fee as $row_all_ind_fee)
	{
	//$total_fee_paid+=$row_all_ind_fee["member_fee_amount"];
	$updated_ind_date= date('d-m-Y', strtotime( $row_all_ind_fee['updated_date'] ));
	?>
		<tr>
		<td><?php echo $row_ind_count_fee;?></td>
		
		<td><?php echo $row_all_ind_fee["adm_fee"];?></td>
		<td><?php echo $row_all_ind_fee["fee_towards"];?></td>
		<td><?php echo $updated_ind_date;?></td>
		
		
		</tr>
				
	<?php
				
	$row_ind_count_fee++; 
	}
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>
<!------------------------End Fee Student Fee details--------------------------->

<!------------------------------------------------------Start Fee paid details-------------------------------------------------------->
		    <hr><h3 style="font-weight:bold;color:GREEN;">FEE PAID DETAILS</h3>
			
		   <?php 
		  
		   $sql_set_fee="select sum(tot_paid) as total_paid,name,roll_no,rec_date,rec_no from student_fee where student_id='".$student_id."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
		   //var_dump($sql_ind_fee);
		   $result_set_fee=mysqli_query($conn,$sql_set_fee);
		    $row_count_fee =1;
			foreach($result_set_fee as $row_set_fee)
			{
				$tot_paid= $row_set_fee["total_paid"];
				//echo "<br> ".$tot_paid."<br>";
				
			}
		   ?>
		  <div class="row">
        <div class="col-sm-12">
		 <center>
		   <span style="color:green;font-weight:bold;font-size:16px;">Total Fee Paid : <?php echo $tot_paid;?></span>,
		   </center>
		         <?php 
			$sql_ind_fee="select * from student_fee where student_id='".$student_id."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
			$result_ind_fee=mysqli_query($conn,$sql_ind_fee);
			$row_count_fee =1;
			if(mysqli_num_rows($result_ind_fee)==0){
			echo "<tr>No Fee paid details to display</tr>"; 
			}
			else
			{
			?>
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Amount</th>
			</tr>
	<?php
	foreach($result_ind_fee as $row_tot_ind_fee)
	{
	$rec_date= date('d-m-Y', strtotime( $row_tot_ind_fee['rec_date'] ));
	?>
				<tr>
				<td><?php echo $row_count_fee;?></td>
				<td><?php echo $rec_date;?></td>
				<td><?php echo $row_tot_ind_fee["rec_no"];?></td>
				<td><?php echo $row_tot_ind_fee["tot_paid"];?></td>
				
				</tr>
				
	<?php
				
	$row_count_fee++; 
	}
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>
		<!--------------------------------------------------End Fee paid details----------------------------------------------------------->
	</div>
	</div>
	</center>

<?php
	}			
}
else
{
header("Location:login.php");
}
?>  	