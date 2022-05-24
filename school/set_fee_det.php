<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from set_fee where academic_year='".$cur_academic_year."' order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	 <button class="btn btn-default" onclick="goBack()">Go Back</button><br><br>
	<h3>School Fee Details</h3>
	<table class="table table-bordered">
	<th>Class</th>
	
	<th>Academic_year</th>
	<th>School Fee</th>
	<th>Fee Towards</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	 $class=$row["class"];

	
	$section=$row["section"];
	$academic_year=$row["academic_year"];
	$adm_fee=$row["adm_fee"];
	$fee_towards=$row["fee_towards"];
	 ?>
	 <tr> 
	 <td><?php echo strtoupper($class);?></td> 
	
	
	 <td><?php echo $academic_year;?></td> 
	 <td><?php echo $adm_fee;?></td> 
	 <td><?php echo $fee_towards;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_setup_fee.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
       
			<a href="#" onclick="deleteSetupFee(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
				</tr>
			<script>
		  function deleteSetupFee(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_setup_fee.php?id='+id+'';
			  }
		  }
		  
		  </script>
			
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
