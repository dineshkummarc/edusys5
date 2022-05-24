<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
require("connection.php");
if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
$sql="select * from class_name where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$class_name=$value["class_name"];
	}
	?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update/Edit Class Name</h4></div>
      <div class="panel-body">
		<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
			  ?>		
							
<form action="update_class_name.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Class Name:</label>
		<input type="text" name="class_name" value="<?php echo $value['class_name'];?>" class="form-control">
	  </div>
	 
	 
	 <input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="submit" class="btn btn-success" value="Update Class Name">
	</form><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
    </div>
    </div>
    </div>

	<div class="col-sm-3"></div>
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
