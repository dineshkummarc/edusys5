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
	if((isset($_GET['name']))&&(isset($_GET['roll']))){
		$name=$_GET['name'];
		$roll_no=$_GET['roll'];
	}
	$sql="select first_name,roll_no,father_name,mother_name,dob,village,town,taluk,photo_path from students where first_name='".$name."' and roll_no='".$roll_no."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	?>

	<table class="table table-bordered">
	<tr><center><img width="150" height="auto" src="<?php echo $row['photo_path'];?>"></center>	<br></tr>
	<tr>
	<th>Name</th>
	<td><?php echo $row['first_name'];?></td>
	</tr>
	<tr>
	<th>Member ID</th>
	<td><?php echo $row['roll_no'];?></td>
	</tr>
	<tr>
	<th>Father Name</th>
	<td><?php echo $row['father_name'];?></td>
	</tr>
	<tr>
	<th>Mother Name</th>
	<td><?php echo $row['mother_name'];?></td>
	</tr>
	<tr>
	<th>Address</th>
	<td><?php echo $row['village'];?> , <?php echo $row['town'];?> , <?php echo $row['taluk'];?></td>
	</tr>
	<tr>
	<th>Mobile</th>
	<td><?php echo $row['dob'];?></td>
	</tr>
	</table>
	
   <div class="inline"><a href="all_students.php"><button type="button" class="btn btn-sm btn-success">Cancel</button></a>
                <a href="<?php echo 'del_students.php?name='.$name.'&roll='.$roll_no;?>"><button type="button" class="btn btn-sm btn-danger">Delete</button></a></div>
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
