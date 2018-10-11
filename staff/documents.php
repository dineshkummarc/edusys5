<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
error_reporting("0");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-12 inline"><br>
	  <a href="all_documents.php"><button type="button" class="btn btn-primary btn-lg">All Documents</button></a>
	  <a href="enter_letterhead.php"><button type="button" class="btn btn-success btn-lg">Create Document</button></a>
	  <a href="scan_documents.php"><button type="button" class="btn btn-danger btn-lg">Scanned Documents</button></a>
	  <a href="upl_scan_doc.php"><button type="button" class="btn btn-primary btn-lg">Upload Scanned Documents</button></a>
	  
	 </div>
	</div>
	

    
  </div>
</div>
<div id="clearfix">
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
