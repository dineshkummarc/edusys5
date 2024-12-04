<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("header.php");
require("connection.php");

if(isset($_GET["id"])){
	$id = $_GET["id"];
}

		$sql="select * from individual_notifications where id = '".$id."'";
		$result=mysqli_query($conn,$sql);

	
	
?>

<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	<button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br><br>
	 <div class="table-responsive">
	<table class="table table-bordered">

	 <?php 
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$id=$row["id"];
	$filepath=$row["filepath"];
	$filename=$row["filename"];
  $student_id=$row["student_id"];
	$updated_at= date('d-m-Y', strtotime( $row['updated_at'] ));	
	?>
	
	 <tr> 
	 <div  style="padding:30px;background-color:#e8f2ff;word-wrap: break-word;border:1px solid black;">
     <h2><?php echo html_entity_decode($row['title']);?></h2>
     <small>Posted on: <?php echo $updated_at;?></small><hr>
     <p><?php echo html_entity_decode($row['details']);?></p><hr>
     <?php 
         if($filepath!='')
         { 
        ?>
       <h4> Uploaded File: <a href="<?php echo $filepath;?>" target="_blank" style="color:blue;"><?php echo $filename; ?></a></h4><hr>
       <img src="<?php echo $filepath;?>" class="img img-thumbnails">
        <?php
         }
        ?>
     <br><br>	 
	 </div>		 
	 </tr> 
	 <?php
	 
	}
	 ?>
	</table>
	</div>
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
