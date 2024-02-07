<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
require("header.php");
$id=$_GET['id'];


/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////

	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$approved_senderid=$row_sch["sender_id"];
		$username=$row_sch["username"];
		$password=$row_sch["user_id"];
		$sms_school_name=$row_sch["sms_school_name"];
	}
	////////// END SCHOOL DETAILS //////////////////
	
	$sql_student_fee="select * from student_fee where id='".$id."'";
	$result_student_fee=mysqli_query($conn,$sql_student_fee);
	if($row_student_fee=mysqli_fetch_array($result_student_fee,MYSQLI_ASSOC))
	{
		$student_id=$row_student_fee["student_id"];
		$sl_no=$row_student_fee["id"];
		$f2=$row_student_fee["tot_paid"];
		$f3=$row_student_fee["rec_no"];
		$note=$row_student_fee["note"];
		$f4= date('d-m-Y', strtotime($row_student_fee['rec_date'] ));
		$updated_on= date('d-m-Y h:i:sa', strtotime($row_student_fee['updated_on'] ));
	}

	$sql="select * from students where id='".$student_id."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$present_class=$row["present_class"];
	$first_name=$row["first_name"];
	$roll_no=$row["roll_no"];
	$mob_number=$row["parent_contact"];

	}


	$sql_fee_set = "select * from set_fee where class='".$present_class."' and academic_year='".$cur_academic_year."'";
	$result_fee_set=mysqli_query($conn,$sql_fee_set);
	if(mysqli_num_rows($result_fee_set)>0){
		foreach($result_fee_set as $row_fee_set){
			$class_fee += $row_fee_set["adm_fee"];
		}
	}


	$sql_individ_fee_set = "select * from set_individual_fee where student_id= '".$id."'";
	$result_indi_fee_set=mysqli_query($conn,$sql_individ_fee_set);
	if(mysqli_num_rows($result_indi_fee_set)>0){
	foreach($result_indi_fee_set as $row_indi_fee_set){
		$individual_fee_set += $row_indi_fee_set["individual_fee"];
	}
}


	$sql_fee_paid = "select * from student_fee where student_id='".$student_id."'";
	$result_fee_paid=mysqli_query($conn,$sql_fee_paid);
	if(mysqli_num_rows($result_fee_paid)>0){
	foreach($result_fee_paid as $row_fee_paid){
		$fee_set_paid += $row_fee_paid["tot_paid"];
	}
}

	//$fee_blance=($fee_set + $individual_fee_set)-$fee_set_paid;
	$fee_blance=($individual_fee_set+$class_fee)-$fee_set_paid;

		$message="Thank you ".$first_name.". Your fee amount Rs.".$f2." has been received.Receipt no is ".$f3." and receipt date is ".$f4.". Remaining fee is Rs.".$fee_blance.". ".$sms_school_name;
		//echo $message;


	$subject = "Student Fee Received SMS";
	$sql_message="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed) values('$subject','$message','$student_id','$cur_academic_year','False')";
  $conn->query($sql_message);


		require("sms_gateway.php");

			
/*///////////// sms end///////////////////*/
?>
<script>
function printFeeCollected(fee_collected) {
     var printContents = document.getElementById('fee_collected').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<div class="container-fluid"><br>
<div class="inline">
<button class="btn btn-default" onclick="printFeeCollected('fee_collected')">Print Page</button>
<button class="btn btn-default" onclick="goBack()">Go Back</button>
</div>
<div class="row">
 
    <div class="col-sm-1">
	</div>
    <div class="col-sm-10" id="fee_collected">
	  <center>
	  <h2 style="color:red !important;font-weight:bold;"><?php echo $row_sch["sch_name"];?></h2>
	  <p style="color:blue;font-size:16px;border-bottom:1px solid black;"><?php echo $row_sch["location"];?> , <?php echo $row_sch["city"];?> , <?php echo $row_sch["district"];?> - <?php echo $row_sch["pin"];?> , <?php echo $row_sch["state"];?> , <br>
	  Phone : <?php echo $row_sch["phone"];?> , Mob : <?php echo $row_sch["mob"];?><br> 
	  Email : <?php echo $row_sch["email"];?> , web : <?php echo $row_sch["web"];?>
	  <br></p>
	</center>
	  <p>
	 <span style="text-align:right;color:red !important;font-weight:bold;">SL.No : <?php echo $sl_no;?></span><br>
	<center><h3 style="color:#333;font-weight:bold;">FEE RECEIPT</h3></center><br><br>
	<table class="table table-bordered">
	<tr>
	<td>
	<span style="font-size:18px;">Student Name : <?php echo $first_name;?></span>
	</td>
	<td>
	<span style="font-size:18px;">Roll No : <?php echo $roll_no;?></span>
	</td>
	</tr>
	
	<tr>
	<td>
	<span style="font-size:18px;">Receipt Date : <?php echo $f4;?>, Receipt No: <?php echo $f3;?></span><br>
	<small>Updated on : <?php echo $updated_on;?></small> 
	</td>
	<td>
	<span style="font-size:18px;">Fee Amount Rs.  &#8377;<?php echo $f2;?></span>
	</td>
	</tr>
	
	<tr>
	<td>
	<span style="font-size:18px;">Fee Towards (Note) : <?php echo $note;?></span>
	</td>
	<td>	
	</td>
	</tr>
	</table>
	<br>
	<span style="font-size:18px;text-align:right;font-weight:bold;">Fee Received By (Name & Signature) <br> <br> Name : .............................................<br><br>
	Seal & Signature : .........................................                    </span>
	<br><br>
</div>
</div>
</div>
<?php
require("footer.php");
header("Location:description.php?id=".$id);

}


?>