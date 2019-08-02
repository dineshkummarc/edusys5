<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql="select * from school_det where id='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$sch_name=$row["sch_name"];
	$city=$row["city"].", ".$row["location"];
	$sch_dise1=$row["sch_dise1"];
	$sch_dise2=$row["sch_dise2"];
	$sch_dise3=$row["sch_dise3"];
	$sch_dise4=$row["sch_dise4"];
	$phone=$row["phone"];
	$mob=$row["mob"];
	$email=$row["email"];
	$web=$row["web"];
	$sender_id=$row["sender_id"];
	}

?>
<div class="container-fluid"><br>
<div class="row">
 <form action="update_school.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6 col-sm-offset-3">
	  
		<div class="panel panel-primary">
		
			  <div class="panel-body">
			  <h3>Add School/College Details</h3>
			  
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>School / College Name:</label>
					  <input type="text"  name="sch_name" value="<?php echo $row["sch_name"];?>" required class="form-control">
					</div>
					
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Primary DISE Code</label>
					  <input type="text"  name="sch_dise1" value="<?php echo $row["sch_dise1"];?>"  class="form-control">
					</div>
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>High school DISE Code</label>
					  <input type="text"  name="sch_dise2" value="<?php echo $row["sch_dise2"];?>"  class="form-control">
					</div>
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>PUC DISE Code</label>
					  <input type="text"  name="sch_dise3" value="<?php echo $row["sch_dise3"];?>"  class="form-control">
					</div>
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Degree DISE Code</label>
					  <input type="text"  name="sch_dise4" value="<?php echo $row["sch_dise4"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Location</label>
					  <input type="text"  name="location" value="<?php echo $row["location"];?>"  class="form-control">
					</div>
					
					
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>City:</label>
					  <input type="text"  name="city" value="<?php echo $row["city"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>District:</label>
					  <input type="text"  name="district" value="<?php echo $row["district"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>State:</label>
					  <input type="text"  name="state" value="<?php echo $row["state"];?>" class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>PIN:</label>
					  <input type="text"  name="pin" value="<?php echo $row["pin"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Office Phone:</label>
					  <input type="text"  name="phone" value="<?php echo $row["phone"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">SMS Sender ID (only in Capital letters):</label>
					  <input type="text"  name="sender_id" value="<?php echo $row["sender_id"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Mobile:</label>
					  <input type="text"  name="mob" value="<?php echo $row["mob"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Email:</label>
					  <input type="text"  name="email" value="<?php echo $row["email"];?>"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Website:</label>
					  <input type="text"  name="web" value="<?php echo $row["web"];?>"  class="form-control">
					</div>
					 <input type="hidden"  name="id" value="<?php echo $row["id"];?>"  class="form-control">
					
			        <input type="submit" class="form-control btn btn-primary" name="add_school" value="Update" >
					
										
			  </div>
		</div>
	</div>

  </div>
  </form>
</div>


<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
