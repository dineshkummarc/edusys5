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
	<a href="ad_members.php" class="btn btn-success">Add New Admin</a><hr>
	<h3>Update Admin</h3>
	<table class="table table-bordered">
	<th>User Name</th>
	<th>Passwords</th>
	<th>User Role</th>
	<th>Academic Year</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	 $username=$row["username"];
	$log_pas=$row["log_pas"];
	$user_access=$row["user_access"];
	$academic_year=$row["academic_year"];
	 ?>
	 <tr> 
	 <td><?php echo $username;?></td> 
	 <td>*****************</td> 
	 <td><?php echo $user_access;?></td> 
	 <td><?php echo $academic_year;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_admin.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="#" onclick="deleteadmin(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
                </div></td>
                    </tr>

                    <script>
                    function deleteadmin(id){
                        if(confirm("Do you want to delete?")){
                            window.location.href='delete_admin.php?id='+id+'';
                        }
                    }
                    </script>
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
