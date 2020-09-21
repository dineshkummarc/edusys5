<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

if(isset($_GET["id"])){
	$id = $_GET["id"];
	$viewed = $_GET["viewed"];
}
	$sql_upd="update contact_school set contact_status='".$viewed."' where  id='".$id."'";
	if ($conn->query($sql_upd) === TRUE) 
	{
		$sql="select * from contact_school where academic_year = '".$cur_academic_year."' and id = '".$id."' order by id desc";
		$result=mysqli_query($conn,$sql);
	} 
?>

<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	<a href="all_reply_messages.php" title="Reply"> <button type="button" class="btn btn-success">View All Reply</button></a> <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br><br>
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
	$member_id=$row["admission_no"];
	?>
	
	 <tr> 
	 <div  style="padding:30px;background-color:#e8f2ff;word-wrap: break-word;">
	 <h2><?php echo $subject;?></h2>
	 <p><?php echo $message;?></p>
	  <div class="btn-group">
        <a href="<?php echo 'reply_messages.php?id='.$id; ?>" title="Reply"> <button type="button" class="btn btn-primary">Reply</button></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete"> <button type="button" class="btn btn-danger">Delete</button></a>
       </div>
	 
	 <br><br><br><br>
	 <h4>From:</h4>
	 <p style="text-align:left;"><small>Sent date: <?php echo $sent_date;?></small><br>Sent By: <?php echo $first_name;?><br>Member ID: <?php echo $member_id;?></p>
	 
	 </div>
	

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_message.php?id='+id+'';
					  }
				  }
				  
				  </script>



		 
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
