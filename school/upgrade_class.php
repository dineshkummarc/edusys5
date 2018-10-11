<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		<select class="form-control" name="filt_class">';
		 <?php require("selectclass.php");?>

		
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
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
		
		
		
	$sql="select * from students where present_class='".$filt_class."' and section='".$section."' and academic_year='".$cur_academic_year."' ORDER BY first_name";

	
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
		
		<input type="hidden" class="form-control" value="<?php echo $_SESSION['lkg_uname'];?>" name="taken_by[]">
	
		
		<td>
		<?php echo $row_count;?>
	 	
		
		 <div class="form-group">
		
		  <select class="form-control" name="result[]">
			<option value="pass">Pass</option>
			<option value="fail">Fail</option>
			<option value="first puc arts">1st PUC Arts</option>
			<option value="first puc commerce">1st PUC Commerce</option>
			<option value="first puc science">1st PUC Science</option>
			<option value="second puc arts">2nd PUC Arts</option>
			<option value="second puc commerce">2nd PUC Commerce</option>
			<option value="second puc science">2nd PUC Science</option>
			<option value="first b.com">B.com 1st year</option>
			  <option value="second b.com">B.com 2nd year</option>
			  <option value="third b.com">B.com 3rd year</option>
			<option value="absent">Absent</option>
			
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
		$row_count++;
	}
		 
		
	}

	if(isset($_GET["filt_submit"]))
	{
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
		$sql="select first_name,roll_no,academic_year,present_class,section from students where present_class='".$filt_class."' and section='".$section."' and academic_year='".$cur_academic_year."' ORDER BY first_name";
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