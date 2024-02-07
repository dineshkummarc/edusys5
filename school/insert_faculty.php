<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$fac_fname=$_POST["fac_fname"];
	$fac_dob=$_POST["fac_dob"];
	$parent_contact=$_POST["parent_contact"];
	$fac_desig=$_POST["fac_desig"];
	$fac_dep=$_POST["fac_dep"];
	$fac_quali=$_POST["fac_quali"];
	$fac_add=$_POST["fac_add"];
	$fac_sex=$_POST["fac_sex"];
	$class_teach=$_POST["class_teach"];
	$adhaar_no=$_POST["adhaar_no"];
	$staff_type=$_POST["staff_type"];
	

	function crop_image($file, $max_resolution){
		if(file_exists($file)){
			$original_image = imagecreatefromjpeg($file);
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
	
				imagejpeg($new_crop_image,"faculty/".$file,90);
			}
			}
	}

//if($_SERVER['REQUEST_METHOD']=="POST")
//{
	//$id = $_POST["id"];
		//if(isset($_FILES['photo'])&&$_FILES['photo']['type']=='image/jpeg'){
		$filetmp = $_FILES["photo"]["tmp_name"];
		$filename = time()."-".$_FILES["photo"]["name"];
		$filetype = $_FILES["photo"]["type"];
		$filepath = "faculty/".$filename;
		move_uploaded_file($filetmp,$filename);
		$file = time()."-".$_FILES["photo"]["name"];
		crop_image($file,"175");
		//echo "<img src='$filepath' style='' />";
	//}
//}
	

	
	$sql="insert into faculty (fac_fname,fac_dob,parent_contact,fac_desig,class_teach,fac_dep,fac_quali,fac_add,fac_sex,fac_photo_name,fac_photo_path,fac_photo_type,adhaar_no,staff_type) values('$fac_fname','$fac_dob','$parent_contact','$fac_desig','$class_teach','$fac_dep','$fac_quali','$fac_add','$fac_sex','$filename','$filepath','$filetype','$adhaar_no','$staff_type')";
	//var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:register_faculty.php?success=.'success'");
	} 
	else 
	{
	header("Location:register_faculty.php?failed=.'failed'");	
	}
}

}
else
{
	header("Location:login.php");
}
?>