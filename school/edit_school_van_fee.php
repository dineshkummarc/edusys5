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
				
				


           		
								
	

				if(isset($_GET['id'])&&($_GET['edit']))
				{
					$id=$_GET["id"];
			$sql="select * from student_van_fee where id='".$id."' and academic_year='".$cur_academic_year."'";
            $result=mysqli_query($conn,$sql);
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$name_edit=$row["first_name"];
				
				$class_edit=$row["present_class"];
				$academic_year_edit=$row["academic_year"];
				$roll_no_edit=$row["roll_no"];
				$section=$row["section"];
				$route_name=$row["route_name"];
				$stage_name=$row["stage_name"];
				
			}	
				?>
				<h2>Update Van Fee</h2>
				Name : <?php echo $name_edit;?> , Roll No : <?php echo $roll_no_edit;?> , Class : <?php echo $class_edit;?>			
							
<form action="update_student_van_fee.php" method="post">
      <div class="form-group">
	  <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control" id="name" required>
	  </div>
	  <div class="form-group">
	  <input type="hidden" name="first_name" value="<?php echo $name_edit;?>" class="form-control" id="name" required>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="roll_no" value="<?php echo $roll_no_edit;?>" class="form-control" id="roll_no" required>
	  </div>
	  
 <div class="form-group">
	   <input type="hidden" name="academic_year" value="<?php echo $academic_year_edit;?>" class="form-control"  required>
	  </div>
  <div class="form-group">
	   <input type="hidden" name="present_class" value="<?php echo $class_edit;?>" class="form-control" required>
	   <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control" required>
	   <input type="hidden" name="section" value="<?php echo $section;?>" class="form-control" required>
	   <input type="hidden" name="route_name" value="<?php echo $route_name;?>" class="form-control" required>
	   <input type="hidden" name="stage_name" value="<?php echo $stage_name;?>" class="form-control" required>
	  </div>
 

		
		
	  <div class="form-group">
	    <label for="usr">Van Fee:</label>
		<input type="number" name="van_fee" value="<?php echo $row["van_fee"];?>" class="form-control">
	  </div>
	 
		
	  <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" value="<?php echo $row["rec_date"];?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="text" name="rec_no" value="<?php echo $row["rec_no"];?>" class="form-control">
	  </div>
	 
	 
	  
	  
	  <div class="form-group">
	   <input type="hidden" name="assign_date" value="<?php echo date('d-m-Y'); ?>" class="form-control">
		</div>
		
		
		
	<input type="submit" name="student_fee" class="btn btn-success" value="Update Van Fee"> <button class="btn btn-success" onclick="goBack()">Go Back</button>
	</form>
	
				<?php
					
				}
				
		?>
	
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



	}else{
		header("Location:login.php");
	}
	



?>