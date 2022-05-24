<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
	    </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Collect Student Fee</h4></div>
      <div class="panel-body">
			<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Fee setup has been updated successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
	

				$present_class=$_GET["present_class"];
				
				$first_name=$_GET["first_name"];
				
				$roll_no=$_GET["roll_no"];
				
				

				$academic_year=$_GET["academic_year"];
				
					?>
								
				Name : <?php echo $first_name;?> , Roll No : <?php echo $roll_no;?> , Class : <?php echo $present_class;?>			
							
<form action="insert_student_fee.php" method="post">
      <div class="form-group">
	  <input type="hidden" name="name" value="<?php echo $first_name;?>" class="form-control" id="name" required>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="roll_no" value="<?php echo $roll_no;?>" class="form-control" id="roll_no" required>
	  </div>
	  
 <div class="form-group">
	   <input type="hidden" name="academic_year" value="<?php echo $academic_year;?>" class="form-control" id="roll_no" required>
	  </div>
  <div class="form-group">
	   <input type="hidden" name="present_class" value="<?php echo $present_class;?>" class="form-control" id="roll_no" required>
	  </div>
 
	 
		<!--
		 <div class="form-group">
	     <label for="sel1">Class Section</label>
	     <select class="form-control" name="towards">
		<option value="">------</option>
		<?php
        require("connection.php");
		 $sql_section="select distinct section from students";

		 $result_section=mysqli_query($conn,$sql_section);

		 foreach($result_section as $value_section)
        {
        ?>
		<option value='<?php //echo $value_section["section"];?>'><?php //echo $value_section["section"];?></option>
		<?php
		}
		echo '</select>';
		?></div>
-->
		
		
	  <div class="form-group">
	    <label for="usr">Admission Fee:</label>
		<input type="number" name="adm_fee" class="form-control">
	  </div>
	 
		
	  <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="text" name="rec_no" class="form-control">
	  </div>
	 
	 
	  
	  
	  <div class="form-group">
	   <input type="hidden" name="assign_date" value="<?php echo date('d-m-Y'); ?>" class="form-control">
		</div>
		
		
		
	<input type="submit" name="student_fee" class="btn btn-success" value="Collect Fee">
	</form>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		
	  
    </div>
    </div>
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