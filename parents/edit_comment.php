<?php
session_start();
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['academic_year']))
{
	$cur_academic_year=$_SESSION['academic_year'];
	$first_name=$_SESSION['parents_uname'];
	$roll_no=$_SESSION['parents_pass'];
	$student_id=$_SESSION['student_id'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	if(isset($_GET["id"])){
		$id = $_GET["id"];
	}
	$sql="select * from comments where id = '".$id."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$video_id = $row["item_id"];
		$contents = $row["contents"];
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
	<h3 style="font-weight:bold;">Edit Comment</h3>
        <form action="update_comment.php" method="post"  role="form">
        
        <div class="form-group">
        <label for="details">Enter your Comment, Feedback or Doubts</label>
        <textarea rows="6" name="contents" placeholder="Enter your Comment, Feedback or Doubts here." class="form-control"><?php echo $contents;?></textarea>
        </div> 

        <input type="hidden" name="video_id" value="<?php echo $video_id;?>">        
        <input type="hidden" name="id" value="<?php echo $id;?>">        
        
        <input type="submit" name="edit_comment" class="btn btn-primary" value="Update Comment">
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
