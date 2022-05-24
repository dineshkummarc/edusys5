<?php
session_start();
if(isset($_SESSION['class_uname'])&&isset($_SESSION['class_pass'])&&isset($_SESSION['class'])&&isset($_SESSION['academic_year']))

{
require("att_header.php");
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
								<option value="">Select Class</option>
								<option value="lkg">LKG</option>
								<option value="ukg">UKG</option>
								</select><br>
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
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								
								</select><br>
								<select class="form-control" name="subject2">
								<option value="">Select Period 2</option>
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								</select><br>
								<select class="form-control" name="subject3">
								<option value="">Select Period 3</option>
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								</select><br>
								<select class="form-control" name="subject4">
								<option value="">Select Period 4</option>
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								</select><br>
								<div style="background-color:green;color:#ffffff;border:1px solid lightblue;">
								<center><p>Lunch Break</p></center></div>
								<br>
								<select class="form-control" name="subject5">
								<option value="">Select Period 5</option>
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								</select><br>
								<select class="form-control" name="subject6">
								<option value="">Select Period 6</option>
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								</select><br>
								<select class="form-control" name="subject7">
								<option value="">Select Period 7</option>
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								</select><br>
								<select class="form-control" name="subject8">
								<option value="">Select Period 8</option>
								<option value="kannada">Kannada</option>
								<option value="english">English</option>
								<option value="environmental studies">Environmental Studies</option>
								<option value="drawings cca">Drawings CCA</option>
								<option value="political science">Political Science</option>
								<option value="economics">Economics</option>
								<option value="business study">Business Study</option>
								<option value="accountancy">Accountancy</option>
								<option value="computer science">Computer Science</option>
								<option value="history">History</option>
								<option value="sociology">Sociology</option>
								<option value="physics">Physics</option>
								<option value="chemistry">Chemistry</option>
								<option value="mathematics">Mathematics</option>
								<option value="biology">Biology</option>
								
								</select>
								
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
