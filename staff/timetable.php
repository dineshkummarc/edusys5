<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
 <div class="row">

			<div class="col-sm-2">
			</div>
			<div class="col-sm-8" style="background-color:#003366;padding:25px;border:1px solid lightblue;">
			<center><h2 style="color:#fff;">UPDATE TIMETABLE</h2></center>
			<form action="insert_timetable.php" method="post">
				<center><table class="table"  style="width:60%;">
					
					  <tr>
						<td>
							<div class="form-group">
							  <label for="sel1" style="color:#ffffff;">Select Class</label>
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
							  <label for="sel1" style="color:#ffffff;">Select Day:</label>
							  <select class="form-control" name="day">
								<option value="">Select Day</option>
								<option value="monday">Monday</option>
								<option value="tuesday">Tuesday</option>
								<option value="wednesday">Wednesday</option>
								<option value="thursday">Thursday</option>
								<option value="friday">Friday</option>
								<option value="saturday">Saturday</option>
								</select>
							</div>
						</td>
						
						
						<td>
							<div class="form-group">
							  <label for="usr" style="color:#ffffff;">Subject Name</label>
							  <select class="form-control" name="subject1">
								<option value="">Select Period 1</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject2">
								<option value="">Select Period 2</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject3">
								<option value="">Select Period 3</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject4">
								<option value="">Select Period 4</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject5">
								<option value="">Select Period 5</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject6">
								<option value="">Select Period 6</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject7">
								<option value="">Select Period 7</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject8">
								<option value="">Select Period 8</option>
								<?php require("selecttime.php");?>
								
								<select class="form-control" name="subject9">
								<option value="">Select Period 9</option>
								<?php require("selecttime.php");?>
								
							</div>
						</td>
					  </tr>
					  <tr>
					  <td>
					  </td>
					 
					  
					  <td>
					  <input type="submit" class="btn btn-success" value="Update">
					  </td>
					  </tr>
					 
					</tbody>
				  </table></center>
				   
			</form>
			</div>
			<div class="col-sm-2">
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
