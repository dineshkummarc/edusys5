<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

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

 <form action="insert_enrollment.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6">
	  
	<div class="panel panel-primary">
		
	  <div class="panel-body">
	  <?php
	  //var_dump($sql_att);
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
			<strong>Success.</strong> Enrollment details has been Submitted.
		</div>
		  <?php
	  }
	  ?>
	  <h2 style="color:red;">Student Admission Form</h2>
			
		<h3 style="color:blue;text-decoration:underline;">Admission Details</h3>	
		
		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Academic Year</label>
		  <select class="form-control" name="academic_year"  id="sel1">
			<option value="">Select Academic Year</option>
			<option value="2018-2019">2018-2019</option>
			<option value="2019-2020">2019-2020</option>
			<option value="2020-2021">2020-2021</option>
			<option value="2021-2022">2021-2022</option>
		</select>
		</div>

		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>1.Admission to Class</label>
		  <select class="form-control" name="admit_to_class">
			<option value="">Select Class</option>
			<option value="PREKG">PreKG</option>
			<option value="LKG">LKG</option>
			<option value="UKG">UKG</option>
			 <option value="I STANDARD">I Standard</option>
			<option value="II STANDARD">II Standard</option>
			  <option value="III STANDARD">III Standard</option>
			  <option value="IV STANDARD">IV Standard</option>
			  <option value="V STANDARD">V Standard</option>
			  <option value="VI STANDARD">VI Standard</option>
			  <option value="VII STANDARD">VII Standard</option>
			  <option value="VIII STANDARD">VIII Standard</option>
			   <option value="IX STANDARD">IX Standard</option>
			  <option value="X STANDARD">X Standard</option>
			  <option value="I PUC ARTS">I PUC Arts</option>
			  <option value="I PUC COMMERCE">I PUC Commerce</option>
			  <option value="I PUC SCIENCE">I PUC Science</option>
			  <option value="II PUC ARTS">II PUC Arts</option>
			  <option value="II PUC COMMERCE">II PUC Commerce</option>
			  <option value="II PUC SCIENCE">II PUC Science</option>
		 </select>
		</div>
		
		
		
		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>2.Select Semester:</label>
		  <select class="form-control" name="semister"  id="sel1">
			<option value="">Select Semester</option>
			<option value="SEMISTER I">Semister I</option>
			<option value="SEMISTER II">Semister II</option>
		</select>
		</div>

		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>3.Stream</label>
		  <select class="form-control" name="stream">
			<option value="">Select Stream</option>
			<option value="NA">NA</option>
			<option value="COMMERCE">Commerce</option>
			<option value="VOCATIONAL">Vocational</option>
			<option value="SCIENCE">Science</option>
			<option value="ARTS">Arts</option>
		</select>
		</div>
		
							<div class="form-group">
							  <label for="sel1"><span style="color:red;font-size:18px;">*</span>4.Medium of Instructions</label>
							  <select class="form-control" name="medium" onchange='CheckMedium(this.value);'>
								<option value="">Select Medium</option>
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
								<option value="">Select Mother Tongue</option>
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
								<option value="">Select Affiliation</option>
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
		  <input type="text" placeholder="Transfer Certificate No" name="tc_no"  class="form-control">
		</div>
		
		<div class="form-group">
		<label>8.TC Date</label>
		  <input type="date" placeholder="Transfer Certificate Date" name="tc_date"  class="form-control">
		</div>
		
		<div class="form-group">
		<label>9.Previous School Name</label>
		  <input type="text" placeholder="Previous School Name" name="prev_sch_name"  class="form-control">
		</div>	

		<div class="form-group">
		  <label for="sel1"><span style="color:red;font-size:18px;">*</span>10.Previous School Type:</label>
		  <select class="form-control" name="prev_sch_type">
			<option value="">Select Type</option>
			<option value="GOVERNMENT SCHOOL">Government School</option>
			<option value="PRIVATE AIDDED SCHOOL">Private aidded School</option>
			<option value="LOCAL BODIES">Local Bodies</option>
			<option value="PRIVATE UNAIDDED SCHOOL">Private unaidded School</option>
		</select>
		</div>
		
		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>11.PIN Code</label>
		  <input type="text" placeholder="PIN Code" name="pin"  class="form-control">
		</div>	
		
		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>12.District</label>
		  <input type="text" placeholder="District" name="district"  class="form-control">
		</div>

		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>13.Taluk</label>
		  <input type="text" placeholder="Taluk" name="taluk"  class="form-control">
		</div>
		
		<div class="form-group">
		<label><span style="color:red;font-size:18px;">*</span>14.City/Village/Town</label>
		  <input type="text" placeholder="City/Village/Town" name="city"  class="form-control">
		</div>

		<div class="form-group">
	  <label for="usr"><span style="color:red;font-size:18px;">*</span>15.Previous School Address:</label>
	  <textarea rows="4" class="form-control" name="prev_sch_address"></textarea>
	</div>
	
	<h3 style="color:blue;text-decoration:underline;">Student details</h3>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>16.Student Name</label>
	<div class="form-inline">
	  <input type="text" placeholder="First Name" name="first_name"  class="form-control">
	  <input type="text" placeholder="Middle Name" name="middle_name"  class="form-control">
	  <input type="text" placeholder="Last Name" name="last_name"  class="form-control">
	</div>	
	</div>

	
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>17.Father Name</label>
	<div class="form-inline">
	  <input type="text" placeholder="First Name" name="f_first_name"  class="form-control">
	  <input type="text" placeholder="Middle Name" name="f_middle_name"  class="form-control">
	  <input type="text" placeholder="Last Name" name="f_last_name"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>18.Mother Name</label>
	<div class="form-inline">
	  <input type="text" placeholder="First Name" name="m_first_name"  class="form-control">
	  <input type="text" placeholder="Middle Name" name="m_middle_name"  class="form-control">
	  <input type="text" placeholder="Last Name" name="m_last_name"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>19.Adhaar No</label>
	<div class="form-inline">
	  <input type="text" placeholder="Father's Adhaar" name="f_adhaar_no"  class="form-control">
	  <input type="text" placeholder="Mother's Adhaar" name="m_adhaar_no"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>20.Date of Birth</label>
	  <input type="date" placeholder="Date of Birth" name="dob"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>21.Age Appropriation Reason</label>
	  <input type="text" placeholder="Age Appropriation Reason" name="age_appro"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>22.Adhaar UID No</label>
	  <input type="text" placeholder="Student Adhaar No" name="stud_adhaar"  class="form-control">
	</div>
	
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>23.Urban / Rural</label>
	  <select class="form-control" name="urban_rural"  id="sel1">
		<option value="URBAN">Urban</option>
		<option value="RURAL">Rural</option>
	 </select>
	</div>
		
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>24.Select Gender:</label>
	  <select class="form-control" name="sex"  id="sel1">
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
										<option value="HINDU">Hindu</option>
										<option value="MUSLIM">Muslim</option>
										<option value="CHRISTIAN">Christian</option>
										<option value="SIKH">Sikh</option>
										<option value="BUDHA">Budha</option>
										<option value="PARSI">Parsi</option>
										<option value="JAIN">Jain</option>
										<option value="OTHER RELIGION">Others</option>
									 </select>
									</div>
									<div class="form-group">
									 <input type="text" class="form-control" placeholder="Enter Religion here" name="other_religion" id="other_religion" style='display:none;'/>
									</div>
	
	
	<div class="form-group">
	<label>26.Student's Caste certificate NO & Caste</label>
	<div class="form-inline">
	  <input type="text" placeholder="Certificate NO" name="cast_cert_no"  class="form-control">
	  <input type="text" placeholder="Caste" name="caste"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>27.Father's Caste certificate NO & Caste</label>
	<div class="form-inline">
	  <input type="text" placeholder="Certificate NO" name="f_cast_cert_no"  class="form-control">
	  <input type="text" placeholder="Caste" name="f_caste"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>28.Mother's Caste certificate NO & Caste</label>
	<div class="form-inline">
	  <input type="text" placeholder="Certificate NO" name="m_cast_cert_no"  class="form-control">
	  <input type="text" placeholder="Caste" name="m_caste"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>29.Social Category</label>
	  <select class="form-control" name="social_cat"  id="sel1">
		<option value="GENERAL">General</option>
		<option value="OBC">OBC</option>
		<option value="SC">SC</option>
		<option value="ST">ST</option>
	 </select>
	</div>
	
	<div class="form-group">
	  <label for="sel1">30(a).Belong to BPL</label>
	  <select class="form-control" name="bpl"  id="sel1">
		<option value="YES">YES</option>
		<option value="NO">NO</option>
	 </select>
	</div>
	
	<div class="form-group">
	<label>30(b).BPL Card No </label>
	  <input type="text"  name="bpl_no"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>31.Bhagyalakshmi Bond No </label>
	  <input type="text"  name="bhagya_bond_no"  class="form-control">
	</div>
	
	<div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>32.Disability Child</label>
	  <select class="form-control" name="disabil"  id="sel1">
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
									  <select class="form-control" name="spec_cat"  onchange='CheckSpecialCat(this.value);'>
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
	  <input type="text" placeholder="PIN Code" name="st_pin"  class="form-control">
	</div>	
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>35.District</label>
	  <input type="text" placeholder="District" name="st_district"  class="form-control">
	</div>

	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>36.Taluk</label>
	  <input type="text" placeholder="Taluk" name="st_taluk"  class="form-control">
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>37.City/Village/Town</label>
	  <input type="text" placeholder="City/Village/Town" name="st_city"  class="form-control">
	</div>
	
	<div class="form-group">
	<label><span style="color:red;font-size:18px;">*</span>38.Locality</label>
	  <input type="text"  name="st_locality"  class="form-control">
	</div>

	<div class="form-group">
  <label for="usr"><span style="color:red;font-size:18px;">*</span>39.Address:</label>
  <textarea rows="4" class="form-control" name="st_address"></textarea>
	</div>
	
	<div class="form-group">
	<label>40 (a).Student's Mobile No & (b) Email ID</label>
	<div class="form-inline">
	  <input type="text" placeholder="Mobile NO" name="st_mobile"  class="form-control">
	  <input type="text" placeholder="Email ID" name="st_email"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>41 (a).Father's Mobile No & (b) Email ID</label>
	<div class="form-inline">
	  <input type="text" placeholder="Mobile NO" name="f_mobile"  class="form-control">
	  <input type="text" placeholder="Email ID" name="f_email"  class="form-control">
	</div>	
	</div>
	
	<div class="form-group">
	<label>42 (a).Mother's Mobile No & (b) Email ID</label>
	<div class="form-inline">
	  <input type="text" placeholder="Mobile NO" name="m_mobile"  class="form-control">
	  <input type="text" placeholder="Email ID" name="m_email"  class="form-control">
	</div>	
	</div>
	
	<br>
	<br>
	<h3 style="color:red;text-decoration:underline;">For office use only</h3>
	
	<div class="form-group">
	<label>Student Enrollment No</label>
	  <input type="text"  name="st_enroll_no"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Fee paid amount</label>
	  <input type="number"  name="fee_paid_amount"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Fee Receipt No</label>
	  <input type="text"  name="fee_receipt_no"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Fee Receipt Date</label>
	  <input type="date"  name="fee_receipt_date"  class="form-control">
	</div>
	
	
	<div class="form-group">
	<label>Admission Date</label>
	  <input type="date"  name="admis_date"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Student/Parent Bank Name and A/C No</label>
	  <input type="text"  name="bank_acc"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Bank IFSC Code</label>
	  <input type="text"  name="bank_ifsc"  class="form-control">
	</div>
	
	<div class="form-group">
	<label>Data Entry operator name</label>
	  <input type="text"  name="data_opera_name"  class="form-control">
	</div>
	
	<Input type="submit" class="btn btn-primary" name="register" value="Register" >
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
