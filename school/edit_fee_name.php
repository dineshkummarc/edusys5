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
$sql="select * from fee_name where id ='".$id."'  and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$fee_name=$value["fee_name"];
	$fee_details=$value["fee_details"];
	}
	?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update/Edit Fee Name</h4></div>
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
							
<form action="update_fee_name.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Fee Name:</label>
		<input type="text" name="fee_name" value="<?php echo $value['fee_name'];?>" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Fee Details:</label>
		<input type="text" name="fee_details" value="<?php echo $value['fee_details'];?>" class="form-control" >
	  </div>
	 <input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="submit" class="btn btn-success" value="Update Fee Name">
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
