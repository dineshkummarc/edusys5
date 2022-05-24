<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_GET["search_student"]))
{
	$searched=$_GET["typeahead"];
	$searched_array=explode(",",$searched);
	$student_id=$searched_array[0];
	//$present_class=$searched_array[1];
	//$bor_id=$searched_array[2];
	$book_name=$_GET["book_name"];
	echo $book_name;
	$book_id=$_GET["book_id"];
	$no_books=$_GET["no_books"];
	
	
	if(($no_books)>=1){
	$book_now=$no_books-1;
	$sql_update="update books set no_books='".$book_now."' where  book_id='".$book_id."'";
		//var_dump($sql_update);
	$conn->query($sql_update);	
	$sql="insert into library (student_id,book_name,book_id,academic_year) values('$student_id','$book_name','$book_id','$cur_academic_year')";
	$conn->query($sql);
	//var_dump($sql);
	}
	header("Location:issue_book.php?success=success");
}
require("footer.php");	
}
else
{
header("Location:login.php");
}
	


?>