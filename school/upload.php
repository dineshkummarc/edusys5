<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
  $uploaded_images = array();
   foreach($_FILES['upload_images']['name'] as $key=>$val){        
        $upload_dir = "uploads/";
        $upload_file = $upload_dir.$_FILES['upload_images']['name'][$key];
		$filename = $_FILES['upload_images']['name'][$key];
        if(move_uploaded_file($_FILES['upload_images']['tmp_name'][$key],$upload_file)){
            $uploaded_images[] = $upload_file;
			$insert_sql = "INSERT INTO uploads(id, file_name, upload_time) 
				VALUES('', '".$filename."', '".time()."')";
			mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));
        }
    }
	header("Location:gallery_upload.php");
}
?>
<!-- 
	<div class="row">
	<div class="gallery">
		<?php
		if(!empty($uploaded_images)){ 
			foreach($uploaded_images as $image){ ?>
			<ul>
				<li >
					<img class="images" src="<?php echo $image; ?>" alt="">
				</li>
			</ul>
		<?php }	}?>
	</div>
</div>
-->