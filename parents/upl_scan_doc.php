<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{


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
	  
	  
	  
	  
	  
	  

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>



<?php
			
}
else
{
header("Location:login.php");
}
?>  
