<?php
require("connection.php");
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

			imagejpeg($new_crop_image,"photo/".$filename,90);
		}
		}
}


	
if($_SERVER['REQUEST_METHOD']=="POST"){
  $id = $_POST["id"];
	if(isset($_FILES['photo'])&&$_FILES['photo']['type']=='image/jpeg'){
		$filetmp = $_FILES["photo"]["tmp_name"];
		$filename = time()."-".$_FILES["photo"]["name"];
		$filetype = $_FILES["photo"]["type"];
		$filepath = "photo/".$filename;
		move_uploaded_file($filetmp,$filepath);
		crop_image($filename,"210");
  //echo "<img src='$filepath' style='' />";
}
}

$sql="update students set photo_name='".$filename."',photo_path='".$filepath."',photo_type='".$filetype."'  where id='".$id."'";
var_dump($sql);

if ($conn->query($sql) === TRUE) 
	{
    header("Location:description.php?id=".$id);
  } 
	else 
	{
    header("Location:register_students.php?failed=.'failed'");
	}

  
