<?php
if(isset($_GET["id"])){
  $id=$_GET["id"];
}

require("connection.php");
$sql="select * from students where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$dob= date('d-m-Y', strtotime( $row['dob'] ));
	$father_name=$row["father_name"];
	$mother_name=$row["mother_name"];
	$adhaar_no=$row["adhaar_no"];
	$first_name=$row["first_name"];
  $mobile=$row["parent_contact"];
  $address=$row["address"];
	$blood=$row["blood"];
  $image2=$row["photo_path"];
	$roll_no=$row["roll_no"];
	//echo $image2;

  $sql_school = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	$result_school=mysqli_query($conn,$sql_school);
	if($row_school=mysqli_fetch_array($result_school,MYSQLI_ASSOC))
	{
		$school_name=$row_school["sch_name"];
		$school_logo=$row_school["photo_path"];
		$location=$row_school["location"];
		$city=$row_school["city"];
    $district=$row_school["district"];
    $pin=$row_school["pin"];
    $school_phone_no=$row_school["phone"];
    $school_address = $location." ".$city.", ".$district." ".$pin;
	}

//$image1 = 'blank_stthomas.png';
$image1 = 'blank_cauvery.png';
list($width,$height) = getimagesize($image2);
$image1 =imagecreatefromstring(file_get_contents($image1));
$image2 =imagecreatefromstring(file_get_contents($image2));

imagecopymerge($image1, $image2, 197, 196, 0, 0, $width, $height, 100);


$font2 = "./BebasNeue-Regular.ttf";
$font = "./Aileron-SemiBold.otf";
$white = imagecolorallocate($image1, 255,255,255);
$black = imagecolorallocate($image1, 0,0,0);
$red = imagecolorallocate($image1, 255,0,0);


//$text1 = imagettftext($image1,50,0,216,90,$white,$font,$school_name);
$text1 = imagettftext($image1,35,0,170,454,$red,$font2,$first_name);

$text1 = imagettftext($image1,20,0,220,516,$black,$font,$roll_no);

$text1 = imagettftext($image1,20,0,220,565,$black,$font,$dob);

$text1 = imagettftext($image1,20,0,220,612,$black,$font,$blood);

$text1 = imagettftext($image1,20,0,220,662,$black,$font,$father_name);

$text1 = imagettftext($image1,20,0,220,711,$black,$font,$mother_name);
$text1 = imagettftext($image1,20,0,220,760,$black,$font,$mobile);
$text1 = imagettftext($image1,20,0,220,809,$black,$font,$adhaar_no);
$text1 = imagettftext($image1,20,0,220,859,$black,$font,$address);

}

header('Content-Type: image/png');
//imagejpeg($image1,$name);
imagepng($image1, "idcards/".time()."-".$first_name.".png");
$filename = time()."-".$first_name.".png";
$filepath = "idcards/".$filename;

$sql="insert into student_id_cards (student_id,photo_name,photo_path) values('$id','$filename','$filepath')";
//var_dump($sql);

if ($conn->query($sql) === TRUE) 
{
header("Location:description.php?id=".$id."&success='success'");
} 
else 
{
	header("Location:description.php?id=".$id."&failed='failed'");
}




		



