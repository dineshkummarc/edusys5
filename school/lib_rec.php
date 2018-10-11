<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

error_reporting("0");


require("connection.php");
if(isset($_GET["recieve_book"]))
{
	$id=$_GET["id"];
	$bor_name=$_GET["bor_name"];
	$bor_id=$_GET["bor_id"];
	$book_name=$_GET["book_name"];
	$book_id=$_GET["book_id"];
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
	$no_books=$_GET["no_books"];
	$book_now=$no_books+1;
	$sql_update="update books set no_books=$book_now where  book_name='$book_name' and book_id='$book_id'";
	//var_dump($sql_update);
	$conn->query($sql_update);
	
	$sql="update library set recie_date='".$today_date."' where  id='".$id."'";
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:description.php?first_name=".$bor_name."&roll_no=".$bor_id);
	} 
	else 
	{
	header("Location:description.php?first_name=".$bor_name."&roll_no=".$bor_id);
	}
}
}
else
{
	header("Location:login.php");
}
	

?>