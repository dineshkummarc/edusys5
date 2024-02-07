<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
$student_id=$_SESSION['student_id'];
$cur_academic_year = $_SESSION['academic_year'];
$present_class = $_SESSION['parents_class'];
require("connection.php");
require("header.php");

if(isset($_GET["id"])){
	$id = $_GET["id"];
}

	$sql_upd="update individual_notifications set indi_viewed='True' where  id='".$id."'";
	if ($conn->query($sql_upd) === TRUE) 
	{
		$sql="select * from individual_notifications where id = '".$id."'";
		$result=mysqli_query($conn,$sql);
    //var_dump($sql);
	
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
	$id=$row["id"];
	$updated_at= date('d-m-Y', strtotime( $row['updated_at'] ));	
	?>
	
	 <tr> 
	 <div  style="padding:30px;background-color:#e8f2ff;word-wrap: break-word;border:1px solid black;">
     <h2><?php echo html_entity_decode($row['title']);?></h2>
     <small>Posted on: <?php echo $updated_at;?></small><hr>
     <p><?php echo html_entity_decode($row['details']);?></p><hr>
    
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
