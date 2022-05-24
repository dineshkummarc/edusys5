<?php
session_start();

if(isset($_SESSION['class_uname'])&&isset($_SESSION['class_pass'])&&isset($_SESSION['class'])&&isset($_SESSION['academic_year']))

{
require("att_header.php");
require("connection.php");

?>
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		
		  <select class="form-control" name="filt_class" id="sel1">
			<option value="">By Class</option>
			<option value="lkg">LKG</option>
			<option value="ukg">UKG</option>
			 <option value="first standard">First Standard</option>
				<option value="second standard">Second Standard</option>
			  <option value="third standard">Third Standard</option>
			  <option value="fourth standard">Fourth Standard</option>
			  <option value="fifth standard">Fifth Standard</option>
		  </select>
		</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	</form>
	</div>
	</div>
<div class="row">
<div class="col-sm-12">
<div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>
            <button type="button" id="selectAll" class="main"> <span class="sub"></span> Select</button>
        </th>
		<td><span style="font-weight: bold;">SL No</span></td>
        <th>Name</th>
        <th>Roll No</th>
        <th>Class</th>
        <th>Academic Year</th>
        <th>Attendance Date</th>
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
		
		
		
	$sql="select first_name,roll_no,class_join,present_class,class_stream,village,dob,join_date,photo_name,photo_path,photo_type from students where present_class='".$filt_class."' ORDER BY id DESC";
	}
	
	}
	else{
		
	$sql="select first_name,roll_no,present_class,class_stream,class_join,village,dob,join_date,photo_name,photo_path,photo_type from students ORDER BY id DESC";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);

	foreach($result as $row)
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	
	?>
    <tr>
		
		
		<td><input type="checkbox" /></td>
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><?php echo $row["first_name"];?></a></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["roll_no"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["present_class"];?></span></td>
		<td><span style="color: #207FA2; "><?php echo date('d-m-Y');?></span></td>
		
		<td><div class="btn-group"><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" ><button type="button" class="btn btn-success">View</button></a>
        <a href="<?php echo 'upd_register.php?name='.$row['first_name'].'&roll='.$row['roll_no']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="<?php echo 'del_confirm.php?name='.$row['first_name'].'&roll='.$row['roll_no']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
       </div></td>
		
		
		
		
		</tr>
		<?php 
		$row_count++; 
		
	}
	
	
	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["filt_class"])!="")
		{
			$filt_class=$_GET["filt_class"];
			$sql="select first_name,roll_no,class_join,present_class,class_stream,village,dob,join_date,photo_name,photo_path,photo_type from students where present_class='".$filt_class."' ORDER BY id DESC";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$filt_class." Students = ".$total_students.'</p>';
		}
		}
	
	else
	{
		
	$sql="select first_name,roll_no,present_class,class_stream,class_join,village,dob,join_date,photo_name,photo_path,photo_type from students";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Students = ".$total_students.'</p>';
	}
		
		?>
		
		</table>
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