<?php
/*

extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("photo_gallery/".$txtGalleryName."/".$file_name))
                    {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$txtGalleryName."/".$file_name);
						
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$txtGalleryName."/".$newFileName);
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
			
			*/

require("connection.php");

date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");
if(isset($_POST["upl_scan_doc"]))
{
	
  $upl_doc_name=$_POST["upl_doc_name"];		
  $filetmp = $_FILES["photo"]["tmp_name"];
  $filename = $_FILES["photo"]["name"];
  $filetype = $_FILES["photo"]["type"];
  $filepath = "documents/".$filename;
   move_uploaded_file($filetmp,$filepath);	
   $sql="insert into uploaded_documents (upl_doc_name,upl_file_name,upl_file_path,upl_file_type,upl_date) values('$upl_doc_name','$filename','$filepath','$filetype','$today')";
   $conn->query($sql);
	
}

	
	header("Location:documents.php?success=.'success'");
