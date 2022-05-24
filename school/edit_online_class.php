<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
$sql="SELECT * FROM online_class where id='".$id."'";
$result = mysqli_query($conn, $sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
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
            <strong>Success!</strong> Updated successfully.
        </div>
        <?php
        }
        ?>
        <h1 style="font-weight:bold;">Update Online Class</h1><hr>
        <form action="update_online_class.php" method="post" enctype="multipart/form-data" role="form">
        
        <div class="form-group">
        <select class="form-control" name="present_class">
        <option value='<?php echo $row["present_class"];?>'><?php echo $row["present_class"]; ?></option>
        <?php require("selectclass.php");?>
            
        <div class="form-group">
        <select class="form-control" name="section">
        <option value='<?php echo $row["section"];?>'><?php echo $row["section"]; ?></option>
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
        echo '</select>';
        ?>
        </div>


        <div class="form-group">
        <select class="form-control" name="subject_name">
        <option value='<?php echo $row["subject_name"];?>'><?php echo $row["subject_name"];?></option>
        <option value="">Select Subject</option>
        <?php
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
        <input type="text" name="chapter" value="<?php echo $row['chapter'];?>" class="form-control" >
        </div>

        <div class="form-group">
        <label for="usr">Video URL:</label>
        <input type="url" name="url" value="<?php echo $row['url'];?>" class="form-control" >
        </div>
        
        <div class="form-group">
		<label for="usr">Upload File(Optional):</label>
		<input type="file" value="Photo" name="upload_file">
	</div>
	   

        <div class="form-group">
        <label for="usr">Details:</label>
        <textarea rows="6" name="details" class="form-control summernote"><?php echo $row["details"];?></textarea>
        </div>

        <input type="hidden" value="<?php echo $id;?>" name="id"> 
        <input type="submit" name="online" class="btn btn-success" value="Update Online Class">

        </form>
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


