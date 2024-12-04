<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	?>
	<head>


<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
<div class="container-fluid">
	<div class="row">
	
	<div class="col-sm-2">
    </div>
    <div class="col-sm-8" style="padding-top: 50px;">
    <?php
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
		<strong>Success</strong> Submitted Successfully.
	</div>
		  <?php
	  }
	  ?>
	<h3 style="font-weight:bold;">Send Notifications</h3>
    <form action="insert_send_notification.php" method="post" enctype="multipart/form-data" role="form">
    
    <div class="form-group">
    <select class="form-control" name="present_class">
    <option value="">Select Class</option>
    <?php
    $sql="select distinct present_class from students where academic_year='".$cur_academic_year."'";
    $result=mysqli_query($conn,$sql);
    foreach($result as $value)
    {
    ?>
    <option value='<?php echo $value["present_class"];?>'><?php echo $value["present_class"];?></option>
    <?php
    }
   
    ?>
    </select>
    </div>
        
    <div class="form-group">
    <select class="form-control" name="section">
    <option value="">Select Section</option>
    <?php
    $sql="select distinct section from students where academic_year='".$cur_academic_year."'";
    $result=mysqli_query($conn,$sql);
    foreach($result as $value)
    {
    ?>
    <option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
    <?php
    }
   
    ?>
    </select>
    </div>
	
	<div class="form-group">
   <input type="text" name="subject" placeholder="Type Title / Heading" class="form-control">
	</div>
	
	<div class="form-group">
	  <textarea rows="6" name="message" placeholder="Type Message Here" id="qpd_script" class="form-control"></textarea>
	   </div>

    <div class="form-group">
		<label for="usr">Upload File(Optional):</label>
		<input type="file" value="Photo" name="upload_file">
	</div>
	   
	<input type="submit" name="contact" class="btn btn-success" value="Send">
	</form><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
	</div>
	<div class="col-sm-2">
    </div>
	
	
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
