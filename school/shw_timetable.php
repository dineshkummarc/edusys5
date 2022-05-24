<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
	<?php
	$title="Time Table";
		
	require("connection.php");	
	if((isset($_GET["class"]))){	
	$class=$_GET["class"];
	$section=$_GET["section"];
	}else{
	$class="lkg";	
	$section="Section A";	
	}
	?>
	<div class="panel panel-primary">
      <div class="panel-heading">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
								  <div class="form-inline">
								  <div class="form-group">
									  <label>Timetable</label>
									  <select class="form-control" name="class">
										<?php require("selectclass.php");?>   
										
										
									
									<div class="form-group">
					 
					  <?php 
					  
					  echo '<select class="form-control" name="section">';
						echo '<option value="">Select Section</option>';
							

							$sql="select distinct section from students where academic_year='".$cur_academic_year."'";

							 $result=mysqli_query($conn,$sql);

							foreach($result as $value)
							{
							?>
							<option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
							<?php
							}
							echo '</select><br>';

							?>
					</div>
					<div class="form-group">
									<input type="submit" class="btn btn-success" value="Show">
									</div>
									
									
									</div>
										
		  
									  </form>
									
									
	  
	  </div>
	  <center><h1>
	  <?php echo $class;?> Time Table</h1></center>
      <div class="panel-body">
      <div class="panel-body" id="txtHint">
	  <div class="table-responsive">
			<table class="table table-bordered" id="tabl-bordered">
					<thead>
					
					  
					<tr style="color:#000;">
						<th>Days</th>
						
						<th>10:00am to 10:40am</th>
						<th>10:40am to 11:20am</th>
						<th>11:20am to 11:30am</th>
						<th>11:30am to 12:10am</th>
						<th>12:10pm to 12:50pm</th>
						<th>12:50pm to 1:40pm</th>
						<th>1:40pm to 2:20pm</th>
						<th>2:20pm to 3:00pm</th>
						<th>3:00pm to 3:40pm</th>
						<th>3:40pm to 4:00pm</th>
						
						
					</tr>
					
					</thead>
					<tbody>
					<?php
					$sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and section='".$section."' and day='monday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;">Monday</td>
						<td><?php echo $value["subject1"]; ?></td>
						<td><?php echo $value["subject2"]; ?></td>
						<td><?php echo $value["subject3"]; ?></td>
						<td><?php echo $value["subject4"]; ?></td>
						
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						<td><?php echo $value["subject8"]; ?></td>
						<td><?php echo $value["subject9"]; ?></td>
						<td><?php echo $value["subject10"]; ?></td>
					</tr>
					 <?php
					}
					
					$sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and section='".$section."' and day='tuesday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;">Tuesday</td>
						<td><?php echo $value["subject1"]; ?></td>
						<td><?php echo $value["subject2"]; ?></td>
						<td><?php echo $value["subject3"]; ?></td>
						<td><?php echo $value["subject4"]; ?></td>
						
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						<td><?php echo $value["subject8"]; ?></td>
						<td><?php echo $value["subject9"]; ?></td>
						<td><?php echo $value["subject10"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and section='".$section."' and day='wednesday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;">Wednesday</td>
						<td><?php echo $value["subject1"]; ?></td>
						<td><?php echo $value["subject2"]; ?></td>
						<td><?php echo $value["subject3"]; ?></td>
						<td><?php echo $value["subject4"]; ?></td>
						
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						<td><?php echo $value["subject8"]; ?></td>
						<td><?php echo $value["subject9"]; ?></td>
						<td><?php echo $value["subject10"]; ?></td>
						
					  </tr>
					 <?php
					}
					  
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and section='".$section."' and day='thursday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;">Thursday</td>
						<td><?php echo $value["subject1"]; ?></td>
						<td><?php echo $value["subject2"]; ?></td>
						<td><?php echo $value["subject3"]; ?></td>
						<td><?php echo $value["subject4"]; ?></td>
						
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						<td><?php echo $value["subject8"]; ?></td>
						<td><?php echo $value["subject9"]; ?></td>
						<td><?php echo $value["subject10"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					 
					  
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and section='".$section."' and day='friday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;">Friday</td>
						<td><?php echo $value["subject1"]; ?></td>
						<td><?php echo $value["subject2"]; ?></td>
						<td><?php echo $value["subject3"]; ?></td>
						<td><?php echo $value["subject4"]; ?></td>
						
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						<td><?php echo $value["subject8"]; ?></td>
						<td><?php echo $value["subject9"]; ?></td>
						<td><?php echo $value["subject10"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and section='".$section."' and day='saturday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;">Saturday</td>
						<td><?php echo $value["subject1"]; ?></td>
						<td><?php echo $value["subject2"]; ?></td>
						<td><?php echo $value["subject3"]; ?></td>
						<td><?php echo $value["subject4"]; ?></td>
						
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						<td><?php echo $value["subject8"]; ?></td>
						<td><?php echo $value["subject9"]; ?></td>
						<td><?php echo $value["subject10"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					  ?>
					</tbody>
				  </table>
	  
	  </div>
	  </div>
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
