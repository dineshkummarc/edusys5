<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from set_van_fee where academic_year='".$cur_academic_year."' order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
	<h3>Van Fee Details</h3>
	<table class="table table-bordered">
	<th>Academic_year</th>
	<th>Route Name</th>
	<th>Stage Name</th>
	<th>Van Fee</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	 $academic_year=$row["academic_year"];
	$route_name=$row["route_name"];
	$stage_name=$row["stage_name"];
	$van_fee=$row["van_fee"];
	 ?>
	 <tr> 
	 <td><?php echo $academic_year;?></td> 
	 <td><?php echo $route_name;?></td> 
	 <td><?php echo $stage_name;?></td> 
	 <td><?php echo $van_fee;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_setup_van_fee.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_setup_van_fee.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td> 
	 </tr> 
	 <?php 
	}
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
