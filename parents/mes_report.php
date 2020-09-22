<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))
{
$cur_academic_year = $_SESSION['academic_year'];
$parents_uname = $_SESSION['parents_uname'];
$parents_pass = $_SESSION['parents_pass'];

	//error_reporting("E_ALL");
	require("header.php");
	require("connection.php");
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		//$approved_senderid=$row_sch["sender_id"];
	}
	$password = "B826377gs256h62@02_15";
	$approved_senderid="DCOORG";
	
$url = "http://smsc.biz/httpapi/getmisreport?username=ma.musthafa6@gmail.com&password=$password&sender_id=".$approved_senderid; // path to your JSON file
//echo $url;
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed
?>
	<div class="container-fluid">
	<div class="row">
	
	<div class="col-md-12">
	<h3 style="color:blue;">Bulk SMS Delivery Report</h3>
	<div class="table-responsive">
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
		$sql="select parent_contact,first_name,roll_no from students where academic_year='".$cur_academic_year."' and parent_contact='".$mob_no."' and first_name='".$parents_uname."' and roll_no='".$parents_pass."'";
		$result=mysqli_query($conn,$sql);
		
		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$first_name=$row["first_name"];
		$roll_no=$row["roll_no"];
		$parent_contact=$row["parent_contact"];
	
	if(($first_name==$_SESSION['parents_uname'])&&($roll_no==$_SESSION['parents_pass'])&&($parent_contact==$mob_no))
	{
	?>
	<tr>
	<td><?php echo $row_count;?></td>
	<td><?php echo $first_name;?></td>
	<td><?php echo $character->phonenumber;?></td>
	<td><?php echo urldecode($character->message);?></td>
	<td><?php echo $character->status;?><br><?php echo $character->datetime;?></td>
	</tr>
	<?php
	}
	}
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