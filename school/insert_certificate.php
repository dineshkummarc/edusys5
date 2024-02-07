<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");


  $first_name=$_POST["first_name"];
  $certificate_of=$_POST["certificate_of"];
  $id=$_POST["id"];

  $sql="select first_name,photo_path from students where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$first_name=$row["first_name"];
  $image2=$row["photo_path"];
  }

  $sql_school = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	$result_school=mysqli_query($conn,$sql_school);
	if($row_school=mysqli_fetch_array($result_school,MYSQLI_ASSOC))
	{
		$institute_name=$row_school["sch_name"];
		$school_logo=$row_school["photo_path"];
		$location=$row_school["location"];
		$city=$row_school["city"];
    $district=$row_school["district"];
    $pin=$row_school["pin"];
    $school_phone_no=$row_school["phone"];
    $institute_address = $location." ".$city.", ".$district." ".$pin;
		
	
		
	}

  $details1 = mysqli_real_escape_string($conn, $_POST["details1"]);
  $details2 = mysqli_real_escape_string($conn, $_POST["details2"]);
  $details3 = mysqli_real_escape_string($conn, $_POST["details3"]);
  $details4 = mysqli_real_escape_string($conn, $_POST["details4"]);
 

$image1='cauvery_certificate_blank.png';
 
$image1 =imagecreatefromstring(file_get_contents($image1));

//$font = "./Aileron-SemiBold.otf";
$font = "./Aileron-Heavy.otf";
$font_school_name = "./BebasNeue-Regular.ttf";
$white = imagecolorallocate($image1, 255,255,255);
$black = imagecolorallocate($image1, 0,0,0);
$red = imagecolorallocate($image1, 163,3,34);
$blue = imagecolorallocate($image1, 30,86,161);

//$text1 = imagettftext($image1,70,0,700,230,$red,$font_school_name,strtoupper($institute_name));
$text1 = imagettftext($image1,40,0,750,386,$white,$font,strtoupper($certificate_of));
$text1 = imagettftext($image1,70,0,700,724,$red,$font,strtoupper($first_name));
$text1 = imagettftext($image1,25,0,370,844,$black,$font,$details1);
//$text1 = imagettftext($image1,30,0,666,1375,$white,$font_school_name,$institute_address);

if($details2 != ""){
  $text1 = imagettftext($image1,25,0,370,911,$black,$font,$details2);
}
if($details3 != ""){
  $text1 = imagettftext($image1,25,0,370,973,$black,$font,$details3);
}
if($details4 != ""){
  $text1 = imagettftext($image1,25,0,370,1039,$black,$font,$details4);
}



header('Content-Type: image/png');
//imagepng($image1);

imagepng($image1, "certificates/".time()."-".$first_name.".png");
$certificate_name = time()."-".$first_name.".png";
$certificate_path = "certificates/".$certificate_name;

$sql="insert into certificates (student_id,institute_name,institute_address,certificate_of,details1,details2,details3,details4,certificate_name,certificate_path) values('$id','$institute_name','$institute_address','$certificate_of','$details1','$details2','$details3','$details4','$certificate_name','$certificate_path')";
var_dump($sql);

if ($conn->query($sql) === TRUE) 
{
$last_id = $conn->insert_id;
header("Location:success_download_certificate.php?id=".$last_id."&success='success'");
} 
else 
{
	header("Location:certificate_register.php?failed='failed'");
}

}
else
{
header("Location:login.php");
}
?>  






		



