<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	error_reporting("0");

	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch = mysqli_query($conn, $sql_sch);
	if ($row_sch = mysqli_fetch_array($result_sch, MYSQLI_ASSOC)) {
		$approved_senderid=$row_sch["sender_id"];
		$username=$row_sch["username"];
		$password=$row_sch["user_id"];
	}
  //var_dump($sql_sch);

			$url = "http://smsc.biz/api/getcredits?username=$username&password=$password";
      //echo $url;
			$data = file_get_contents($url); // put the contents of the file into a variable
			$characters_count = json_decode($data); // decode the JSON feed
		

}

?>
