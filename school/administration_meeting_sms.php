<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
require("header.php");
$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
$result_sch=mysqli_query($conn,$sql_sch);
if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
{
  $approved_senderid=$row_sch["sender_id"];
  $username=$row_sch["username"];
  $password=$row_sch["user_id"];
  $sms_school_name=$row_sch["sms_school_name"];
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Send Administration Meeting SMS</div>
      <div class="panel-body">

<small>Dear Member, Administrative <span style="font-weight:bold;color:red;">Monthly Meeting</span> is scheduled on <span style="font-weight:bold;color:red;">25th July 2022 at 7pm</span> at <span style="font-weight:bold;color:red;">School</span>. We request you to attend the meeting. <?php echo $sms_school_name;?></small><br><br>

	  <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="get">
			
	  
	  <div class="form-group">
		<label>Meeting Date and Time</label><br>
			<small>(e.g. June 25th at 7pm)</small>
	  
    <input type="text" class="form-control"  name="meeting_date" required>
	  </div>

		<div class="form-group">
	  <label>Meeting Name (e.g. on Monthly Meeting)</label>
    <input type="text" class="form-control"  name="meeting_name" required>
	  </div>

    <div class="form-group">
	  <label>Meeting Venue (Meeting Venue/location)</label>
    <input type="text" class="form-control"  name="meeting_place" required>
	  </div>
	  
	  <input type="submit" class="btn btn-primary" name="admin_meeting" value="Send SMS">
  </form>

    </div>
  </div>
</div>


<?php
if(isset($_GET['admin_meeting'])){
  $meeting_date = $_GET["meeting_date"];
	$meeting_name = $_GET["meeting_name"];
  $meeting_place = $_GET["meeting_place"];



$sql_faculty="select distinct parent_contact from administration";		

$result_faculty=mysqli_query($conn,$sql_faculty);
foreach($result_faculty as $row_faculty){

  $mob_number=$row_faculty["parent_contact"];
  $message = "Dear Member, Administrative ".$meeting_name." is scheduled on ".$meeting_date." at ".$meeting_place.". We request you to attend the meeting. ".$sms_school_name;
	require("sms_gateway.php");
}

	
?>
<div class="col-md-6">
  <div class="alert alert-success">
  <strong>Success!</strong> SMS Sent Successfully.
  </div>
  </div>
  </div>
<?php
}
require("footer.php");
}

?>