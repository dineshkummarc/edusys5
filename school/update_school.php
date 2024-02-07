<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$mark_uname=$_SESSION['lkg_uname'];
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("Y/m/d");

require("connection.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$sch_name=$_POST["sch_name"];
	$location=$_POST["location"];
	$city=$_POST["city"];
	$district=$_POST["district"];
	$state=$_POST["state"];
	$pin=$_POST["pin"];
	$phone=$_POST["phone"];
	$mob=$_POST["mob"];
	$email=$_POST["email"];
	$web=$_POST["web"];
	$sender_id=$_POST["sender_id"];
	$sch_dise1=$_POST["sch_dise1"];
	$sch_dise2=$_POST["sch_dise2"];
	$sch_dise3=$_POST["sch_dise3"];
	$sch_dise4=$_POST["sch_dise4"];
	$id=$_POST["id"];

	$username=$_POST["username"];
	$user_id=$_POST["user_id"];
	$sms_school_name=$_POST["sms_school_name"];
	

	if (is_uploaded_file($_FILES['photo']['tmp_name'])) 
	{
		if(isset($_FILES['photo'])&&$_FILES['photo']['type']=='image/png'){
			$filetmp = $_FILES["photo"]["tmp_name"];
			$filename = $_FILES["photo"]["name"];
			$filetype = $_FILES["photo"]["type"];
			$filepath = "images/".$filename;
			move_uploaded_file($filetmp,$filepath);
		}

		$sql="update school_det set sch_name='".$sch_name."',sch_dise1='".$sch_dise1."',sch_dise2='".$sch_dise2."',sch_dise3='".$sch_dise3."',sch_dise4='".$sch_dise4."',location='".$location."',city='".$city."',district='".$district."',state='".$state."',pin='".$pin."',phone='".$phone."',mob='".$mob."',email='".$email."',web='".$web."',sender_id='".$sender_id."',username='".$username."',user_id='".$user_id."',sms_school_name='".$sms_school_name."',photo_name='".$filename."',photo_path='".$filepath."',photo_type='".$filetype."' where id='".$id."'";

	}
	else
	{
		$sql="update school_det set sch_name='".$sch_name."',sch_dise1='".$sch_dise1."',sch_dise2='".$sch_dise2."',sch_dise3='".$sch_dise3."',sch_dise4='".$sch_dise4."',location='".$location."',city='".$city."',district='".$district."',state='".$state."',pin='".$pin."',phone='".$phone."',mob='".$mob."',email='".$email."',web='".$web."',sender_id='".$sender_id."',username='".$username."',user_id='".$user_id."',sms_school_name='".$sms_school_name."' where id='".$id."'";
	}
	//var_dump($sql);
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:schools.php?success=.'success'");
} 
	else 
	{
	header("Location:schools.php?failed=.'failed'");	
	}
}

}
else
{
	header("Location:login.php");
}


	
?>