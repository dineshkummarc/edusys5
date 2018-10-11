<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");
error_reporting("0");

?>
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	<?php 
	/* if(isset($_GET["success"])){
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> Message sent successfully.
     </div>
	<?php
	} */
	
	
		
	require("connection.php");	
	$sql="select present_class,section from students where first_name='".$first_name."' and roll_no='".$roll_no."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$present_class=$row["present_class"];
	$section=$row["section"];
	}
	?>
	
	
	  <form action="hall_ticket.php" class="form-inline" method="get" role="form">
	  <div class="form-group">
      <select class="form-control" name="exam_name">
		<option value="">Select Exam</option>
		<option value="fa-1">FA-1</option>
		<option value="fa-2">FA-2</option>
		<option value="fa-3">FA-3</option>
		<option value="fa-4">FA-4</option>
		<option value="sa-1">SA-1</option>
		<option value="sa-2">SA-2</option>
		
	   </select>
	</div>
		 <input type="hidden" name="first_name" value="<?php echo $_GET["first_name"];?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $_GET["roll_no"];?>" class="form-control">
	   <input type="hidden" name="section" value="<?php echo $section;?>" class="form-control">
	<button type="submit" name="filt_submit" class="btn btn-primary">Print Hall Ticket</button>
	
	
       
       </div>
	</form>
	
</div><hr>

<div class="row"><br>
<div class="col-sm-3">


</div>

</div>
</div>




<?php 

	}else{
		header("Location:login.php");
	}
	

?>