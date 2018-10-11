<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	error_reporting("0");
	require("header.php");
	require("connection.php");
	if((isset($_GET["present_class"]))&&(isset($_GET["section"]))&&(isset($_GET["route_name"])))
	{
		$filt_class=$_GET["present_class"];
		$section=$_GET["section"];
		$exam_name=$_GET["exam_name"];
	}

	?>
	<head>
<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
	<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12"><br>
				
	<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<div class="form-group">
		<select class="form-control" name="present_class">
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
		echo '</select>';
        ?>
		</div>
		
		<div class="form-group">
	   <?php echo '<select class="form-control" name="route_name">';
		echo '<option value="">Select Routes</option>';
		$sql_route="select distinct route_name from routes";
        $result_route=mysqli_query($conn,$sql_route);
         foreach($result_route as $value_route)
		{
		?>
		<option value='<?php echo $value_route["route_name"];?>'><?php echo $value_route["route_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
	</div>
	
	 <div class="form-group">
	  
	   <?php echo '<select class="form-control" name="stage_name">';
		echo '<option value="">Select Stage</option>';
		$sql_stage="select distinct stage_name from stages";
        $result_stage=mysqli_query($conn,$sql_stage);
         foreach($result_stage as $value_stage)
		{
		?>
		<option value='<?php echo $value_stage["stage_name"];?>'><?php echo $value_stage["stage_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
	</div>
	
	<input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Get List">
	
	</form>
	</div>
	</div>
	</div>
	
<div class="row">
<div class="col-sm-12">
<div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>SL No</th>
        <th width="15%">Student Name</th>
        <th>Fee Amount</th>
        <th>Receipt Date</th>
        <th>Receipt No</th>
		
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	if((isset($_GET["present_class"]))&&(isset($_GET["section"]))&&(isset($_GET["route_name"]))&&(isset($_GET["stage_name"])))
	{
		$filt_class=$_GET["present_class"];
		$section=$_GET["section"];
		$route_name=$_GET["route_name"];
		$stage_name=$_GET["stage_name"];
		
	}

	$sql="select id,first_name,section,roll_no,present_class,stage_name from route_students where present_class='".$filt_class."' and section='".$section."' and route_name='".$route_name."' and stage_name='".$stage_name."' ORDER BY first_name";
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_transport_fee.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
		//$dob= date('d-m-Y', strtotime( $row['dob'] ));
		//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	
	?>
	
    <tr>
		
		<td><?php echo $row_count;?></td>
		<td width="15%"><input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
		<input type="text" name="roll_no[]" value="<?php echo $row["roll_no"];?>" class="form-control" readonly>
		</td>
	
		<td><input type="number" name="van_fee[]" class="form-control"></td>
		<td><input type="date" name="rec_date[]" class="form-control"></td>
		<td><input type="text" name="rec_no[]" class="form-control"></td>
	
	

		
		</tr>
		<input type="hidden" name="academic_year[]" value="<?php echo $row["academic_year"];?>">
		<input type="hidden" name="present_class[]" value="<?php echo $row["present_class"];?>">
		<input type="hidden" name="section[]" value="<?php echo $row["section"];?>">
		<input type="hidden" name="route_name[]" value="<?php echo $route_name;?>">
		<input type="hidden" name="stage_name[]" value="<?php echo $stage_name;?>">
		
		<?php 
		$row_count++; 
	}
		
	?>
		</table>
		
		
		<input type="submit" class="btn btn-primary" name="sub_van[]" value="Update Transport Fee">
	</form>
</div>
					</div>
					</div>
					
					
					
					
</div>
<?php
require("footer.php");
	}
    else
	{

	header("Location:login.php");

	}

?>			
