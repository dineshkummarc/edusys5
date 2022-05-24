<?php
session_start();
if(isset($_SESSION['class_uname'])&&isset($_SESSION['class_pass'])&&isset($_SESSION['class'])&&isset($_SESSION['academic_year']))

{
	
	require("att_header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Send Assignments and Homeworks</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Assignments has been sent successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_assign.php" method="post">
 
	  <div class="form-group">
	  <label for="sel1">Select Class</label>
	  <select class="form-control" name="class">
		<option value="">Select Class</option>
		<option value="lkg">LKG</option>
		<option value="ukg">UKG</option>
		<option value="first standard">First standard</option>
		<option value="second standard">Second standard</option>
		<option value="third standard">Third standard</option>
		<option value="fourth standard">Fourth standard</option>
		<option value="fifth standard">Fifth standard</option>
		</select><br>
		</div>
	  <div class="form-group">
	    <label for="usr">Title:</label>
		<input type="text" name="assign_title" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Description:</label>
		 <textarea class="form-control" name="assign_desc"  rows="5"></textarea>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="assign_date" value="<?php echo date('d-m-Y'); ?>" class="form-control">
		
	  </div>
	<input type="submit" name="assignment" class="btn btn-success" value="Send Assignments">
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