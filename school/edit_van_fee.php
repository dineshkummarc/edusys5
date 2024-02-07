<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$updated_by = $_SESSION['lkg_uname'];
	
	require("header.php");	
	require("connection.php");	
if(isset($_GET["id"])){
	$id=$_GET["id"];
}

$sql="select * from student_van_fee where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
  $student_id=$row["student_id"];
	$route_name=$row["route_name"];
	$stage_name=$row["stage_name"];
	$tot_paid=$row["tot_paid"];
  $note=$row["note"];
  $rec_date=$row["rec_date"];
  $rec_no=$row["rec_no"];
}
?>
  <div class="container-fluid">
	  <div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-yellow">
        <div class="panel-heading"><h4>Edit Collected Van Fee</h4></div>
        <div class="panel-body">
<?php
	if((isset($_GET["status"]))=="submitted")
	 {
	   echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Updated successfully</span><br></p>';

		}
		else if((isset($_GET["status"]))=="failed")

		{
		echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

		}
?>
								
							
<form action="update_collected_van_fee.php" method="post">
 
		
	  <div class="form-group">
	    <label for="usr">Fee:</label>
		<input type="number" name="van_fee" value="<?php echo $tot_paid;?>" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Receipt Date</label>
		<input type="date" name="rec_date" value="<?php echo $rec_date;?>" class="form-control">
	  </div>

    <div class="form-group">
	    <label for="usr">Receipt No</label>
		<input type="text" name="rec_no" value="<?php echo $rec_no;?>" class="form-control">
	  </div>

    <div class="form-group">
	  <select class="form-control" name="route_name">
		<option value="<?php echo $route_name;?>"><?php echo $route_name;?></option>
    <?php
		$sql_route="select distinct route_name from routes";
    $result_route=mysqli_query($conn,$sql_route);
    foreach($result_route as $value_route)
		{
		?>
		<option value='<?php echo $value_route["route_name"];?>'><?php echo $value_route["route_name"];?></option>
		<?php
		}
	?>
    </select>
	</div>
	
	 <div class="form-group">
	  <select class="form-control" name="stage_name">
	  <option value="<?php echo $stage_name;?>"><?php echo $stage_name;?></option>
    <?php
		$sql_stage="select distinct stage_name from stages";
    $result_stage=mysqli_query($conn,$sql_stage);
      foreach($result_stage as $value_stage)
		{
		?>
		<option value='<?php echo $value_stage["stage_name"];?>'><?php echo $value_stage["stage_name"];?></option>
		<?php
		}
	
        ?>
        	</select>
	</div>
	  
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="hidden" name="student_id" value="<?php echo $student_id;?>">

	  <input type="submit"  class="btn btn-success" value="Update Collected Van Fee">


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