<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
?>

                               
                                                
  <div class="container-fluid"><br>
   <div class="row">
    <div class="col-sm-4">
        
    </div>
	
	<div class="col-sm-4">
	<div class="panel panel-primary">
      <div class="panel-heading">Confirm Delete</div>
      <div class="panel-body">

	
	<!--///////////////////////////////// Start Single Member ///////////////////////////////////////////-->
	<?php
	require("connection.php");
	if(isset($_GET['id'])){
		
		$id=$_GET['id'];
	}
	
	$sql="select * from administration where id='".$id."'";
	
	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		
	?>

	<table class="table table-bordered">
	<tr><center><img width="150" height="auto" src="<?php echo $row['fac_photo_path'];?>"></center>	<br></tr>
	<tr>
	<th>Name</th>
	<td><?php echo $row['adm_name'];?></td>
	</tr>
	
	<tr>
	<th>Email</th>
	<td><?php echo $row['adm_email'];?></td>
	</tr>
	
	<tr>
	<th>Designation</th>
	<td><?php echo $row['adm_desig'];?>  , <?php echo $row['fac_dob'];?></td>
	</tr>
	<tr>
	<th>Qualification</th>
	<td><?php echo $row['adm_loc'];?> </td>
	</tr>
	
	<tr>
	<th>Mobile</th>
	<td><?php echo $row['parent_contact'];?></td>
	</tr>
	</table>
	
   <div class="inline"><a href="adm_members.php"><button type="button" class="btn btn-sm btn-success">Cancel</button></a>
                <a href="<?php echo 'delete_confirm_adm.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a></div>
	<?php
	}
	?>
	
	
	
    </div>
    </div>
    </div>
	
	<div class="col-sm-4">
        <p><br></p>
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
