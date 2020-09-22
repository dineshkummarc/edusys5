<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row">

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
        <h1>Add Online Class</h1>
        <form action="insert_online_class.php" method="post" enctype="multipart/form-data" role="form">
        
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
        <textarea rows="6" name="details" class="form-control"></textarea>
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


