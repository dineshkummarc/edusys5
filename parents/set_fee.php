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
		<div class="panel panel-yellow">
        <div class="panel-heading"><h4>Setup Fee Details</h4></div>
        <div class="panel-body">
		<?php
		
			if((isset($_GET["status"]))=="submitted")

				{


					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Fee setup has been updated successfully</span><br></p>';

				}
				else if((isset($_GET["status"]))=="failed")

				{

					

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_set_fee.php" method="post">
 
	  <div class="form-group">
	  <label for="sel1">Academic Year</label>
	  <select class="form-control" name="academic_year" required>
		<option value="">-----------</option>
		<option value="2016-2017">2016-17</option>
		                <option value="2017-2018">2017-18</option>
		                <option value="2018-2019">2018-19</option>
		                <option value="2019-2020">2019-20</option>
		</select><br>
		</div>
		
		 <div class="form-group">
	  <label for="sel1">Select Class</label>
	  <select class="form-control" name="class" required>
		<option value="">Select Class</option>
		<option value="lkg">LKG</option>
		<option value="ukg">UKG</option>
		<option value="first standard">1st Standard</option>
				<option value="second standard">2nd Standard</option>
			  <option value="third standard">3rd Standard</option>
			  <option value="fourth standard">4th Standard</option>
			  <option value="fifth standard">5th Standard</option>
			  <option value="sixth standard">6th Standard</option>
			  <option value="seventh standard">7th Standard</option>
			  <option value="eighth standard">8th Standard</option>
			   <option value="ninth standard">9th Standard</option>
			  <option value="tenth standard">10th Standard</option>
			  <option value="first puc">1st PUC</option>
			  <option value="second puc">2nd PUC</option>
		</select><br>
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
		<option value='<?php echo $value_section["section"];?>'><?php echo $value_section["section"];?></option>
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
	   <input type="hidden" name="assign_date" value="<?php echo date('d-m-Y'); ?>" class="form-control">
		</div>
		
	  <input type="submit" name="set_fee" class="btn btn-success" value="Setup Fee">
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