<?php
session_start();
if(isset($_SESSION['staff_uname'])&&isset($_SESSION['staff_pass'])&&isset($_SESSION['admin_id']))
{
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];
require("connection.php");
if(isset($_POST["edit_reply"]))
{
	$reply = mysqli_real_escape_string($conn, $_POST["reply"]);
    $video_id = $_POST["video_id"];
    $reply_id = $_POST["reply_id"];
	
    $sql = "update comment_reply set reply='".$reply."' where id='".$reply_id."' and admin_id='".$admin_id."'";    
    //var_dump($sql);
	if ($conn->query($sql) === TRUE) 
	{
    header("Location:video_description.php?id=".$video_id."&success=.'success'");
	} 
	else 
	{
	//var_dump($sql);			
	header("Location:video_description.php?id=".$video_id."&failed=.'failed'");	
		
	}
}
	}else{
		header("Location:login.php");
	}
	
?>