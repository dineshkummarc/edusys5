<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
error_reporting("0");
$tempid=54196;
$class=$_POST["class_noti"];
$section=$_POST["section_noti"];
$f1=$_POST["f1"];
$f2=$_POST["f2"];
$f3=$_POST["f3"];
$sql="select parent_contact from students where academic_year='".$cur_academic_year."' and class_join='".$class."' and section='".$section."'";
$result=mysqli_query($conn,$sql);
var_dump($sql);
echo $f1;
echo $f2;
echo $f3;
foreach($result as $value){
$dest_mobileno=$value["parent_contact"];

//Kapsystem Bulk sms integration code.
$username= ""; //use your sms api username
$pass    = "";  //enter your password
$sms         =     "Test Message from HTTP API";//sms content
$senderid    =     "";//use your sms api sender id

//sms url with variables.
$sms_url = sprintf("http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=".$username."&pass=".$pass."&senderid=".$senderid."&dest_mobileno=".$dest_mobileno."&tempid=".$tempid."&F1=".$f1."&F2=".$f2."&F3=".$f3."&response=Y", $username, $pass , $senderid, $dest_mobileno, $message, urlencode($sms) );
openurl($sms_url);

	
}
function openurl($url) {
  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch,CURLOPT_TIMEOUT, '3');  
  $content = trim(curl_exec($ch));  
  curl_close($ch); 
  echo $url;
 }
header("Location:send_noti.php?success=.'success'");
}
?>