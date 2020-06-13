<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");

//////////////////////////////////////Start of Searched variables /////////////////////////////////////////////////
if(isset($_GET["search_student"])){
	$searched=$_GET["typeahead"];
	
	$searched_array=explode(",",$searched);
	$first_name=$searched_array[0];
	$present_class=$searched_array[1];
	$roll_no=$searched_array[2];
	
}else{
////////////////////////////////////// End of Searched variables ///////////////////////////////////////////////////
$first_name=$_GET["first_name"];
$roll_no=$_GET["roll_no"];
}



	
$sql_route="select route_name,stage_name from route_students where first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'";
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
	
$sql_van_fee="select van_fee from set_van_fee where route_name='".$route_name."' and stage_name='".$stage_name."'  and academic_year='".$cur_academic_year."'";
//var_dump($sql_route);
$result_van_fee=mysqli_query($conn,$sql_van_fee);
if($row_van_fee=mysqli_fetch_array($result_van_fee,MYSQLI_ASSOC))
	{
	$total_van_fee=$row_van_fee["van_fee"];
	}else{
	$total_van_fee="";
	}
	
	
	$sql_student_van_fee="select * from student_van_fee where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";
	$result_student_van_fee=mysqli_query($conn,$sql_student_van_fee);
	foreach($result_student_van_fee as $row_student_van_fee)
	{
	$total_van_fee_paid+=$row_student_van_fee["van_fee"];
	}

	$van_fee_balance=$total_van_fee-$total_van_fee_paid;
	
	

	$sql="select * from students where first_name='".$first_name."' and  roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'";
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$dob= date('d-m-Y', strtotime( $row['dob'] ));
	$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$class=$row["present_class"];
	$section=$row["section"];
	$student_type=$row["student_type"];
	
	$adm_fee_blance=$row["tot_admis_fee"]-$row["tot_admis_paid"];
	$cca_fee_blance=$row["tot_cca_fee"]-$row["tot_cca_paid"];
	//$van_fee_blance=$row["tot_van_fee"]-$row["tot_van_paid"];
	$books_fee_blance=$row["tot_books_fee"]-$row["tot_books_paid"];
	$uniform_fee_blance=$row["tot_uniform_fee"]-$row["tot_uniform_paid"];
	$shoe_fee_blance=$row["tot_shoe_fee"]-$row["tot_shoe_paid"];
	$software_fee_blance=$row["tot_software_fee"]-$row["tot_software_paid"];
	
	$sql_fee_set = "select * from set_fee where class='".$class."' and academic_year='".$cur_academic_year."'";
	$result_fee_set=mysqli_query($conn,$sql_fee_set);
	if($row_fee_set=mysqli_fetch_array($result_fee_set,MYSQLI_ASSOC)){
		$fee_set = $row_fee_set["adm_fee"];
	}
	
	$sql_individ_fee_set = "select * from set_fee where first_name= '".$first_name."' and roll_no= '".$roll_no."' and class='".$class."' and academic_year='".$cur_academic_year."'";
	$result_indi_fee_set=mysqli_query($conn,$sql_individ_fee_set);
	
	foreach($result_indi_fee_set as $row_indi_fee_set){
		$individual_fee_set += $row_indi_fee_set["adm_fee"];
	}
	
	$sql_fee_paid = "select * from student_fee where name='".$first_name."' and roll_no='".$roll_no."' and class='".$class."' and academic_year='".$cur_academic_year."'";
	$result_fee_paid=mysqli_query($conn,$sql_fee_paid);
	/* if($row_fee_paid=mysqli_fetch_array($result_fee_paid,MYSQLI_ASSOC)){
		$fee_set_paid = $row_fee_paid["tot_paid"];
	} */
	foreach($result_fee_paid as $row_fee_paid){
		$fee_set_paid += $row_fee_paid["tot_paid"];
	}
	$fee_blance=($fee_set + $individual_fee_set)-$fee_set_paid;
	?>
	<head>
		<script>
function goBack() {
    window.history.back();
}
</script>
	<script>
function printIncome(income) {
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
      <div class="panel-heading"><center>Student Details , Name: <?php echo $row["first_name"];?> <a href="<?php echo 'upd_register.php?id='.$row['id']; ?>" title="Edit">  <span style="color:yellow;">  Edit info <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </a></span></center>
	 
	<table class="table ">
	<tr>
	<td><button onclick="goBack()" class="btn btn-default">Go Back</button> </td>
	<td> 
	
	<?php 
	if($student_type==""){
	?>
	<a href="<?php echo 'student_fee.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> School Fee</span></a>
	<?php	
	}else if($student_type=="rte"){
	?>
	<a href="<?php echo 'student_adm_fee.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Collect RTE fee</span></a>
	<?php	
	}else if($student_type=="staff children"){
	?>
	<a href="<?php echo 'student_cca_fee.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Collect Teacher Children Fee</span></a>
	<?php	
	}
	?>
	
	
	</td>
	<td> <a href="<?php echo 'add_remarks.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&class='.$row['present_class'].'&section='.$row['section'];?>"><span style="color:#fff;"><i class="fa fa-check" aria-hidden="true"></i> Add Remarks</span></a></td>
		<td><a href="<?php echo 'gate_pass.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'].'&section='.$row['section'];?>"><span style="color:#fff;"><i class="fa fa-id-card-o" aria-hidden="true"></i> Issue Gate Pass</span></a></td>
	<td><a href="<?php echo 'certificates.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'];?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Certificate</span></a></td>
	
	</tr>
	<tr>
	<td> <a href="<?php echo 'selectexam.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>">  <span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Hall Ticket</span></a> </td>
	<td> <a href="<?php echo 'marks_card.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'];?>" ><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Marks Card</span></a> </td>
	<td>  <a href="" onclick="printIncome('income')"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print</span></a> </td>
	<td> <a href="<?php echo 'individual_set_fee.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&class='.$row['present_class'].'&section='.$row['section'];?>"><span style="color:#fff;"><i class="fa fa-check" aria-hidden="true"></i> Add Individual Fee</span></a></td>
	<td></td>
	</tr>
	

	</table>
	  </div>
		  <div class="panel-body" id="income">
				<center>
					<?php if(($row["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?><br>
				
				 
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
						<td style="color:blue;width:25%;"><?php echo $join_date;?></td>
						<td style="width:15%;">Blood Group</td>
						<td style="color:blue;width:25%;"><?php echo $row['blood'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Gender</td>
						<td style="color:blue;width:25%;"><?php echo $row['sex'];?></td>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $dob;?></td>
						
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
	<td style="width:15%;">School Fee<br> Other Individual Fee</td>
	<td style="color:blue;width:25%;"><?php echo $fee_set;?><br><?php echo $individual_fee_set;?></td>
	<td style="width:15%;">School Fee Paid</td>
	<td style="color:blue;width:25%;"><?php echo $fee_set_paid;?></td>
	</tr>
	<tr>
	<td style="width:15%;">School Fee Balance</td>
	<td style="color:blue;width:25%;"><?php echo $fee_blance;?></td>
	<td style="width:15%;">Total Van Fee<br><span style="color:green;">Van Fee Paid</span><br><span style="color:red;">Van Fee Balance</span></td>
	<td style="color:blue;width:25%;"><?php echo $total_van_fee;?><br><span style="color:green;"><?php echo $total_van_fee_paid;?></span><br><span style="color:red;"><?php echo $van_fee_balance;?></span></td>
	</tr>
<?php						
  }else if($student_type=="rte"){
	
?>
<tr>
		<td style="width:15%;">RTE Fee Balance</td>
		<td style="color:blue;width:25%;"><?php echo $adm_fee_blance;?></td>
		<td style="width:15%;">Total Van Fee<br><span style="color:green;">Van Fee Paid</span><br><span style="color:red;">Van Fee Balance</span></td>
	<td style="color:blue;width:25%;"><?php echo $total_van_fee;?><br><span style="color:green;"><?php echo $total_van_fee_paid;?></span><br><span style="color:red;"><?php echo $van_fee_balance;?></span></td>
	</tr>
	
	<?php
	  }					
	  if($student_type=="staff children"){
	?>
	<tr>
		<td style="width:15%;">Staff Children Fee Balance</td>
		<td style="color:blue;width:25%;"><?php echo $cca_fee_blance;?></td>
		<td style="width:15%;">Total Van Fee<br><span style="color:green;">Van Fee Paid</span><br><span style="color:red;">Van Fee Balance</span></td>
	<td style="color:blue;width:25%;"><?php echo $total_van_fee;?><br><span style="color:green;"><?php echo $total_van_fee_paid;?></span><br><span style="color:red;"><?php echo $van_fee_balance;?></span></td>
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
  
   
<!------------------------------------------------------Start Attendance details------------------------------------------------->
<?php 
	}
$sql_tot="select att_date,first_name,roll_no,present_class,sum(att_count) as tot_att_count,present_class from attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."' group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			
			$first_name=$row_tot["first_name"];
			$roll_no=$row_tot["roll_no"];
			$present_class=$row_tot["present_class"];
			
		}	
				
		
		$sql_tot_att="select distinct att_date,present_class,sum(tot_class) as tot_class from attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		
		

?>
<div class="row">
        <hr><div class="col-sm-12">
		 <h3>Individual Fee Details</h3>
		  <div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Fee Amount</th>
				<th>Fee Towards</th>
				<th></th>
				</tr>
	<?php
	$indi_row_count_att=1;
	foreach($result_indi_fee_set as $row_indi_fee_set)
	{
	$first_name = $row_indi_fee_set["first_name"];
	$roll_no = $row_indi_fee_set["roll_no"];
	$class = $row_indi_fee_set["class"];
	?>
				<tr>
				<td style="text-align:center;"><?php echo $indi_row_count_att;?></td>
				
				<td style="text-align:center;"><?php echo $row_indi_fee_set["adm_fee"];?></td>
				<td style="text-align:center;"><?php echo $row_indi_fee_set["fee_towards"];?></td>
				<td>
				 <div class="btn-group">
					
				<a href="<?php echo 'delete_individual_set_fee.php?id='.$row_indi_fee_set['id'].'&first_name='.$first_name.'&roll_no='.$roll_no.'&class='.$class; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" aria-hidden="true" style="color:red;"></i></a>
				
			   </div>
				</td>
				</tr>
				
	<?php
				
	$indi_row_count_att++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div><div class="row">
        <hr><div class="col-sm-12">
		 <h3>Attendance Details</h3>
		  <div class="table-responsive"> 
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
	$row_count_att=1;
	foreach($result_tot as $row_tot)
	{
	//$att_date= date('d-m-Y', strtotime( $row['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	$per_tot_class=($row_tot["tot_att_count"]/$tot_class)*100;
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count_att;?></td>
				<td style="text-align:center;"><a href="<?php echo 'attendance_desc.php?name='.$row_tot["first_name"].'&roll_no='.$row_tot["roll_no"].'&present_class='.$row_tot["present_class"];?>"><?php echo $row_tot["first_name"];?></a></td>
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
				
	$row_count_att++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>

<!------------End of Attendance details----------->
	<!----------------Start of student Remarks-------->
		  <?php
		
					$sql_remarks="select * from remarks where first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."' order by id desc";
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
					  <th>Action</th>
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
					  <td><div class="btn-group">
						<a href="<?php echo 'edit_remarks.php?id='.$remarks['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
						<a href="<?php echo 'delete_remarks.php?id='.$remarks['id'].'&first_name='.$first_name.'&roll_no='.$roll_no; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
					   </div></td>
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
					  				  
					  
		<!----------Start Fee paid details--->
		    <hr><h3>Fee paid details</h3>
			
		   <?php 
		   
		   $sql_ind_fee="select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'  UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_adm_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_books_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_software_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_shoe_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_uniform_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' UNION ALL select id,roll_no,first_name,present_class,academic_year,rec_no,rec_date,van_fee from student_van_fee where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' UNION ALL select id,roll_no,name,class,academic_year,rec_no,rec_date,tot_paid from student_cca_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
		   
		   //var_dump($sql_ind_fee);
		   
		    $result_ind_fee=mysqli_query($conn,$sql_ind_fee);
		    $row_count_fee =1;
			$sql_tot="select sum(tot_paid) as paid_fee_tot from student_fee where name='".$first_name."'  and academic_year='".$cur_academic_year."' and roll_no='".$roll_no."'";
		   $result_tot=mysqli_query($conn,$sql_tot);
		if($row=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	{
		$paid_fee_tot=$row["paid_fee_tot"];
	}
	$sql_fee_tot="select adm_fee  from set_fee where class='".$class."'  and academic_year='".$cur_academic_year."' order by id desc limit 1";
	//var_dump($sql_fee_tot);
		$result_fee_tot=mysqli_query($conn,$sql_fee_tot);
		if($row_fee_tot=mysqli_fetch_array($result_fee_tot,MYSQLI_ASSOC))
	{
		$paid_fee_total=$row_fee_tot["adm_fee"];
	}else{
		$paid_fee_total=0;
	}
	$balance=$paid_fee_total-$paid_fee_tot;
		
		   ?>
		   <div class="row">
        <div class="col-sm-12">
		<!--
		<p style="color:blue;font-size:16px;">Total Fee : Rs <?php if($paid_fee_total==""){echo "0";}else{echo $paid_fee_total;}?>  ,<span style="color:green;font-size:16px;">Total Fee Paid : Rs <?php if($paid_fee_tot==""){echo "0";}else{echo $paid_fee_tot;}?></span>, <span style="color:red;font-size:16px;">Balance Fee : Rs <?php echo $balance;?></span></p>
		
		-->
		         <?php 
			if(mysqli_num_rows($result_ind_fee)==0){
			echo "<tr>No Fee paid details to display</tr>"; 
			}else{
			?>
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Amount</th>
				<th></th>
				
				</tr>
	<?php
	
	foreach($result_ind_fee as $row_tot_ind_fee)
	{
	$rec_date= date('d-m-Y', strtotime( $row_tot_ind_fee['rec_date'] ));
	$first_name= $row_tot_ind_fee["name"];
	$roll_no= $row_tot_ind_fee["roll_no"];
	$class= $row_tot_ind_fee["class"];
	
	?>
	<tr>
	<td style="text-align:center;"><?php echo $row_count_fee;?></td>
	<td style="text-align:center;"><?php echo $row_tot_ind_fee["name"];?></td>
	<td style="text-align:center;"><?php echo $row_tot_ind_fee["roll_no"];?></td>
	<td style="text-align:center;"><?php echo $rec_date;?></td>
	<td style="text-align:center;"><?php echo $row_tot_ind_fee["rec_no"];?></td>
	<td style="text-align:center;"><?php echo $row_tot_ind_fee["tot_paid"];?></td>
	<td>
	 <div class="btn-group">
	<a href="<?php echo 'edit_student_fee.php?id='.$row_tot_ind_fee['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>	
	<a href="<?php echo 'delete_student_fee.php?id='.$row_tot_ind_fee['id'].'&first_name='.$first_name.'&roll_no='.$roll_no.'&class='.$class; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" aria-hidden="true" style="color:red;"></i></a>
	
   </div>
	</td>
	
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
	</div>
	</div>
	</center>

<?php
require("footer.php");	
?>
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
<?php		
}
else
{
header("Location:login.php");
}
?>  	