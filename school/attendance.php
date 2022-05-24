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
					<select class="form-control" name="filt_class">
						<option value="">Select Class</option>
							
						<?php 
							$sql="select distinct present_class from students where academic_year='".$cur_academic_year."'";
							$result=mysqli_query($conn,$sql);

							foreach($result as $value)
							{
							?>
							<option value='<?php echo $value["present_class"];?>'><?php echo $value["present_class"];?></option>
							<?php
							}
							?>
				</select>
				</div>
		  <div class="form-group">
					<select class="form-control" name="section">
						<option value="">Select Section</option>
							
						<?php 
							$sql="select distinct section from students where academic_year='".$cur_academic_year."'";
							$result=mysqli_query($conn,$sql);

							foreach($result as $value)
							{
							?>
							<option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
							<?php
							}
							?>
							</select><br>
				</div>
					
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	<a href="attendance.php"><button type="button" class="btn btn-primary">Edit</button></a>
	
       
       </div>
	</form>
	</div>
	</div><br>
<div class="row">
<div class="col-sm-12" style="padding-left:30px;padding-right:30px;">
  
	  <?php
	  if(isset($_GET["filt_class"])&&!empty($_GET["section"]))
	  {
		  date_default_timezone_set("Asia/Kolkata");
		  $today_date=date("Y-m-d");
		  $sql_att="select att_date from attendance Where present_class='".$_GET['filt_class']."' and section='".$_GET['section']."' and att_date='".$today_date."'";
		  $result_att=mysqli_query($conn,$sql_att);
		  if(mysqli_num_rows($result_att)>0)
			{
			?>
			<div class="alert alert-success">
			Today's Attendance has already taken.
			</div>
			
			<?php
				
			}else{
				
			?>
			
			<div class="alert alert-danger">
			Please take today's attendance.
			</div>
			<?php
			
			}
	  }	
		
	  
	  
	  
	  
	  
	  //var_dump($sql_att);
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
			<strong>Success.</strong> Attendance has updated successfully.
		</div>
		  <?php
	  }
	  ?>
	  
<div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>Present</th>
		
        <th>Student Name</th>
       
        
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");

	if((isset($_GET["filt_class"])))
	{
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
		
		
		
		
	$sql="select id,first_name,section,roll_no,academic_year,present_class from students where present_class='".$filt_class."' and section='".$section."' and academic_year='".$cur_academic_year."' ORDER BY first_name";
	
	
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_attendance.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
		//$dob= date('d-m-Y', strtotime( $row['dob'] ));
		//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	
	?>
	
    <tr>
		
		<input type="hidden"  value="<?php echo $_SESSION['lkg_uname'];?>" name="taken_by[]">
	
		
		<td>
		<?php echo $row_count;?>
	 	
		
		 <div class="form-group">
		
		  <select class="form-control" name="attendance[]">
			<option value="Present">Present</option>
			<option value="Absent">Absent</option>
			
		  </select>
		</div>
		
		</td>
		
		
		
		<td>
		<div class="form-group">
		<input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly><br>
		<input type="text" name="roll_no[]" value="<?php echo $row["roll_no"];?>" class="form-control" readonly>
		</div>
		</td>
		
		<input type="hidden" name="id[]" value="<?php echo $row["id"];?>">
		<input type="hidden" name="present_class[]" value="<?php echo $row["present_class"];?>">
		
		
		
		</tr>
		
		<?php 
		$row_count++;
	}
		 
		
	}

	if(isset($_GET["filt_submit"]))
	{
	$filt_class=$_GET["filt_class"];
	
			$sql="select first_name,roll_no,academic_year,present_class from students where present_class='".$filt_class."' and academic_year='".$cur_academic_year."' ORDER BY first_name";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$filt_class." Students = ".$total_students.'</p>';
		}
	
	else
	{
		
	$sql="select first_name,roll_no,academic_year,present_class from students where academic_year='".$cur_academic_year."' ORDER BY first_name";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Students = ".$total_students.'</p>';
	}
		
		?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Update Attendance">
	</form>
</div>
</div>
</div>
</div>

    <!-- Bootstrap Core JavaScript -->


<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	

?>