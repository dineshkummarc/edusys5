<?php
session_start();

if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))

{
$cur_academic_year=$_SESSION['academic_year'];
$class=$_SESSION['parents_class'];

require("header.php");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
  <div class="row">
	<?php
	$title="Time Table";
	error_reporting("0");	
	require("connection.php");	
	if((isset($_GET["exam_name"]))&&(isset($_GET["section"]))){	
	$class=$_SESSION['parents_class'];
	$section=$_GET["section"];
	$exam_name=$_GET["exam_name"];
	}else if(isset($_GET["exam_name"])){	
	$class=$_SESSION['parents_class'];
	$exam_name=$_GET["exam_name"];
	$section="";
	}
	?>
	 <a href=""  onclick="printDiv('income')"><i class="fa fa-print" aria-hidden="true"></i> Print</a>  <a href=""  onclick="goBack()"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a> 
	<div class="panel panel-primary">
      <div class="panel-heading">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
		  <div class="form-inline">
		 
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
					
					<input type="submit" class="btn btn-success" value="Show">
					</div>
					
  
					</form>
									
									
	  
	  </div><br>
	  
	
      <div class="panel-body" id="income">
	    <center><h4>
	  <?php echo strtoupper($class);?> Exam Time Table for <?php echo strtoupper($exam_name);?></h4></center>
      <div class="panel-body" id="txtHint">
	  <div class="table-responsive">
			<table class="table table-bordered" id="tabl-bordered">
			<tr>
			<th>SL No</th>
			<th>Subject</th>
			<th>Date</th>
			<th>Time</th>
			<!--<th>Sign</th>-->
			</tr>
			<?php
			$sql_sub="select distinct subject_name,exam_date,exam_name,start_time,end_time,present_class,section,academic_year from exam_timetable where present_class='".$class."' and exam_name='".$exam_name."' and academic_year='".$cur_academic_year."'";
			$result_sub=mysqli_query($conn,$sql_sub);
			$row_count =1;
		   foreach($result_sub as $value_sub)
		   //$exam_date= date('d-m-Y', strtotime( $value_sub['exam_date'] ));
			{
			?>
           <tr>
			<td><?php echo $row_count;?></td>
			<td><?php echo $value_sub["subject_name"]; ?></td>
			<td><?php echo $value_sub["exam_date"]; ?></td>
			<td><?php echo $value_sub["start_time"]." - ".$value_sub["end_time"]; ?></td>
			<!--<td></td>-->
			</tr>
					 <?php
					 $row_count++; 
					}
					  ?>
					</tbody>
				  </table>
	  
	  </div>
	  </div>
	  </div>
    </div>
	</div>
</div>
<div id="clearfix">
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
