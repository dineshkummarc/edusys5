<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];


require("header.php");	

?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Upload Documents</h4></div>
      <div class="panel-body">
	      <form action="insert_document.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		   <label>Document Title</label>
			<input type="text" name="upl_doc_name" class="form-control">
			</div>
		  
       <label>Select Document (one or multiple):</label>
          
			<div class="form-group">
			<input type="file" name="photo" multiple/>
			</div>
		<input type="submit" class="btn btn-primary" name="upl_scan_doc" value="Upload Documents" id="selectedButton"/>
       
</form>
	  
	  </div>
	  </div>
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
