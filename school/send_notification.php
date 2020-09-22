<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	?>
	<head>
<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=f397196f96576c1bc0f2a79f807b39b1'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>


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
    <?php require("selectclass.php");?>
        
    <div class="form-group">
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
