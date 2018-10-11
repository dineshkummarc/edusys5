<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<head>
 <link rel="stylesheet" href="bootstrap-theme.min.css">
<script src="typeahead.min.js"></script>
<style type="text/css">
	
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 1px solid #CCCCCC;
	
	font-size: 14px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 14px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}

</style>
</head>
<?php 
	if(isset($_GET["availibility"])){
	$searched=$_GET["name"];
	
	$searched_array=explode(",",$searched);
	$book_name=$searched_array[0];
	$author=$searched_array[1];
	
	
}
	
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
		<input type="text" name="name" class="form-control typeahead_book "  autocomplete="off" spellcheck="false" placeholder="Search Books" required>
		</div>
		
		<p><input type="submit" class="btn btn-success" name="availibility" value="Continue"></p>	
    </form>
		<?php
	if(isset($_GET["availibility"])){
	
	
		$sql_book="select * from books where book_name='".$book_name."' and author='".$author."'";
		
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
		
		<h2>Book Details</h2>
		<table class="table table-bordered" style="width: 100%; ">
		<tbody>
		<tr>
		<td style="width: 50%; ">Book Name</td>
		<td style="width: 50%; "><span style="color: #003399; "><?php echo $row_book["book_name"];?></span></td>
		</tr>
		
		<tr>
		<td style="width: 50%; ">Publisher</td>
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
   

<?php
			
}
else
{
header("Location:login.php");
}
?>  

