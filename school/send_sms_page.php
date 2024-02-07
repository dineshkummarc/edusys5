<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Send SMS Notifications</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{
					?>

					<div class="alert alert-success">
  <strong>Success!</strong> Update Successful...
</div>

					
<?php
				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
				if(isset($_GET["id"]))

				{
					$student_id=$_GET["id"];
				
				}
				?>
								
							
<a href="parents_meeting_sms.php" class="btn btn-primary">Parents Teachers Meeting SMS</a>
<a href="holiday_sms.php" class="btn btn-success">Holiday SMS</a>
<a href="leave_sms.php" class="btn btn-danger">Leave SMS</a> <br><br>
<a href="teachers_meeting_sms.php" class="btn btn-primary">Teachers Meeting SMS</a>

	 <button class="btn btn-default" onclick="goBack()">Go Back</button>
    </div>
    </div>
    </div>
	
	
	

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>



<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
?>