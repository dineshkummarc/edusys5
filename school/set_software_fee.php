<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-yellow">
        <div class="panel-heading"><h4>Setup Software Fee</h4></div>
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
								
							
<form action="insert_set_software_fee.php" method="post">
 
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
		<?php require("selectclass.php");?>
		
		
		<!--
		 <div class="form-group">
	     <label for="sel1">Class Section</label>
	     <select class="form-control" name="towards">
		<option value="">------</option>
		<?php
        require("connection.php");
		 $sql_section="select distinct section from students where academic_year='".$cur_academic_year."'";

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
	    <label for="usr">Fee:</label>
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
<?php 


require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>