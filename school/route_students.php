<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-12-inline">
	
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	
		 <div class="form-group">
	  <label for="sel1">Select Route</label>
	   <?php echo '<select class="form-control" name="route_name">';
		echo '<option value="">------</option>';
		$sql_route="select distinct route_name from routes where academic_year='".$cur_academic_year."'";
        $result_route=mysqli_query($conn,$sql_route);
         foreach($result_route as $value_route)
		{
		?>
		<option value='<?php echo $value_route["route_name"];?>'><?php echo $value_route["route_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
	</div>
		
		<div class="form-group">
	  <label for="sel1">Select Stage</label>
	   <?php echo '<select class="form-control" name="stage_name">';
		echo '<option value="">------</option>';
		$sql_stage="select distinct stage_name from stages where academic_year='".$cur_academic_year."'";
        $result_stage=mysqli_query($conn,$sql_stage);
         foreach($result_stage as $value_stage)
		{
		?>
		<option value='<?php echo $value_stage["stage_name"];?>'><?php echo $value_stage["stage_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
	</div>
	
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	<button class="btn btn-success" onclick="goBack()">Go Back</button>
</script><br>
	</form>
	

	</div>
	</div>
	
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2>Route wise students</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Roll No</span></td>
		
		<td><span style="font-weight: bold;">Present Class</span></td>
		<td><span style="font-weight: bold;">stage_name</span></td>
	
		
		<td style="width:10%"><span style="font-weight: bold;">Action</span></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=150;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
		{
	if((isset($_GET["route_name"]))&&(isset($_GET["stage_name"])))
	{
		$route_name=$_GET["route_name"];
		$stage_name=$_GET["stage_name"];
		
		
		
	$sql="select * from route_students where academic_year='".$cur_academic_year."' and route_name='".$route_name."' and stage_name='".$stage_name."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";
	}
	
	if(isset($_GET["route_name"]))
	{
		
		$route_name=$_GET["route_name"];
		
		
		
		
	$sql="select * from route_students where academic_year='".$cur_academic_year."' and route_name='".$route_name."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";
	}
	
	else
	{
		$sql="select * from route_students where academic_year='".$cur_academic_year."' and route_name='".$route_name."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";
	}
	
	
	}
	else{
		
	$sql="select * from route_students where academic_year='".$cur_academic_year."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);

	foreach($result as $row)
	{
	
	
	?>
    
		<tr>
		
		
		
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" ><?php echo $row["first_name"];?></a></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["roll_no"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["route_name"];?></span></td>
		<td><span style="color: #207FA2; "><?php echo $row["stage_name"];?></span></td>
		
		
		<td><div class="btn-group">
		<a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" title="View" >  <i class="fa fa-eye fa-lg" style="color:#8ba83e;" aria-hidden="true"></i></a>
		
        <a href="<?php echo 'edit_route_students.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		
        <a href="<?php echo 'delete_route_students.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
		
		
		
		
		</tr>
		<?php 
		$row_count++; 
		
	}
	
	
	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["route_name"])!="")
		{
			$route_name=$_GET["route_name"];
			$sql="select * from route_students where academic_year='".$cur_academic_year."' and route_name='".$route_name."' ORDER BY first_name LIMIT $start_from, $num_rec_per_page";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$route_name." Students = ".$total_students.'</p>';
		}
		}
	
	else
	{
		
	$sql="select * from route_students where academic_year='".$cur_academic_year."'";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Students = ".$total_students.'</p>';
	}
		
		?>
		
		</table></center>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
</div>

</div>

<?php
			
}
else
{
header("Location:login.php");
}
?>  
