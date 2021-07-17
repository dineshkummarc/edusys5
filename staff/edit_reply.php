<?php
session_start();
if(isset($_SESSION['staff_uname'])&&isset($_SESSION['staff_pass'])&&isset($_SESSION['class_teach']))
{
$class_teach=$_SESSION['class_teach'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	if(isset($_GET["reply_id"])){
		$reply_id = $_GET["reply_id"];
	}
	$sql="select * from comment_reply where id = '".$reply_id."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$video_id = $row["video_id"];
		$reply = $row["reply"];
	?>
<div class="container-fluid">
	<div class="row">
	
	<div class="col-sm-2">
    </div>
    <div class="col-sm-8" style="padding-top: 50px;background-color:#e8f2ff;padding:50px;border:1px solid #ddd;">
    <?php
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
		<strong>Success</strong> Submitted Successfully.
	</div>
		  <?php
	  }
	  ?>
	<h3 style="font-weight:bold;">Edit Reply</h3>
        <form action="update_reply.php" method="post"  role="form">
        
        <div class="form-group">
        <label for="details">Enter your Comment, Feedback or Doubts</label>
        <textarea rows="6" name="reply" placeholder="Enter your Comment, Feedback or Doubts here." class="form-control summernote"><?php echo $reply;?></textarea>
        </div> 

        <input type="hidden" name="video_id" value="<?php echo $video_id;?>">        
        <input type="hidden" name="reply_id" value="<?php echo $reply_id;?>">        
        
        <input type="submit" name="edit_reply" class="btn btn-primary" value="Update Reply">
        </form><br>
	<button onclick="goBack()" class="btn btn-default">Go Back</button>
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
