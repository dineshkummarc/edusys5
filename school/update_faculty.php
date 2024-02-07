<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
error_reporting("0");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$fac_fname=$_POST["fac_fname"];
	$fac_id=$_POST["fac_id"];
	$fac_email=$_POST["fac_email"];
	$fac_dob=$_POST["fac_dob"];
	$fac_mob=$_POST["fac_mob"];
	$fac_desig=$_POST["fac_desig"];
	$fac_dep=$_POST["fac_dep"];
	$fac_prev_org=$_POST["fac_prev_org"];
	$fac_quali=$_POST["fac_quali"];
	$fac_join=$_POST["fac_join"];
	$fac_add=$_POST["fac_add"];
	$fac_sex=$_POST["fac_sex"];
	$class_teach=$_POST["class_teach"];
	$section=$_POST["section"];
	$adhaar_no=$_POST["adhaar_no"];
	$staff_pass=$_POST["staff_pass"];
	
	function crop_image($filename, $max_resolution){
		if(file_exists($filename)){
			$original_image = imagecreatefromjpeg($filename);
			$original_width = imagesx($original_image);
			$original_height = imagesy($original_image);
	
		if($original_height > $original_width)
			{
				$ratio = $max_resolution/$original_width;
				$new_width = $max_resolution;
				$new_height = $original_height * $ratio;
				$diff = $new_height - $new_width;
				$x = 0;
				$y=round($diff/2);
			}
			else
			{
				$ratio = $max_resolution/$original_height;
				$new_height = $max_resolution;
				$new_width = $original_width * $ratio;
				$diff = $new_width - $new_height;
				$x = round($diff/2);
				$y=0;
			}
	
			if($original_image){
				$new_image = imagecreatetruecolor($new_width,$new_height);
				imagecopyresampled($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
	
				$new_crop_image = imagecreatetruecolor($max_resolution,$max_resolution);
				imagecopyresampled($new_crop_image,$new_image,0,0,$x,$y,$max_resolution,$max_resolution,$max_resolution,$max_resolution);
	
				imagejpeg($new_crop_image,"faculty/".$filename,90);
			}
			}
	}

	if(isset($_FILES['photo'])&&$_FILES['photo']['type']=='image/jpeg'){
			$filetmp = $_FILES["photo"]["tmp_name"];
			$filename = time()."-".$_FILES["photo"]["name"];
			$filetype = $_FILES["photo"]["type"];
			$filepath = "faculty/".$filename;
			move_uploaded_file($filetmp,$filepath);
			crop_image($filename,"175");
	}
	
	
	$sql="Update faculty set fac_fname='".$fac_fname."',fac_email='".$fac_email."',fac_dob='".$fac_dob."',parent_contact='".$fac_mob."',fac_desig='".$fac_desig."',fac_dep='".$fac_dep."',fac_prev_org='".$fac_prev_org."',fac_quali='".$fac_quali."',fac_join='".$fac_join."',fac_add='".$fac_add."',fac_sex='".$fac_sex."',fac_photo_name='".$filename."',fac_photo_path='".$filepath."',fac_photo_type='".$filetype."',class_teach='".$class_teach."',section='".$section."',adhaar_no='".$adhaar_no."',staff_pass='".$staff_pass."' where  fac_id='".$fac_id."'";

	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:teach_staff.php?success=.'success'");
	} 
	else 
	{
	header("Location:teach_staff.php?failed=.'failed'");	
	
	}


}

	}else{
		header("Location:login.php");
	}
	
?>