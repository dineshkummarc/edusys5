<?php
session_start();
if(isset($_SESSION['staff_uname'])&&isset($_SESSION['staff_pass'])&&isset($_SESSION['class_teach']))
{
$class_teach=$_SESSION['class_teach'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("connection.php");
error_reporting("0");
require("header.php");

$comment_id = $_GET["comment_id"];
$video_id = $_GET["video_id"];

$sql = "SELECT * FROM comments where id='".$comment_id."'"; 
$result = mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
  $contents = $row["contents"];
  $student_id = $row["student_id"];

}

$sql_student="select * from students where id='".$student_id."'";
$result_student=mysqli_query($conn,$sql_student);
if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
{
    $first_name = $row_student["first_name"];
    $roll_no = $row_student["roll_no"];
    $present_class = $row_student["present_class"];

}

?>
<div class="container-fluid">
	<div class="row">
	
	<div class="col-sm-2">
    </div>
	<div class="col-sm-8" style="background-color:#e8f2ff;padding: 50px;">
	<h4 style="font-weight:bold;color:red;">Commented By: <?php echo $first_name;?> - Roll No: <?php echo $roll_no;?> - Class: <?php echo $present_class;?></h4>
  <p><?php echo $contents;?></p>
  <h3 style="font-weight:bold;">Comment Reply</h3>
	<form action="insert_comment_reply.php" method="post" enctype="multipart/form-data" role="form">
	
	
	<div class="form-group">
	  <textarea rows="6" name="reply"  class="form-control summernote"></textarea>
	</div>

 <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
 <input type="hidden" name="video_id" value="<?php echo $video_id; ?>">

	<input type="submit" class="btn btn-success" value="Reply">
	</form><br>
	<button onclick="goBack()" class="btn btn-default">Go Back</button>
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
