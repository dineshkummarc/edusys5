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
		
		  <select class="form-control" name="filt_class" required>
			<?php require("selectclass.php");?>
			
			
		<div class="form-group">
	   
		<?php echo '<select class="form-control" name="section">';
		echo '<option value="">Select Section</option>';
		$sql="select distinct section from students";
        $result=mysqli_query($conn,$sql);
         foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
		<?php
		}
		echo '</select>';
        ?>
		</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>

	
       
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
		$section=$_GET["section"];
	}else{
		$filt_class="lkg";
		$section="Section A";
	}
	
	$sql="select id,first_name,roll_no from students where present_class='".$filt_class."' and section='".$section."' ORDER BY first_name";
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	?>
	
	<form action="send_individual_sms.php" method="post">
	
	
	<div class="form-group">
	  <label>Message</label>
		<input type="text" class="form-control" name="meeting_name" required>
	  </div>
	<br>
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




<?php 

	}else{
		header("Location:login.php");
	}
	

?>