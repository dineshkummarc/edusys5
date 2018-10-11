<?php
session_start();

if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))
{
	
$cur_academic_year=$_SESSION['academic_year'];
require("header.php");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
	<?php
	$title="Time Table";
		
	require("connection.php");	
	
	$class=$_SESSION["parents_class"];
	
	?>
	<div class="panel panel-primary">
      <div class="panel-heading">
		
									
									
	  
	  </div>
	  <center><h1><?php 
	
	  
	  echo strtoupper($class);?> Time Table</h1></center>
      <div class="panel-body">
      <div class="panel-body" id="txtHint">
	  <div class="table-responsive">
			<table class="table table-bordered" id="tabl-bordered">
					<thead>
					
					  
					<tr style="color:#000;">
						<th>Days</th>
						
						<th>10 to 11</th>
						<th>11 to 12</th>
						<th>12 to 1</th>
						<th>1 to 2</th>
				
						<th>2 to 3</th>
						<th>3 to 4</th>
						<th>4 to 5</th>
						
					</tr>
					
					</thead>
					<tbody>
					<?php
					$sql_time="select * from timetable where class='".$class."' and academic_year='".$cur_academic_year."'  and day='monday' ORDER BY ID DESC LIMIT 1";
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
						<td class="w3-light-grey" style="color:#000;"><?php echo "Lunch Break"; ?></td>
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					
					$sql_time="select * from timetable where class='".$class."' and academic_year='".$cur_academic_year."' and  day='tuesday' ORDER BY ID DESC LIMIT 1";
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
						<td class="w3-light-grey" style="color:#000;"><?php echo "Lunch Break"; ?></td>
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					 $sql_time="select * from timetable where class='".$class."' and academic_year='".$cur_academic_year."' and day='wednesday' ORDER BY ID DESC LIMIT 1";
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
						<td class="w3-light-grey" style="color:#000;"><?php echo "Lunch Break"; ?></td>
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						
					  </tr>
					 <?php
					}
					  
					 $sql_time="select * from timetable where class='".$class."' and academic_year='".$cur_academic_year."' and day='thursday' ORDER BY ID DESC LIMIT 1";
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
						<td class="w3-light-grey" style="color:#000;"><?php echo "Lunch Break"; ?></td>
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					 
					  
					 $sql_time="select * from timetable where class='".$class."' and academic_year='".$cur_academic_year."' and day='friday' ORDER BY ID DESC LIMIT 1";
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
						<td class="w3-light-grey" style="color:#000;"><?php echo "Lunch Break"; ?></td>
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						
						
					  </tr>
					 <?php
					}
					 $sql_time="select * from timetable where class='".$class."' and academic_year='".$cur_academic_year."' and day='saturday' ORDER BY ID DESC LIMIT 1";
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
						<td class="w3-light-grey" style="color:#000;"><?php echo "Lunch Break"; ?></td>
						<td><?php echo $value["subject5"]; ?></td>
						<td><?php echo $value["subject6"]; ?></td>
						<td><?php echo $value["subject7"]; ?></td>
						
						
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
			
}
else
{
header("Location:login.php");
}
?>  
