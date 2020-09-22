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
	$viewed = $_GET["rep_viewed"];
}
	$sql_upd="update reply_messages set rep_viewed='".$viewed."' where  id='".$id."' and academic_year = '".$academic_year."'";
	if ($conn->query($sql_upd) === TRUE) 
	{
		$sql="select * from reply_messages where academic_year = '".$academic_year."' and id = '".$id."'";
		$result=mysqli_query($conn,$sql);
	
	} 
?>

<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	<a href="contact_reply.php" title="Reply"> <button type="button" class="btn btn-success">View All Reply</button></a> <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br><br>
	 <div class="table-responsive">
	<table class="table table-bordered">

	 <?php 
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$sent_date= date('d-m-Y', strtotime( $row['message_time'] ));
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
	
	 
	 <br><br><br><br>
	 <h4>From:</h4>
	 <p style="text-align:left;"><small>Sent date: <?php echo $sent_date;?></small><br>Sent By: <?php echo $first_name;?><br>Roll No: <?php echo $roll_no;?></p>
	 
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
