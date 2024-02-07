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
      <div class="panel-heading">Event Invite SMS</div>
      <div class="panel-body">

        <small>Dear parent, A warm welcome to <span style="font-weight:bold;color:red;">Independance Day</span> which will be held at <span style="font-weight:bold;color:red;">School Premise</span> on <span style="font-weight:bold;color:red;">August 15th</span> at <span style="font-weight:bold;color:red;">11am</span>. <?php echo $sms_school_name;?></small><br><br>


	  <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="get">
			<div class="form-group">
      <label>Select Class</label>
			<small>(Select All Students to send all class students)</small>
					<select class="form-control" name="filt_class" required>
						<option value="">Select Class</option>
						<option value="All">All Students</option>
							
						<?php 
							$sql_class="select distinct present_class from students where academic_year='".$cur_academic_year."'";
							$result_class=mysqli_query($conn,$sql_class);

							foreach($result_class as $value_class)
							{
							?>
							<option value='<?php echo $value_class["present_class"];?>'><?php echo $value_class["present_class"];?></option>
							<?php
							}
							?>
				</select>
				</div>
	  
				<div class="form-group">
        <label>Select Section</label>
				<small>(Optional, Select if you need)</small>
					<select class="form-control" name="section">
						<option value="">Select Section</option>
							
						<?php 
							$sql_section="select distinct section from students where academic_year='".$cur_academic_year."'";
							$result_section=mysqli_query($conn,$sql_section);

							foreach($result_section as $value_section)
							{
							?>
							<option value='<?php echo $value_section["section"];?>'><?php echo $value_section["section"];?></option>
							<?php
							}
							?>
				</select>
				</div>

    <div class="form-group">
		<label>Event Name (e.g. Independance Day)</label>
	  <input type="text" class="form-control"  name="event_name" required>
	  </div>
	
	  <div class="form-group">
		<label>Event Date (e.g. August 15th)</label>
	  <input type="text" class="form-control"  name="event_date" required>
	  </div>

		<div class="form-group">
	  <label>Premise (e.g.School Premise)</label>
    <input type="text" class="form-control"  name="premise_name" required>
	  </div>

    <div class="form-group">
	  <label>Time (e.g.11am)</label>
    <input type="text" class="form-control"  name="event_time" required>
	  </div>
	  
	  <input type="submit" class="btn btn-primary" name="event_sms" value="Send SMS">
  </form>

    </div>
  </div>
</div>


<?php
if(isset($_GET['event_sms'])){
  $filt_class = $_GET["filt_class"];
  $section = $_GET["section"];
  $event_name = $_GET["event_name"];
	$event_date = $_GET["event_date"];
  $event_time = $_GET["event_time"];
  $premise_name = $_GET["premise_name"];


if($filt_class=="All")
{
	$sql_student="select distinct parent_contact,id from students where academic_year='".$cur_academic_year."'";		
}
else if(($filt_class!="All")&&($filt_class!=""))
{
	$sql_student="select distinct parent_contact,present_class,section,id from students where academic_year='".$cur_academic_year."' and present_class='".$filt_class."' and  section='".$section."'";
}

	
$result_student=mysqli_query($conn,$sql_student);
foreach($result_student as $row_student){

  $mob_number=$row_student["parent_contact"];
  $message = "Dear parent, A warm welcome to ".$event_name." which will be held at ".$premise_name." on ".$event_date." at ".$event_time.". ".$sms_school_name;
  //echo $message;

	$student_id = $row_student["id"];
	$subject = "Events SMS";
	
	//$sql="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed) values('$subject','$message','$student_id','$cur_academic_year','False')";

	$sql="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed,updated_by) values('$subject','$message','$student_id','$cur_academic_year','False','$admin_id')";
  $conn->query($sql);


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