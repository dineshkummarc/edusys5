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
	
$sql="select * from notifications where academic_year = '".$cur_academic_year."' and id = '".$id."'";
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
	$notifi_date= date('d-m-Y', strtotime( $row['notifi_date'] ));
	$id=$row["id"];
	$notifi_title=$row["notifi_title"];
	$notifi_desc=$row["notifi_desc"];
	$filepath=$row["filepath"];
	$filename=$row["filename"];
	?>
	
	 <tr> 
	 <div  style="padding:30px;background-color:#e8f2ff;word-wrap: break-word;">
     <h2><?php echo $notifi_title;?></h2>
     <small>Posted on: <?php echo $notifi_date;?></small><br><br>
     <p><?php echo $notifi_desc;?></p>
     <?php 
         if($filepath!='')
         { 
        ?>
       <h4> Uploaded File: <a href="<?php echo $filepath;?>" target="_blank" style="color:blue;"><?php echo $filename; ?></a></h4>
       <img src="<?php echo $filepath;?>">
        <?php
         }
        ?>
     <br><br><br><br>
	  <div class="btn-group">
        <a href="<?php echo 'edit_send_notification.php?id='.$id;?>" class="btn btn-default">Edit</a>&nbsp;&nbsp;
		<a href="#" onclick="delete_send_notification(<?php echo $row['id'];?>)" title="Delete"> <button type="button" class="btn btn-danger">Delete</button></a>
       </div>

       
	 
	 <br><br><br><br>
	
	 
	 </div>
	

				
    <script>
        function delete_send_notification(id){
            if(confirm("Do you want to delete?")){
                window.location.href='delete_send_notification.php?id='+id+'';
            }
        }
        
        </script>



		 
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
