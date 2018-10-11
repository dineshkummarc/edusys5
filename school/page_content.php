<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<head>
 
  <script src="summernote/jquery.js"></script> 
  <script src="summernote/bootstrap.js"></script> 
   
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
 <script src="js/bootstrap.min.js"></script>
</head>

<div class="container-fluid">
	<div class="row">
<a href="documents.php"><button class="btn btn-success">Go Back</button></a><br>
 <form action="insert_content.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-12">
	  
			  <h3>Update Website Content</h3>
			  
					
					 <div class="form-group">
					<label>Select Page Area</label>
					  <select class="form-control" name="page_area">
						<option value="">---------</option>
						<option value="">Home page Introduction</option>
						<option value="">About us</option>
						<option value="">Latest Notifications</option>
						<option value="">Contact Details</option>
						<option value="">Facilities</option>
						
					  </select>
					</div>
					
					<div class="form-group">
					 <label>Choose Images to Upload</label>
					<input type="file" name="upload_images[]"  id="image_file" multiple >
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Content</label>
					<textarea rows="8" class="form-control" id="summernote" data-provide="markdown-editable" name="page_content"></textarea>
					</div>
					
					
			        <input type="submit" class="form-control btn btn-success" name="update" value="Update" >
					

		
	</div>

  </div>
  </form>
</div>
<script>
      $('#summernote').summernote({
        placeholder: 'Type here',
        tabsize: 2,
        height: 200
      });
    </script>
   


<?php
			
}
else
{
header("Location:login.php");
}
?>  
