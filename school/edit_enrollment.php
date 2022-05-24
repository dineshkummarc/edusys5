<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

$id = $_GET["id"];

	$sql="select * from enrolled_students where id='".$id."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$applied_date= date('d-m-Y', strtotime( $row['applied_date'] ));
		$tc_date= date('d-m-Y', strtotime( $row['tc_date'] ));
		$admis_date= date('d-m-Y', strtotime( $row['admis_date'] ));
		
	}
	
	?>
<head>

<script type="text/javascript">
function CheckMedium(val){
 var element=document.getElementById('other_medium');
 if(val==='OTHER MEDIUM')
   element.style.display='block';
 else  
   element.style.display='none';
}

function CheckMotherTongue(val){
 var element=document.getElementById('other_mother_tongue');
 if(val==='OTHER MOTHER TONGUE')
   element.style.display='block';
 else  
   element.style.display='none';
}
function CheckAffiliation(val){
 var element=document.getElementById('other_affiliation');
 if(val==='OTHER AFFILIATION')
   element.style.display='block';
 else  
   element.style.display='none';
}

function CheckReligion(val){
 var element=document.getElementById('other_religion');
 if(val==='OTHER RELIGION')
   element.style.display='block';
 else  
   element.style.display='none';
}

function CheckSpecialCat(val){
 var element=document.getElementById('other_spec_cat');
 if(val==='OTHER SPECIAL CATEGORY')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 


</head>
<div class="container-fluid"><br>
<div class="row">

 <form action="update_enrollment.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6">
	  
	<div class="panel panel-primary">
		
	  <div class="panel-body">
	  <h2 style="color:red;">Student Admission Form</h2>
			
		<h3 style="color:blue;text-decoration:underline;">Admission Details</h3>


		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Academic Year</label>
		  <select class="form-control" name="academic_year"  id="sel1">
			<option value="<?php echo $row['academic_year'];?>"><?php echo $row['academic_year'];?></option>
			<option value="2021-2022">2021-2022</option>
		</select>
		</div>
		
		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>1.Admission to Class</label>
		  <select class="form-control" name="admit_to_class">
			<option value="<?php echo $row['admit_to_class'];?>"><?php echo $row['admit_to_class'];?></option>
			<option value="PREKG">PreKG</option>
			<option value="LKG">LKG</option>
			<option value="UKG">UKG</option>
			 <option value="1st STANDARD">I Standard</option>
			<option value="2nd STANDARD">II Standard</option>
			  <option value="3rd STANDARD">III Standard</option>
			  <option value="4th STANDARD">IV Standard</option>
			  <option value="5th STANDARD">V Standard</option>
			  <option value="6th STANDARD">VI Standard</option>
			  <option value="7th STANDARD">VII Standard</option>
			  <option value="8th STANDARD">VIII Standard</option>
			   <option value="9th STANDARD">IX Standard</option>
			  <option value="10th STANDARD">X Standard</option>
			  <option value="1st PUC ARTS">I PUC Arts</option>
			  <option value="2nd PUC COMMERCE">I PUC Commerce</option>
			  <option value="1st PUC SCIENCE">I PUC Science</option>
			  <option value="2nd PUC ARTS">II PUC Arts</option>
			  <option value="2nd PUC COMMERCE">II PUC Commerce</option>
			  <option value="2nd PUC SCIENCE">II PUC Science</option>
		 </select>
		</div>
		
	<!-- 	<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>2.Select Semester:</label>
		  <select class="form-control" name="semister"  id="sel1">
			<option value="<?php echo $row['semister'];?>"><?php echo $row['semister'];?></option>
			<option value="SEMISTER I">Semister I</option>
			<option value="SEMISTER II">Semister II</option>
		</select>
		</div>

		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>3.Stream</label>
		  <select class="form-control" name="stream">
			<option value="<?php echo $row['stream'];?>"><?php echo $row['stream'];?></option>
			<option value="NA">NA</option>
			<option value="COMMERCE">Commerce</option>
			<option value="VOCATIONAL">Vocational</option>
			<option value="SCIENCE">Science</option>
			<option value="ARTS">Arts</option>
		</select>
		</div> -->
		<input type="hidden" value="<?php echo $id;?>" name="id">
		<div class="form-group">
			<label for="sel1"><span style="color:red;font-size:18px;">*</span>4.Medium of Instructions</label>
			<select class="form-control" name="medium" onchange='CheckMedium(this.value);'>
			<option value="<?php echo $row['medium'];?>"><?php echo $row['medium'];?></option>
			<option value="KANNADA">Kannada</option>
			<option value="HINDI">Hindi</option>
			<option value="URDU">Urdu</option>
			<option value="ENGLISH">English</option>
			<option value="MARATHI">Marathi</option>
			<option value="TAMIL">Tamil</option>
			<option value="TELUGU">Telugu</option>
			<option value="OTHER MEDIUM">Others</option>
			</select>
			</div>

				<div class="form-group">
				<input type="text" class="form-control" placeholder="Enter Medium here" name="other_medium" id="other_medium" style='display:none;'/>
			</div>

						<div class="form-group">
						  <label for="sel1"><span style="color:red;font-size:18px;">*</span>5.Mother Tongue</label>
						  <select class="form-control" name="mother_tongue" onchange='CheckMotherTongue(this.value);'>
							<option value="<?php echo $row['mother_tongue'];?>"><?php echo $row['mother_tongue'];?></option>
							<option value="KANNADA">Kannada</option>
							<option value="HINDI">Hindi</option>
							<option value="URDU">Urdu</option>
							<option value="ENGLISH">English</option>
							<option value="MARATHI">Marathi</option>
							<option value="TAMIL">Tamil</option>
							<option value="TELUGU">Telugu</option>
							<option value="OTHER MOTHER TONGUE">Others</option>
							</select>
							</div>
							
							<div class="form-group">
							 <input type="text" class="form-control" placeholder="Enter Mother Tongue here" name="other_mother_tongue" id="other_mother_tongue" style='display:none;'/>
							</div>
		
		<h3 style="color:blue;text-decoration:underline;">Previous School details (if applicable)</h3>

							<div class="form-group">
							  <label for="sel1"><span style="color:red;font-size:18px;">*</span>6.Previous School Affiliation:</label>
							  <select class="form-control" name="prev_affi" onchange='CheckAffiliation(this.value);'>
								<option value="<?php echo $row['prev_affi'];?>"><?php echo $row['prev_affi'];?></option>
								<option value="STATE">State</option>
								<option value="CBSE">CBSE</option>
								<option value="ICSE">ICSE</option>
								<option value="OTHER AFFILIATION">Other</option>
							</select>
							</div>
							<div class="form-group">
							 <input type="text" class="form-control" placeholder="Enter Affiliation here" name="other_affiliation" id="other_affiliation" style='display:none;'/>
							</div>
		
		<div class="form-group">
		<label>7.TC No</label>
		  <input type="text" placeholder="Transfer Certificate No" value="<?php echo $row['tc_no'];?>" name="tc_no"  class="form-control">
		</div>
		
		<div class="form-group">
		<label>8.TC Date</label>
		  <input type="date" placeholder="Transfer Certificate Date" value="<?php echo $row['tc_date'];?>" name="tc_date"  class="form-control">
		</div>
		
		<div class="form-group">
		<label>9.Previous School Name</label>
		  <input type="text" placeholder="Previous School Name" <?php echo $row['prev_sch_name'];?> name="prev_sch_name"  class="form-control">
		</div>	

		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>10.Previous School Type:</label>
		  <select class="form-control" name="prev_sch_type">
			<option value="<?php echo $row['prev_sch_type'];?>"><?php echo $row['prev_sch_type'];?></option>
			<option value="GOVERNMENT SCHOOL">Government School</option>
			<option value="PRIVATE AIDDED SCHOOL">Private aidded School</option>
			<option value="LOCAL BODIES">Local Bodies</option>
			<option value="PRIVATE UNAIDDED SCHOOL">Private unaidded School</option>
		</select>
		</div>
		
		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>11.PIN Code</label>
		  <input type="text" placeholder="PIN Code" value="<?php echo $row['pin'];?>" name="pin"  class="form-control">
		</div>	
		
		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>12.District</label>
		  <input type="text" placeholder="District" value="<?php echo $row['district'];?>" name="district"  class="form-control">
		</div>

		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>13.Taluk</label>
		  <input type="text" placeholder="Taluk" value="<?php echo $row['taluk'];?>" name="taluk"  class="form-control">
		</div>
		
		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>14.City/Village/Town</label>
		  <input type="text" placeholder="City/Village/Town" value="<?php echo $row['city'];?>" name="city"  class="form-control">
		</div>

		<div class="form-group">
	  <label for="usr"><span style="color:red;font-size:18px;">*</span>15.Previous School Address:</label>
	  <textarea rows="4" class="form-control"  name="prev_sch_address"><?php echo $row['prev_sch_address'];?></textarea>
	</div>
	
	<h3 style="color:blue;text-decoration:underline;">Student details</h3>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>16.Student Name</label>
	<div class="form-inline">
	  <input type="text" placeholder="First Name" value="<?php echo $row['first_name'];?>" name="first_name"  class="form-control">
	  <input type="text" placeholder="Middle Name" value="<?php echo $row['middle_name'];?>" name="middle_name"  class="form-control">
	  <input type="text" placeholder="Last Name" value="<?php echo $row['last_name'];?>" name="last_name"  class="form-control">
	</div>	
	</div>

	
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>17.Father Name</label>
	<div class="form-inline">
	  <input type="text" placeholder="First Name" value="<?php echo $row['f_first_name'];?>" name="f_first_name"  class="form-control">
	  <input type="text" placeholder="Middle Name" value="<?php echo $row['f_middle_name'];?>" name="f_middle_name"  class="form-control">
	  <input type="text" placeholder="Last Name" value="<?php echo $row['f_last_name'];?>" name="f_last_name"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>18.Mother Name</label>
	<div class="form-inline">
	  <input type="text" placeholder="First Name" value="<?php echo $row['m_first_name'];?>" name="m_first_name"  class="form-control">
	  <input type="text" placeholder="Middle Name" value="<?php echo $row['m_middle_name'];?>" name="m_middle_name"  class="form-control">
	  <input type="text" placeholder="Last Name" value="<?php echo $row['m_last_name'];?>" name="m_last_name"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>19.Adhaar No</label>
	<div class="form-inline">
	  <input type="text" placeholder="Father's Adhaar" value="<?php echo $row['f_adhaar_no'];?>" name="f_adhaar_no"  class="form-control">
	  <input type="text" placeholder="Mother's Adhaar" value="<?php echo $row['m_adhaar_no'];?>" name="m_adhaar_no"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>20.Date of Birth</label>
	  <input type="date" placeholder="Date of Birth" value="<?php echo $row['dob'];?>" name="dob"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>21.Age Appropriation Reason</label>
	  <input type="text" placeholder="Age Appropriation Reason" value="<?php echo $row['age_appro'];?>" name="age_appro"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>22.Adhaar UID No</label>
	  <input type="text" placeholder="Student Adhaar No" value="<?php echo $row['stud_adhaar'];?>" name="stud_adhaar"  class="form-control">
	</div>
	
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>23.Urban / Rural</label>
	  <select class="form-control" name="urban_rural"  id="sel1">
		<option value="<?php echo $row['urban_rural'];?>"><?php echo $row['urban_rural'];?></option>
		<option value="URBAN">Urban</option>
		<option value="RURAL">Rural</option>
	 </select>
	</div>
		
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>24.Select Gender:</label>
	  <select class="form-control" name="sex"  id="sel1">
		<option value="<?php echo $row['sex'];?>"><?php echo $row['sex'];?></option>
		<option value="MALE">Male</option>
		<option value="FEMALE">Female</option>
		<option value="TRANSGENDER">Transgender</option>
	 </select>
	</div>
        
	
	</div>
	</div>
	</div>
    <div class="col-sm-6">
	<div class="panel panel-primary">
	<div class="panel-body">
	
					<div class="form-group">
					<label for="sel1"><span style="color:red;font-size:18px;">*</span>25.Religion</label>
					  <select class="form-control" name="religion" onchange='CheckReligion(this.value);'>
						<option value="<?php echo $row['religion'];?>"><?php echo $row['religion'];?></option>
						<option value="HINDU">Hindu</option>
						<option value="MUSLIM">Muslim</option>
						<option value="CHRISTIAN">Christian</option>
						<option value="SIKH">Sikh</option>
						<option value="BUDHA">Budha</option>
						<option value="PARSI">Parsi</option>
						<option value="JAIN">Jain</option>
						<option value="OTHERS">Others</option>
					 </select>
					</div>
					<option value="OTHER RELIGION">Others</option>
					 </select>
					</div>
					<div class="form-group">
					 <input type="text" class="form-control" placeholder="Enter Religion here" name="other_religion" id="other_religion" style='display:none;'/>
					</div>
	
	<div class="form-group">
	<label>26.Student's Caste certificate NO & Caste</label>
	<div class="form-inline">
	  <input type="text" placeholder="Certificate NO" value="<?php echo $row['cast_cert_no'];?>" name="cast_cert_no"  class="form-control">
	  <input type="text" placeholder="Caste" value="<?php echo $row['caste'];?>" name="caste"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>27.Father's Caste certificate NO & Caste</label>
	<div class="form-inline">
	  <input type="text" placeholder="Certificate NO" value="<?php echo $row['f_cast_cert_no'];?>" name="f_cast_cert_no"  class="form-control">
	  <input type="text" placeholder="Caste" value="<?php echo $row['f_caste'];?>" name="f_caste"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>28.Mother's Caste certificate NO & Caste</label>
	<div class="form-inline">
	  <input type="text" placeholder="Certificate NO" value="<?php echo $row['m_cast_cert_no'];?>" name="m_cast_cert_no"  class="form-control">
	  <input type="text" placeholder="Caste" value="<?php echo $row['m_caste'];?>" name="m_caste"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>29.Social Category</label>
	  <select class="form-control" name="social_cat"  id="sel1">
		<option value="<?php echo $row['social_cat'];?>"><?php echo $row['social_cat'];?></option>
		<option value="GENERAL">General</option>
		<option value="OBC">OBC</option>
		<option value="SC">SC</option>
		<option value="ST">ST</option>
	 </select>
	</div>
	
	<div class="form-group">
	  <label for="sel1">30(a).Belong to BPL</label>
	  <select class="form-control" name="bpl"  id="sel1">
		<option value="<?php echo $row['bpl'];?>"><?php echo $row['bpl'];?></option>
		<option value="YES">YES</option>
		<option value="NO">NO</option>
	 </select>
	</div>
	
	<div class="form-group">
	<label>30(b).BPL Card No </label>
	  <input type="text"  name="bpl_no" value="<?php echo $row['bpl_no'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>31.Bhagyalakshmi Bond No </label>
	  <input type="text"  name="bhagya_bond_no" value="<?php echo $row['bhagya_bond_no'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>32.Disability Child</label>
	  <select class="form-control" name="disabil"  id="sel1">
		<option value="<?php echo $row['disabil'];?>"><?php echo $row['disabil'];?></option>
		<option value="NOT APPLICABLE">Not Applicable</option>
		<option value="AUTISM">Autism</option>
		<option value="PHYSICALLY HANDICAPPED">Physially Handicapped</option>
		<option value="HEARING IMPARTEMENT">Hearing Impartement</option>
		<option value="LEARNING DISABILITY">Learning Disability</option>
		<option value="LOCO MOTOR IMPAIRMENT">Loco motor Impairment</option>
		<option value="MENTAL RETARDATION">Mental Retardation</option>
		<option value="MULTIPLE DISABILITY">Multipal Disability</option>
		<option value="SPEECH IMPAREMENT">Speech Imparement</option>
		<option value="VISUAL IMPAIRMENT (BLINDNESS)">Visual Impairment (Blindness)</option>
		<option value="VISUAL IMPAIRMENT (LOW VISION)">Visual Impairment (Low Vision)</option>
		<option value="CEREBRAL PALSY">Cerebral palsy</option>
	</select>
	</div>
	
							<div class="form-group">
							  <label for="sel1"><span style="color:red;font-size:18px;">*</span>33.Special Category</label>
							  <select class="form-control" name="spec_cat" onchange='CheckSpecialCat(this.value);'>
								<option value="<?php echo $row['spec_cat'];?>"><?php echo $row['spec_cat'];?></option>
								<option value="NONE">None</option>
								<option value="DESTITUTE">Destitute</option>
								<option value="HIV CASE">HIV Case</option>
								<option value="ORPHANS">Orphans</option>
								<option value="OTHER SPECIAL CATEGORY">Others</option>
								</select>
								</div>
								<div class="form-group">
								 <input type="text" class="form-control" placeholder="Enter Other Special Category" name="other_spec_cat" id="other_spec_cat" style='display:none;'/>
								</div>
	
	<h3 style="color:blue;text-decoration:underline;">Student Contact details</h3>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>34.PIN Code</label>
	  <input type="text" placeholder="PIN Code" value="<?php echo $row['st_pin'];?>" name="st_pin"  class="form-control">
	</div>	
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>35.District</label>
	  <input type="text" placeholder="District" value="<?php echo $row['st_district'];?>" name="st_district"  class="form-control">
	</div>

	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>36.Taluk</label>
	  <input type="text" placeholder="Taluk" name="st_taluk" value="<?php echo $row['st_taluk'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>37.City/Village/Town</label>
	  <input type="text" placeholder="City/Village/Town" value="<?php echo $row['st_city'];?>" name="st_city"  class="form-control">
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>38.Locality</label>
	  <input type="text"  name="st_locality" value="<?php echo $row['st_locality'];?>"  class="form-control">
	</div>

	<div class="form-group">
  <label for="usr"><span style="color:red;font-size:18px;">*</span>39.Address:</label>
  <textarea rows="4" class="form-control"  name="st_address"><?php echo $row['st_address'];?></textarea>
	</div>
	
	<div class="form-group">
	<label>40 (a).Student's Mobile No & (b) Email ID</label>
	<div class="form-inline">
	  <input type="text" placeholder="Mobile NO" value="<?php echo $row['st_mobile'];?>" name="st_mobile"  class="form-control">
	  <input type="text" placeholder="Email ID" name="st_email" value="<?php echo $row['st_email'];?>"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>41 (a).Father's Mobile No & (b) Email ID</label>
	<div class="form-inline">
	  <input type="text" placeholder="Mobile NO" value="<?php echo $row['f_mobile'];?>" name="f_mobile"  class="form-control">
	  <input type="text" placeholder="Email ID" name="f_email" value="<?php echo $row['f_email'];?>"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>42 (a).Mother's Mobile No & (b) Email ID</label>
	<div class="form-inline">
	  <input type="text" placeholder="Mobile NO" value="<?php echo $row['m_mobile'];?>" name="m_mobile"  class="form-control">
	  <input type="text" placeholder="Email ID" value="<?php echo $row['m_email'];?>"  name="m_email"  class="form-control">
	</div>	
	</div>
	
	<br>
	<br>
	<h3 style="color:red;text-decoration:underline;">For office use only</h3>
	
	<div class="form-group">
	<label>Student Enrollment No</label>
	  <input type="text"  name="st_enroll_no" value="<?php echo $row['st_enroll_no'];?>"   class="form-control">
	</div>
	
	<div class="form-group">
	<label>Admission Date</label>
	  <input type="date"  name="admis_date" value="<?php echo $row['admis_date'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Fee paid amount</label>
	  <input type="number"  name="fee_paid_amount" value="<?php echo $row['fee_paid_amount'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Fee Receipt No</label>
	  <input type="text"  name="fee_receipt_no" value="<?php echo $row['fee_receipt_no'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Fee Receipt Date</label>
	  <input type="date"  name="fee_receipt_date" value="<?php echo $row['fee_receipt_date'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Admission Date</label>
	  <input type="date"  name="admis_date" value="<?php echo $row['admis_date'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Student/Parent Bank Name and A/C No</label>
	  <input type="text"  name="bank_acc" value="<?php echo $row['bank_acc'];?>"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Bank IFSC Code</label>
	  <input type="text"  name="bank_ifsc" value="<?php echo $row['bank_ifsc'];?>" class="form-control">
	</div>
	
	<div class="form-group">
	<label>Data Entry operator name</label>
	  <input type="text"  name="data_opera_name" value="<?php echo $row['data_opera_name'];?>"  class="form-control">
	</div>
	
	<Input type="submit" class="btn btn-primary" name="register" value="Update" >
	  </form>
	</div>
	</div>		
    </div>
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
