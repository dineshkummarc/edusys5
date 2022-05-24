<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	if((isset($_GET["present_class"]))&&(!empty($_GET["section"])))
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
			$sql="select distinct section from students where academic_year='".$cur_academic_year."'";
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
	
	
	  <input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Get List">
	  
	</form>
	</div>
	</div>
	</div>
	<div class="container-fluid">
	<div class="row">
	 <div class="col-sm-12">
	 <h3>Collect Books ,Uniform and Other Fee Details</h3>
	 <div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>SL No</th>
        <th width="15%">Student Name</th>
        <th>Fee Amount</th>
        <th>Fee Towards</th>
        <th>Receipt Date</th>
        <th>Receipt No</th>
		
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	if((isset($_GET["present_class"]))&&(!empty($_GET["section"])))
	{
		$filt_class=$_GET["present_class"];
		$section=$_GET["section"];
	}else if(isset($_GET["present_class"])){
		$filt_class=$_GET["present_class"];
	}

	$sql="select id,first_name,section,roll_no,academic_year,present_class,father_name from students where academic_year='".$cur_academic_year."' and present_class='".$filt_class."' and section='".$section."' ORDER BY first_name";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_bulk_other_fee.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
	?>
	
    <tr>
		
	<td><?php echo $row_count;?></td>
	<td width="15%"><input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
	<input type="text" name="roll_no[]" value="<?php echo $row["roll_no"];?>" class="form-control" readonly>
	</td>
	<td><input type="number" name="adm_fee[]" class="form-control"></td>
	<td><input type="text" name="towards[]" class="form-control"></td>
	<td><input type="date" name="rec_date[]" class="form-control"></td>	
	<td><input type="text" name="rec_no[]" class="form-control"></td>
	</tr>
	<input type="hidden" name="assign_date" value="<?php echo date('d-m-Y'); ?>" class="form-control">
	<input type="hidden" name="academic_year[]" value="<?php echo $cur_academic_year;?>">
	<input type="hidden" name="present_class[]" value="<?php echo $row["present_class"];?>">
	<input type="hidden" name="section[]" value="<?php echo $row["section"];?>">
	
	<?php 
	$row_count++; 
	}
		
	?>
	</table>
	<input type="submit" class="btn btn-primary" name="sub_att[]" value="Update Fee">
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
