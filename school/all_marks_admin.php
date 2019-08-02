<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from class_ad_members where academic_year='".$cur_academic_year."' order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>Update Marks Admin</h3>
	<table class="table table-bordered">
	<th>User Name</th>
	<th>Passwords</th>
	<th>Class</th>
	<th>Section</th>
	<th>Academic Year</th>
	<th>Email</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	 $username=$row["username"];
	$log_pas=$row["log_pas"];
	$class=$row["class"];
	$section=$row["section"];
	$academic_year=$row["academic_year"];
	$email=$row["email"];
	 ?>
	 <tr> 
	 <td><?php echo $username;?></td> 
	 <td>*****************</td> 
	 <td><?php echo $class;?></td> 
	 <td><?php echo $section;?></td> 
	 <td><?php echo $academic_year;?></td> 
	 <td><?php echo $email;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_marks_admin.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_marks_admin.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
