<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	error_reporting("0");
	require("header.php");
	require("connection.php");

	?>
	<head>
	<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
<div class="container-fluid">
	<div class="row">
	
	
	<div class="col-sm-1">
	</div>
	<div class="col-sm-10">
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>	
	<h2 style="font-weight:bold;color:green;">All Messages</h2>
	
	 <?php
	$num_rec_per_page=10;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page;
	
	 $sql_cont="select * from contact_school where academic_year='".$cur_academic_year."' order by id desc  LIMIT $start_from, $num_rec_per_page";
	 $result_cont=mysqli_query($conn,$sql_cont);
	 
	
	if((mysqli_num_rows($result_cont))==0){
	echo '<p style="text-align:center;color:blue;border: 1px solid blue;padding:4px;">No Messages to display</p>'; 
	}
	else if((mysqli_num_rows($result_cont))>0)
	{
				
			
	foreach($result_cont as $row){
	$message_id=$row["id"];
	$sent_date= date('H:ia d-m-Y', strtotime( $row['message_time'] ));
	?>
	
	 <p style="text-align:right;color:black;background-color:#e8f2ff;border:1px solid grey;border-radius:50px 70px 0px 50px;padding-left:30px;padding-top:10px;padding-bottom:5px;padding-right:30px;"><span style="font-weight:bold;">From : <?php echo $row["first_name"].", ".$row["admission_no"];?> : </span><?php echo $row["subject"];?> : <?php echo $row["message"];?> <span style="color:black;font-size:11px;">
	 <br>Sent Time : <?php echo $sent_date;?></span></p>

	
	<br>
	<?php
		 
	$sql="select * from reply_messages where message_id='".$message_id."' and academic_year='".$cur_academic_year."' order by message_time desc";
	 $result=mysqli_query($conn,$sql);
	 foreach($result as $value){
	$sent_time= date('H:ia d-m-Y', strtotime( $value['message_time'] ));
	 ?>
	<p style="text-align:left;color:black;background-color:#c9f7ce;border:1px solid forestgreen;border-radius:70px 50px 50px 0px;padding-left:40px;padding-top:5px;padding-bottom:5px;padding-right:40px;">To : <?php echo $value["first_name"].", ".$value["admission_no"];?> : </span><?php echo $value["subject"];?> : <?php echo $value["message"];?> <span style="color:black;font-size:11px;">
	 <br>Received Date : <?php echo $sent_time;?></span></p>
	
	 </br>
	 <?php
	 }
	 }
	 }
	$total_records = mysqli_num_rows($result_cont);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<a href='all_reply_messages.php.php?page=1'>".' First '."</a> "; // Goto 1st page  
	for ($i=1; $i<=$total_pages; $i++) { 
	echo "<a href='all_reply_messages.php.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_reply_messages.php.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	 ?>
	
	</div>
	<div class="col-sm-1">
	</div>
	
	</div>
	</div>
<?php require("footer.php"); } else { header("Location:login.php");} ?>			
