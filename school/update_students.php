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
	$roll_no=$_POST["roll_no"];
	$village=$_POST["village"];
	$town=$_POST["town"];
	$taluk=$_POST["taluk"];
	$district=$_POST["district"];
	$academic_year=$_POST["academic_year"];
	$father_name=$_POST["father_name"];
	$mother_name=$_POST["mother_name"];
	
	
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
	
	$perm_address=$_POST["perm_address"];
	$vaccinated=$_POST["vaccinated"];
	$illness_sick=$_POST["illness_sick"];
	
	$class_join=$_POST["class_join"];
	$first_name=$_POST["first_name"];
	$admission=$_POST["admission"];
	$blood=$_POST["blood"];
	$join_date=$_POST["join_date"];
	
	$id=$_POST["id"];
	
	
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
	
	
	
	$sql="UPDATE students SET admission='".$admission."',blood='".$blood."',join_date='".$join_date."',sex='".$sex."',dob='".$dob."',place_birth='".$place_birth."',roll_no='".$roll_no."',village='".$village."',town='".$town."',taluk='".$taluk."',district='".$district."',academic_year='".$cur_academic_year."',father_name='".$father_name."',mother_name='".$mother_name."',father_add='".$father_add."',fa_occu='".$fa_occu."',ma_occu='".$ma_occu."',nation='".$nation."',religion='".$religion."',caste='".$caste."',sc_st='".$sc_st."',back_caste='".$back_caste."',mother_tongue='".$mother_tongue."',other_lang='".$other_lang."',no_bro='".$no_bro."',no_sis='".$no_sis."',perm_address='".$perm_address."',vaccinated='".$vaccinated."',illness_sick='".$illness_sick."',class_join='".$class_join."',first_name='$first_name',parent_contact='".$parent_contact."',photo_name='".$filename."',photo_path='".$filepath."',photo_type='".$filetype."',adhar_name='".$filename1."',adhar_path='".$filepath1."',adhar_type='".$filetype1."',birth_name='".$filename2."',birth_path='".$filepath2."',birth_type='".$filetype2."' where id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
			
		
	
	header("Location:register_students.php?success=.'success'");


	} 
	else 
	{
			
	header("Location:register_students.php?failed=.'failed'");	
	
	}


}


	}else{
		header("Location:login.php");
	}
	

?>