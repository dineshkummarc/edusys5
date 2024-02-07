<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	require("sms_count.php");
	$sql_sch = "SELECT * FROM school_det  ORDER BY ID DESC LIMIT 1";
	$result_sch = mysqli_query($conn, $sql_sch);
	if ($row_sch = mysqli_fetch_array($result_sch, MYSQLI_ASSOC)) {
		$approved_senderid=$row_sch["sender_id"];
		$username=$row_sch["username"];
		$password=$row_sch["user_id"];
		
	}
	//echo $approved_senderid;
$url = "http://smsc.biz/httpapi/getmisreport?username=".$username."&password=".$password."&sender_id=".$approved_senderid; // path to your JSON file



$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed
?>
	<div class="container-fluid">
	<div class="row">
	
	<div class="col-md-12">
	<h3 style="color:green;">Bulk SMS Delivery Report <span style="color:red;">(SMS Remaining Balance : <?php echo $characters_count;?>)</span></h3>
	<table class="table table-bordered">
	<tr>
	<th>SL.No</th>
	<th>Name</th>
	<th>Mobile No</th>
	<th>Message</th>
	<th>Deliver Time & Status</th>
	</tr>
	<?php
$row_count=1;
foreach ($characters as $character) {
	$mob_no=$character->phonenumber;
	$mobile_no=substr($mob_no,2);
	$sql="select first_name from students where academic_year='".$cur_academic_year."' and parent_contact='".$mob_no."'";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$first_name=$row["first_name"];
	}
	
	?>
	<tr>
	<td><?php echo $row_count;?></td>
	<td><?php echo $first_name;?></td>
	<td><?php echo $character->phonenumber;?></td>
	<td><?php echo urldecode($character->message);?></td>
	<td><?php echo $character->status;?><br><?php echo $character->datetime;?></td>
	</tr>
	<?php
    $row_count++;	
	}
	?>
	</table>
	</div>
	</div>
	</div>
	<?php
}
else
{
header("Location:login.php");
}
?>		