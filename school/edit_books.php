<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
if(isset($_GET["id"])){
$id=$_GET["id"];
}
$sql="select * from books where id ='".$id."'";
//var_dump($sql);
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
	$id=$row["id"];
	
	}
?>
<div class="container-fluid"><br>
<div class="row">
 
    <div class="col-sm-3">
	</div>
	<div class="col-sm-6">
	
     
		<div class="panel panel-green">
      <div class="panel-heading"><h2>Update Book</h2></div>
      <div class="panel-body">
		
		<form action="update_books.php" method="post">
	
        
		 <?php
	if(isset($_GET["failed"]))

		{
		$failed=$_GET["failed"];
		echo '<div class="alert alert-danger">
		<strong>Error ! </strong>Given inputs are not matching.Please select proper inputs and try again.
		</div>';
		}else if(isset($_GET["success"])){
			echo '<div class="alert alert-success">
  <strong>Thank You.!</strong>  Book has been added Successfully.
</div>';
		}
	
	?>
	 <div class="form-group">
	<label for="usr">Book Name:</label>
	<input type="text" name="book_name" value="<?php echo $row["book_name"];?>" class="form-control" required>
	</div>
	
	<div class="form-group">
		  <label for="usr">Publisher</label>
		<input type="text" name="cat" value="<?php echo $row["cat"];?>" class="form-control">
		</div>
	
	     <div class="form-group">
		  <label for="usr">Book ID:</label>
		<input type="text" name="book_id" value="<?php echo $row["book_id"];?>" class="form-control" required>
		</div>
		
		<div class="form-group">
		  <label for="usr">Author Name:</label>
		<input type="text" name="author" value="<?php echo $row["author"];?>" class="form-control">
		</div>
		
		<div class="form-group">
		  <label for="usr">Edition (if any):</label>
		<input type="text" name="edition" value="<?php echo $row["edition"];?>" class="form-control">
		</div>
		
		<div class="form-group">
		  <label for="usr">No.of Books:</label>
		<input type="number" name="no_books" value="<?php echo $row["no_books"];?>" class="form-control" required>
		</div>
		
		
		<input type="hidden" name="id" value="<?php echo $row["id"];?>">
		&nbsp;<input type="submit" class="btn btn-success" value="Update" name="add_book">&nbsp;<br>
		
	</form>	
		
    </div>
	
    </div>
    </div>
   
	<div class="col-sm-3">
	</div>
	</div>
	</div>

<?php
			
}
else
{
header("Location:login.php");
}
?>  

