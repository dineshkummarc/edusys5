<?php
session_start();
if(isset($_SESSION['staff_uname'])&&isset($_SESSION['staff_pass'])&&isset($_SESSION['staff_class']))
{
require("header.php");
require("connection.php");

?>
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	 
		
			  <div class="form-group">
					 <?php echo '<select class="form-control" name="section">';
						echo '<option value="">Select Section</option>';
							

							$sql="select distinct section from students";

							 $result=mysqli_query($conn,$sql);

							foreach($result as $value)
							{
							?>
							<option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
							<?php
							}
							echo '</select><br>';

							?>
					</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	
	
       
       </div>
	</form>
	</div>
	</div><br>
<div class="row">
<div class="col-sm-12" style="padding-left:30px;padding-right:30px;">
<div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>Result</th>
		
        <th>Student Name</th>
       
        
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	
	if(isset($_GET["filt_submit"]))
	{
		$filt_class=$_SESSION["staff_class"];
		$section=$_GET["section"];
		
		
		
	$sql="select id,first_name,roll_no,academic_year,present_class,section from students where present_class='".$filt_class."' and section='".$section."' ORDER BY first_name";

	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_upgrade_class.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
	?>
	
    <tr>
		
		<input type="hidden" class="form-control" value="<?php echo $_SESSION['staff_uname'];?>" name="taken_by[]">
	
		
		<td>
		<?php echo $row_count;?>
	 	
		
		 <div class="form-group">
		
		  <select class="form-control" name="result[]">
			<option value="pass">Pass</option>
			<option value="fail">Fail</option>
			
		  </select>
		</div>
		
		</td>
		
		
		
		<td>
		<div class="form-group">
		<input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly><br>
		<input type="text" name="roll_no[]" value="<?php echo $row["roll_no"];?>" class="form-control" readonly>
		</div>
		</td>
	
		<input type="hidden" name="present_class[]" value="<?php echo $row["present_class"];?>" class="form-control" readonly>
		<input type="hidden" name="section[]" value="<?php echo $row["section"];?>" class="form-control" readonly>
		
		
		
		
		<div class="form-group">
		<input type="hidden" name="academic_year[]" value="<?php echo $row["academic_year"];?>" class="form-control" readonly>
		</div>
		
		
		
		
		
		</tr>
		
		<?php 
	}
		$row_count++; 
		
	}

	if(isset($_GET["filt_submit"]))
	{
		$filt_class=$_SESSION["staff_class"];
		$section=$_GET["section"];
		$sql="select first_name,roll_no,academic_year,present_class,section from students where present_class='".$filt_class."' and section='".$section."' ORDER BY first_name";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$filt_class." Students = ".$total_students.'</p>';
		}
	?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Update Class">
	</form>
</div>
</div>
</div>
</div>


<?php 

	}else{
		header("Location:login.php");
	}
	

?>