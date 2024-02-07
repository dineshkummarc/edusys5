<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");
if(isset($_GET["id"])){
  $id = $_GET["id"];
}

  $sql_certificates="select certificate_path from certificates where  id='".$id."'";
	$result_certificates=mysqli_query($conn,$sql_certificates);
  if($row=mysqli_fetch_array($result_certificates,MYSQLI_ASSOC))
	{
    $certificate_path = $row["certificate_path"];
  }
?>
<div class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <img src="<?php echo $certificate_path?>" width="100%" alt=""><br><br>
    <a href="<?php echo 'download.php?id_path='.$certificate_path;?>" class="btn btn-success"> Download Certificate</a>
  </div>
  <div class="col-sm-3"></div>

</div>
</div>

<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	

?>


