<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["online"]))
{
    $id = $_POST["id"];
	$present_class = $_POST["present_class"];
	$section = $_POST["section"];
	$subject_name = $_POST["subject_name"];
	$chapter = $_POST["chapter"];
	$url = $_POST["url"];
    $details = mysqli_real_escape_string($conn, $_POST["details"]);
    


    if (is_uploaded_file($_FILES['upload_file']['tmp_name'])) {
        //echo "set";
        $filetmp = $_FILES["upload_file"]["tmp_name"];
        $filename = $_FILES["upload_file"]["name"];
        $filetype = $_FILES["upload_file"]["type"];
        $filepath = "online_class_uploads/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $sql = "UPDATE online_class SET present_class='".$present_class."',section='".$section."',subject_name='".$subject_name."',chapter='".$chapter."',url='".$url."',details='".$details."',filename='".$filename."',filepath='".$filepath."',filetype='".$filetype."',academic_year='".$cur_academic_year."' where id='".$id."'";
        }
        else
        {
        //echo "Not set";
        $sql = "UPDATE online_class SET present_class='".$present_class."',section='".$section."',subject_name='".$subject_name."',chapter='".$chapter."',url='".$url."',details='".$details."',academic_year='".$cur_academic_year."' where id='".$id."'";
        }


        
        if ($conn->query($sql) === TRUE) 
        {
        
        header("Location:all_online_classes.php?success=.'success'");
        } 
        else 
        {		
        header("Location:all_online_classes.php?failed=.'failed'");	
            
        }


    }

	}else{
		header("Location:login.php");
	}
	
?>