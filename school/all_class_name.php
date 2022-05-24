<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from class_name order by id desc";
$result=mysqli_query($conn,$sql);
?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
        <a href="add_class_name.php" class="btn btn-primary">Add Class Name</a>
        <a href="all_class_name.php" class="btn btn-success">All Classes</a><br><br>
	<h3>All Class Names</h3>
	<table class="table table-bordered">
	<th>Class Name</th>
	<th>Academic Year</th>
	<th>Updated Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
		 
	$created_at= date('d-m-Y', strtotime( $row['created_at'] ));
	$class_name=$row["class_name"];
	$academic_year=$row["academic_year"];
	
	 ?>
	 <tr> 
	 <td><?php echo $class_name;?></td> 
	 <td><?php echo $academic_year;?></td> 
	 <td><?php echo $created_at;?></td> 
	<td>
    <div class="btn-group">
<a href="<?php echo 'edit_class_name.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>

<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
</div>    
    </td>
				
    <script>
        function deleteme(id){
            if(confirm("Do you want to delete?")){
                window.location.href='delete_class_name.php?id='+id+'';
            }
        }			  
        </script>
		 
	 </tr> 
	 <?php 
	}
	 ?>
	</table>
	<button onclick="goBack()" class="btn btn-default">Go Back</button>
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
