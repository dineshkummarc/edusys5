<?php
session_start();

if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class'])&&isset($_SESSION['academic_year']))
{
	error_reporting("0");
	require("header.php");
	require("connection.php");
	$cur_academic_year=$_SESSION['academic_year'];
	$first_name=$_SESSION['parents_uname'];
	$roll_no=$_SESSION['parents_pass'];
	?>
	<style>
	.send_appli{
		font-family: 'Baloo Tamma 2', cursive;
	}
	</style>
	
	<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=f397196f96576c1bc0f2a79f807b39b1'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>
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
<div class="container">
	<div class="row">
    <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br>
	
	<div class="col-sm-12">
	<h2>All Messages</h2>
	 <div class="table-responsive">
	<table class="table table-bordered">
    <tr>
	<th>SL No </th>
	<th>Subject</th>
	<th>Sent Date</th>
	 </tr> 
	 <?php
	$num_rec_per_page=50;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page;
	
     $sql_cont="select * from contact_school where first_name='".$first_name."' and admission_no='".$roll_no."' and academic_year='".$cur_academic_year."' order by id desc  LIMIT $start_from, $num_rec_per_page";
     
	 $result_cont=mysqli_query($conn,$sql_cont);
	
	if((mysqli_num_rows($result_cont))==0){
	echo '<p style="text-align:center;color:blue;border: 1px solid blue;padding:4px;">No Messages to display</p>'; 
	}
	else if((mysqli_num_rows($result_cont))>0)
	{
				
    $row_count=1;		
	foreach($result_cont as $row){
	$message_id=$row["id"];
    $sent_date= date('d-m-Y', strtotime( $row['sent_date'] ));
    $rep_viewed_mes = $row['rep_viewed'];
	?>
    <tr>
    
	<td><?php echo $row_count;?>  <span class="w3-badge w3-green" style="color:#fff;">Sent</span></td>
	<td><a href="<?php echo 'send_message_description.php?id='.$message_id;?>" style="color:blue;"><?php echo $row["subject"];?></a></td>
	<td><?php echo $sent_date;?></td>
        </tr>

	<?php
		 
    $sql="select * from reply_messages where message_id='".$message_id."' and first_name='".$first_name."' and admission_no='".$roll_no."' and academic_year='".$cur_academic_year."' order by id desc";
    $result=mysqli_query($conn,$sql);

    
	foreach($result as $value){
    $sent_time= date('d-m-Y' , strtotime( $value['message_time'] ));
    $rep_viewed = $value['rep_viewed'];
    $id = $value['id'];
	 ?>

    <tr>
    <td><?php echo $row_count;?> <span class="w3-badge w3-blue" style="color:#fff;">Received</span></td>
	<td><a href="<?php echo 'reply_message_description.php?id='.$id.'&rep_viewed=True';?>" style="color:blue;"><?php echo $value["subject"];?>  <?php if($rep_viewed==''){ ?><span class="w3-badge w3-red" style="color:#fff;">New</span><?php } ?></a></td>
	<td><?php echo $sent_time;?></td>
    </tr>
	 <?php
     }
     $row_count++;
     }
     ?>
     
</table>
	</div>
     <?php
	 }
	$total_records = mysqli_num_rows($result_cont);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<a href='contact_reply.php?page=1'>".' First '."</a> "; // Goto 1st page  
	for ($i=1; $i<=$total_pages; $i++) { 
	echo "<a href='contact_reply.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='contact_reply.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	 ?>
	
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
