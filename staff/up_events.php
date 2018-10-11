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
     <div class="panel-heading"><h4>Add Upcoming Events</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Events has been added successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_events.php" method="post" enctype="multipart/form-data">
  
	
	
	
	   <div class="form-group">
	   <label for="usr">Event Name:</label>
		<input type="text" name="evt_name" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Event Date:</label>
		<input type="date" name="evt_date" class="form-control" required>
	  </div>
	 
	  
	 
	   <div class="form-group">
	    <label for="usr">Event Time:</label>
		<input type="time" name="evt_time" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Venue:</label>
		<input type="text" name="evt_venue" class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="usr">Contact No:</label>
		<input type="text" name="evt_mob" class="form-control" required>
	  </div>
	
	<div class="form-group">
	    <label for="usr">Details:</label>
		<textarea rows="6" name="evt_details" class="form-control"></textarea>
		</div>
		
		
		<input type="submit" name="events" class="btn btn-success" value="Register Event">
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
			
}
else
{
header("Location:login.php");
}
?>  
