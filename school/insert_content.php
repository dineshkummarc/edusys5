<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["update"]))
{
	
	$page_area=$_POST["page_area"];
	$page_content=$_POST["page_content"];
	//echo $page_content;
	

	
	
	$sql="insert into website_content (page_area,page_content,academic_year) values('$page_area','$page_content','$cur_academic_year')";
	var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	//header("Location:page_content.php?success=.'success'");


	} 
	
}

}else{
		header("Location:login.php");
	}
	

?>