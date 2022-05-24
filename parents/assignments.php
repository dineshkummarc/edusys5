<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{

$student_id=$_SESSION['student_id'];
require("header.php");
require("connection.php");


$parents_class=$_SESSION['parents_class'];


$sql_section="select section from students where id='".$student_id."'";
		$result_section = mysqli_query($conn, $sql_section);
		if($row_section=mysqli_fetch_array($result_section,MYSQLI_ASSOC))
		{
			$section = $row_section["section"];
		}

$sql="select * from assign where class = '".$parents_class."' and section = '".$section."' or class='all' order by id desc";
$result=mysqli_query($conn,$sql);


?>
<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	 <button onclick="goBack()" class="btn btn-primary">Go Back</button><br><br><br>
	<h3>All Assignments/Homeworks</h3>
	 <div class="table-responsive">
	<table class="table table-bordered">
	<th>SL No</th>
	<th style="width:60%">Subject</th>
	
	 </tr> 
	 <?php 
	 $row_count=1;
	 foreach($result as $row)
	 {
		$id = $row["id"];
		$sql_opened="select *  from opened_homework where homework_id = '".$id."' and student_id='".$student_id."' and viewed='viewed'";
		$result_opened=mysqli_query($conn,$sql_opened);	
		//var_dump($sql_opened);
			if(mysqli_num_rows($result_opened)==0){
			$badge = '<span class="w3-badge w3-red" style="color:#fff;">New</span>';
			}else{
				$badge = "";
			}
		
		$date_posted= date('d-m-Y', strtotime( $row['date_posted'] ));
		$assign_title=$row["assign_title"];
		$filepath=$row["filepath"];
		$filename=$row["filename"];
        
	?>
	
	 <tr> 
	 <td style="width:5%;"><?php echo $row_count;?></td> 
     <td><a href="<?php echo 'homework_description.php?id='.$id;?>" style="color:blue;"><?php echo $assign_title;?></a><?php echo "  ".$badge;?><br>
    <small>Updated on: <?php echo $date_posted;?></small><br>
	<?php 
         if($filepath!='')
         { 
        ?>
        <a href="../school/<?php echo $filepath;?>"  style="color:blue;" target="_blank"><?php echo $filename; ?></a>
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
