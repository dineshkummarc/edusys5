<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from set_software_fee where academic_year='".$cur_academic_year."' order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
	<h3>Software Fee Details</h3>
	<table class="table table-bordered">
	<th>Class</th>
	
	<th>Academic_year</th>
	<th>Books Fee</th>
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
        <a href="<?php echo 'edit_setup_software_fee.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_setup_software_fee.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
