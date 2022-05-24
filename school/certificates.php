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
//var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=c1e39193efe161d3fde8b95267fe4c5b'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>

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
		<label>Select Certificate</label>
		  <select class="form-control" name="certificate_type">
			<option value="">---------</option>
			<option value="studying certificate">Studying Certificate</option>
			<option value="studied certificate">Studied Certificate</option>
			<option value="conduct certificate">Conduct Certificate</option>
		
		  </select>
		</div>
		 <input type="hidden" name="first_name" value="<?php echo $_GET["first_name"];?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $_GET["roll_no"];?>" class="form-control">
	<button type="submit" name="filt_submit" class="btn btn-primary">Get Details</button>
	
	
       
       </div>
	</form>
	
</div><hr>

<div class="row"><br>
<div class="col-sm-3">


</div>
<div class="col-sm-6">

<?php
$certificate_type=$_GET["certificate_type"];

if(isset($_GET["filt_submit"])){
	
if($certificate_type=="studying certificate"){
	
?>

<form action="study_certificate.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Studying Certificate</div>
      <div class="panel-body">
	  
	    
	
	   <input type="hidden" name="certificate_type" value="<?php echo $_GET["certificate_type"];?>" class="form-control">
	   <input type="hidden" name="first_name" value="<?php echo $_GET["first_name"];?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $_GET["roll_no"];?>" class="form-control">
	
	
	  
	  
	  
	  <input type="submit" class="btn btn-primary" name="studying" value="View Certificate">
</form>


<?php	
 }
 else if($certificate_type=="studied certificate"){

?>
 <form action="study_certificate.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Studied Certificate</div>
      <div class="panel-body">
	  
	    
	
	   <input type="hidden" name="certificate_type" value="<?php echo $_GET["certificate_type"];?>" class="form-control">
	   <input type="hidden" name="first_name" value="<?php echo $_GET["first_name"];?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $_GET["roll_no"];?>" class="form-control">
	
	  
	  <div class="form-group">
	  <label>Date of Leaving</label>
	<input type="date" name="leaving"  class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label>School Register Record NO</label>
	<input type="text" name="record_no"  class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label>Studying from</label>
	<input type="date" name="from"  class="form-control">
	  </div>
	  <div class="form-group">
	  <label>Studying to</label>
	<input type="date" name="to"  class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label>Class from</label>
	<input type="text" name="class_from"  class="form-control">
	  </div>
	  
	   <div class="form-group">
	  <label>Class To</label>
	<input type="text" name="class_to"  class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label>Passed Class</label>
	<input type="text" name="passed_class"  class="form-control">
	  </div>
	  <div class="form-group">
	  <label>Passed Date</label>
	<input type="date" name="passed_year"  class="form-control">
	  </div>
	  
	<input type="submit" class="btn btn-primary" name="studied" value="Print">
</form>



<?php	
 }
else if($certificate_type=="conduct certificate")
{
 ?>
 <form action="study_certificate.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Studying Certificate</div>
      <div class="panel-body">
	  
	    
	
	   <input type="hidden" name="certificate_type" value="<?php echo $_GET["certificate_type"];?>" class="form-control">
	   <input type="hidden" name="first_name" value="<?php echo $_GET["first_name"];?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $_GET["roll_no"];?>" class="form-control">
	
	  
	  <div class="form-group">
	  <label>Studying from</label>
	<input type="date" name="from"  class="form-control">
	  </div>
	  <div class="form-group">
	  <label>Studying to</label>
	<input type="date" name="to"  class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label>Class from</label>
	<input type="text" name="class_from"  class="form-control">
	  </div>
	  
	   <div class="form-group">
	  <label>Class To</label>
	<input type="text" name="class_to"  class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label>Character is</label>
	<input type="text" name="character"  class="form-control">
	  </div>
	<input type="submit" class="btn btn-primary" name="conduct" value="Print">
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