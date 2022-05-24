<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
require('header.php');
?>

<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/upload.js"></script>
<link type="text/css" rel="stylesheet" href="style.css" />

<link type="text/css" rel="stylesheet" href="style.css" />


<div class="container-fluid">
	<div class="row">
       <div class="col-sm-3">
	   </div>
       <div class="col-sm-6">
	<h2 style="color:red;">Upload Website Gallery photos</h2>
		
	<form method="post" name="upload_form" id="upload_form" enctype="multipart/form-data" action="upload.php">   
   
	<div class="form-group">
	 <label>Choose Multiple Images to Upload</label>
    <input type="file" name="upload_images[]"  id="image_file" multiple >
	</div>
    <div class="file_uploading hidden">
        <label>&nbsp;</label>
        <img src="uploading.gif" alt="Uploading......"/>
    </div>
	<input type="submit" class="btn btn-success" value="Upload">
	</form>
	<div id="uploaded_images_preview"></div>

	<br>	
	
</div>
<div class="col-sm-3">
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

