<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//echo "outside";
if(isset($_POST["contact"]))
{
    $id=$_POST["id"];
    $present_class = $_POST["present_class"];
	$section = $_POST["section"];
    $notifi_title = mysqli_real_escape_string($conn, $_POST["subject"]);
	$notifi_desc = mysqli_real_escape_string($conn, $_POST["message"]);
	
	
    if (is_uploaded_file($_FILES['upload_file']['tmp_name'])) {
        //echo "set";
        $filetmp = $_FILES["upload_file"]["tmp_name"];
    
        $filename = $_FILES["upload_file"]["name"];
    
        $filetype = $_FILES["upload_file"]["type"];
    
        $filepath = "notification_uploads/".$filename;
    
        move_uploaded_file($filetmp,$filepath);	
        
         $sql="update notifications set notifi_title='".$notifi_title."',notifi_desc='".$notifi_desc."',filename='".$filename."',filetype='".$filetype."',filepath='".$filepath."',present_class='".$present_class."',section='".$section."' WHERE id='".$id."'";	
        }
        else
        {
        //echo "Not set";
        $sql="update notifications set notifi_title='".$notifi_title."',notifi_desc='".$notifi_desc."',present_class='".$present_class."',section='".$section."'  WHERE id='".$id."'";
        }


	if ($conn->query($sql) === TRUE) 
	{
		//echo "success";
	
	header("Location:notifications.php?success=.'success'");


	} 
	else 
	{
	//var_dump($sql);			
	header("Location:notifications.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>