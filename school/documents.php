<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
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

<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
