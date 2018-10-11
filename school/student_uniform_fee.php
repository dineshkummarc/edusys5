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
     <div class="panel-heading"><h4>Student Uniform Fee</h4></div>
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
			$sql="select * from student_uniform_fee where academic_year='".$cur_academic_year."' and id='".$id."'";
            $result=mysqli_query($conn,$sql);
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$name_edit=$row["name"];
				$class_edit=$row["class"];
				$academic_year_edit=$row["academic_year"];
				$roll_no_edit=$row["roll_no"];
				
			}	
				?>
				<h2>Update Fee</h2>
				Name : <?php echo $name_edit;?> , Roll No : <?php echo $roll_no_edit;?> , Class : <?php echo $class_edit;?>			
							
<form action="update_student_uniform_fee.php" method="post">
      <div class="form-group">
	  <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control" id="name" required>
	  </div>
	  <div class="form-group">
	  <input type="hidden" name="name" value="<?php echo $name_edit;?>" class="form-control" id="name" required>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="roll_no" value="<?php echo $roll_no_edit;?>" class="form-control" id="roll_no" required>
	  </div>
	  
 <div class="form-group">
	   <input type="hidden" name="academic_year" value="<?php echo $cur_academic_year;?>" class="form-control"  required>
	  </div>
  <div class="form-group">
	   <input type="hidden" name="present_class" value="<?php echo $class_edit;?>" class="form-control" required>
	  </div>
 
	 
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
		<option value='<?php //echo $value_section["section"];?>'><?php //echo $value_section["section"];?></option>
		<?php
		}
		echo '</select>';
		?></div>
-->
	<div class="form-group">
	    <label for="usr">Uniform Fee:</label>
		<input type="number" name="adm_fee" value="<?php echo $row["adm_fee"];?>" class="form-control">
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
	<input type="submit" name="student_fee" class="btn btn-success" value="Collect Fee">
	</form>
	
				<?php
					
				}
				else
				{
					
					$present_class=$_GET["present_class"];
				$first_name=$_GET["first_name"];
				$roll_no=$_GET["roll_no"];
				$academic_year=$_GET["academic_year"];	
					
					?>
				Name : <?php echo $first_name;?> , Roll No : <?php echo $roll_no;?> , Class : <?php echo $present_class;?>			
							
<form action="insert_student_uniform_fee.php" method="post">
      <div class="form-group">
	  <input type="hidden" name="name" value="<?php echo $first_name;?>" class="form-control" id="name" required>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="roll_no" value="<?php echo $roll_no;?>" class="form-control" id="roll_no" required>
	  </div>
	  
 <div class="form-group">
	   <input type="hidden" name="academic_year" value="<?php echo $cur_academic_year;?>" class="form-control" id="roll_no" required>
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
		 $sql_section="select distinct section from students where academic_year='".$cur_academic_year."'";

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
	    <label for="usr">Uniform Fee:</label>
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
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
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