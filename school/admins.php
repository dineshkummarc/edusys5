<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from ad_members order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>Update Admin</h3>
	<table class="table table-bordered">
	<th>User Name</th>
	<th>Passwords</th>
	<th>Access</th>
	
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	 $username=$row["username"];
	$log_pas=$row["log_pas"];
	$user_access=$row["user_access"];
	$email=$row["email"];
	 ?>
	 <tr> 
	 <td><?php echo $username;?></td> 
	 <td>*****************</td> 
	 <td><?php echo $user_access;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_admin.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_admin.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
