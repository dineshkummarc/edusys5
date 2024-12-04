<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

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
      <div class="panel-heading">Teachers Meeting SMS</div>
      <div class="panel-body">
<small>Dear Teachers, meeting will be conducted <span style="font-weight:bold;color:red;">on Progress discuss</span>. Please be present on <span style="font-weight:bold;color:red;">June 27th</span>. <?php echo $sms_school_name;?></small>

	  <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="get">
			
	  
	  <div class="form-group">
		<label>Meeting Date</label><br>
			<small>(e.g. June 25th)</small>
	  
    <input type="text" class="form-control"  name="meeting_date" required>
	  </div>

		<div class="form-group">
	  <label>Meeting Reason (e.g. on Progress discuss)</label>
    <input type="text" class="form-control"  name="meeting_reason" required>
	  </div>
	  
	  <input type="submit" class="btn btn-primary" name="teachers_meeting" value="Send SMS">
  </form>

    </div>
  </div>
</div>


<?php
if(isset($_GET['teachers_meeting'])){
  $meeting_date = $_GET["meeting_date"];
	$meeting_reason = $_GET["meeting_reason"];



$sql_faculty="select distinct parent_contact from faculty";		

$result_faculty=mysqli_query($conn,$sql_faculty);
foreach($result_faculty as $row_faculty){

  $mob_number=$row_faculty["parent_contact"];
  $message="Dear Teachers, meeting will be conducted ".$meeting_reason.". Please be present on ".$meeting_date.". ".$sms_school_name;

  
  //echo $message;
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