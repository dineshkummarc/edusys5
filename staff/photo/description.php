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
	$id=$searched_array[0];
}else{
	$id=$_GET["id"];
}



$sql="select * from students where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$dob= date('d-m-Y', strtotime( $row['dob'] ));
	$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$class=$row["present_class"];
	$section=$row["section"];
	$first_name=$row["first_name"];
	$roll_no=$row["roll_no"];
	$student_type=$row["student_type"];
	$adm_fee_blance=$row["tot_admis_fee"]-$row["tot_admis_paid"];
	$cca_fee_blance=$row["tot_cca_fee"]-$row["tot_cca_paid"];
	//$van_fee_blance=$row["tot_van_fee"]-$row["tot_van_paid"];
	$books_fee_blance=$row["tot_books_fee"]-$row["tot_books_paid"];
	$uniform_fee_blance=$row["tot_uniform_fee"]-$row["tot_uniform_paid"];
	$shoe_fee_blance=$row["tot_shoe_fee"]-$row["tot_shoe_paid"];
	$software_fee_blance=$row["tot_software_fee"]-$row["tot_software_paid"];
	}
	


$sql_route="select route_name,stage_name from route_students where student_id='".$id."' and academic_year='".$cur_academic_year."'";
//var_dump($sql_route);

//$sql_route="select route_name,stage_name from route_students where id='".$id."'";
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
	}

	
$sql_student_van_fee="select * from student_van_fee where student_id='".$id."' and academic_year='".$cur_academic_year."'";
	$result_student_van_fee=mysqli_query($conn,$sql_student_van_fee);
	foreach($result_student_van_fee as $row_student_van_fee)
	{
	$total_van_fee_paid+=$row_student_van_fee["van_fee"];
	}
	$van_fee_balance=$total_van_fee-$total_van_fee_paid;
	

	
	
	$sql_fee_set = "select * from set_fee where class='".$class."' and academic_year='".$cur_academic_year."'";
	$result_fee_set=mysqli_query($conn,$sql_fee_set);
	if(mysqli_num_rows($result_fee_set)>0){
		foreach($result_fee_set as $row_fee_set){
			$class_fee += $row_fee_set["adm_fee"];
		}
	}

	
/*
	$sql_class_fee = "select adm_fee,fee_towards,class from set_fee where class='".$class."' and academic_year='".$cur_academic_year."'";
	$result_class_fee=mysqli_query($conn,$sql_class_fee);
	if(mysqli_num_rows($result_class_fee)>0){
	if($row_class_fee=mysqli_fetch_array($result_class_fee,MYSQLI_ASSOC)){
		$class_fee = $row_class_fee["adm_fee"];
	}
}
*/



	
	$sql_individ_fee_set = "select * from set_individual_fee where student_id= '".$id."'";
	$result_indi_fee_set=mysqli_query($conn,$sql_individ_fee_set);
	if(mysqli_num_rows($result_indi_fee_set)>0){
	foreach($result_indi_fee_set as $row_indi_fee_set){
		$individual_fee_set += $row_indi_fee_set["individual_fee"];
	}
}


	
	$sql_fee_paid = "select * from student_fee where student_id='".$id."'";
	$result_fee_paid=mysqli_query($conn,$sql_fee_paid);
	if(mysqli_num_rows($result_fee_paid)>0){
	foreach($result_fee_paid as $row_fee_paid){
		$fee_set_paid += $row_fee_paid["tot_paid"];
	}
}

$sql_ind_fee="select id,rec_no,rec_date,tot_paid,updated_on from student_fee where student_id='".$id."' and academic_year='".$cur_academic_year."' UNION ALL select id,rec_no,rec_date,tot_paid,updated_on from student_van_fee where student_id='".$id."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
		   


 $result_ind_fee=mysqli_query($conn,$sql_ind_fee);
 foreach($result_ind_fee as $row_paid_fee){
	 $total_paid_all_fee += $row_paid_fee["tot_paid"];  
 }

	//$fee_blance=($fee_set + $individual_fee_set)-$fee_set_paid;
	$fee_blance=($class_fee+$individual_fee_set)-$total_paid_all_fee;



	?>
	<head>
		<script>
function goBack() {
    window.history.back();
}
</script>
	<script>
function printProfile(profile) {
     var printContents = document.getElementById('profile').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
	</head>
	<br>
	
	<?php 
	if(isset($_GET["success"])=="success"){ ?>
	<center>
	<div class="alert alert-success" role="alert">
  ID Card Generated Successfully.Check Below to view your ID Card.
</div>
	</center>
	<?php } ?>
	
	 <center><div class="panel panel-primary" style="width:80%;">
      <div class="panel-heading"><center>Student Details , Name: <?php echo $row["first_name"];?> <a href="<?php echo 'upd_register.php?id='.$row['id']; ?>" title="Edit">  <span style="color:yellow;">  Edit info <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </a></span></center>
	 
	<table class="table ">
	<tr>
	<td><button onclick="goBack()" class="btn btn-default">Go Back</button> </td>
	<td> 
	

	<a href="<?php echo 'student_fee.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Collect School Fee</span></a>
	
	
	
	</td>
	<td> <a href="<?php echo 'add_remarks.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-check" aria-hidden="true"></i> Add Achievements / Remarks</span></a></td>
		<td><a href="<?php echo 'gate_pass.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-id-card-o" aria-hidden="true"></i> Issue Gate Pass</span></a></td>
	<td><!--<a href="<?php echo 'certificates.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Certificate</span></a>---></td>
	
	</tr>
	<td> <a href="<?php echo 'study_certificate.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Study Certificate</span></a></td>
	<td> <a href="<?php echo 'conduct_certificate.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Conduct Certificate</span></a></td>
	<td><a href="<?php echo 'upload_photo.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Upload Student Photo</span></a></td>
	<td><a href="<?php echo 'idcard.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Generate Student ID Card</span></a></td>
	<td></td>
	<tr>


	</tr>
	<tr>
	<td> <a href="<?php echo 'selectexam.php?id='.$id;?>">  <span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Hall Ticket</span></a> </td>
	<td> <a href="<?php echo 'marks_card.php?id='.$id;?>" ><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Marks Card</span></a> </td>
	<td>  <a href="" onclick="printProfile('profile')"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print</span></a> </td>
	<td> <a href="<?php echo 'individual_set_fee.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-check" aria-hidden="true"></i> Add Individual Fee</span></a></td>

	</tr>

	<tr>
	<td><a href="<?php echo 'certificate_register.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-certificate" aria-hidden="true"></i> Generate Certificate</span></a></td>
	<td><a href="<?php echo 'send_individual_noti.php?id='.$id;?>"><span style="color:#fff;"><i class="fa fa-certificate" aria-hidden="true"></i> Send Individual Notifications</span></a></td>

	</tr>
	

	</table>
	  </div>
		  <div class="panel-body" id="profile">
				<center>
					<?php if(($row["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?><br>
				
				 
				 <div class="table-responsive"> 
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
					
					<tbody>
					  <tr>
						<td style="width:15%;">Student Name</td>
						<td style="color:blue;width:25%;"><span style="color:red;font-weight:bold;"><?php echo strtoupper($row['first_name']);?></td>
						<td style="width:15%;">Enrollment No</td>
						<td style="color:blue;width:25%;"><?php echo $row['roll_no'];?>
						
						
						</td>
					   
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
						<td style="color:blue;width:25%;"><?php echo strtoupper($row['present_class'])." , ".strtoupper($section);?></td>
						<td style="width:15%;">Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['adhaar_no'];?></td>
						
					  </tr>
					 
					  
					  <tr>
						<td style="width:15%;">Fahter Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['father_name'];?></td>
						<td style="width:15%;">Mother Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['mother_name'];?></td>
						
					  </tr>
					  

	<tr>
	<td style="width:15%;">School Fee<br> Other Individual Fee</td>
	<td style="color:blue;width:25%;">&#8377;<?php echo $class_fee;?><br>&#8377;<?php echo $individual_fee_set;?></td>
	<td style="width:15%;">School Fee Paid</td>
	<td style="color:blue;width:25%;color:green;font-weight:bold;">&#8377;<?php echo $total_paid_all_fee;?></td>
	</tr>
	<?php
	$fee_balance = ($class_fee+$individual_fee_set)-$total_paid_all_fee;
	?>
	<tr>
	<td style="width:15%;">School Fee Balance</td>
	<td style="color:blue;width:25%;color:red;font-weight:bold;">&#8377;<?php echo $fee_balance;?></td>
	<td style="width:15%;">Total Van Fee<br><span style="color:green;">Van Fee Paid</span><br><span style="color:red;">Van Fee Balance</span></td>
	<td style="color:blue;width:25%;"><?php echo $total_van_fee;?><br><span style="color:green;"><?php echo $total_van_fee_paid;?></span><br><span style="color:red;"><?php echo $van_fee_balance;?></span></td>
	</tr>

	<tr>
	<td style="width:15%;">Blood Group</td>
		<td style="color:blue;width:25%;"><?php echo $row['blood'];?></td>
		<td style="width:15%;">Route & Stage Name</td>
		<td style="color:blue;width:25%;"><?php echo $route_name;?><br><?php echo $stage_name;?></td>
	
	 </tr>
	 
	</tbody>
  </table> 
  </div>
  
  </center>


	<div class="row">
        <div class="col-sm-12" id="gatepass"><br>
				<h3>Student ID Card Generated</h3>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>ID Card</th>
				<th>Generated on</th>
				<th>Actions</th>
				
			
				
				</tr>
	<?php
	$sql_id_cards="select * from student_id_cards where  student_id='".$id."' ORDER BY id desc";
	$result_id_cards=mysqli_query($conn,$sql_id_cards);
	$row_count_id_card =1;
	foreach($result_id_cards as $row_id_cards)
	{
	$idcard_id=$row_id_cards["id"];
	$created_at= date('d-m-Y', strtotime( $row_id_cards['created_at'] ));
	
	
 ?>
				<tr>
				<td><?php echo $row_count_id_card;?></td>
				<td><?php echo $first_name;?></td>
				<td><a href="<?php echo $row_id_cards['photo_path'];?>" class="btn btn-sm btn-success">View ID Card</a></td>
				<td><?php echo $created_at;?></td>
				<td>
				 <a href="#" onclick="deleteStudentIdCard(<?php echo $idcard_id;?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </td>
				</tr>
			<script>
		  function deleteStudentIdCard(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_student_id_card.php?id='+id+'';
			  }
		  }
		  
		  </script>
				    
	<?php
				
	$row_count_id_card++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>


				<div class="row">
        <div class="col-sm-12" id="gatepass"><br>
				<h3>Received Certificates</h3>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Certificate</th>
				<th>Generated on</th>
				<th>Actions</th>
				
			
				
				</tr>
	<?php
	$sql_certificates="select * from certificates where  student_id='".$id."' ORDER BY id desc";
	$result_certificates=mysqli_query($conn,$sql_certificates);
	$row_certificates_count =1;
	foreach($result_certificates as $row_certificates)
	{
	$certificate_id=$row_certificates["id"];
	$created_at= date('d-m-Y', strtotime( $row_certificates['created_at'] ));
	
	
 ?>
				<tr>
				<td><?php echo $row_certificates_count;?></td>
				<td><?php echo $first_name;?></td>
				<td><a href="<?php echo $row_certificates['certificate_path'];?>" class="btn btn-sm btn-success">View Certificate</a></td>
				<td><?php echo $created_at;?></td>
				<td>
				 <a href="#" onclick="deleteCertificateCard(<?php echo $certificate_id;?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </td>
				</tr>
			<script>
		  function deleteCertificateCard(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_certficate_card.php?id='+id+'';
			  }
		  }
		  
		  </script>
				    
	<?php
				
	$row_count_id_card++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
  
   
<!-------------------Start Attendance details------------------->
<?php 

$sql_tot="select att_date,present_class,sum(att_count) as tot_att_count from attendance where present_class='".$class."' and student_id='".$id."' and academic_year='".$cur_academic_year."' group by student_id";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			
			$present_class=$row_tot["present_class"];
			
		}	
		
		
		$sql_tot_att="select distinct att_date,present_class,sum(tot_class) as tot_class from attendance where present_class='".$class."' and student_id='".$id."'  and academic_year='".$cur_academic_year."'  group by student_id";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		
?>

<div class="row">
        <hr><div class="col-sm-12">
		 <h3>School Fee Details</h3>
		  <div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Fee Amount</th>
				<th>Fee Towards</th>
				</tr>
	<?php
	$class_fee_row_count=1;
	foreach($result_fee_set as $row_fee_set)
	{
	$class_fee_list = $row_fee_set["adm_fee"];
	$total_student_fee += $row_fee_set["adm_fee"];
	?>
				<tr>
				<td><?php echo $class_fee_row_count;?></td>
				
				<td>&#8377;<?php echo $class_fee_list;?></td>
				<td><?php echo $row_fee_set["fee_towards"];?></td>
				</tr>
				
	<?php
				
	$class_fee_row_count++; 
	}
	
	?>
		<tr><span style="font-weight:bold;color:red;">Total School Fee &#8377;<?php echo $total_student_fee;?></span></tr>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>


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
	$indi_fee_id = $row_indi_fee_set["id"];
	$total_individual_fee += $row_indi_fee_set["individual_fee"];
	?>
				<tr>
				<td><?php echo $indi_row_count_att;?></td>
				
				<td>&#8377;<?php echo $row_indi_fee_set["individual_fee"];?></td>
				<td><?php echo $row_indi_fee_set["fee_towards"];?></td>
				<td>
				 <div class="btn-group">
				 <a href="<?php echo 'edit_individual_set_fee.php?id='.$indi_fee_id; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>	
				
				<a href="#" onclick="deleteIndiFee(<?php echo $indi_fee_id;?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
	</tr>
	<script>
		  function deleteIndiFee(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_indi_set_fee.php?id='+id+'';
			  }
		  }
		  
		  </script>
				</td>
				</tr>
				
	<?php
				
	$indi_row_count_att++; 
	}
	
	?>
	<tr><span style="font-weight:bold;color:red;">Total Individual Fee &#8377;<?php echo $total_individual_fee;?></span></tr>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>
				
				
				<div class="row">
        <hr><div class="col-sm-12">
		 <h3>Attendance Details</h3>
		  <div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Details</th>
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
				<td><?php echo $row_count_att;?></td>
				<td style="color:blue;"><a href="<?php echo 'attendance_desc.php?student_id='.$id;?>">View Details</a></td>
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
				
	$row_count_att++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>

<!------------End of Attendance details----------->

<div class="row">
        <div class="col-sm-12" id="gatepass"><br>
				<h3>Gate Pass Issued</h3>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Reason</th>
				<th>Permitted to go</th>
				<th>With</th>
				<th>Issued Date & Time</th>
				<th>Actions</th>
				
			
				
				</tr>
	<?php
	$sql_gate="select * from gate_pass where academic_year='".$cur_academic_year."' and student_id='".$id."' ORDER BY id desc";
	$result_gate=mysqli_query($conn,$sql_gate);
	$row_count =1;
	foreach($result_gate as $row_gate)
	{
	$gate_id=$row_gate["id"];
	$created_at= date('d-m-Y', strtotime( $row_gate['created_at'] ));
	
	$student_id=$row_gate["student_id"];
	
 ?>
				<tr>
				<td><?php echo $row_count;?></td>
				<td><?php echo $row_gate["gate_reason"];?></td>
				<td><?php echo $row_gate["gate_permit_go"];?></td>
				<td><?php echo $row_gate["gate_with"];?></td>
				<td><?php echo $created_at;?></td>
				
                <td><div class="btn-group">
				<a href="<?php echo 'edit_gate_pass.php?id='.$gate_id; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>

				 
				 <a href="#" onclick="deleteGatePass(<?php echo $gate_id;?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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


	<!----------------Start of student Remarks-------->
		  <?php
		
					$sql_remarks="select * from remarks where student_id='".$id."' order by id desc";
					$result_remarks=mysqli_query($conn,$sql_remarks);
					//var_dump($sql_remarks);
					  ?>
					     <div class="row">
        <div class="col-sm-12">
			 <hr><div class="table-responsive"> 
			 <h3>Student Achievements / Remarks</h3>
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
                       <?php 
					  if(mysqli_num_rows($result_remarks)==0){
						echo "<tr>No Remarks to display</tr>"; 
					  }else{
					?>
					  <tr> 
					  <th>SL No</th>
					  <th>Title</th>
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
					
						

						 <a href="#" onclick="deleteRemarks(<?php echo $remarks['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
				</tr>
			<script>
		  function deleteRemarks(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_remarks.php?id='+id+'';
			  }
		  }
		  
		  </script>
			
					
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
		$row_count_fee =1;
		$sql_tot="select * from student_fee where student_id='".$id."'";
		$result_tot=mysqli_query($conn,$sql_tot);
	

		//var_dump($sql_tot);

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
			if(mysqli_num_rows($result_tot)==0){
			echo "<tr>No Fee paid details to display</tr>"; 
			}else{
			?>
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Amount</th>
				<th></th>
			</tr>
	<?php
	
	foreach($result_tot as $row_tot_ind_fee)
	{
		$total_paid_fee += $row_tot_ind_fee["tot_paid"];
	$rec_date= date('d-m-Y', strtotime( $row_tot_ind_fee['rec_date'] ));
	$updated_on= date('d-m-Y', strtotime( $row_tot_ind_fee['updated_on'] ));
	?>
	<tr>
	<td><?php echo $row_count_fee;?></td>
	<td><?php echo $rec_date;?><br><small>Updated on: <?php echo $updated_on;?></small></td>
	<td><?php echo $row_tot_ind_fee["rec_no"];?></td>
	<td>&#8377;<?php echo $row_tot_ind_fee["tot_paid"];?></td>
	<td>
	<div class="btn-group">
	<a href="<?php echo 'edit_student_fee.php?id='.$row_tot_ind_fee['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>	
	<a href="#" onclick="deleteStudentFeePaid(<?php echo $row_tot_ind_fee['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	
   </div>
       </td>
				</tr>
			<script>
		  function deleteStudentFeePaid(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_student_fee.php?id='+id+'';
			  }
		  }
		  
		  </script>
	
				
	<?php
				
	$row_count_fee++; 
	} ?>
<tr><span style="font-weight:bold;color:green;">Total Paid Fee &#8377;<?php echo $total_paid_fee;?></span></tr>
	<?php

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