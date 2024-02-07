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
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
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

<?php
$sql = "SELECT * FROM notifications where academic_year='".$cur_academic_year."' and id ='".$id."'"; 
$result = mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{

?>
<div class="container-fluid">
	<div class="row">
	
	<div class="col-sm-2">
    </div>
	<div class="col-sm-8" style="padding-top: 50px;">
	<h3 style="font-weight:bold;">Edit Notifications</h3>
	<form action="update_send_notification.php" method="post" enctype="multipart/form-data" role="form">
	
    <div class="form-group">
    <select class="form-control" name="present_class">
    <option value='<?php echo $row["present_class"];?>'><?php echo $row["present_class"];?></option>
    <?php require("selectclass.php");?>
   
    
    <div class="form-group">
    <select class="form-control" name="section">
    <option value='<?php echo $row["section"];?>'><?php echo $row["section"];?></option>
   
    <?php
    $sql="select distinct section from students where academic_year='".$cur_academic_year."' and section!=''";
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
   <input type="text" name="subject" value="<?php echo $row['notifi_title']; ?>"  class="form-control">
	</div>
	
	<div class="form-group">
	  <textarea rows="6" name="message"   id="qpd_script" class="form-control"><?php echo $row['notifi_desc']; ?></textarea>
	   </div>

    <div class="form-group">
		<label for="usr">Upload File(Optional):</label>
		<input type="file" value="Photo" name="upload_file">
	</div>
	   <input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="submit" name="contact" class="btn btn-success" value="Submit Edit">
	</form><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
	</div>
	<div class="col-sm-2">
    </div>
	
	
	</div>
	</div>
<?php
}
	require("footer.php");
	}

	else

	{

		header("Location:login.php");

	}

?>			
