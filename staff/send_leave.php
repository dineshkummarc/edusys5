<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<?php
		if(isset($_GET["id"])){
			$id=$_GET["id"];
			}
		$sql="select * from leave_appli where id='".$id."'";	
       $result=mysqli_query($conn,$sql);
	   if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
$first_name=$row["first_name"];
$admission_no=$row["admission_no"];
	
	}
		?>
		
		<div class="container-fluid">
		<div class="row">
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Send Approval Status</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Assignments has been sent successfully</span><br></p>';

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
	  <select class="form-control" name="status"  id="sel1">
		<option value="approved">Approve</option>
		<option value="rejected">Reject</option>
	 </select>
	</div>
	
	<div class="form-group">
  <label for="usr">If Reject reason:</label>
  <textarea rows="4" class="form-control"  name="rej_reason"></textarea>
</div>

	<input type="hidden"  name="first_name" value="<?php echo $first_name; ?>">
	<input type="hidden"  name="admission_no" value="<?php echo $admission_no; ?>">
	<input type="submit"   value="Send" class="btn btn-primary btn-md">
  <button class="btn btn-success" onclick="goBack()">Go Back</button>
	  </form>
	  
    </div>
    </div>
    </div>
	
	
	

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>


<?php 



	}else{
		header("Location:login.php");
	}
	



?>