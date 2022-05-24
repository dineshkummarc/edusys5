<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
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
	<center><h2>All Students</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Roll No</span></td>
		
		<td><span style="font-weight: bold;">Present Class</span></td>
	
		
		<td><span style="font-weight: bold;">Joined Date</span></td>
		
		<td><span style="font-weight: bold;">DOB</span></td>
		
		<td><span style="font-weight: bold;">Location</span></td>
		<td></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=75;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
		{
	if((isset($_GET["filt_class"])))
	{
		$filt_class=$_GET["filt_class"];
		
		
		
	$sql="select first_name,roll_no,class_join,present_class,class_stream,village,dob,join_date,photo_name,photo_path,photo_type from students where present_class='".$filt_class."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
	}
	
	}
	else{
		
	$sql="select first_name,roll_no,present_class,class_stream,class_join,village,dob,join_date,photo_name,photo_path,photo_type from students ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";	
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
		
		
		
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" ><?php echo $row["first_name"];?></a></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["roll_no"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["present_class"];?></span></td>
		
		
		<td><span style="color: #207FA2; "><?php echo $row["join_date"];?></span></td>
		<td><span style="color: #207FA2; "><?php echo $row["dob"];?></span></td>
		<td><span style="color: #207FA2; "><?php echo $row["village"];?></span></td>
		
		<td><div class="btn-group"><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" ><button type="button" class="btn btn-success">View</button></a>
        <a href="<?php echo 'upd_register.php?name='.$row['first_name'].'&roll='.$row['roll_no']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="<?php echo 'del_confirm.php?name='.$row['first_name'].'&roll='.$row['roll_no']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
       </div></td>
		
		
		
		
		</tr>
		<?php $row_count++; 
		
		?>
	
		
		<?php
	}
	
	
	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["filt_class"])!="")
		{
			$filt_class=$_GET["filt_class"];
			$sql="select first_name,roll_no,class_join,present_class,class_stream,village,dob,join_date,photo_name,photo_path,photo_type from students where present_class='".$filt_class."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
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
		
		</table></center>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
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
			
}
else
{
header("Location:login.php");
}
?>  
