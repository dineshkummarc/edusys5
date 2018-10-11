<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
require("header.php");	
require("connection.php");	
if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
$sql="select * from stages where id ='".$id."'  and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
	$id=$row["id"];
	
	}
?>
       <div class="container-fluid">
		<div class="row">
		
		<div class="col-sm-3"><br>
	    </div>
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Stages</h4></div>
      <div class="panel-body">
	  
	  <form action="update_stages.php" method="post">
	  <div class="form-group">
	  <label for="sel1">Select Route</label>
	   <?php echo '<select class="form-control" name="route_name" required>';
		echo '<option value="">------</option>';
		$sql_route="select distinct route_name from routes  where academic_year='".$cur_academic_year."'";
        $result_route=mysqli_query($conn,$sql_route);
         foreach($result_route as $value_route)
		{
		?>
		<option value='<?php echo $value_route["route_name"];?>'><?php echo $value_route["route_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
	</div>
	  
	  
	  <div class="form-group">
	    <label for="usr">Stage Name</label>
		<input type="text"  name="stage_name" value="<?php echo $row["stage_name"];?>" class="form-control">
	  </div>
	
	 <input type="hidden" name="id" value="<?php echo $id;?>"> 
	 <input type="submit" class="btn btn-primary" value="Update Stage"> 
	</form>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		</div>
		
    </div>
    </div>



<?php 



	}else{
		header("Location:login.php");
	}
	



?>