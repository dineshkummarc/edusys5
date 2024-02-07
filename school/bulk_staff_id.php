<?php

require("connection.php");
$sql="select * from faculty";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	foreach($result as $row)
	{
	$dob= date('d-m-Y', strtotime( $row['dob'] ));
	$adhaar_no=$row["adhaar_no"];
	$first_name=$row["fac_fname"];
  $fac_desig=$row["fac_desig"].", ".$row["fac_dep"];
  $mobile=$row["parent_contact"];
  $fac_dob= date('d-m-Y', strtotime( $row['fac_dob'] ));
  $image2=$row["fac_photo_path"];
	$staff_id=$row["fac_id"];

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
  $image1 = 'staffidcard.png';
//$image2= 'student.png';  // 175px x 175px
  $school_logo = 'dclogo.png'; // 120px x 120px

list($width,$height) = getimagesize($image2);

$image1 =imagecreatefromstring(file_get_contents($image1));
$image2 =imagecreatefromstring(file_get_contents($image2));
//imagecopymerge(dst_im,src_im,dst_x,dst_y,src_x,src_y,src_w,src_h,pct);
imagecopymerge($image1, $image2, 207, 305, 0, 0, $width, $height, 100);

list($width_logo,$height_logo) = getimagesize($school_logo);
$school_logo =imagecreatefromstring(file_get_contents($school_logo));
imagecopymerge($image1, $school_logo, 30, 25, 0, 0, $width_logo, $height_logo, 100);

$font = "./BebasNeue-Regular.ttf";
$white = imagecolorallocate($image1, 255,255,255);
$black = imagecolorallocate($image1, 0,0,0);


$text1 = imagettftext($image1,50,0,160,90,$white,$font,$school_name);


$text1 = imagettftext($image1,20,0,160,130,$white,$font,$address);

$text1 = imagettftext($image1,30,0,220,560,$black,$font,$first_name);

$text1 = imagettftext($image1,25,0,220,618,$black,$font,$fac_desig);

$text1 = imagettftext($image1,24,0,220,677,$black,$font,$fac_dob);

$expire = "01/06/2024";
$text1 = imagettftext($image1,24,0,220,738,$black,$font,$expire);

$text1 = imagettftext($image1,24,0,220,800,$black,$font,$adhaar_no);

$text1 = imagettftext($image1,24,0,220,860,$black,$font,$mobile);


$text1 = imagettftext($image1,30,0,270,989,$white,$font,$school_phone_no);

header('Content-Type: image/png');
//imagejpeg($image1,$name);
imagepng($image1, "faculty_idcards/".time()."-".$first_name.".png");

		$filename = time()."-".$first_name.".png";
		$filepath = "faculty_idcards/".$filename;
		$sql="insert into staff_id_cards (staff_id,photo_name,photo_path) values('$staff_id','$filename','$filepath')";
		$conn->query($sql);
}
//imagepng($image1);

// Make zip and download folder
$zip_file = "all_image.zip";
	touch($zip_file);
	// end
	

	// open zip file
	$zip = new ZipArchive;
	$this_zip = $zip->open($zip_file);

if($this_zip){

		$folder = opendir('faculty_idcards/');
    //echo "<a href='idcards/'>View</a>";

		if($folder){
			while( false !== ($image = readdir($folder))){
				if($image !== "." && $image !== ".."){
					
					$file_with_path = "faculty_idcards/".$image;

					$zip->addFile($file_with_path,$image);
				}
			}
			closedir($folder);
		}
    
// download this created zip file
    
		if(file_exists($zip_file))  
		{  
			//name when download
			    $demo_name = "staff_id_cards.zip";

		     header('Content-type: application/zip');  
		     header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
		     readfile($zip_file); // auto download

		     //delete this zip file after download
         //$zip_file->close();
		     unlink($zip_file);  
		} 
  }