<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	
require("header.php");	
if(isset($_GET["id"])){
$id=$_GET["id"];
}
$sql="select * from fac_attendance where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
	$id=$row["id"];
	
	}
?>     <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Attendance</h4></div>
      <div class="panel-body">
	  
	  <form action="update_fac_attendance.php" method="post">
	   <div class="form-group">
		<select class="form-control" name="attendance">
			<option value="<?php echo $row["attendance"];?>"><?php echo $row["attendance"];?></option>
			<option value="Present">Present</option>
			<option value="Absent">Absent</option>
			
		  </select>
		</div>
	  
	  <div class="form-group">
	    <label for="usr">Attended Date</label>
		<input type="date"  name="att_date" value="<?php echo $row["att_date"];?>"  class="form-control">
	  </div>
	  
	 <input type="hidden" name="id" value="<?php echo $row["id"];?>"> 
	 <input type="hidden" name="first_fname" value="<?php echo $row["first_fname"];?>"> 
	 <input type="hidden" name="roll_no" value="<?php echo $row["roll_no"];?>"> 
	 <input type="hidden" name="academic_year" value="<?php echo $row["academic_year"];?>"> 
	 <input type="submit" class="btn btn-primary" value="Update"> 
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
	</form>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		</div>
		
    </div>
    </div>



<?php 



	}else{
		header("Location:login.php");
	}
	



?>