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
$sql="select * from books where id ='".$id."'  and academic_year='".$cur_academic_year."'";
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
		  <label for="usr">Select Category:</label>
		  <select name="cat" class="form-control" required>
				  <option value="<?php echo $row["cat"];?>"><?php echo $row["cat"];?></option>
				  <option value="accounting">Accounting</option>
				  <option value="agriculture/forestry">Agriculture/Forestry</option>
				  <option value="art/art history/design">Art/Art History/Design</option>
				  <option value="architecture">Architecture</option>
				  <option value="biology">Biology</option>
				  <option value="business administration">Business Administration</option>
				  <option value="chemistry">Chemistry</option>
				  <option value="child and family services">Child and Family Services</option>
				  <option value="communications">Communications</option>
				  <option value="criminal justice">Criminal Justice</option>
				  <option value="dance">Dance</option>
				  <option value="early childhood">Early Childhood</option>
				  <option value="earth science">Earth Science</option>
				  <option value="economics">Economics</option>
				  <option value="education">Educaiton</option>
				  <option value="english">English</option>
				  <option value="environmental science">Environmental Science</option>
				  <option value="finance">Finance</option>
				  <option value="health education">Health Educaiton</option>
				  <option value="history">History</option>
				  <option value="international relations">International Relations</option>
				  <option value="management">Management</option>
				  <option value="marketing">Marketing</option>
				  <option value="mathematics">Mathematics</option>
				  <option value="medicine">Medicine</option>
				  <option value="music">Music</option>
				  <option value="nursing">Nursing</option>
				  <option value="occupational therapy">Occupational Therapy</option>
				  <option value="Philosophy">Philosophy</option>
				  <option value="physical education">Physical Education</option>
				  <option value="physics">Physics</option>
				  <option value="political science">Political Science</option>
				  <option value="Psychology">Psychology</option>
				  <option value="public health">Public Health</option>
				  <option value="religion">Religion</option>
				  <option value="social work">Social Work</option>
				  <option value="sociology">Sociology</option>
				  
	</select>
	</div>
	
	     <div class="form-group">
		  <label for="usr">Book ID:</label>
		<input type="text" name="book_id" value="<?php echo $row["book_id"];?>" class="form-control" required>
		</div>
		
		<div class="form-group">
		  <label for="usr">Shelf Number:</label>
		<input type="text" name="shelf_no" value="<?php echo $row["shelf_no"];?>" class="form-control">
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
		
		<div class="form-group">
		  <label for="usr">Sponsored by:</label>
		<input type="text" name="spons" value="<?php echo $row["spons"];?>" class="form-control">
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
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  

