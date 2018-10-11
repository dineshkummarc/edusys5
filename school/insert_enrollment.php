<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["register"]))
{
	$academic_year=test_input($_POST["academic_year"]);
	$admit_to_class=test_input($_POST["admit_to_class"]);
	$semister=test_input($_POST["semister"]);
	$stream=test_input($_POST["stream"]);
	$medium=test_input($_POST["medium"]);
	$mother_tongue=test_input($_POST["mother_tongue"]);
	$prev_affi=test_input($_POST["prev_affi"]);
	$tc_no=test_input($_POST["tc_no"]);
	$tc_date=test_input($_POST["tc_date"]);
	$prev_sch_name=test_input($_POST["prev_sch_name"]);
	$prev_sch_type=test_input($_POST["prev_sch_type"]);
	$pin=test_input($_POST["pin"]);
	$district=test_input($_POST["district"]);
	$taluk=test_input($_POST["taluk"]);
	$city=test_input($_POST["city"]);
	$prev_sch_address=test_input($_POST["prev_sch_address"]);
	$first_name=test_input($_POST["first_name"]);
	$middle_name=test_input($_POST["middle_name"]);
	$last_name=test_input($_POST["last_name"]);
	$f_first_name=test_input($_POST["f_first_name"]);
	$f_middle_name=test_input($_POST["f_middle_name"]);
	$f_last_name=test_input($_POST["f_last_name"]);
	$m_first_name=test_input($_POST["m_first_name"]);
	$m_middle_name=test_input($_POST["m_middle_name"]);
	$m_last_name=test_input($_POST["m_last_name"]);
	$f_adhaar_no=test_input($_POST["f_adhaar_no"]);
	$m_adhaar_no=test_input($_POST["m_adhaar_no"]);
	$dob=test_input($_POST["dob"]);
	$age_appro=test_input($_POST["age_appro"]);
	$stud_adhaar=test_input($_POST["stud_adhaar"]);
	$urban_rural=test_input($_POST["urban_rural"]);
	$sex=test_input($_POST["sex"]);
	$religion=test_input($_POST["religion"]);
	$caste=test_input($_POST["caste"]);
	$f_caste=test_input($_POST["f_caste"]);
	$cast_cert_no=test_input($_POST["cast_cert_no"]);
	$f_cast_cert_no=test_input($_POST["f_cast_cert_no"]);
	$m_cast_cert_no=test_input($_POST["m_cast_cert_no"]);
	$m_caste=test_input($_POST["m_caste"]);
	$social_cat=test_input($_POST["social_cat"]);
	$bpl=test_input($_POST["bpl"]);
	$bpl_no=test_input($_POST["bpl_no"]);
	$bhagya_bond_no=test_input($_POST["bhagya_bond_no"]);
	$disabil=test_input($_POST["disabil"]);
	$spec_cat=test_input($_POST["spec_cat"]);
	$st_pin=test_input($_POST["st_pin"]);
	$st_district=test_input($_POST["st_district"]);
	$st_taluk=test_input($_POST["st_taluk"]);
	$st_city=test_input($_POST["st_city"]);
	$st_locality=test_input($_POST["st_locality"]);
	$st_address=test_input($_POST["st_address"]);
	$st_mobile=test_input($_POST["st_mobile"]);
	$st_email=test_input($_POST["st_email"]);
	$f_mobile=test_input($_POST["f_mobile"]);
	$f_email=test_input($_POST["f_email"]);
	$m_mobile=test_input($_POST["m_mobile"]);
	$m_email=test_input($_POST["m_email"]);
	$st_enroll_no=test_input($_POST["st_enroll_no"]);
	$admis_date=test_input($_POST["admis_date"]);
	$bank_acc=test_input($_POST["bank_acc"]);
	$bank_ifsc=test_input($_POST["bank_ifsc"]);
	$data_opera_name=test_input($_POST["data_opera_name"]);
	$other_medium=test_input($_POST["other_medium"]);
	$other_mother_tongue=test_input($_POST["other_mother_tongue"]);
	$other_affiliation=test_input($_POST["other_affiliation"]);
	$other_religion=test_input($_POST["other_religion"]);
	$other_spec_cat=test_input($_POST["other_spec_cat"]);
	
	$fee_paid_amount=test_input($_POST["fee_paid_amount"]);
	$fee_receipt_no=test_input($_POST["fee_receipt_no"]);
	$fee_receipt_date=test_input($_POST["fee_receipt_date"]);
	
	
	date_default_timezone_set("Asia/Kolkata");
    $applied_date=date("Y-m-d");
	//$applied_date=test_input($_POST["data_opera_name"]);

	$sql="insert into enrolled_students (academic_year,admit_to_class,semister,stream,medium,mother_tongue,prev_affi,tc_no,tc_date,prev_sch_name,prev_sch_type,pin,district,taluk,city,prev_sch_address,first_name,middle_name,last_name,f_first_name,f_middle_name,f_last_name,m_first_name,m_middle_name,m_last_name,f_adhaar_no,m_adhaar_no,dob,age_appro,stud_adhaar,urban_rural,sex,religion,caste,f_caste,m_caste,social_cat,bpl,bpl_no,bhagya_bond_no,disabil,spec_cat,st_pin,st_district,st_taluk,st_city,st_locality,st_address,st_mobile,st_email,f_mobile,f_email,m_mobile,m_email,st_enroll_no,admis_date,bank_acc,bank_ifsc,data_opera_name,applied_date,cast_cert_no,f_cast_cert_no,m_cast_cert_no,other_medium,other_mother_tongue,other_affiliation,other_religion,other_spec_cat,fee_paid_amount,fee_receipt_no,fee_receipt_date) values('$academic_year','$admit_to_class','$semister','$stream','$medium','$mother_tongue','$prev_affi','$tc_no','$tc_date','$prev_sch_name','$prev_sch_type','$pin','$district','$taluk','$city','$prev_sch_address','$first_name','$middle_name','$last_name','$f_first_name','$f_middle_name','$f_last_name','$m_first_name','$m_middle_name','$m_last_name','$f_adhaar_no','$m_adhaar_no','$dob','$age_appro','$stud_adhaar','$urban_rural','$sex','$religion','$caste','$f_caste','$m_caste','$social_cat','$bpl','$bpl_no','$bhagya_bond_no','$disabil','$spec_cat','$st_pin','$st_district','$st_taluk','$st_city','$st_locality','$st_address','$st_mobile','$st_email','$f_mobile','$f_email','$m_mobile','$m_email','$st_enroll_no','$admis_date','$bank_acc','$bank_ifsc','$data_opera_name','$applied_date','$cast_cert_no','$f_cast_cert_no','$m_cast_cert_no','$other_medium','$other_mother_tongue','$other_affiliation','$other_religion','$other_spec_cat','$fee_paid_amount','$fee_receipt_no','$fee_receipt_date')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:register_enrollment.php?success=.'success'");
    } 
	else 
	{
	var_dump($sql);			
		
	}
	}
	}
	else
	{
	header("Location:login.php");
	}
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
?>