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
	$class=$row["class"];
	$adm_fee=$row["adm_fee"];
	
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
		<option value="2016-2017">2016-17</option>
		<option value="2017-2018">2017-18</option>
		<option value="2018-2019">2018-19</option>
		<option value="2019-2020">2019-20</option>
		</select><br>
		</div>
		
		 <div class="form-group">
	  <label for="sel1">Select Class</label>
	  <select class="form-control" name="class" required>
	  <option value="<?php echo $class;?>"><?php echo $class;?></option>
		<?php require("selectclass.php");?>
		
		
		
		
	  <div class="form-group">
	    <label for="usr">Fee:</label>
		<input type="number" name="adm_fee" value="<?php echo $adm_fee;?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	   <input type="hidden" name="assign_date" value="<?php echo date('d-m-Y'); ?>" class="form-control">
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