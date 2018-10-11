<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	
require("header.php");	

?>

                               
                                                
		<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add Upcoming Holidays</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Holiday has been added successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_holiday.php" method="post">
  
	
	
	
	   <div class="form-group">
	   <label for="usr">Day:</label>
		<select class="form-control" name="ho_day" id="sel1">
         <option value="monday">Monday</option>
         <option value="tuesday">Tuesday</option>
         <option value="wednesday">Wednesday</option>
         <option value="thursday">Thursday</option>
         <option value="friday">Friday</option>
         <option value="saturday">Saturday</option>
         <option value="sunday">Sunday</option>
       </select>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Hoiday Date:</label>
		<input type="date" name="ho_date" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Holiday Name:</label>
		<input type="text" name="ho_name" class="form-control">
	  </div>
	 
	<div class="form-group">
	    <label for="usr">Details:</label>
		<textarea rows="6" name="ho_details" class="form-control"></textarea>
		</div>
		
		
		<input type="submit" name="holiday" class="btn btn-success" value="Register Event">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
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

	}else{
		header("Location:login.php");
	}
	

?>