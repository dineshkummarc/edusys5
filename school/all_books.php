<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row">
 
    <div class="col-sm-6">
	
	<div class="form-group">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
		<div class="form-group">
		 <?php echo '<select class="form-control" name="filt_cat">';
			echo '<option value="">Select Publisher</option>';
				

				$sql="select distinct cat from books";

				 $result=mysqli_query($conn,$sql);

				foreach($result as $value)
				{
				?>
				<option value='<?php echo $value["cat"];?>'><?php echo $value["cat"];?></option>
				<?php
				}
				echo '</select><br>';

				?>
		</div>
		  <button type="submit" name="filt_cat_submit" class="btn btn-success">Filter</button>
		</form>
		
	</div><hr>
	</div>
	 <div class="col-sm-6">
	<form action="export_books.php" method="post" name="export_excel">
		<div class="control-group">
			<div class="controls">
				<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
			</div>
		</div>
		</form>
	</div>
	</div>
	
	
	
	<div class="row">
 
    
	<div class="col-sm-12">
	
	   <center><h2>All Books</h2></center>
	
        <center>
		<div class="table-responsive"> 
		<table class="table table-bordered table-striped">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL.No</span></td>
		<td style="width: 19%; "><span style="font-weight: bold;">Book Name</span></td>
		
		<td style="width: 10%; "><span style="font-weight: bold;">Book ID</span></td>
		
		<td style="width: 18%; "><span style="font-weight: bold;">Publisher</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Author</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Edition</span></td>
		<td style="width: 14%; "><span style="font-weight: bold;">Total No.Books</span></td>
		<td style="width: 10%; "><span style="font-weight: bold;">No.of Books Available</span></td>
		
		
		<td></td>
		
		</tr>
		<?php
		require("connection.php");
		$num_rec_per_page=300;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		if(isset($_GET["filt_cat_submit"]))
		{
		if(isset($_GET["filt_cat"]))
		{
		$filt_cat=$_GET["filt_cat"];
		
		$sql="select * from books where cat='".$filt_cat."' and academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
		}
		}
		else{
		$sql="select * from books where academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
		}
		$result=mysqli_query($conn,$sql);
		$row_count =1;
		foreach($result as $value)
		{
		$edition=$value["edition"];	
		$author=$value["author"];	
			
			
		?>
		<tr>
		
		<?php 
		$book_name = $value["book_name"];
		$book_id = $value["book_id"];
		?>
		
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td style="width: 17%; "><a href="<?php echo 'lib_description.php?book_name='.$book_name.'&book_id='.$book_id;?>"><span style="color: #207FA2; "><?php echo $value["book_name"];?></span></a></td>
		
		<td style="width: 12%; "><span style="color: #207FA2; "><?php echo $value["book_id"];?></span></td>
		
		<td style="width: 18%; "><span style="color: #207FA2; "><?php echo $value["cat"];?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php if(($author)!=""){ echo $value["author"];}else{echo "Unknown";}?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php if(($edition)!=""){ echo $value["edition"];}else{echo "Unknown";}?></span></td>
		<td style="width: 10%; "><span style="color: #207FA2; "><?php echo $value["tot_books"];?></span></td>
		
		<td style="width: 10%; "><span style="color: #207FA2; "><?php echo $value["no_books"];?></span></td>
		
		<td><div class="btn-group">
        <a href="<?php echo 'edit_books.php?id='.$value['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_books.php?id='.$value['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
		
		
		
		</tr>
		<?php
		$row_count++;
		
		}
		
		if(isset($_GET["filt_cat_submit"]))
		{
		if(isset($_GET["filt_cat"]))
		{
		$filt_cat=$_GET["filt_cat"];
		
		$sql="select * from books where cat='".$filt_cat."' and academic_year='".$cur_academic_year."'";
		$result=mysqli_query($conn,$sql);
		$total_books=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of Books on ".$filt_cat." Category = ".$total_books.'</p>';
		}
		}
		else{
		$sql="select * from books where academic_year='".$cur_academic_year."'";
		$result=mysqli_query($conn,$sql);
		$total_books=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total Books = ".$total_books.'</p>';
		}
		?>
		
		<?php 
			$sql = "SELECT * FROM books where academic_year='".$cur_academic_year."'"; 
			$result = mysqli_query($conn,$sql); //run the query
			$total_records = mysqli_num_rows($result);  //count number of records
			$total_pages = ceil($total_records / $num_rec_per_page); 

			echo "<a href='all_books.php?page=1'>".' First '."</a> "; // Goto 1st page  

			for ($i=1; $i<=$total_pages; $i++) { 
						echo "<a href='all_books.php?page=".$i."'>   ".$i. "   </a> "; 
			}; 
			echo "<a href='all_books.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
			?>
		</tbody>
		</table>
		</div>
		</center>
		<br>
		<br>
		<br>
		<br>
	
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

