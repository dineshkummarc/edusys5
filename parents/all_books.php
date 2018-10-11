<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row">
 
    <div class="col-sm-12">
	
	<div class="form-group">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
		  <div class="form-group">
			  <label for="sel1">Show by Category:</label>
			  <select class="form-control" name="filt_cat" id="sel1">
				<option value="">Select Category</option>
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
		  <button type="submit" name="filt_cat_submit" class="btn btn-success">Filter</button>
		</form>
		
	</div><hr>
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
		
		<td style="width: 18%; "><span style="font-weight: bold;">Category</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Author</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Edition</span></td>
		<td style="width: 14%; "><span style="font-weight: bold;">Total No.Books</span></td>
		<td style="width: 14%; "><span style="font-weight: bold;">Shelf No</span></td>
		<td style="width: 10%; "><span style="font-weight: bold;">No.of Books Available</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Sponsored By</span></td>
		
		</tr>
		<?php
		require("connection.php");
		$num_rec_per_page=20;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		if(isset($_GET["filt_cat_submit"]))
		{
		if(isset($_GET["filt_cat"]))
		{
		$filt_cat=$_GET["filt_cat"];
		
		$sql="select * from books where cat='".$filt_cat."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
		}
		}
		else{
		$sql="select * from books ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
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
		<td style="width: 10%; "><span style="color: #207FA2; "><?php echo $value["shelf_no"];?></span></td>
		<td style="width: 10%; "><span style="color: #207FA2; "><?php echo $value["no_books"];?></span></td>
		<td style="width: 14%; "><span style="color: #207FA2; "><?php echo $value["spons"];?></span></td>
		
		
		
		</tr>
		<?php
		$row_count++;
		
		}
		
		if(isset($_GET["filt_cat_submit"]))
		{
		if(isset($_GET["filt_cat"]))
		{
		$filt_cat=$_GET["filt_cat"];
		
		$sql="select * from books where cat='".$filt_cat."'";
		$result=mysqli_query($conn,$sql);
		$total_books=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of Books on ".$filt_cat." Category = ".$total_books.'</p>';
		}
		}
		else{
		$sql="select * from books";
		$result=mysqli_query($conn,$sql);
		$total_books=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total Books = ".$total_books.'</p>';
		}
		?>
		
		<?php 
			$sql = "SELECT * FROM books"; 
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

