<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container-fluid">

<div class="row">
<div class="col-sm-12" style="padding-left:30px;padding-right:30px;">
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
		
		
	$sql="select fac_id,fac_fname,parent_contact,academic_year from faculty ORDER BY fac_id DESC";
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_fac_attendance.php?count='.$count;?>" method="post">
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
		
		  <select class="form-control" name="attendance[]">
			<option value="Present">Present</option>
			<option value="Absent">Absent</option>
			
		  </select>
		</div>
		
		</td>
		
		
		
		<td>
		<div class="form-group">
		<input type="text" name="first_name[]" value="<?php echo $row["fac_fname"];?>" class="form-control" readonly><br>
		<input type="text" name="roll_no[]" value="<?php echo $row["parent_contact"];?>" class="form-control" readonly>
		<input type="hidden" name="academic_year[]" value="<?php echo $cur_academic_year;?>" class="form-control">
		</div>
		</td>
		
	
		
		
		</tr>
		
		<?php 
		$row_count++; 
		
	}

		
	$sql="select * from faculty";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Faculty = ".$total_students.'</p>';
	
		
		?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Update Attendance">
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