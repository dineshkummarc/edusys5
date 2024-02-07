<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");

?>

<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	<?php 
	if(isset($_GET["success"])){
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> Message sent successfully.
     </div>
	<?php
	}
	?>
	<center>
	<h3 style="font-weight:bold;">Send Bulk SMS</h3>
	<a href="parents_meeting_sms.php" class="btn btn-primary">Send Parents Teacher Meeting SMS</a>
	<a href="holiday_sms.php" class="btn btn-success">Send Holiday SMS</a>
	<a href="events_sms.php" class="btn btn-primary">Event Invite SMS</a>
	<br><br>
	<a href="emergency_leave_sms.php" class="btn btn-danger">Send Emergency Leave SMS</a>
	<a href="teachers_meeting_sms.php" class="btn btn-primary">Send Teachers Meeting SMS</a>
	<a href="exam_sms.php" class="btn btn-danger">Exam Notification SMS</a>
	<br><br>
	<a href="monthly_attendance_report.php" class="btn btn-primary">Send Last Month Attendance Report</a>
	<a href="send_app_pass_sms.php" class="btn btn-success">Send Mobile App Password</a>
	<a href="sms_student_fee_reminder.php" class="btn btn-danger">Send Fee Balance Reminder SMS</a>
	<br><br>
	<a href="administration_meeting_sms.php" class="btn btn-primary">Send Administration Meeting SMS</a>
	
	</center>
	
</div>

</div>
</div>
<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	

?>