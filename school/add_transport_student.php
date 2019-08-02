<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12" style="padding-top:30px;">
	<h3>Update Students Transport Details</h3>
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		
		  <select class="form-control" name="filt_class" id="sel1">
			<?php require("selectclass.php");?>
			
			
		<div class="form-group">
	   
		<?php echo '<select class="form-control" name="section">';
		echo '<option value="">Select Section</option>';
		$sql="select distinct section from students where academic_year='".$cur_academic_year."'";
        $result=mysqli_query($conn,$sql);
         foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
		<?php
		}
		echo '</select>';
        ?>
		</div>
		
	<button type="submit" name="filt_submit" class="btn btn-success">Filter</button>
	
	
       
       </div>
	</form>
	</div>
	</div><br>
<div class="row">
<div class="col-sm-12" style="padding-left:30px;padding-right:30px;">

<div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>Select Route</th>
        <th>Select Stage</th>
        
        <th>Student Name</th>
       
        
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	if(isset($_GET["filt_class"])){
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
	}else{
		$filt_class="lkg";
		$section="Section A";
	}
	
	$sql="select id,first_name,roll_no,present_class,section from students where present_class='".$filt_class."' and section='".$section."' and academic_year='".$cur_academic_year."' ORDER BY first_name";
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	?>
	
	<form action="insert_route_det.php" method="post">
	
	<div class="form-inline">
	<br>
	
	<?php
	foreach($result as $row)
	{
		
	?>
	
    <tr>
		
		
	
		
		<td>
		
		<div class="form-group">
	   
		<?php echo '<select class="form-control" name="route_name[]">';
		echo '<option value="">Select Routes</option>';
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
		</td>
		<td>
		 <div class="form-group">
	
	   <?php echo '<select class="form-control" name="stage_name[]">';
		echo '<option value="">Select Stage</option>';
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
		</td>
		
		
		
		
		<td>
		<div class="form-group-inline">
		<input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
		<input type="text" name="roll_no[]" value="<?php echo $row["roll_no"];?>" class="form-control" readonly>
		</div>
		</td>
		</tr>
		<input type="hidden" name="present_class[]" value="<?php echo $row["present_class"];?>">
		<input type="hidden" name="section[]" value="<?php echo $row["section"];?>">
		<input type="hidden" name="count" value="<?php echo $count;?>">
		<?php 
		 }
         ?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="checked[]" value="Add Students">
	</form>
</div>
</div>
</div>


<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	

?>