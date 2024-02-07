<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
if(isset($_GET["id"])){
	$id=$_GET["id"];
}

?>
    <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-primary">
        <div class="panel-heading"><h4>Upload Student Photo</h4></div>
        <div class="panel-body">
<?php
	if((isset($_GET["success"]))=="success")
	 {
 ?>
	   <div class="alert alert-success">
  <strong>Success!</strong> Uploaded successfully.
</div>
<?php
		}
		else if((isset($_GET["failed"]))=="failed")

		{
		?>
				<div class="alert alert-danger">
		  <strong>Error!</strong> Something went wrong!!!.
		</div>
<?php
		}
?>
					
<form method="post" action="update_upload_photo.php" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <input type="file" name="photo" ><br>
  <input type="submit"  value="Upload" class="btn btn-primary">

</form>




          <br>
	 <button class="btn btn-default" onclick="goBack()" >Go Back</button>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		
	  </div>
    </div>
    </div>
</div>
</div>
<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>

