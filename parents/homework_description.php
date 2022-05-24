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
	
$sql="select * from assign where  id = '".$id."'";
$result=mysqli_query($conn,$sql);


$sql_opened="select *  from opened_homework where  homework_id = '".$id."' and student_id='".$student_id."'";
$result_opened=mysqli_query($conn,$sql_opened);	
	if(mysqli_num_rows($result_opened)==0){
		$sql_in="insert into opened_homework (homework_id,student_id,viewed) values('$id','$student_id','viewed')";
		$conn->query($sql_in);
	}

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
	$date_posted= date('d-m-Y', strtotime( $row['date_posted'] ));
	$id=$row["id"];
	$assign_title=$row["assign_title"];
	$assign_desc=$row["assign_desc"];
	$filepath=$row["filepath"];
	$filename=$row["filename"];
	
	$first_name=$_SESSION["parents_uname"];
	$member_id=$_SESSION["parents_pass"];
	?>
	
	 <tr> 
	 <div  style="padding:30px;background-color:#e8f2ff;word-wrap: break-word;">
     <h2><?php echo $assign_title;?></h2>
     <small>Posted on: <?php echo $date_posted;?></small><br><br>
     <p><?php echo $assign_desc;?></p>
     <?php 
         if($filepath!='')
         { 
        ?>
       <h4> Uploaded File: <a href="../mahal/<?php echo $filepath;?>" target="_blank" style="color:blue;"><?php echo $filename; ?></a></h4>
	   <img src="../school/<?php echo $filepath;?>">
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
