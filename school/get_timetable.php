<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	$title="Time Table";
		
	require("connection.php");	
	if((isset($_GET["class"]))){	
	$class=$_GET["class"];
	}else{
	$class="lkg";	
	}
	
	?>
	
 <div class="col-sm-12">
<center><table class="table table-bordered" id="tabl-bordered">
					<thead>
					
					  
					<tr  style="color:#000;background:light-grey;">
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
					$sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and day='monday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;background:light-grey;">Monday</td>
						
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
					
					$sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and day='tuesday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;background:light-grey;">Tuesday</td>
						
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
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and day='wednesday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;background:light-grey;">Wednesday</td>
						
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
					  
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and day='thursday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;background:light-grey;">Thursday</td>
						
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
					 
					  
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and day='friday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;background:light-grey;">Friday</td>
						
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
					 $sql_time="select * from timetable where academic_year='".$cur_academic_year."' and class='".$class."' and day='saturday' ORDER BY ID DESC LIMIT 1";
					$result_time=mysqli_query($conn,$sql_time);
					if($value=mysqli_fetch_array($result_time,MYSQLI_ASSOC))
					{
					?>
					  <tr>
						<td style="color:#000;background:light-grey;">Saturday</td>
						
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
				  </table></center>
				  </div>
				  </div>
				  </div>
				  



<?php
require("footer.php");
}else{
		header("Location:login.php");
	}
	

?>