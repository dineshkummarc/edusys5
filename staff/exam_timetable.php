<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	error_reporting("0");
	require("header.php");
	require("connection.php");
	if((isset($_GET["present_class"]))&&(isset($_GET["section"])))
	{
		$filt_class=$_GET["present_class"];
		$section=$_GET["section"];
		
	}
	$date=date("Y");
	$year=intval($date);
	$next_year=$year+1;
			
	$academic_year=$year."-".$next_year;

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
							echo '</select><br>';
                            ?>
					</div>
					<div class="form-group">
                    <select class="form-control" name="exam_name">
                        <option value="">Select Exam</option>
						<option value="fa-1">FA-1</option>
                        <option value="fa-2">FA-2</option>
                        <option value="fa-3">FA-3</option>
                        <option value="fa-4">FA-4</option>
                        <option value="sa-1">SA-1</option>
                        <option value="sa-2">SA-2</option>
                        
                       </select>
                    </div>
					
					
					  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Get List">
					  <!-- <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  -->
						
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
        <th width="15%">Subject</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
		
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	if((isset($_GET["present_class"]))&&(isset($_GET["section"])))
	{
		$filt_class=$_GET["present_class"];
		$section=$_GET["section"];
		$exam_name=$_GET["exam_name"];
	}else{
	$section="";
	}

    $row_count =1;
	$sql_row="select distinct subject_name from subjects where class='".$filt_class."'";
	$result_row=mysqli_query($conn,$sql_row);
	$count=mysqli_num_rows($result_row);
	?>
	
	<form action="<?php echo 'insert_exam_timetable.php?count='.$count;?>" method="post">
	<?php
	
	foreach($result_row as $value_row)
	{
	//var_dump($sql);	
	?>
	
    <tr>
		
		<td><?php echo $row_count;?></td>
		<td width="15%">
		<div class="form-group">
	 <?php echo '<select class="form-control" name="subject_name[]">';
	     $sql="select distinct subject_name from subjects where class='".$filt_class."'";
	     $result=mysqli_query($conn,$sql);
		echo '<option value="">Select Subject</option>';
			
		   foreach($result as $value)
			{
			?>
			<option value='<?php echo $value["subject_name"];?>'><?php echo $value["subject_name"];?></option>
			<?php
			}
			echo '</select><br>';
			?>
					</div>
		</td>
	
		<td><input type="date" name="exam_date[]" class="form-control"></td>
		<td><input type="text" name="start_time[]" class="form-control"></td>
		<td><input type="text" name="end_time[]" class="form-control"> </td>
	   </tr>
		
		
		<input type="hidden" name="academic_year[]" value="<?php echo $academic_year;?>">
		<input type="hidden" name="present_class[]" value="<?php echo $filt_class;?>">
		<input type="hidden" name="section[]" value="<?php echo $section;?>">
		<input type="hidden" name="exam_name[]" value="<?php echo $exam_name;?>">
		
		<?php 
		$row_count++; 
	}
		
	?>
		</table>
		
		
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Submit">
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
