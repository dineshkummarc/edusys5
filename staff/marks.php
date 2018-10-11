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
        <th width="15%">Student Name</th>
		<?php 
		$sql_sub="select * from subjects where class='".$filt_class."' ORDER BY id limit 12";
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
	if((isset($_GET["present_class"]))&&(isset($_GET["section"])))
	{
		$filt_class=$_GET["present_class"];
		$section=$_GET["section"];
	}

	$sql="select id,first_name,section,roll_no,academic_year,present_class from students where present_class='".$filt_class."' and section='".$section."' ORDER BY first_name";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_marks.php?count='.$count;?>" method="post">
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
		<input type="hidden" name="academic_year[]" value="<?php echo $row["academic_year"];?>">
		<input type="hidden" name="present_class[]" value="<?php echo $row["present_class"];?>">
		<input type="hidden" name="section[]" value="<?php echo $row["section"];?>">
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
require("footer.php");
	}
    else
	{

	header("Location:login.php");

	}

?>			
