<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from fee_name order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>All Fee Names</h3>
	<table class="table table-bordered">
	<th>Fee Name</th>
	<th>Fee Details</th>
	<th>Academic Year</th>
	<th>Updated Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
		 
	$updated_date= date('d-m-Y', strtotime( $row['updated_date'] ));
	 $fee_name=$row["fee_name"];
	$fee_details=$row["fee_details"];
	$academic_year=$row["academic_year"];
	
	 ?>
	 <tr> 
	 <td><?php echo $fee_name;?></td> 
	 <td><?php echo $fee_details;?></td> 
	 <td><?php echo $academic_year;?></td> 
	 <td><?php echo $updated_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_fee_name.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td>

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_fee_name.php?id='+id+'';
					  }
				  }
				  
				  </script>



		 
	 </tr> 
	 <?php 
	}
	 ?>
	</table>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
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
