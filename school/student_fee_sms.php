<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
require("header.php");
$f1=$_GET['name'];
$f2=$_GET['tot_paid'];
$f3=$_GET['rec_no'];
$roll_no=$_GET['roll_no'];
$note=$_GET['note'];
$f4= date('d-m-Y', strtotime( $_GET['rec_date'] ));

/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////

	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$city=$row_sch["city"];
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	////////// END SCHOOL DETAILS //////////////////
	

$sql="select parent_contact,present_class from students where academic_year='".$cur_academic_year."' and first_name='".$f1."' and roll_no='".$roll_no."'";

$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$mob_number=$row["parent_contact"];
		$present_class=$row["present_class"];
	}
	

		$sql_fee_tot="select adm_fee  from set_fee where class='".$present_class."'  and academic_year='".$cur_academic_year."' order by id desc limit 1";
		$result_fee_tot=mysqli_query($conn,$sql_fee_tot);
		if($row_fee_tot=mysqli_fetch_array($result_fee_tot,MYSQLI_ASSOC))
		{
			$paid_fee_total=$row_fee_tot["adm_fee"];
		}
		else
		{
			$paid_fee_total=0;
		}
		$balance=$paid_fee_total-$f2;

		$message_details = "Thank you ".$f1.". Your fee amount Rs.".$f2." has been received.Receipt no is ".$f3." and receipt date is ".$f4.". Remaining fee is Rs.".$balance;

		$message = "Dear parents, ".$message_details."-".$sch_detail;
		require("sms_gateway.php");

			
/*///////////// sms end///////////////////*/
?>
<script>
function printDiv(letterhead) {
     var printContents = document.getElementById('letterhead').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<div class="container-fluid"><br>
<div class="inline">
<button class="btn btn-success" onclick="printDiv('letterhead')">Print Page</button>
<button class="btn btn-success" onclick="goBack()">Go Back</button>
</div>
<div class="row">
 
    <div class="col-sm-1">
	</div>
    <div class="col-sm-10" id="letterhead">
	  <center>
	  <h1 style="color:red;"><?php echo $row_sch["sch_name"];?></h1>
	  <p style="color:blue;font-size:16px;border-bottom:1px solid black;"><?php echo $row_sch["location"];?> , <?php echo $row_sch["city"];?> , <?php echo $row_sch["district"];?> - <?php echo $row_sch["pin"];?> , <?php echo $row_sch["state"];?> , <br>
	  Phone : <?php echo $row_sch["phone"];?> , Mob : <?php echo $row_sch["mob"];?><br> 
	  Email : <?php echo $row_sch["email"];?> , web : <?php echo $row_sch["web"];?>
	  <br></p>
	</center>
	  <p>
	 <span style="text-align:right;">No : <?php echo $f3;?></span><br>
	<center><h2 style="color:green;text-decoration:underline;">Fee Receipt</h2></center><br><br>
	<table class="table table-bordered">
	<tr>
	<td>
	<span style="font-size:18px;">Student Name : <?php echo $f1;?></span>
	</td>
	<td>
	<span style="font-size:18px;">Roll No : <?php echo $roll_no;?></span>
	</td>
	</tr>
	
	<tr>
	<td>
	<span style="font-size:18px;">Receipt Date : <?php echo $f4;?></span>
	</td>
	<td>
	<span style="font-size:18px;">Fee Amount Rs.  <?php echo $f2;?></span>
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
	<br><br><br>
	<span style="font-size:18px;text-align:right;font-weight:bold;">Fee Received By (Name & Signature) <br> <br> Name : .............................................<br><br>
	Seal & Signature : .........................................                    </span>
	<br><br><br> <br><br><br> 
	 
</div>
</div>
</div>
<?php
require("footer.php");
//header("Location:description.php?first_name=".$f1."&roll_no=".$roll_no."&class=".$present_class."&suceess=success");

}


?>