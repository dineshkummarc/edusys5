<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");

?>
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		
		 <?php 
		   require("connection.php");
		   
		   echo '<select class="form-control" name="filt_class">';
		   echo '<option value="">Select Type</option>';
			

			$sql="select distinct present_class from students";

			 $result=mysqli_query($conn,$sql);

			foreach($result as $value)
			{
			?>
			<option value='<?php echo $value["present_class"];?>'><?php echo $value["present_class"];?></option>
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
	if((isset($_GET["filt_class"])))
	{
		$filt_class=$_GET["filt_class"];
		
		
		
	$sql="select id,first_name,roll_no,academic_year,present_class from students where present_class='".$filt_class."' ORDER BY id DESC";
	}
	
	}
	else{
		
	$sql="select id,first_name,roll_no,academic_year,present_class from students where present_class='lkg' ORDER BY id DESC";	
	}
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_upgrade_class.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
		//$dob= date('d-m-Y', strtotime( $row['dob'] ));
		//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	
	?>
	
    <tr>
		
		<input type="hidden" class="form-control" value="<?php echo $_SESSION['lkg_uname'];?>" name="taken_by[]">
	
		
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
		
		
		
		
		
		<div class="form-group">
		<input type="hidden" name="present_class[]" value="<?php echo $row["present_class"];?>" class="form-control" readonly>
		</div>
		
		
		
		<div class="form-group">
		<input type="hidden" name="academic_year[]" value="<?php echo $row["academic_year"];?>" class="form-control" readonly>
		</div>
		
		
		
		
		
		</tr>
		
		<?php 
		$row_count++; 
		
	}

	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["filt_class"])!="")
		{
			$filt_class=$_GET["filt_class"];
			$sql="select first_name,roll_no,academic_year,present_class from students where present_class='".$filt_class."' ORDER BY id DESC";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$filt_class." Students = ".$total_students.'</p>';
		}
		}
	
	else
	{
		$filt_class="lkg";
		
	$sql="select first_name,roll_no,academic_year,present_class from students where present_class='".$filt_class."'";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Students = ".$total_students.'</p>';
	}
		
		?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Update Class">
	</form>
</div>
</div>
</div>
</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

<?php 

	}else{
		header("Location:login.php");
	}
	

?>