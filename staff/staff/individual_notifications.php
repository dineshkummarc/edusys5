<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];


require("header.php");
require("connection.php");

error_reporting("0");
?>
<div id="page-wrapper">
<div class="container-fluid">

  
  <div class="row">
    
	<div class="col-sm-6">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="form-inline">
    <div class="form-group">
		<label for="">From</label>
		<input type="date" name="from" class="form-control">
	</div>

	<div class="form-group">
		<label for="">To</label>
		<input type="date" name="to" class="form-control">
	</div>

	<input type="submit" class="btn btn-primary" name="filt_submit" value="Get List">
	<a href="individual_notifications.php" class="btn btn-default">View All</a>
	</form>
	</div>

	<div class="col-sm-6 inline">
	
<button onclick="goBack()" class="btn btn-default">Go Back</button>
</div>
	</div>
	
	
	<div class="row">
    <div class="col-sm-12"><br>
	<h2 style="font-weight:bold;">Individual Notifications</h2>
     <div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>		
		<td style="width:10%;"><span style="font-weight: bold;">SL No</span></td>
		<td style="width:65%;"><span style="font-weight: bold;">Subject</span></td>	
    <td style="width:20%;">Sent to</td>			
		</tr>
								
	<?php
	$num_rec_per_page=100;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	if(isset($_GET["filt_submit"]))
	{
        if((isset($_GET['from']))&&!empty($_GET['to'])){
			$from=$_GET["from"];
			$to=$_GET["to"];
		$sql="select * from individual_notifications where (DATE(updated_at) BETWEEN '$from' and '$to')   ORDER BY updated_at DESC LIMIT $start_from, $num_rec_per_page";        
		}		
	}
	else
	{
		$sql="select * from individual_notifications  ORDER BY updated_at DESC LIMIT $start_from, $num_rec_per_page";
	
	}	  	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
	$indi_viewed = $row["indi_viewed"];
	if($indi_viewed=='False'){
		$badge = '';
		}else{
			$badge = '<i class="fa fa-check" style="color:#1ebeda;font-size:24px;" title="Seen" aria-hidden="true"></i>';
		}

  $student_id=$row["student_id"];

    $updated_at= date('d-m-Y', strtotime( $row['updated_at'] ));	

    $sql_student="select * from students where id='".$student_id."'";
    $result_student=mysqli_query($conn,$sql_student);
    //var_dump($sql);
    
    if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
    {
    $first_name=$row_student["first_name"];
    $roll_no=$row_student["roll_no"];
    $adhaar_no = $row_student["adhaar_no"];
  
    }
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><span style="color:red;"><a  href="<?php echo 'individual_notification_description.php?id='.$row['id'];?>" ><?php echo $row["title"];?></span> <?php echo $badge;?><br>
    <small><span style="color:blue;"><?php echo substr($row["details"],0,50);?></small></span></a>
   
        <small> Updated at: <?php echo $updated_at;?></small>
        </td>	
	<td style="color:blue;"><a href="<?php echo 'description.php?id='.$student_id;?>"><?php echo $first_name;?><br><?php echo $adhaar_no;?></a></td>
		</tr>
		<?php $row_count++; 
		
	} ?>
	
	<?php		
	$total_noti=mysqli_num_rows($result);
	echo "<p style='color:blue;'>Total Notifications = ".$total_noti.'</p>';
	
		
		?>
		
		</table>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
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
