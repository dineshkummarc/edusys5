<?php
include('config.php');
include('api.php');
$arr['topic']='Test by Musthafa';
$arr['start_date']=date('2021-08-5 00:07:30');
$arr['duration']=30;
$arr['password']='school';
$arr['type']='2';
$result=createMeeting($arr);
if(isset($result->id)){
	echo "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
	echo "Password: ".$result->password."<br/>";
	echo "Start Time: ".$result->start_time."<br/>";
	echo "Duration: ".$result->duration."<br/>";
}else{
	echo '<pre>';
	print_r($result);
}
?>