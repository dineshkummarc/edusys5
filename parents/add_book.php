<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{ 
require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row">
 
    <div class="col-sm-3">
	</div>
	<div class="col-sm-6">
	
     
		<div class="panel panel-green">
      <div class="panel-heading"><h2>Add Book</h2></div>
      <div class="panel-body">
		
		<form action="insert_books.php" method="post">
	
        
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
		<input type="text" name="book_name" class="form-control" required>
		</div>
		<div class="form-group">
		  <label for="usr">Select Category:</label>
		  <select name="cat" class="form-control" required>
				  <option value="">Select Book Category</option>
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
		<input type="text" name="book_id" class="form-control" required>
		</div>
		
		<div class="form-group">
		  <label for="usr">Shelf Number:</label>
		<input type="text" name="shelf_no" class="form-control">
		</div>
		
		<div class="form-group">
		  <label for="usr">Author Name:</label>
		<input type="text" name="author" class="form-control">
		</div>
		
		<div class="form-group">
		  <label for="usr">Edition (if any):</label>
		<input type="text" name="edition" class="form-control">
		</div>
		
		<div class="form-group">
		  <label for="usr">No.of Books:</label>
		<input type="number" name="no_books" class="form-control" required>
		</div>
		
		<div class="form-group">
		  <label for="usr">Sponsored by:</label>
		<input type="text" name="spons" class="form-control">
		</div>
		
		&nbsp;<input type="submit" class="btn btn-success" value="Add Book" name="add_book">&nbsp;<br>
		
	</form>	
		
    </div>
	
    </div>
    </div>
   
	<div class="col-sm-3">
	</div>
	</div>
	</div>
	<!-- jQuery -->
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
<?php
			
}
else
{
header("Location:login.php");
}
?>  

