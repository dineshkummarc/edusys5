<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");

?>
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		
		  <select class="form-control" name="filt_class" id="sel1">
			<option value="">By Class</option>
			<option value="lkg">LKG</option>
			<option value="ukg">UKG</option>
			 <option value="first standard">1st Standard</option>
				<option value="second standard">2nd Standard</option>
			  <option value="third standard">3rd Standard</option>
			  <option value="fourth standard">4th Standard</option>
			  <option value="fifth standard">5th Standard</option>
			  <option value="sixth standard">6th Standard</option>
			  <option value="seventh standard">7th Standard</option>
			  <option value="eighth standard">8th Standard</option>
			   <option value="ninth standard">9th Standard</option>
			  <option value="tenth standard">10th Standard</option>
			  <option value="first puc">1st PUC</option>
			  <option value="second puc">2nd PUC</option>
		  </select>
		</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	<a href="individual_sms.php"><button type="button" class="btn btn-primary">Edit</button></a>
	
       
       </div>
	</form>
	</div>
	</div><br>
<div class="row">
<div class="col-sm-12" style="padding-left:30px;padding-right:30px;">
<h3>Send Individual or group of Student sms</h3>
<div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>Select Student</th>
		
        <th>Student Name</th>
       
        
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	if(isset($_GET["filt_class"])){
		$filt_class=$_GET["filt_class"];
	}else{
		$filt_class="lkg";
	}
	
	$sql="select id,first_name,roll_no from students where present_class='".$filt_class."' ORDER BY id DESC";
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	?>
	
	<form action="send_individual_sms.php" method="post">
	
	<div class="form-inline">
	<div class="form-group">
	   <label>Meeting Name</label>
		<select class="form-control" name="meeting_name" id="sel1">
			<option value="Parent Teachers">Parent Teachers</option>
			<option value="Administrative">Administrative</option>
			<option value="Teachers">Teachers</option>
		</select>
	  </div>
	  
	  
	  <div class="form-group">
	  <label>Meeting Date</label>
		<input type="date" name="meeting_date" class="form-control">
	  </div>
	  
	  <div class="form-group">
	   <label>Meeting Time</label>
		<input type="time" name="meeting_time" class="form-control">
	  </div>
	  </div>
	<br>
	
	<?php
	foreach($result as $row)
	{
		
	?>
	
    <tr>
		
		
	
		
		<td>
		
		<input type="checkbox" class="form-control" name="checkbox[]" value="<?php echo $row["roll_no"];?>">
		</td>
		
		
		
		<td>
		<div class="form-group">
		<input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly><br>
		<input type="text" name="roll_no[]" value="<?php echo $row["roll_no"];?>" class="form-control" readonly>
		</div>
		</td>
		</tr>
		
		<?php 
		 }
         ?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="checked[]" value="Send SMS">
	</form>
</div>
</div>
</div>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

<?php 

	}else{
		header("Location:login.php");
	}
	

?>