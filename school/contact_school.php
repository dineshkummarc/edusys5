<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from contact_school where academic_year = '".$cur_academic_year."' order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	<a href="all_reply_messages.php" title="Reply"> <button type="button" class="btn btn-success">View All Reply</button></a> <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br><br>
	<h3>All Messages</h3>
	 <div class="table-responsive">
	<table class="table table-bordered">
	<th>SL No</th>
	<th>Subject</th>
	<th>Sent By</th>
	<th>Member ID</th>
	<th>Sent Date</th>
	 </tr> 
	 <?php 
	 $row_count=1;
	 foreach($result as $row)
	 {
		$sent_date= date('d-m-Y', strtotime( $row['sent_date'] ));
		$id=$row["id"];
		$subject=$row["subject"];
		$message=$row["message"];
		$first_name=$row["first_name"];
		$admission_no=$row["admission_no"];
		$viewed = $row["contact_status"];
		$id = $row["id"];
	?>
	
	 <tr> 
	 <td><?php echo $row_count;?></td> 
	 <td><a href="<?php echo 'message_description.php?id='.$id.'&viewed=viewed';?>" style="color:blue;"><?php echo $subject;?>  <?php if($viewed==''){ ?><span class="w3-badge w3-red" style="color:#fff;">New</span><?php } ?></a></td> 
	 <td><?php echo $first_name;?></td> 
	 <td><?php echo $admission_no;?></td> 
	 <td><?php echo $sent_date;?></td> 

		 
	 </tr> 
	 <?php
$row_count++;	 
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
