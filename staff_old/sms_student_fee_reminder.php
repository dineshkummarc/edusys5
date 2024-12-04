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
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Send Fee Balance Reminder SMS</div>
      <div class="panel-body">


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

    
	  
	  <input type="submit" class="btn btn-primary" name="fee_reminder" value="Send SMS">
  </form>

    </div>
  </div>
</div>


<?php
if(isset($_GET['fee_reminder'])){
  $present_class = $_GET["filt_class"];
  $section = $_GET["section"];

$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
$result_sch=mysqli_query($conn,$sql_sch);
if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
{
  $approved_senderid=$row_sch["sender_id"];
  $username=$row_sch["username"];
  $password=$row_sch["user_id"];
  $sms_school_name=$row_sch["sms_school_name"];
  $app_url=$row_sch["app_url"];
}

$sql_fee_set = "select * from set_fee where class='".$present_class."' and academic_year='".$cur_academic_year."'";
	$result_fee_set=mysqli_query($conn,$sql_fee_set);
	if(mysqli_num_rows($result_fee_set)>0){
		foreach($result_fee_set as $row_fee_set){
			$class_fee += $row_fee_set["adm_fee"];
		}
	}

	if($present_class=="All")
	{
		$sql_student="select distinct parent_contact,id from students where academic_year='".$cur_academic_year."'";		
	}
	else if(($present_class!="All")&&($present_class!=""))
	{
		$sql_student="select distinct parent_contact,present_class,section,id from students where academic_year='".$cur_academic_year."' and present_class='".$present_class."' and  section='".$section."'";
	}
	
	//var_dump($sql);
	$result_student=mysqli_query($conn,$sql_student);
  foreach($result_student as $row_student)
	{
  $student_id=$row_student["id"];
	$first_name=$row_student["first_name"];
	$mob_number=$row_student["parent_contact"];

	
      $sql_individ_fee_set = "select sum(individual_fee) as total_individual_fee from set_individual_fee where student_id= '".$student_id."'";
        $result_indi_fee_set=mysqli_query($conn,$sql_individ_fee_set);
        if($row_indi_fee_set=mysqli_fetch_array($result_indi_fee_set,MYSQLI_ASSOC))
        {
          $individual_fee_set = $row_indi_fee_set["total_individual_fee"];
        }
     
        $sql_fee_paid = "select sum(tot_paid) as total_paid_fee from student_fee where student_id='".$student_id."'";
        $result_fee_paid=mysqli_query($conn,$sql_fee_paid);
        if($row_fee_paid=mysqli_fetch_array($result_fee_paid,MYSQLI_ASSOC))
        {
          $fee_set_paid = $row_fee_paid["total_paid_fee"];
        }
      
    
        $fee_balance=($individual_fee_set+$class_fee)-$fee_set_paid;
				echo $class_fee."<br>";
				echo $individual_fee_set."<br>";
				echo $fee_set_paid."<br>";
				echo $fee_balance."<br>";

    $message="Dear ".$first_name.", Your Fee Balance is Rs.".$fee_balance.".Please pay the Fee as soon as possible. Ignore if already paid. ".$sms_school_name;
    //echo $message;

    $subject = "Student Fee Reminder SMS";

		$sql="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed,updated_by) values('$subject','$message','$student_id','$cur_academic_year','False','$admin_id')";
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
  </div>
<?php
}
	

require("footer.php");
}
?>