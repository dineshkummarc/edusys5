<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id']))
{
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];
$admin_id=$_SESSION['admin_id'];

require("connection.php");
if(isset($_POST["online"]))
{
    $id = $_POST["id"];
	$present_class = $_POST["class_teach"];
	$subject_name = $_POST["subject_name"];
	$chapter = $_POST["chapter"];
	$url = $_POST["url"];
    $details = mysqli_real_escape_string($conn, $_POST["details"]);    


    if (is_uploaded_file($_FILES['upload_file']['tmp_name'])) {
        //echo "set";
        $filetmp = $_FILES["upload_file"]["tmp_name"];
        $filename = $_FILES["upload_file"]["name"];
        $filetype = $_FILES["upload_file"]["type"];
        $filepath = "../school/online_class_uploads/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $sql = "UPDATE online_class SET present_class='".$present_class."',subject_name='".$subject_name."',chapter='".$chapter."',url='".$url."',details='".$details."',filename='".$filename."',filepath='".$filepath."',filetype='".$filetype."',admin_id='".$admin_id."' where id='".$id."'";
        }
        else
        {
        //echo "Not set";
        $sql = "UPDATE online_class SET present_class='".$present_class."',subject_name='".$subject_name."',chapter='".$chapter."',url='".$url."',details='".$details."',admin_id='".$admin_id."' where id='".$id."'";
        }


        
        if ($conn->query($sql) === TRUE) 
        {
        
        header("Location:index.php?success=.'success'");
        } 
        else 
        {		
        header("Location:index.php?failed=.'failed'");	
            
        }


    }

	}else{
		header("Location:login.php");
	}
	
?>