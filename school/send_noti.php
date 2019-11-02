<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");

?>
<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=c1e39193efe161d3fde8b95267fe4c5b'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>
<!--<span id="qpd_banner">Powered By <a href="http://www.quillpad.in/" target="_blank">Quillpad</a>.</span>-->
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	<?php 
	if(isset($_GET["success"])){
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> Message sent successfully.
     </div>
	<?php
	}
	?>
	
	
	
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		<label>Select SMS Type</label>
		  <select class="form-control" name="meeting_type">
			<option value="">---------</option>
			<option value="Send SMS English">Class wise English SMS</option>
			<option value="Send SMS">Kannada SMS</option>
			<option value="Individual SMS">Send Individual Students SMS</option>
			<option value="all">All Students SMS (Requires speed internet connection)</option>
			<option value="School Van">School Van Alert SMS</option>
			<option value="staff sms">Staff SMS</option>
			<option value="admin sms">Administrative SMS</option>
			<option value="user_cred">Student Username & Passwords</option>
			
		  </select>
		</div>
		
	<button type="submit" name="filt_submit" class="btn btn-primary">Get Details</button>
	
	
       
       </div>
	</form>
	
</div><hr>

<div class="row"><br>
<div class="col-sm-3">


</div>
<div class="col-sm-6">

<?php
$meeting_type=$_GET["meeting_type"];

if(isset($_GET["filt_submit"])){
	
if($meeting_type=="Send SMS"){
?>
<form action="own_sms.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Type and send Kannada sms</div>
      <div class="panel-body">
	  <div class="form-group">
		<select class="form-control" name="filt_class" id="sel1">
			<?php require("selectclass.php");?>
			
		<div class="form-group">
	    <label>Select Section</label>
		<?php echo '<select class="form-control" name="section">';
		echo '<option value="">Select Section</option>';
		$sql="select distinct section from students where academic_year='".$cur_academic_year."'";
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
	
	  
	  <div class="form-group">
	   <input type="hidden" name="meeting_type" value="<?php echo $_GET["meeting_type"];?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label>Description</label>
		<textarea rows="5" class="form-control"  id="qpd_script" name="desc_sms" required></textarea>
	  </div>
	  
	  
	  
	  <input type="submit" class="btn btn-primary" name="own_sms" value="Send SMS">
</form>


<?php	
 }
 else if($meeting_type=="Send SMS English")
 {

?>
<form action="own_sms_english.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Class wise English SMS</div>
      <div class="panel-body">
	  
	 <div class="form-group">
	  <label>Select Class</label>
		<select class="form-control" name="filt_class" id="sel1">
			<?php require("selectclass.php");?>
	  
	  <div class="form-group">
	    <label>Select Section</label>
		<?php echo '<select class="form-control" name="section">';
		echo '<option value="">Select Section</option>';
		$sql="select distinct section from students where academic_year='".$cur_academic_year."'";
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
	  
	
	  <div class="form-group">
	  <label>Description</label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  
	  
	  
	  <input type="submit" class="btn btn-primary" name="sms_english" value="Send SMS">
</form>


<?php	
 }else if($meeting_type=="Individual SMS"){

?>
<a href="individual_sms.php"><button type="button" class="btn btn-primary" value="Get Details">Continue</button></a>


<?php	
 }else if($meeting_type=="School Van"){
	 ?>
	 <div class="panel panel-primary">
      <div class="panel-heading">School Van Alert SMS</div>
      <div class="panel-body">
	 <form action="school_van_sms.php"  method="get" role="form">
	
		 <div class="form-group">
	  <label for="sel1">Select Route</label>
	   <?php echo '<select class="form-control" name="route_name" required>';
		echo '<option value="">------</option>';
		$sql_route="select distinct route_name from routes where academic_year='".$cur_academic_year."'";
        $result_route=mysqli_query($conn,$sql_route);
         foreach($result_route as $value_route)
		{
		?>
		<option value='<?php echo $value_route["route_name"];?>'><?php echo $value_route["route_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
	</div>
	
	<!--
		<div class="form-group">
	  <label for="sel1">Select Stage</label>
	   <?php echo '<select class="form-control" name="stage_name">';
		echo '<option value="">------</option>';
		$sql_stage="select distinct stage_name from stages where academic_year='".$cur_academic_year."'";
        $result_stage=mysqli_query($conn,$sql_stage);
         foreach($result_stage as $value_stage)
		{
		?>
		<option value='<?php echo $value_stage["stage_name"];?>'><?php echo $value_stage["stage_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
	</div> 
	-->
	<div class="form-group">
	  <label>Message</label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	<button type="submit" name="school_van" class="btn btn-primary">Send SMS</button>
	<button class="btn btn-success" onclick="goBack()">Go Back</button>
	</form> 
	</div> 
	</div> 
	<?php
	}
	else if($meeting_type=="staff sms")
	{
     ?>
	 <h2 style="color:blue">Teaching and Non Teaching Staff SMS</h2>
	 <form action="staff_sms.php" method="post">
	 
	 <div class="form-group">
	    <label for="usr">Staff Type:</label>
		<select name="staff_type" class="form-control">
		<option value="teaching">Teaching Staff</option>
		<option value="non_teaching">Admin (Non Teaching) Staff</option>
		<option value="all">All Staff</option>
		</select>
	  </div>
	 
	 
	 <div class="form-group">
	  <label>Message</label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  <button type="submit" name="staff_sms" class="btn btn-primary">Send SMS</button>
	  </form>
	 <?php
	}
	else if($meeting_type=="all")
	{
     ?>
	 <h4>All Students SMS</h4>
	 <form action="all_student_sms.php" method="post">
	 <div class="form-group">
	  <label>Message </label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  <button type="submit" name="all_sms" class="btn btn-primary">Send SMS</button>
	  </form>
	 <?php
	}
	else if($meeting_type=="admin sms")
	{
	 ?>
	  <h4>Admin SMS</h4>
	  <form action="admin_sms.php" method="post">
	 <div class="form-group">
	  <label>Message</label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  <button type="submit" name="admin_sms" class="btn btn-primary">Send SMS</button>
	  </form>
	 <?php
	}
	else if($meeting_type=="user_cred"){
		?>
		<form action="user_cred.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Class wise English SMS</div>
      <div class="panel-body">
	  
	 <div class="form-group">
	  <label>Select Class</label>
		<select class="form-control" name="filt_class" id="sel1">
			<?php require("selectclass.php");?>
	  
	  <div class="form-group">
	    <label>Select Section</label>
		<?php echo '<select class="form-control" name="section">';
		echo '<option value="">Select Section</option>';
		$sql="select distinct section from students where academic_year='".$cur_academic_year."'";
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
	  
	
	  
	  
	  <input type="submit" class="btn btn-primary" name="user_cred" value="Send SMS">
</form>


		<?php
	}
 }
?>	
</div>
<div class="col-sm-3">
</div>
</div>
</div>
</div>
</div><br>



<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	

?>