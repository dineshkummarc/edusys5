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
     <div class="panel-heading"><h4>Add Donation</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Donation has been added successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_don.php" method="post">
 
	  <div class="form-group">
	    <label for="usr">Name:</label>
		<input type="text" name="name" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label for="usr">Location:</label>
		<input type="text" name="location" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Reciept Date:</label>
		<input type="date" name="rec_date" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Reciept No:</label>
		<input type="number" name="rec_no" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Mobile:</label>
		<input type="text" name="mob" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Towards:</label>
		<input type="text" name="towards" class="form-control">
	  </div>
	<input type="submit" name="donation" class="btn btn-success" value="Add Donation">
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