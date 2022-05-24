<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];


require("connection.php");
if(isset($_POST["register"]))
{
	$sex=$_POST["sex"];
	$dob=$_POST["dob"];
	$place_birth=$_POST["place_birth"];
	$rollno=$_POST["rollno"];
	$village=$_POST["village"];
	$town=$_POST["town"];
	$taluk=$_POST["taluk"];
	//$district=$_POST["district"];
	$district="Kodagu";
	//$academic_year=$_POST["academic_year"];
	$date=date("Y");
			$year=intval($date);
			$next_year=$year+1;
			
			$academic_year=$year."-".$next_year;

	$father_name=$_POST["father_name"];
	$mother_name=$_POST["mother_name"];
	
	$stay_with=$_POST["stay_with"];
	
	$father_add=$_POST["father_add"];
	$fa_occu=$_POST["fa_occu"];
	$ma_occu=$_POST["ma_occu"];
	$nation=$_POST["nation"];
	$religion=$_POST["religion"];
	$caste=$_POST["caste"];
	$sc_st=$_POST["sc_st"];
	$back_caste=$_POST["back_caste"];
	$mother_tongue=$_POST["mother_tongue"];
	$other_lang=$_POST["other_lang"];
	$no_bro=$_POST["no_bro"];
	$no_sis=$_POST["no_sis"];
	$section=$_POST["section"];
	$adhaar_no=$_POST["adhaar_no"];
	$address=$_POST["address"];
	$perm_address=$_POST["perm_address"];
	$vaccinated=$_POST["vaccinated"];
	$illness_sick=$_POST["illness_sick"];
	
	$class_join=$_POST["class_join"];
	//$class_join="first puc";
	$first_name=$_POST["first_name"];
	$admission=$_POST["admission"];
	$roll_no=$_POST["admission"];
	$blood=$_POST["blood"];
	$join_date=$_POST["join_date"];
	$address=$_POST["address"];
	
	
	
	$parent_contact=$_POST["parent_contact"];
	
	

	
	$filetmp = $_FILES["photo"]["tmp_name"];

	$filename = $_FILES["photo"]["name"];

	$filetype = $_FILES["photo"]["type"];

	$filepath = "photo/".$filename;

	move_uploaded_file($filetmp,$filepath);
	
	
	$filetmp1 = $_FILES["adhar"]["tmp_name"];

	$filename1 = $_FILES["adhar"]["name"];

	$filetype1 = $_FILES["adhar"]["type"];

	$filepath1 = "adhar/".$filename1;
	move_uploaded_file($filetmp1,$filepath1);
	
	
	$filetmp2 = $_FILES["birth"]["tmp_name"];

	$filename2 = $_FILES["birth"]["name"];

	$filetype2 = $_FILES["birth"]["type"];

	$filepath2 = "birth/".$filename2;
	move_uploaded_file($filetmp2,$filepath2);
	
	$sql="insert into students (present_class,admission_no,blood,join_date,sex,dob,place_birth,roll_no,village,town,taluk,district,academic_year,father_name,mother_name,stay_with,father_add,fa_occu,ma_occu,nation,religion,caste,sc_st,back_caste,mother_tongue,other_lang,no_bro,no_sis,perm_address,vaccinated,illness_sick,class_join,first_name,parent_contact,rollno,section,adhaar_no,photo_name,photo_path,photo_type,adhar_name,adhar_path,adhar_type,birth_name,birth_path,birth_type,address) values('$class_join','$admission','$blood','$join_date','$sex','$dob','$place_birth','$roll_no','$village','$town','$taluk','$district','$cur_academic_year','$father_name','$mother_name','$stay_with','$father_add','$fa_occu','$ma_occu','$nation','$religion','$caste','$sc_st','$back_caste','$mother_tongue','$other_lang','$no_bro','$no_sis','$perm_address','$vaccinated','$illness_sick','$class_join','$first_name','$parent_contact','$rollno','$section','$addres,'$adhaar_no','$filename','$filepath','$filetype','$filename1','$filepath1','$filetype1','$filename2','$filepath2','$filetype2','$address')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	//header("Location:send_sms.php?first_name=".$first_name."&parent_contact=".$parent_contact."&class_join=".$class_join."&roll_no=".$roll_no."&join_date=".$join_date);
	header("Location:register_students.php?success=.'success'");


	} 
	else 
	{
	var_dump($sql);			
	//header("Location:register_students.php?failed=.'failed'");	
		
	}


}



	}else{
		header("Location:login.php");
	}
	
?>