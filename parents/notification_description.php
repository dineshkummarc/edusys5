<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{

$student_id=$_SESSION['student_id'];
require("header.php");
require("connection.php");
$member_name=$_SESSION['parents_uname'];
$member_id=$_SESSION['parents_pass'];

if(isset($_GET["id"])){
	$id = $_GET["id"];
}
	
$sql="select * from notifications where  id = '".$id."'";
$result=mysqli_query($conn,$sql);


$sql_opened="select *  from opened_notifications where  notification_id = '".$id."' and student_id='".$student_id."'";
$result_opened=mysqli_query($conn,$sql_opened);	
	if(mysqli_num_rows($result_opened)==0){
		$sql_in="insert into opened_notifications (notification_id,student_id,viewed) values('$id','$student_id','viewed')";
		$conn->query($sql_in);
		//var_dump($sql_in);
	}
	//var_dump($sql_opened);
	

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
	
	$first_name=$_SESSION["parents_uname"];
	$member_id=$_SESSION["parents_pass"];
	
	
	
	
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
       <h4> Uploaded File: <a href="../mahal/<?php echo $filepath;?>" target="_blank" style="color:blue;"><?php echo $filename; ?></a></h4>
	   <img src="../school/<?php echo $filepath;?>" class="img img-thumbnail">
        <?php
         }
        ?>
     <br><br><br><br>
	 
	
	 
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
