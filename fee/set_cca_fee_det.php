<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");
$sql="select * from set_cca_fee order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
	<h3>CCA Fee Details</h3>
	<table class="table table-bordered">
	<th>Class</th>
	
	<th>Academic_year</th>
	<th>CCA Fee</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	 $class=$row["class"];
	$section=$row["section"];
	$academic_year=$row["academic_year"];
	$adm_fee=$row["adm_fee"];
	 ?>
	 <tr> 
	 <td><?php echo $class;?></td> 
	
	
	 <td><?php echo $academic_year;?></td> 
	 <td><?php echo $adm_fee;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_setup_cca_fee.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_setup_cca_fee.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
			
}
else
{
header("Location:login.php");
}
?>  
