<?php
if(isset($_GET["id"])){
  $id=$_GET["id"];
}

require("connection.php");
$sql="select * from faculty where fac_id='".$id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$adhaar_no=$row["adhaar_no"];
	$first_name=$row["fac_fname"];
  $fac_desig=$row["fac_desig"].", ".$row["fac_dep"];
  $mobile=$row["parent_contact"];
  $fac_dob= date('d-m-Y', strtotime( $row['fac_dob'] ));
  $image2=$row["fac_photo_path"];
	$fac_add=$row["fac_add"];

  $sql_school = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	$result_school=mysqli_query($conn,$sql_school);
	if($row_school=mysqli_fetch_array($result_school,MYSQLI_ASSOC))
	{
		$school_name=$row_school["sch_name"];
		$location=$row_school["location"];
		$city=$row_school["city"];
    $district=$row_school["district"];
    $pin=$row_school["pin"];
    $school_phone_no=$row_school["phone"];
    $address = $location." ".$city.", ".$district." ".$pin;
		
	}

$image1='staffidcard.png';
list($width,$height) = getimagesize($image2);

$image1 =imagecreatefromstring(file_get_contents($image1));
$image2 =imagecreatefromstring(file_get_contents($image2));
//imagecopymerge(dst_im,src_im,dst_x,dst_y,src_x,src_y,src_w,src_h,pct);
imagecopymerge($image1, $image2, 710, 170, 0, 0, $width, $height, 100);



$font = "./BebasNeue-Regular.ttf";
$white = imagecolorallocate($image1, 255,255,255);
$black = imagecolorallocate($image1, 0,0,0);


$text1 = imagettftext($image1,50,0,160,90,$white,$font,$school_name);


$text1 = imagettftext($image1,24,0,160,130,$white,$font,$address);

$text1 = imagettftext($image1,25,0,210,198,$black,$font,$first_name);

$text1 = imagettftext($image1,25,0,210,248,$black,$font,$mobile);

$text1 = imagettftext($image1,24,0,210,308,$black,$font,$fac_desig);


$text1 = imagettftext($image1,24,0,210,368,$black,$font,$blood);

$text1 = imagettftext($image1,24,0,210,428,$black,$font,$adhaar_no);

$text1 = imagettftext($image1,24,0,210,478,$black,$font,$fac_add);


$text1 = imagettftext($image1,30,0,160,608,$white,$font,$school_phone_no);
}
header('Content-Type: image/png');
//imagejpeg($image1,$name);
imagepng($image1, "faculty_idcards/".time()."-".$first_name.".png");

$filename = time()."-".$first_name.".png";
$filepath = "faculty_idcards/".$filename;

$sql="insert into staff_id_cards (staff_id,photo_name,photo_path) values('$id','$filename','$filepath')";
//var_dump($sql);

if ($conn->query($sql) === TRUE) 
{
header("Location:fac_description.php?fac_id=".$id."&success='success'");
} 
else 
{
	header("Location:fac_description.php?fac_id=".$id."&failed='failed'");
}

