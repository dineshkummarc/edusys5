<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
$title = "Book Details";
require("header.php");
require("connection.php");
?>

    <div class="container-fluid">
    <div class="row" >
    <div class="col-sm-1" >
	
	</div>
	
	<div class="col-sm-10" >
	<h1>Book Details</h1>
	<div class="table-responsive" >
        <table class="table table-bordered"><tbody>
		<tr>
		<?php 
		if((isset($_GET["book_name"]))&&(isset($_GET["book_id"])))
		{
		$book_name=$_GET["book_name"];
		$book_id=$_GET["book_id"];
		
		$sql="select * from books where book_name='".$book_name."' and book_id='".$book_id."'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		
		?>
		<td style="width: 50%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; "><center><img width="300" height="203" alt="" class="dc-lightbox" src="images/shutterstock_1360528.jpg"></center><br></td>
		
		<td><p><span style="font-size: 20px; color: #1B698D; ">Book Name : <?php  echo $book_name;?></span></p>
		<p><span style="font-size: 20px; color: #1B698D; ">Category : <?php  echo $row["cat"];?></span></p>
		<p><span style="font-size: 16px; color: #1B698D; ">Edition : <?php  echo $row["edition"];?></span></p>
		<p><span style="font-size: 16px; color: #1B698D; ">Book ID : <?php  echo $row["book_id"];?></span></p>
		<span style="font-size: 16px; "><p><span style="color: #1B698D; ">Author : <?php  echo $row["author"];?></span></p>
		<p><span style="color: #1B698D; ">Shelf NO : <?php  echo $row["shelf_no"];?></span></p>
		<p><span style="color: #1B698D; ">Total No.Books : <?php  echo $row["tot_books"];?></span></p>
		<p><span style="color: #1B698D; ">No of books Availble : <?php  echo $row["no_books"];?></span></p>
		<p><span style="color: #1B698D; ">Sponsored by : <?php  echo $row["spons"];?></span></p>
		<p><span style="font-weight: bold;"><span style="color: #1B698D; ">Status</span> : <span style="color: #3A8627; "><?Php if($row["no_books"]>0){echo "Available";}else if($row["no_books"]==0){echo "<span style='color:red;'>Not Available</span>";}?></span></span></p></span></td>
		
		<?php
		}
		}
		?>
		</tr>
		</tbody>
		</table>
    </div>
    </div>
	 <div class="col-sm-1" >
	
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
