<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
$today_md=date('m-d');

include('config.php');
include('api.php');
$arr['topic']='Test by Musthafa';
$arr['start_date']=date('2021-08-5 00:07:30');
$arr['duration']=30;
$arr['password']='school';
$arr['type']='2';
$result=createMeeting($arr);
if(isset($result->id)){
	echo "Join URL: <a href='".$result->join_url."' target='_blank'>".$result->join_url."</a><br/>";
	echo "Password: ".$result->password."<br/>";
	echo "Start Time: ".$result->start_time."<br/>";
	echo "Duration: ".$result->duration."<br/>";
}else{
	echo '<pre>';
	print_r($result);
}
require("footer.php");
	}
	else
	{
	header("Location:login.php");
	}
	

?>