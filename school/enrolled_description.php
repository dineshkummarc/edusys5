<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
//$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$id = $_GET["id"];
				//////////////////////////////////////////////////////
				$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
				$result=mysqli_query($conn,$sql);
				if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					$sch_name=$row["sch_name"];
					$location=$row["location"];
					$city=$row["location"];
					$mob=$row["mob"];
					$district=$row["district"];
					$pin=$row["pin"];
					$state=$row["state"];
					$email=$row["email"];
					$web=$row["web"];
					$phone=$row["phone"];
					
				}
				//////////////////////////////////////////////////////////////
	$sql="select * from enrolled_students where id='".$id."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$applied_date= date('d-m-Y', strtotime( $row['applied_date'] ));
		$tc_date= date('d-m-Y', strtotime( $row['tc_date'] ));
		$admis_date= date('d-m-Y', strtotime( $row['admis_date'] ));
		$fee_receipt_date= date('d-m-Y', strtotime( $row['fee_receipt_date'] ));
		
	
	
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
	
	 <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('income')">Print</button> 
	 
	 <div class="panel panel-default" id="income" style="width:100%;">
	
      <div class="panel-heading">
	   <center><h1 style="color:red;"><?php echo $sch_name;?></h1>
	  <p style="color:blue;font-size:18px;border-bottom:1px solid black;"><?php echo $location;?> , <?php echo $city;?> , <?php echo $district;?> - <?php echo $pin;?> , <?php echo $state;?> , <br>
	  Phone : <?php echo $phone;?> , Mob : <?php echo $mob;?><br> 
	  Email : <?php echo $email;?> , web : <?php echo $web;?>
	  <br></p>
	
	  </div>
		  <div class="panel-body" >
			<center>
			<h4 style="color:red;">Student Name: <?php echo $row["first_name"];?> , Enrollment No: <?php echo $row["st_enroll_no"];?></h4>				
			 <div class="table-responsive"> 
			<table class="table table-bordered table-hover table-striped">

					<tbody>
					  <tr>
						<td style="width:15%;">Admission to Class & Academic Year</td>
						<td style="color:blue;width:25%;"><?php echo $row['admit_to_class'];?><br>Academic Year : <?php echo $row['academic_year'];?></td>
						<td style="width:15%;">Semester</td>
						<td style="color:blue;width:25%;"><?php echo $row['semister'];?></td>
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Stream</td>
						<td style="color:blue;width:25%;"><?php echo $row['stream'];?></td>
						<td style="width:15%;">Medium of Instructions</td>
								<td style="color:blue;width:25%;"><?php 
								echo $row['medium'];
								if($row['other_medium']!=""){
								echo "<br>".$row['other_medium'];	
								}
								?>
								</td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Mother Tongue</td>
						<td style="color:blue;width:25%;">
							<?php 
							echo $row['mother_tongue'];
							if($row['other_mother_tongue']!=""){
							echo "<br>".$row['other_mother_tongue'];	
							}
						?></td>
						<td style="width:15%;">Previous School Affliation</td>
						<td style="color:blue;width:25%;">
							<?php 
							echo $row['prev_affi'];
							if($row['other_affiliation']!=""){
							echo "<br>".$row['other_affiliation'];	
							}
				
						?></td>
					</tr>
					
					   <tr>
						<td style="width:15%;">Tc No</td>
						<td style="color:blue;width:25%;"><?php echo $row['tc_no'];?></td>
						<td style="width:15%;">TC Date</td>
						<td style="color:blue;width:25%;"><?php echo $tc_date;?></td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Previous School Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['prev_sch_name'];?></td>
						<td style="width:15%;">Previous School Type</td>
						<td style="color:blue;width:25%;"><?php echo $row['prev_sch_type'];?></td>
						</tr>
					  
					  <tr>
						<td style="width:15%;">PIN</td>
						<td style="color:blue;width:25%;"><?php echo $row['pin'];?></td>
						<td style="width:15%;">District</td>
						<td style="color:blue;width:25%;"><?php echo $row['district'];?></td>
						</tr>
					 
					  
					  <tr>
						<td style="width:15%;">Taluk</td>
						<td style="color:blue;width:25%;"><?php echo $row['taluk'];?></td>
						<td style="width:15%;">City</td>
						<td style="color:blue;width:25%;"><?php echo $row['city'];?></td>
						</tr>
						
					  <tr>
						<td style="width:15%;">Previous School Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['prev_sch_address'];?></td>
						<td style="width:15%;">First Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['first_name'];?></td>
					</tr>
					
					<tr>
						<td style="width:15%;">Middle Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['middle_name'];?></td>
						<td style="width:15%;">Last Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['last_name'];?></td>
					</tr>
					
					<tr>
						<td style="width:15%;">Father First Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['f_first_name'];?></td>
						<td style="width:15%;">Father Middle Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['f_middle_name'];?></td>
					</tr>
					
					 <tr>
						<td style="width:15%;">Father Last Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['f_last_name'];?></td>
						<td style="width:15%;">Mother First Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['m_first_name'];?></td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Mother Last Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['m_last_name'];?></td>
						<td style="width:15%;">Father Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['f_adhaar_no'];?></td>
					</tr>
					 
					<tr>
						<td style="width:15%;">Mother Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['m_adhaar_no'];?></td>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $dob;?></td>
					</tr>
					 
					 <tr>
						<td style="width:15%;">Age appropriation Reason</td>
						<td style="color:blue;width:25%;"><?php echo $row['age_appro'];?></td>
						<td style="width:15%;">Student Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['stud_adhaar'];?></td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Urban / Rural</td>
						<td style="color:blue;width:25%;"><?php echo $row['urban_rural'];?></td>
						<td style="width:15%;">Sex</td>
						<td style="color:blue;width:25%;"><?php echo $row['sex'];?></td>
					</tr>
					 
					   <tr>
						<td style="width:15%;">Religion</td>
						<td style="color:blue;width:25%;">
								<?php 
								echo $row['religion'];
								if($row['other_religion']!=""){
								echo "<br>".$row['other_religion'];	
								}
								?></td>
						<td style="width:15%;">Caste & Certificate No</td>
						<td style="color:blue;width:25%;"><?php echo $row['caste']."<br>".$row['cast_cert_no'];?></td>
					</tr>
					
					 <tr>
						<td style="width:15%;">Father Caste</td>
						<td style="color:blue;width:25%;"><?php echo $row['f_caste'];?></td>
						<td style="width:15%;">Mother Caste</td>
						<td style="color:blue;width:25%;"><?php echo $row['m_caste'];?></td>
					</tr>
					
					 <tr>
						<td style="width:15%;">Father Caste Certificate No</td>
						<td style="color:blue;width:25%;"><?php echo $row['f_cast_cert_no'];?></td>
						<td style="width:15%;">Mother Caste Certificate No</td>
						<td style="color:blue;width:25%;"><?php echo $row['m_cast_cert_no'];?></td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Social Category</td>
						<td style="color:blue;width:25%;"><?php echo $row['social_cat'];?></td>
						<td style="width:15%;">Belong to BPL</td>
						<td style="color:blue;width:25%;"><?php echo $row['bpl'];?></td>
					</tr>
					
					   <tr>
						<td style="width:15%;">BPL No</td>
						<td style="color:blue;width:25%;"><?php echo $row['bpl_no'];?></td>
						<td style="width:15%;">Bhagyalakshmi Bond No</td>
						<td style="color:blue;width:25%;"><?php echo $row['bhagya_bond_no'];?></td>
					</tr>
					
					<tr>
						<td style="width:15%;">Disability Child</td>
						<td style="color:blue;width:25%;"><?php echo $row['disabil'];?></td>
						<td style="width:15%;">Special Category</td>
						<td style="color:blue;width:25%;">
								<?php 
								echo $row['spec_cat'];
								if($row['other_spec_cat']!=""){
								echo "<br>".$row['other_spec_cat'];	
								}
								?></td>
					</tr>
					 
					 <tr>
						<td style="width:15%;">PIN</td>
						<td style="color:blue;width:25%;"><?php echo $row['st_pin'];?></td>
						<td style="width:15%;">District</td>
						<td style="color:blue;width:25%;"><?php echo $row['st_district'];?></td>
					</tr>
					 
					  <tr>
						<td style="width:15%;">Taluk</td>
						<td style="color:blue;width:25%;"><?php echo $row['st_taluk'];?></td>
						<td style="width:15%;">City / Village / Town</td>
						<td style="color:blue;width:25%;"><?php echo $row['st_city'];?></td>
					</tr>
					 
					   <tr>
						<td style="width:15%;">Locality</td>
						<td style="color:blue;width:25%;"><?php echo $row['st_locality'];?></td>
						<td style="width:15%;">Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['st_address'];?></td>
					</tr>
					
					<tr>
						<td style="width:15%;">Student Mobile No </td>
						<td style="color:blue;width:25%;"><?php echo $row['st_mobile'];?></td>
						<td style="width:15%;">Student Email ID</td>
						<td style="color:blue;width:25%;"><?php echo $row['st_email'];?></td>
					</tr>
					
					 <tr>
						<td style="width:15%;">Father Mobile No </td>
						<td style="color:blue;width:25%;"><?php echo $row['f_mobile'];?></td>
						<td style="width:15%;">Father Email ID</td>
						<td style="color:blue;width:25%;"><?php echo $row['f_email'];?></td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Mother Mobile No </td>
						<td style="color:blue;width:25%;"><?php echo $row['m_mobile'];?></td>
						<td style="width:15%;">Mother Email ID</td>
						<td style="color:blue;width:25%;"><?php echo $row['m_email'];?></td>
					</tr>
					
					 <tr>
						<td style="width:15%;">Student Enrollment No </td>
						<td style="color:blue;width:25%;"><?php echo $row['st_enroll_no'];?></td>
						<td style="width:15%;">Admission Date</td>
						<td style="color:blue;width:25%;"><?php echo $admis_date;?></td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Fee Amount Paid </td>
						<td style="color:blue;width:25%;"><?php echo $row['fee_paid_amount'];?></td>
						<td style="width:15%;">Receipt No & Date</td>
						<td style="color:blue;width:25%;"><?php echo $row['fee_receipt_no']." & ".$fee_receipt_date;?></td>
					</tr>
					 
					  <tr>
						<td style="width:15%;">Student / Parent's Name and Acc No </td>
						<td style="color:blue;width:25%;"><?php echo $row['bank_acc'];?></td>
						<td style="width:15%;">Bank IFSC code</td>
						<td style="color:blue;width:25%;"><?php echo $row['bank_ifsc'];?></td>
					</tr>
					 
					<tr>
						<td style="width:15%;">Data Entry operator name & Signature </td>
						<td style="color:blue;width:25%;"><?php echo $row['data_opera_name'];?></td>
						<td style="width:15%;">Applied Date</td>
						<td style="color:blue;width:25%;"><?php echo $applied_date;?></td>
					</tr>
					 
					 
					</tbody>
				  </table> 
				  </div>
				  
				  </center>
				  
			<p style="font-size:16px;font-weight:bold;">Parents Signature: ..............................</p>	<br>   
			<p style="font-size:16px;font-weight:bold;">Student Signature: ..............................</p>	   
			<p style="font-size:16px;font-weight:bold;text-align:right;">Principal Signature: .........................................</p>	   

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