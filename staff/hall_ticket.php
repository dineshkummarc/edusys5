<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
error_reporting("0");
$exam_name=$_GET["exam_name"];
$first_name=$_GET["first_name"];
$roll_no=$_GET["roll_no"];
$section=$_GET["section"];
?>
<div id="income">
	 <a href=""  onclick="printDiv('income')"><i class="fa fa-print" aria-hidden="true"></i> Print</a>  <a href=""  onclick="goBack()"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a> 
  
<div class="container-fluid">
	
  <div class="row" style="border:1px solid DarkGray;" >
	<?php
	$title="Time Table";
		
	require("connection.php");	
	$sql="select * from students where first_name='".$first_name."' and roll_no='".$roll_no."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$present_class=$row["present_class"];
	$section=$row["section"];
	$roll_no=$row["roll_no"];
	$sex=$row["sex"];
	$father_name=$row["father_name"];
	$mother_name=$row["mother_name"];
	
	$fee_blance=$row["tot_fee"]-$row["tot_paid"];
	$adm_fee_blance=$row["tot_admis_fee"]-$row["tot_admis_paid"];
	$cca_fee_blance=$row["tot_cca_fee"]-$row["tot_cca_paid"];
	}
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$city=$row_sch["location"];
	}
	?>
	 <center>
	  <h3 style="color:red;"><?php echo $row_sch["sch_name"];?></h3>
	  <p style="color:blue;font-size:18px;"><?php echo $row_sch["location"];?> , <?php echo $row_sch["city"];?> , <?php echo $row_sch["district"];?> - <?php echo $row_sch["pin"];?> , <?php echo $row_sch["state"];?> , <br>
	  Phone : <?php echo $row_sch["phone"];?> , Mob : <?php echo $row_sch["mob"];?>
	</p>
	
	  <table class="table table-bordered" id="tabl-bordered">
			<tr>
			<td>Student Name: <?php echo strtoupper($first_name);?><br> Admission No: <?php echo $roll_no;?><br> Class: <?php echo strtoupper($present_class)." , ".$section;?></td>
			<td>Father Name: <?php echo $father_name;?><br>Gender: <?php echo $sex;?><br> Mother Name: <?php echo $mother_name;?></td>
			<td>Fee Balance: <?php echo $fee_blance;?><br>Adm Fee Balance: <?php echo $adm_fee_blance;?><br>CCA Fee Balance: <?php echo $cca_fee_blance;?><br></td>
			</tr>
			</table>
	  <h4>Examination Admission Ticket for <?php echo strtoupper($exam_name);?></h4>
	  </center>
	
      <div class="panel-body" id="txtHint">
	  <div class="table-responsive">
			<table class="table table-bordered" id="tabl-bordered">
			<tr>
			<th>SL No</th>
			<th>Subject</th>
			<th>Date</th>
			<th>Time</th>
			<th>Sign</th>
			</tr>
			<?php
			$sql_sub="select subject_name,exam_date,exam_name,start_time,end_time,present_class,section,academic_year from exam_timetable where present_class='".$present_class."' and section='".$section."' and exam_name='".$exam_name."'";
			$result_sub=mysqli_query($conn,$sql_sub);
			//var_dump($sql_sub);
			$row_count =1;
		   foreach($result_sub as $value_sub)
		  
		  
			{
			 $exam_date= date('d-m-Y', strtotime($value_sub['exam_date']));
			?>
           <tr>
			<td><?php echo $row_count;?></td>
			<td><?php echo $value_sub["subject_name"]; ?></td>
			<td><?php echo $exam_date; ?></td>
			<td><?php echo $value_sub["start_time"]." - ".$value_sub["end_time"]; ?></td>
			<td></td>
			</tr>
			<?php
			$row_count++; 
			}
			?>
					</tbody>
				  </table>
				  <br>
				  <br>
				  <br>
				  <br>
				  <p><strong>Note : </strong>If you violate the following instruction you will be liable for Disciplinary action and debarred from examination.</p>
				  <ol>
				  <li>Absolute silence in the examination hall must be maintained.</li>
				  <li>Book, Note, Manuscript, Mobile phone etc are strictly prohibited.</li>
				  <ol>
				  <p style="text-align:right;font-weight:bold;">Principal's Sign</p><br>
	  
	  </div>
	  </div>
	 
    </div>
	</div>
</div>
<div id="clearfix">
</div>
</div>

<?php
			
}
else
{
header("Location:login.php");
}
?>  
