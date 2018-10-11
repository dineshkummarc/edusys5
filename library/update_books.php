<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

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
	$id=$_POST["id"];
	
	
	$sql="update books set book_name='".$book_name."',cat='".$cat."',book_id='".$book_id."',shelf_no='".$shelf_no."',author='".$author."',edition='".$edition."',no_books='".$no_books."',spons='".$spons."',no_books='".$no_books."',tot_books='".$no_books."' where id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:all_books.php?success=.'success'");


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