<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("header.php");	

?>

    <div class="container-fluid">
    <div class="row">
  
	<div class="col-sm-6"><br>
	<div class="panel panel-red">
     <div class="panel-heading"><h4>Get Book Details</h4></div>
      <div class="panel-body">
	  <form action="recieve_books.php" method="get">
	  <div class="form-group">
	   <label>Enter Book ID:</label>
		<input type="text" name="book_id" class="form-control" required>
		</div>
		
		<input type="submit" class="btn btn-primary" name="availibility" value="Check">
	</form>
	
	<?php
	if(isset($_GET["availibility"])){
		
	$book_id=$_GET["book_id"];
	require("connection.php");
		$sql_book="select * from books where book_id='".$book_id."'";
		$result_book=mysqli_query($conn,$sql_book);
		if($row_book=mysqli_fetch_array($result_book,MYSQLI_ASSOC))
		{
		 $no_books=$row_book["no_books"];
		 
		 ?>
		
	
		
		<hr>
		<?php if(($no_books)==0)
			{
			?>
			<p><span style="font-size: 18px; font-family: Georgia;">Status: <span style="color: red; ">
			<?php
			echo "Not Available";
			?>
			</span></span></p>
			<?php
			}
			elseif(($no_books)>0)
			{
			
			?>
			
			<p><span style="font-size: 18px; font-family: Georgia;">Status: <span style="color: green; ">
			<?php	
			
			echo "Available";
			
			?></span></span></p>
		<hr>
		
		
		<h3>Book Details</h3>
		<table class="table table-bordered" style="width: 100%; ">
		<tbody>
		<tr>
		<td style="width: 50%; ">Book Name</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["book_name"];?></span></td>
		</tr>
		
		<tr>
		<td style="width: 50%; ">Category</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["cat"];?></span></td>
		</tr>
		
		<tr>
		<td style="width: 50%; ">Author Name</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["author"];?></span></td>
		</tr>
		
		<tr>
		<td style="width: 50%; ">Available Books</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["no_books"];?></span></td>
		</tr>
		
		<tr>
		<td style="width: 50%; ">Book ID</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["book_id"];?></span></td>
		</tr>
		
		<tr>
		<td style="width: 50%; ">Shelf No</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["shelf_no"];?></span></td>
		</tr>
		</tbody>
		</table>
		
		
		<?php
		
		 }
		 }
		 }
		if(isset($_GET["book_name"])){ 
		$book_name=$_GET["book_name"]; 
		}
	
		?>
		
		
		
		
		
		
	
	
    </div>
    </div>
    </div>
	
	<div class="col-sm-6"><br>
	<div class="panel panel-green">
     <div class="panel-heading"><h4>Recieve Books</h4></div>
      <div class="panel-body">
	
	<form action="lib_rec.php" method="get">
       
		
		<div class="form-group">
	   <label>Borrower Name:</label>
		<input type="text" name="bor_name" class="form-control" required>
		</div>
		
		<div class="form-group">
	   <label>Available No of Books</label>
		<input type="number" name="no_books" class="form-control" value="<?php echo $no_books;?>">
		</div>
		
		<div class="form-group">
	   <label>Borrower ID:</label>
		<input type="text" name="bor_id" class="form-control" required>
		</div>
		
		<div class="form-group">
	   <label>Select Book Name:</label>
		<?php
			require("connection.php");
			echo '<select name="book_name" class="form-control" required>';
			echo '<option value="">-------</option>';
			$sql="select book_name from books";
			$result=mysqli_query($conn,$sql);
			foreach($result as $value)
			{
			?>
			<option value='<?php echo $value["book_name"];?>'><?php echo $value["book_name"];?></option>
			<?php
			}
			
			?>
			</select>
			</div>
			
			<div class="form-group">
	   <label>Book ID:</label>
		<input type="text" name="book_id" class="form-control" required>
		</div>
		
		<div class="form-group">
	   <label>Recieved Date:</label>
		<input type="date" name="recie_date" class="form-control" required>
		</div>
		
		<input type="submit" class="btn btn-success" name="recieve_book" value="Submit">
	</form>	
		
	
	
    </div>
    </div>
    </div>
    </div>
    </div>
	

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
