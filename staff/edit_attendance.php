<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];
	
require("header.php");	
if(isset($_GET["id"])){
$id=$_GET["id"];
}
$sql="select * from attendance where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$student_id= $row["student_id"];

?>     <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Attendance</h4></div>
      <div class="panel-body">
	  
	  <form action="update_attendance.php" method="post">
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
	  
	 <input type="hidden" name="id" value="<?php echo $id;?>"> 
	 <input type="hidden" name="student_id" value="<?php echo $student_id;?>"> 
	
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
}
require("footer.php");
	}else{
		header("Location:login.php");
	}
?>