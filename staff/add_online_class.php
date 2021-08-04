<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id']))
{
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row">
<button onclick="goBack()" class="btn btn-default">Go Back</button>

<div class="col-sm-2">
</div>
<div class="col-sm-8">
        <?php
        if(isset($_GET["success"])){
        ?>
        <br>
        <div class="alert alert-success">
            <strong>Success!</strong> Submitted successfully.
        </div>
        <?php
        }
        ?>
       <h3 style="font-weight:bold;">Add Online Class</h3><hr>
        <form action="insert_online_class.php" method="post" enctype="multipart/form-data" role="form">
        

        <div class="form-group">
	    <label role="">Select Class:</label>
        <select class="form-control" name="class_teach">
        <?php require("selectclass.php");?>
        
        <div class="form-group">
        <label for="">Select Subject</label>
        <?php echo '<select class="form-control" name="subject_name">';
        echo '<option value="">Select Subject</option>';
        $sql="select distinct subject_name from subjects";
        $result=mysqli_query($conn,$sql);
        foreach($result as $value)
        {
        ?>
        <option value='<?php echo $value["subject_name"];?>'><?php echo $value["subject_name"];?></option>
        <?php
        }
        echo '</select>';
        ?>
        </div>
        
        <div class="form-group">
        <label for="usr">Chapter Name:</label>
        <input type="text" name="chapter" class="form-control" >
        </div>

        <div class="form-group">
        <label for="usr">Video URL:</label>
        <input type="url" name="url" class="form-control" >
        </div>
        
        <div class="form-group">
		<label for="usr">Upload File(Optional):</label>
		<input type="file" value="Photo" name="upload_file">
	</div>
	   

        <div class="form-group">
        <label for="usr">Details:</label>
        <textarea rows="10" name="details" class="form-control summernote"></textarea>
        </div>
            
        <input type="submit" name="online" class="btn btn-success" value="Add Online Class">

        </form>
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


