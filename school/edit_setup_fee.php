<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	
if(isset($_GET["id"])){
	$id=$_GET["id"];
	
}
$sql="select * from set_fee where id ='".$id."' and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
	$id=$row["id"];
	$academic_year=$row["academic_year"];
	$adm_fee=$row["adm_fee"];

	$class=$row["class"];
	$fee_towards=$row["fee_towards"];


	
	}
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
								
							
<form action="update_setup_fee.php" method="post">
 
	  <div class="form-group">
	  <label for="sel1">Academic Year</label>
	  <select class="form-control" name="academic_year" required>
		<option value="<?php echo $academic_year;?>"><?php echo $academic_year;?></option>
		<option value="2021-2022">2021-2022</option>
		</select><br>
		</div>
		
		<div class="form-group">
		<label for="sel1">Select Class</label>
		<select class="form-control" name="class">
		<option value="<?php echo $class; ?>"><?php echo $class; ?></option>
		<?php
			require("connection.php");
			$sql_class="select class_name from class_name where academic_year='".$cur_academic_year."'";
			$result_class=mysqli_query($conn,$sql_class);
			foreach($result_class as $value_class)
			{
			?>
			<option value='<?php echo $value_class["class_name"];?>'><?php echo $value_class["class_name"];?></option>
			<?php
			}
			echo '</select>';
			?>
			</div>
		
		
		
		
	  <div class="form-group">
	    <label for="usr">Fee:</label>
		<input type="number" name="adm_fee" value="<?php echo $adm_fee;?>" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Fee Towards</label>
		<input type="text" name="fee_towards" value="<?php echo $fee_towards;?>" class="form-control">
	  </div>
	  

		
	  <input type="hidden" name="id" value="<?php echo $id;?>">
	  <input type="submit" name="set_fee" class="btn btn-success" value="Setup Fee">
	  <button class="btn btn-success" onclick="goBack()">Go Back</button>
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