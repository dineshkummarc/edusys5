<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
//Kapsystem Bulk sms integration code.
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
$username= "musthafa6"; //use your sms api username
$pass    = "kap@user!123";  //enter your password
$sms         =     "Test Message from HTTP API";//sms content
$senderid    =     "ANVHDA";//use your sms api sender id
//sms url with variables.
$sms_url = sprintf("http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=".$username."&pass=".$pass."&senderid=".$senderid."&dest_mobileno=".$dest_mobileno."&tempid=".$tempid."&F1=".$f1."&F2=".$f2."&F3=".$f3."&response=Y", $username, $pass , $senderid, $dest_mobileno, $message, urlencode($sms) );
openurl($sms_url);

}
?>