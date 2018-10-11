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
      <div class="panel-heading">Books Availibility</div>
      <div class="panel-body">
		
		 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get"  role="form">
     
		<div class="form-group">
		  <label for="usr">Book Name:</label>
		  <input type="text" class="form-control" id="book_name" name="name" required>
		</div>
	
		<p><input type="submit" class="btn btn-success" name="availibility" value="Continue"></p>	
    </form>
		<?php
	if(isset($_GET["availibility"])){
		
	$book_name=$_GET["name"];
	
		$sql_book="select * from books where book_name='".$book_name."'";
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
			echo "<span style='font-size:30px;'>Not Available</span>";
			?>
			</span></span></p>
			<?php
			}
			elseif(($no_books)>0)
			{
			
			?>
			
			<p><span style="font-size: 18px; font-family: Georgia;">Status: <span style="color: green; ">
			<?php	
			
			echo "<span style='font-size:30px;'>Searched Book is Available</span>";
			
			?></span></span></p>
		<hr>
		<p><br></p>
		
		<h2>Book Details</h2>
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
		
		<tr>
		<td style="width: 50%; ">Edition</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["edition"];?></span></td>
		</tr>
		</tbody>
		</table>
		<br>
		<a href="all_books.php">View All Books&nbsp;&gt;&gt;</a>
			
		<br><p><br></p>
		</p>
		
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
   
	<div class="col-sm-3">
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

