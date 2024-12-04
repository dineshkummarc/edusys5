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
      <div class="panel-heading">Parents Teachers Meeting SMS</div>
      <div class="panel-body">
		<small>Template: Dear parent, you are hereby requested to attend our Parent Teachers Meeting on <span style="font-weight:bold;color:red;">July 25th at 11am</span>.It is compulsory to attend the meeting. <?php echo $sms_school_name;?></small> <br><br>

	  <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="get">
			<div class="form-group">
      <label>Select Class</label>
					<select class="form-control" name="filt_class" required>
						<option value="">Select Class</option>
							
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
	  <label>Date & Time (Refer the template above in red color)</label>
    <input type="text" class="form-control"  name="date_time" required>
	  </div>
	  
	  <input type="submit" class="btn btn-primary" name="sms_english" value="Send SMS">
  </form>

    </div>
  </div>
</div>


<?php
if(isset($_GET['sms_english'])){
  $filt_class = $_GET["filt_class"];
  $section = $_GET["section"];
  $date_time = $_GET["date_time"];

$sql_student="select distinct parent_contact,present_class,section,id from students where academic_year='".$cur_academic_year."' and present_class='".$filt_class."' and  section='".$section."'";	
$result_student=mysqli_query($conn,$sql_student);
foreach($result_student as $row_student){
 $student_id = $row_student["id"];
	

  $mob_number=$row_student["parent_contact"];
	$message="Dear parent, you are hereby requested to attend our Parent Teachers Meeting on ".$date_time.".It is compulsory to attend the meeting. ".$sms_school_name;

	$subject = "Parents Meeting";
	$sql="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed) values('$subject','$message','$student_id','$cur_academic_year','False')";
  $conn->query($sql);

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