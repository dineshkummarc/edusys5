<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

error_reporting("0");


require("connection.php");
if(isset($_GET["search_student"]))
{
	$searched=$_GET["typeahead"];
	$searched_array=explode(",",$searched);
	$bor_name=$searched_array[0];
	$present_class=$searched_array[1];
	$bor_id=$searched_array[2];
	$book_name=$_GET["book_name"];
	$book_id=$_GET["book_id"];
	$no_books=$_GET["no_books"];
	//$recie_date=$_GET["recie_date"];
	
ob_start();
date_default_timezone_set("Asia/Kolkata");
$recie_date=date("Y-m-d");

	$book_now=$no_books+1;
		
	$sql_update="update books set no_books='".$book_now."' where  book_name='".$book_name."' and book_id='".$book_id."'";
	$conn->query($sql_update);
	
	$sql="update library set recie_date='".$recie_date."' where bor_name='".$bor_name."' and bor_id='".$bor_id."' and book_name='".$book_name."' and book_id='".$book_id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:recieve_books.php?book_name=".$book_name);
	} 
	else 
	{
	header("Location:recieve_books.php?failed=.'failed'");	
	}


}

require("footer.php");
	}
	else
	{
		header("Location:login.php");
	}
	

?>