<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");
if(isset($_GET["issue_book"]))
{
	
	$bor_name=$_GET["bor_name"];
	$bor_id=$_GET["bor_id"];
	$book_name=$_GET["book_name"];
	$book_id=$_GET["book_id"];
	$iss_date=$_GET["iss_date"];

	$no_books=$_GET["no_books"];
	


	
	if(($no_books)==0){
		
		
	}
	elseif(($no_books)>=1){
		$book_now=$no_books-1;
		
		$sql_update="update books set no_books=$book_now where book_name='$book_name' and book_id='$book_id'";
		if ($conn->query($sql_update) === TRUE) 
	{
		
	}
		
	$sql="insert into library (bor_name,bor_id,book_name,book_id,iss_date) values('$bor_name','$bor_id','$book_name','$book_id','$iss_date')";
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:issue_book.php?book_name=".$book_name);
	
	
	}
	}
	}
	
	

	}
	else
	{
		header("Location:login.php");
	}
	


?>