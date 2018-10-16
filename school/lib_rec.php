<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

error_reporting("0");


require("connection.php");
if(isset($_GET["recieve_book"]))
{
	
	$bor_name=$_GET["bor_name"];
	$bor_id=$_GET["bor_id"];
	$book_name=$_GET["book_name"];
	$book_id=$_GET["book_id"];
	
	$recie_date=$_GET["recie_date"];
	$no_books=$_GET["no_books"];


	
	$book_now=$no_books+1;
		
	$sql_update="update books set no_books=$book_now where academic_year='".$cur_academic_year."' and book_name='$book_name' and book_id='$book_id'";
	if ($conn->query($sql_update) === TRUE) 
	{
		
	}
		
	
	$sql="update library set recie_date='".$recie_date."' where academic_year='".$cur_academic_year."' and bor_name='".$bor_name."' and bor_id='".$bor_id."' and book_name='".$book_name."' and book_id='".$book_id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	
	
	header("Location:recieve_books.php?book_name=".$book_name);


	} 
	else 
	{
				
	header("Location:recieve_books.php?failed=.'failed'");	
		
	}


}




	}
	else
	{
		header("Location:login.php");
	}
	

?>