<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
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
							

							$sql="select distinct section from students";

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
					$sql_time="select * from timetable where class='".$class."' and section='".$section."' and day='monday' ORDER BY ID DESC LIMIT 1";
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
					
					$sql_time="select * from timetable where class='".$class."' and section='".$section."' and day='tuesday' ORDER BY ID DESC LIMIT 1";
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
					 $sql_time="select * from timetable where class='".$class."' and section='".$section."' and day='wednesday' ORDER BY ID DESC LIMIT 1";
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
					  
					 $sql_time="select * from timetable where class='".$class."' and section='".$section."' and day='thursday' ORDER BY ID DESC LIMIT 1";
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
					 
					  
					 $sql_time="select * from timetable where class='".$class."' and section='".$section."' and day='friday' ORDER BY ID DESC LIMIT 1";
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
					 $sql_time="select * from timetable where class='".$class."' and section='".$section."' and day='saturday' ORDER BY ID DESC LIMIT 1";
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
 <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
<?php
			
}
else
{
header("Location:login.php");
}
?>  
