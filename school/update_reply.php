<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//echo "outside";
if(isset($_POST["edit_reply"]))
{
	$reply = mysqli_real_escape_string($conn, $_POST["reply"]);
    $video_id = $_POST["video_id"];
    $reply_id = $_POST["reply_id"];
	
    $sql = "update comment_reply set reply='".$reply."' where id='".$reply_id."'";    
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