<?php
session_start();

if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class'])&&isset($_SESSION['academic_year']))
{
$academic_year=$_SESSION['academic_year'];
require("header.php");
require("connection.php");
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];

if(isset($_GET["id"])){
	$id = $_GET["id"];
}

$sql="select * from contact_school where academic_year = '".$academic_year."' and id = '".$id."'";
$result=mysqli_query($conn,$sql);

?>

<div class="container"><br>
<div class="row">
<div class="col-sm-12">
<button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br><br>
	 <div class="table-responsive">
	<table class="table table-bordered">

	 <?php 
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$sent_date= date('d-m-Y', strtotime( $row['sent_date'] ));
	$id=$row["id"];
	$subject=$row["subject"];
	$message=$row["message"];
	$first_name=$row["first_name"];
	$roll_no=$row["admission_no"];
	?>
	
	 <tr> 
	 <div  style="padding:30px;background-color:#e8f2ff;word-wrap: break-word;">
	 <h2><?php echo $subject;?></h2>
	 <p><?php echo $message;?></p>
	
	 
	 <br><br>
	 <h4>From:</h4>
	 <p style="text-align:left;"><small>Sent date: <?php echo $sent_date;?></small><br>Sent By: <?php echo $first_name;?><br>Member ID: <?php echo $roll_no;?></p>
	 
	 </div>
	

		 
	 </tr> 
	 <?php
	 
	}
	 ?>
	</table>
	</div>
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
