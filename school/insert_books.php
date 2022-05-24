<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["add_book"]))
{
	
	$book_name=$_POST["book_name"];
	$cat=$_POST["cat"];
	$book_id=$_POST["book_id"];
	$author=$_POST["author"];
	$edition=$_POST["edition"];
	$no_books=$_POST["no_books"];
	$shelf_no=$_POST["shelf_no"];

	$spons=$_POST["spons"];
	
	$sql="insert into books (book_name,cat,book_id,shelf_no,author,edition,no_books,spons,tot_books,academic_year) values('$book_name','$cat','$book_id','$shelf_no','$author','$edition','$no_books','$spons',tot_books+'$no_books','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:add_book.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:add_book.php?failed=.'failed'");	
		
	}


}

}else{
		header("Location:login.php");
	}
	

?>