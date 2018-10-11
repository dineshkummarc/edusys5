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
 
    <div class="col-sm-12">
	   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		  <label for="sel1">Filter by Returned or Not:</label>
		  <select class="form-control" name="filt_lib" id="sel1">
			<option value="">Select Category</option>
			  <option value="returned">Returned</option>
			  <option value="not returned">Not Returned</option>
			  
		</select>
		</div>
	  <button type="submit" name="filt_lib_submit" class="btn btn-primary">Filter</button>
	</form>
	<br>
	</div>
	</div>
	
	
	<div class="row">
 
   
	<div class="col-sm-12">
	
     
	<div class="panel panel-green">
     <div class="panel-heading"><h4>Library Details</h4></div>
      <div class="panel-body">
	   <center>
		<table class="table table-bordered" style="width: 95%; ">
        <tbody>
		<tr>
		<td style="width: 10%; "><span style="font-weight: bold;">SL No</span></td>
		<td style="width: 15%; "><span style="font-weight: bold;">Borrower Name</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Borrower ID</span></td>
		
		<td style="width: 19%; "><span style="font-weight: bold;">Book Name</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Book ID</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Issued Date</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Returned Date</span></td>
		
		</tr>
		<?php
		require("connection.php");
		$num_rec_per_page=200;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		
		if(isset($_GET["filt_lib"]))
		{
		$filt_lib=$_GET["filt_lib"];
		if(($filt_lib)=="returned")
		{
			$sql="select * from library where academic_year='".$cur_academic_year."' and recie_date!='0000-00-00' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
		}
		else if(($filt_lib)=="not returned")
		{
			$sql="select * from library where academic_year='".$cur_academic_year."' and recie_date='0000-00-00' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";	
		}
		
		}else{
			$sql="select * from library where academic_year='".$cur_academic_year."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
		}
		
		$result=mysqli_query($conn,$sql);
		$row_count = 1;
			$total_books=mysqli_num_rows($result);
		foreach($result as $value)
		{
		
		$recie_date=$value["recie_date"];	
		$iss_date= date('d-m-Y', strtotime( $value['iss_date'] ));
		$rec_date= date('d-m-Y', strtotime( $value['recie_date'] ));
			
			
		?>
		<tr>
		
		
		
		<td style="width: 10%; "><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td style="width: 15%; "><span style="color: #207FA2; "><?php echo $value["bor_name"];?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php echo $value["bor_id"];?></span></td>
		
		<td style="width: 19%; "><span style="color: #207FA2; "><?php echo $value["book_name"];?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php echo $value["book_id"];?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php echo $iss_date;?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php if(($recie_date)=='0000-00-00'){ echo '<span style="color: red;">Not yet returned</span>';}else{ echo $rec_date;}?></span><br></td>
		
		</tr>
		<?php
		$row_count++;
		}
		if(isset($_GET["filt_lib"]))
		{
		$filt_lib=$_GET["filt_lib"];
		if(($filt_lib)=="returned")
		{
		$sql="select * from library where academic_year='".$cur_academic_year."' and recie_date!='0000-00-00'";
		$result=mysqli_query($conn,$sql);
		$total_books=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of Returned Books = ".$total_books.'</p>';
		}else if(($filt_lib)=="not returned")
		{
		$sql="select * from library where academic_year='".$cur_academic_year."' and recie_date='0000-00-00'";
		$result=mysqli_query($conn,$sql);
		$total_books=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of Not returned Books = ".$total_books.'</p>';	
		}
		}else{
			$sql="select * from library where academic_year='".$cur_academic_year."'";
				$result=mysqli_query($conn,$sql);
		$total_books=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total Books = ".$total_books.'</p>';	
		}
		?>
		
		<?php 
			$sql = "SELECT * FROM library where academic_year='".$cur_academic_year."'"; 
			$result = mysqli_query($conn,$sql); //run the query
			$total_records = mysqli_num_rows($result);  //count number of records
			$total_pages = ceil($total_records / $num_rec_per_page); 

			echo "<a href='library_details.php?page=1'>".' First '."</a> "; // Goto 1st page  

			for ($i=1; $i<=$total_pages; $i++) { 
						echo "<a href='library_details.php?page=".$i."'>   ".$i. "   </a> "; 
			}; 
			echo "<a href='library_details.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
			?>
		</tbody>
		
		</table>
		</center>
    </div>
	
    </div>
    </div>
   
	
	</div>
	</div>
	<!-- jQuery -->

<?php
			
}
else
{
header("Location:login.php");
}
?>  

