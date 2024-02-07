<?php

$present_class=$_POST["present_class"];
$cur_academic_year=$_POST["academic_year"];
 
require("connection.php");
$sql="select * from students where present_class='".$present_class."' and academic_year='".$cur_academic_year."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	//if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
  foreach($result as $row)
	{
	$dob= date('d-m-Y', strtotime( $row['dob'] ));
	$father_name=$row["father_name"];
	$mother_name=$row["mother_name"];
	$adhaar_no=$row["adhaar_no"];
	$first_name=$row["first_name"];
  $mobile=$row["parent_contact"];
  $blood=$row["blood"];
	$address=$row["address"];
  $image2=$row["photo_path"];

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
    $school_address = $location." ".$city.", ".$district." ".$pin;
		$image1=$row_school["student_id_path"];
		
	}



list($width,$height) = getimagesize($image2);
$image1 =imagecreatefromstring(file_get_contents($image1));
$image2 =imagecreatefromstring(file_get_contents($image2));

imagecopymerge($image1, $image2, 767, 207, 0, 0, $width, $height, 100);

$font = "./BebasNeue-Regular.ttf";
$white = imagecolorallocate($image1, 255,255,255);
$black = imagecolorallocate($image1, 0,0,0);
$red = imagecolorallocate($image1, 255,0,0);


$text1 = imagettftext($image1,50,0,216,90,$white,$font,$school_name);
$text1 = imagettftext($image1,25,0,280,200,$red,$font,$first_name);

$text1 = imagettftext($image1,25,0,280,250,$black,$font,$mobile);

$text1 = imagettftext($image1,25,0,280,310,$black,$font,$father_name);

$text1 = imagettftext($image1,25,0,280,368,$black,$font,$mother_name);

$text1 = imagettftext($image1,25,0,280,430,$black,$font,$blood);

$text1 = imagettftext($image1,25,0,280,484,$black,$font,$address);
$text1 = imagettftext($image1,30,0,50,600,$white,$font,$school_address);

header('Content-Type: image/png');
//imagejpeg($image1,$name);
imagepng($image1, "idcards/".time()."-".$first_name.".png");

		$filename = time()."-".$first_name.".png";
		$filepath = "idcards/".$filename;
		$sql="insert into student_id_cards (student_id,photo_name,photo_path) values('$id','$filename','$filepath')";
		$conn->query($sql);
		
}


//	/ Make zip and download folder
$zip_file = "all-image.zip";
	touch($zip_file);
	// end
	

	// open zip file
	$zip = new ZipArchive;
	$this_zip = $zip->open($zip_file);

if($this_zip){

		$folder = opendir('idcards/');
    //echo "<a href='idcards/'>View</a>";

		if($folder){
			while( false !== ($image = readdir($folder))){
				if($image !== "." && $image !== ".."){
					
					$file_with_path = "idcards/".$image;

					$zip->addFile($file_with_path,$image);
				}
			}
			closedir($folder);
		}
    
// download this created zip file
    
		if(file_exists($zip_file))  
		{  
			//name when download
			 $demo_name = "student_id_cards.zip";

		     header('Content-type: application/zip');  
		     header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
		     readfile($zip_file); // auto download

		     //delete this zip file after download
		     unlink($zip_file);  
		} 
  }

