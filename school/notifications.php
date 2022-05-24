<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from notifications where academic_year = '".$cur_academic_year."' order by id desc";
$result=mysqli_query($conn,$sql);
?>
<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	 <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br><br>
	<h3>All Notifications</h3>
	 <div class="table-responsive">
	<table class="table table-bordered">
	<th>SL No</th>
	<th style="width:40%">Subject</th>
	<th style="width:30%">Class and Section</th>
	<th style="width:30%">File Uploads (if any)</th>
	 </tr> 
	 <?php 
	 $row_count=1;
	 foreach($result as $row)
	 {
		$notifi_date= date('d-m-Y', strtotime( $row['notifi_date'] ));
		$id=$row["id"];
		$notifi_title=$row["notifi_title"];
        $filepath=$row["filepath"];
        $filename=$row["filename"];
        $present_class=$row["present_class"];
        $section=$row["section"];
        
	?>
	
	 <tr> 
	 <td><?php echo $row_count;?></td> 
	 
     <td><a href="<?php echo 'notification_description.php?id='.$id;?>" style="color:blue;"><?php echo $notifi_title;?></a><br> <small>Updated on: <?php echo $notifi_date;?></small></td>
     <td><?php echo strtoupper($present_class);?><br><?php echo strtoupper($section);?></td> 
   
    </td> 
	 <td>
         <?php 
         if($filepath!='')
         { 
        ?>
        <a href="<?php echo $filepath;?>"  style="color:blue;" target="_blank"><?php echo $filename; ?></a>
        <?php
         }
        ?>
    </td>

	  
	 </tr> 
	 <?php
$row_count++;	 
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
