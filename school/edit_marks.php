<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	error_reporting("0");
	require("header.php");
	require("connection.php");

		$filt_class=$_SESSION["class"];
		$section=$_SESSION["section"];

$exam_name=$_GET["exam_name"];
$id=$_GET["id"];
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
					 <div class="col-sm-12">
					 <div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>SL No</th>
        <th width="15%">Student Name</th>
		<?php 
		$sql_sub="select * from subjects where class='".$filt_class."'  and academic_year='".$cur_academic_year."' ORDER BY id limit 12";
	     $result_sub=mysqli_query($conn,$sql_sub);
		//var_dump($sql_sub);
		 foreach($result_sub as $row_sub){
		?>
		<th><?php echo $row_sub["subject_name"];?></th>
		<?php
			 
		 }
		$sql_marks="select * from student_marks where id = '".$id."'  and academic_year='".$cur_academic_year."'";
		$result_marks=mysqli_query($conn,$sql_marks);
		//var_dump($sql_marks);
		if($row_marks=mysqli_fetch_array($result_marks,MYSQLI_ASSOC))
	{
		?>
		
    </tr>
</thead>
<tbody>

	
	<form action="update_marks.php" method="post">

	
    <tr>
		
		<td><?php echo $row_count;?></td>
		<td width="15%"><input type="text" name="first_name" value="<?php echo $row_marks["first_name"];?>" class="form-control" readonly>
		<input type="text" name="roll_no" value="<?php echo $row_marks["roll_no"];?>" class="form-control" readonly>
		</td>
	
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub1'];?>" name="sub1" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub2'];?>" name="sub2" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub3'];?>" name="sub3" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub4'];?>" name="sub4" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub5'];?>" name="sub5" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub6'];?>" name="sub6" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub7'];?>" name="sub7" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub8'];?>" name="sub8" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub9'];?>" name="sub9" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub10'];?>" name="sub10" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub11'];?>" name="sub11" ></td>
		<td><input type="text" class="form-control" value="<?php echo $row_marks['sub12'];?>" name="sub12" ></td>
		

		
		</tr>
		<input type="hidden" name="academic_year" value="<?php echo $row_marks['academic_year'];?>">
		<input type="hidden" name="present_class" value="<?php echo $filt_class;?>">
		<input type="hidden" name="section" value="<?php echo $section;?>">
		<input type="hidden" name="exam_name" value="<?php echo $row_marks['exam_name'];?>">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		
		</table>
		
		
		<input type="submit" class="btn btn-primary" name="sub_att" value="Update Marks">
	</form>
</div>
</div>
</div>
</div>
<?php

}
require("footer.php");
}
else
{

header("Location:login_marks.php");

}

?>			
