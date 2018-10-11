<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))

{
	error_reporting("0");
	require("header.php");
	require("connection.php");

		$cur_academic_year=$_SESSION["academic_year"];

$exam_name=$_GET["exam_name"];
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
		<select class="form-control" name="filt_class" id="sel1">
			<?php require("selectclass.php");?>
			
			
		<div class="form-group">
		  <?php echo '<select class="form-control" name="section">';
			echo '<option value="">Select Section</option>';
				$sql_sec="select distinct section from students where academic_year='".$cur_academic_year."'";
				$result_sec=mysqli_query($conn,$sql_sec);
				foreach($result_sec as $value_sec)
				{
				?>
				<option value='<?php echo $value_sec["section"];?>'><?php echo $value_sec["section"];?></option>
				<?php
				}
				echo '</select><br>';
			?>
		</div>
		
		<div class="form-group">
		  <?php echo '<select class="form-control" name="exam_name">';
			echo '<option value="">Select Exam</option>';
				$sql="select distinct exam_name from exams where academic_year='".$cur_academic_year."'";
				$result=mysqli_query($conn,$sql);
				foreach($result as $value)
				{
				?>
				<option value='<?php echo $value["exam_name"];?>'><?php echo $value["exam_name"];?></option>
				<?php
				}
				echo '</select><br>';
			?>
		</div>
		 
		  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Get List">
	
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
        <th>SL No</th>
        <th width="15%">Student Name</th>
		<?php 
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
		$sql_sub="select * from subjects where class='".$filt_class."' and academic_year='".$cur_academic_year."' ORDER BY id limit 12";
	     $result_sub=mysqli_query($conn,$sql_sub);
		//var_dump($sql_sub);
		 foreach($result_sub as $row_sub){
		?>
		<th><?php echo $row_sub["subject_name"];?></th>
		<?php
			 
		 }
		
		?>
		
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
		
	if((isset($_GET["filt_class"]))&&(!empty($_GET["section"])))
	{
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
	}
	else if(isset($_GET["filt_class"]))
	{
		$filt_class=$_GET["filt_class"];
		$section="";
	}

	$sql="select id,first_name,section,roll_no,academic_year,present_class from students where academic_year='".$cur_academic_year."' and  present_class='".$filt_class."' and  section='".$section."' ORDER BY first_name";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	//var_dump($sql);
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	$exam_name=$_GET["exam_name"];
	?>
	
	<form action="<?php echo 'insert_marks.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
	
	?>
	
    <tr>
		
		<td><?php echo $row_count;?></td>
		<td width="15%"><input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
		<input type="text" name="roll_no[]" value="<?php echo $row["roll_no"];?>" class="form-control" readonly>
		</td>
	
		<td><input type="text" class="form-control" name="sub1[]" ></td>
		<td><input type="text" class="form-control" name="sub2[]" ></td>
		<td><input type="text" class="form-control" name="sub3[]" ></td>
		<td><input type="text" class="form-control" name="sub4[]" ></td>
		<td><input type="text" class="form-control" name="sub5[]" ></td>
		<td><input type="text" class="form-control" name="sub6[]" ></td>
		<td><input type="text" class="form-control" name="sub7[]" ></td>
		<td><input type="text" class="form-control" name="sub8[]" ></td>
		<td><input type="text" class="form-control" name="sub9[]" ></td>
		<td><input type="text" class="form-control" name="sub10[]" ></td>
		<td><input type="text" class="form-control" name="sub11[]" ></td>
		<td><input type="text" class="form-control" name="sub12[]" ></td>
		

		
		</tr>
		<input type="hidden" name="academic_year[]" value="<?php echo $cur_academic_year;?>">
		<input type="hidden" name="present_class[]" value="<?php echo $filt_class;?>">
		<input type="hidden" name="section[]" value="<?php echo $section;?>">
		<input type="hidden" name="exam_name[]" value="<?php echo $exam_name;?>">
		<?php 
		$row_count++; 
	}
		
	?>
		</table>
		
		
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Update Marks">
	</form>
</div>
					</div>
					</div>
					
					
					
					
</div>
<?php

	}
    else
	{

	header("Location:login_marks.php");

	}

?>			
