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
    <div class="col-sm-12">
	<h3>Send fee remind sms to all students</h3>
	<a href="remind_cca_fee.php"><button class="btn btn-success">Send CCA Fee Remind SMS</button></a> <button class="btn btn-primary" onclick="goBack()">Go Back</button>
	</div>
    
  </div>
</div>
<div id="clearfix">
</div>

</div>

<?php
			
}
else
{
header("Location:login.php");
}
?>  
