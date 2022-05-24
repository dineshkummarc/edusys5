<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

$num_rec_per_page=100;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

if(isset($_GET["class"])){
	$class=$_GET["class"];
	$sql="select * from exams where class='".$class."' and academic_year='".$cur_academic_year."' order by id desc LIMIT $start_from, $num_rec_per_page";
}else{
$sql="select * from exams where academic_year='".$cur_academic_year."' order by id desc LIMIT $start_from, $num_rec_per_page";
}
$result=mysqli_query($conn,$sql);
$row_count="1";
?>
<div class="container-fluid"><br>
<div class="row">
	 <div class="col-sm-12">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get">
	  
	 <div class="form-group">
	   <select class="form-control" name="class">
		<?php require("selectclass.php");?>
		<input type="submit" class="btn btn-success" value="Filter">
	</div>
	</form>
	</div>
<div class="row">

    <div class="col-sm-12">
	<h3>All Exams</h3>
	<table class="table table-bordered">
	<th>SL No</th>
	<th>Exam Name</th>
	<th>Class</th>
	
	<th></th>
	 </tr> 
	 <?php
	 foreach($result as $row)
	 {
	 ?>
	 <tr> 
	 <td><?php echo $row_count;?></td> 
	 <td><?php echo $row["exam_name"];?></td> 
	 <td><?php echo $row["class"];?></td> 
	
	
	 <td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_exams.php?id='.$row['id'].'&class='.$row["class"]; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_exams.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td> 
	 </tr> 
	  <?php
	  $row_count++;
	 }
	 $total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
		

	echo "<a href='all_exams.php?page=1'>".' First '."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
				echo "<a href='all_exams.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_exams.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	echo '</article></div>
                   </div>';
	 ?>
	</table>
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
