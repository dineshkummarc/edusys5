<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("connection.php");
//echo "outside";
if(isset($_POST["contact"]))
{
	$present_class = $_POST["present_class"];
	$section = $_POST["section"];
	$notifi_title = mysqli_real_escape_string($conn, $_POST["subject"]);
	$notifi_desc = mysqli_real_escape_string($conn, $_POST["message"]);
	
	$filetmp = $_FILES["upload_file"]["tmp_name"];
	$filename = $_FILES["upload_file"]["name"];
	$filetype = $_FILES["upload_file"]["type"];
	$filepath = "notification_uploads/".$filename;
    move_uploaded_file($filetmp,$filepath);
    
	
	$sql="insert into notifications (notifi_title,notifi_desc,filename, filetype, filepath,academic_year,present_class,section) values('$notifi_title','$notifi_desc','$filename','$filetype','$filepath','$cur_academic_year','$present_class','$section')";
    //var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
		//echo "success";
	
	header("Location:send_notification.php?success=.'success'");


	} 
	else 
	{
	//var_dump($sql);			
	header("Location:send_notification.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>