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

    <?php
		if(isset($_GET["success"])) { ?>
      <div class="alert alert-success">
      <strong>Success!</strong> SMS Sent Successfully.
      </div>
    <?php } ?>


    <div class="panel panel-primary">
      <div class="panel-heading">Send Last Month Attendance Report SMS</div>
      <div class="panel-body">


	  <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="get">
			<div class="form-group">
      <label>Select Class</label>
			<small>(Select All Students to send all class students)</small>
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

	  
	  <input type="submit" class="btn btn-primary" name="month_att_sms" value="Send SMS">
  </form>

    </div>
  </div>
</div>


<?php


date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");
$time=strtotime($today_date);
$month_num = date("m");
$year=date("Y",$time);

$monthNum  = $month_num-1;

$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); // March
//echo $monthName;



if(isset($_GET['month_att_sms'])){
  $present_class = $_GET["filt_class"];
  $section = $_GET["section"];
 

  // Total Class 
  $sql_tot_att="select distinct att_date from attendance where academic_year='".$cur_academic_year."' and present_class='".$present_class."' and section='".$section."'";
  $result_total_att=mysqli_query($conn,$sql_tot_att);
  $total_class_attendance = mysqli_num_rows($result_total_att);
  

  // Total Student Attendance

  if($month_num > 9){
    $month_number  = $month_num-1;
  }else{
    $month_number  = "0".$month_num-1;
  }

  $sql_tot_student_att="select  sum(att_count) as tot_att_count,student_id from attendance where DATE_FORMAT(att_date,'%m')='".$month_number."' and academic_year='".$cur_academic_year."' and present_class='".$present_class."' and section='".$section."' group by student_id";
  $result_student_att=mysqli_query($conn,$sql_tot_student_att);
  //var_dump($sql_tot_student_att);
  if(mysqli_num_rows($result_student_att)>0)
  {
    foreach($result_student_att as $row_att){
      //echo "coming here";
      
      $total_student_attendace = $row_att["tot_att_count"];
      $student_id = $row_att["student_id"];
      $sql_student="select first_name,parent_contact,id from students where id='".$student_id."'";
      $result_student=mysqli_query($conn,$sql_student);
      if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
      {
        $mob_number=$row_student["parent_contact"];
        $first_name=$row_student["first_name"];
      }
      $percentage = ($total_student_attendace/$total_class_attendance)*100;
      $message = "Dear Parent, ".$first_name."'s attendance for the month of ".$monthName." ".$year." is ".$total_student_attendace." out of ".$total_class_attendance." Days,Percentage is ".$percentage.". ".$sms_school_name;
      //echo $message;
  
      //$student_id = $row_student["id"];
      $noti_message = "Dear Parent, ".$first_name." attendance for the month of ".$monthName." ".$year." is ".$total_student_attendace." out of ".$total_class_attendance." Days,Percentage is ".$percentage.". ".$sms_school_name;
      $subject = "Monthly Attendance Report SMS";
      $sql="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed,updated_by) values('$subject','$noti_message','$student_id','$cur_academic_year','False','$admin_id')";
      $conn->query($sql);
  
      //var_dump($sql);
  
  
      require("sms_gateway.php");
      
    }
    ?>

<div class="col-md-6">
  <div class="alert alert-success">
  <strong>Success!</strong> SMS Sent Successfully.
  </div>
  </div>
<?php

  }else{
    echo "No attendance details for last month";
  }
  
 

?>
 
  </div>
<?php 
} 
require("footer.php");
}else{
  require("login.php"); 
}
?>