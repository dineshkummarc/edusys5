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
	<button type="submit" name="submit_class" class="btn btn-primary">Filter</button>
	
	
       
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
        <th>SL No</th>
        <th>Present</th>
		
        <th>Student Name</th>
       
        
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	
	if(isset($_GET["submit_class"]))
		{
	if((isset($_GET["filt_class"])))
	{
		$filt_class=$_GET["filt_class"];
		
		
		
	$sql="select * from attendance where present_class='".$filt_class."' and attendance='Present' and att_date=	CURDATE() ORDER BY id DESC";
	
	}
	
	}
	else{
		
	$sql="select * from attendance where present_class='lkg' and att_date=CURDATE() and attendance='Present' ORDER BY id DESC";	
	}
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'exit_class.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
		//$dob= date('d-m-Y', strtotime( $row['dob'] ));
		//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	
	?>
	
    <tr>
		
		<input type="hidden" class="form-control" value="<?php echo $_SESSION['class_uname'];?>" name="taken_by[]">
	
		
		<td>
		<?php echo $row_count;?>
		
		</td>
		<td>
	 	
		
		 <div class="form-group">
		    <input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
		  
		</div>
		
		</td>
		
		
		
		<td>
		<div class="form-group">
	
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

	if(isset($_GET["submit_class"]))
	{
		
		if(($_GET["filt_class"])!="")
		{
			$filt_class=$_GET["filt_class"];
			$sql="select * from attendance where present_class='".$filt_class."' and attendance='Present' and att_date=	CURDATE() ORDER BY id DESC";
			
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$filt_class." Students = ".$total_students.'</p>';
		}
		}
	
	else
	{
		
	$sql="select * from attendance where present_class='lkg' and att_date=CURDATE() and attendance='Present' ORDER BY id DESC";	
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Students = ".$total_students.'</p>';
	}
		
		?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Exit Class">
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