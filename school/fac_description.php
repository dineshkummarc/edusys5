<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");


	require("connection.php");
	if(isset($_GET["fac_id"]))
	{
		
		$fac_id=$_GET["fac_id"];
	
	$sql="select * from faculty where fac_id='".$fac_id."'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$fac_dob= date('d-m-Y', strtotime( $row['fac_dob'] ));
		$fac_join= date('d-m-Y', strtotime( $row['fac_join'] ));
		$id = $row["fac_id"];
	
	
	?>
				
	
		<div class="container-fluid" >
		<div class="row" >
		<div class="col-sm-2" >
		</div>
		 <div class="col-sm-8" id="staff">   <br>

		 <?php 
	if(isset($_GET["success"])=="success"){ ?>
	<center>
	<div class="alert alert-success" role="alert">
  ID Card Generated Successfully.Check Below to view your ID Card.
</div>
	</center>
	<?php } ?>
	<br>
			
		<div class="panel panel-primary">


		<div class="panel-body">
					<h2>Faculty Details</h2>
		
		<center><img width="150" height="150" alt="" class="img img-thumbnail" src="<?php echo $row['fac_photo_path'];?>"></center>
					
<div class="table-responsive">
<table class="table table-bordered">
<tbody>
<tr>

<td>First Name</td>

<td><?php echo $row['fac_fname'];?></td>

<td>Qualification</td>

<td><?php echo $row['fac_quali'];?></td>
</tr>
<tr>

<td>Sex</td>

<td><?php echo $row['fac_sex'];?></td>

<td>DOB</td>

<td><?php echo $fac_dob;?></td>
</tr>
<tr>

<td>Address</td>

<td><?php echo $row['fac_add'];?></td>

<td>Previous Work</td>

<td><?php echo $row['fac_prev_org'];?></td>
</tr>
<tr>

<td>Department</td>

<td><?php echo $row['fac_dep'];?></td>

<td>Designation</td>

<td><?php echo $row['fac_desig'];?></td>
</tr>

<tr>

<td>Email</td>

<td><?php echo $row['fac_email'];?></td>

<td>Mobile</td>

<td><?php echo $row['parent_contact'];?></td>
</tr>
</tbody>
</table>
</div>



<p style="text-align: center; ">
<a href="<?php echo 'staffidcard.php?id='.$id;?>" class="btn btn-primary">Print Faculty ID Card</a>
<button class="btn btn-default" onclick="printStaff('staff')">Print this page</button>
<a href="teach_staff.php"><button class="btn btn-default">Go Back</button></a>

</div>
</div>
<br>


<div class="row">
        <div class="col-sm-12" id="gatepass"><br>
				<h3>Student ID Card Generated</h3>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>ID Card</th>
				<th>Generated on</th>
				<th>Actions</th>
				
			
				
				</tr>
	<?php
	$sql_id_cards="select * from staff_id_cards where  staff_id='".$fac_id."' ORDER BY id desc";
	$result_id_cards=mysqli_query($conn,$sql_id_cards);
	$row_count_id_card =1;
	foreach($result_id_cards as $row_id_cards)
	{
	$idcard_id=$row_id_cards["id"];
	$created_at= date('d-m-Y', strtotime( $row_id_cards['created_at'] ));
	
	
 ?>
				<tr>
				<td><?php echo $row_count_id_card;?></td>
				<td><?php echo $row['fac_fname'];?></td>
				<td><a href="<?php echo $row_id_cards['photo_path'];?>" class="btn btn-sm btn-success">View ID Card</a></td>
				<td><?php echo $created_at;?></td>
				<td>
				 <a href="#" onclick="deleteStaffIdCard(<?php echo $idcard_id;?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </td>
				</tr>
			<script>
		  function deleteStaffIdCard(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_staff_id_card.php?id='+id+'';
			  }
		  }
		  
		  </script>
				    
	<?php
				
	$row_count_id_card++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
</div>
<div class="col-sm-2" >
</div>
</div>
</div>
  
	<script>
	function printStaff(staff) {
		 var printContents = document.getElementById('staff').innerHTML;
		 var originalContents = document.body.innerHTML;

		 document.body.innerHTML = printContents;

		 window.print();

		 document.body.innerHTML = originalContents;
	}
	</script>


<?php
}
}
					
require("footer.php");			
}
else
{
header("Location:login.php");
}
	
?>