<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	
	error_reporting("0");

		if(isset($_GET["id"])){
		$id=$_GET["id"];
		}

		if(isset($_GET["first_name"])){
			$first_name=$_GET["first_name"];
			}

			if(isset($_GET["admission_no"])){
				$admission_no=$_GET["admission_no"];
				}
		
		if(isset($_GET["read_status"])){
			$read_status=$_GET["read_status"];
			}
	
	?>
		<div class="container-fluid">
		<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Send Approval Status</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{
					$success=$_GET["success"];
					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Updated successfully</span><br></p>';
				}
		if(isset($_GET["failed"]))
				{
					$failed=$_GET["failed"];
					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';
				}
				?>
								
							
 <form action="leave_app_sms.php"  method="get">
     
     <div class="form-group">
	  <label for="sel1"><span style="color:red;font-size:18px;">*</span>Select Action:</label>
	  <select class="form-control" name="status">
		<option value="approved">Approve</option>
		<option value="rejected">Reject</option>
	 </select>
	</div>
	
	<div class="form-group">
  <label for="usr">Note (if any):</label>
  <textarea rows="4" class="form-control"  name="rej_reason"></textarea>
</div>

	<input type="hidden"  name="read_status" value="<?php echo $read_status; ?>">
	<input type="hidden"  name="id" value="<?php echo $id; ?>">
	<input type="hidden"  name="first_name" value="<?php echo $first_name; ?>">
	<input type="hidden"  name="admission_no" value="<?php echo $admission_no; ?>">
	<input type="submit"   value="Send" class="btn btn-primary btn-md">
  
	  </form><br>
	  <button class="btn btn-success" onclick="goBack()">Go Back</button>
    </div>
    </div>
    </div>
	
	<div class="col-sm-2" ></div>
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