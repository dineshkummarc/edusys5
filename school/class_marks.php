<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
?>

 <!--------------------------------- End Search Form code -------------------------------------->     
  </head>
<div id="page-wrapper">
<div class="container-fluid">
 <div class="row">
		 <div class="col-md-12">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
		<div class="form-group">
		<select class="form-control" name="filt_class">
		<?php require("selectclass.php");?>
		
		<div class="form-group">
		<?php echo '<select class="form-control" name="exam_name">';
		echo '<option value="">Select Exam</option>';
		$sql="select distinct exam_name from student_marks where academic_year='".$cur_academic_year."'";
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
		<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
		<button type="button"  onclick="printDiv('class_marks')" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
		
		</form>
		</div>
</div>

<?php
$filt_class=$_GET["filt_class"];
$exam_name=$_GET["exam_name"];
?>

<div class="row" id="class_marks">
<div class="col-sm-12">
<center><h2><?php echo strtoupper($filt_class)." ".strtoupper($exam_name); ?> Marks List</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
		<tbody>
		<tr>
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		<td><span style="font-weight: bold;">Admission No</span></td>
		<td><span style="font-weight: bold;">Quraan</span></td>
		<td><span style="font-weight: bold;">Hadees</span></td>
		<td><span style="font-weight: bold;">Aqaid Masail</span></td>
		<td><span style="font-weight: bold;">Islamic Tarbiyat</span></td>
		<td><span style="font-weight: bold;">Zabaan</span></td>
		<td><span style="font-weight: bold;">Total</span></td>
		<td><span style="font-weight: bold;">%</span></td>
		<td style="width:10%"><span style="font-weight: bold;">Action</span></td>
		</tr>
								
	<?php
	require("connection.php");
	if(isset($_GET["filt_class"]))
	{
	$filt_class=$_GET["filt_class"];
	$exam_name=$_GET["exam_name"];
	if(isset($_GET["filt_class"])&&!empty($_GET["exam_name"]))
		
	$sql="select * from student_marks where academic_year='".$cur_academic_year."' and present_class='".$filt_class."' and exam_name='".$exam_name."' ORDER BY first_name";
	}
	else
	{
	$sql="select * from student_marks where academic_year='".$cur_academic_year."' ORDER BY first_name";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	
	foreach($result as $row)
	{
	$percent=(($row["sub1"]+$row["sub2"]+$row["sub3"]+$row["sub4"]+$row["sub5"])/500)*100;
	$total=$row["sub1"]+$row["sub2"]+$row["sub3"]+$row["sub4"]+$row["sub5"];
	?>
<tr>
<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
<td><span style="color: #207FA2; "><a href="#"><?php echo $row['first_name'];?></span></a></a></span></td>



<td><span style="color: #207FA2; "><?php echo $row["roll_no"];?></span></td>
<td><span style="color: #207FA2; "><?php echo $row["sub1"];?></span></td>
<td><span style="color: #207FA2; "><?php echo $row["sub2"];?></span></td>
<td><span style="color: #207FA2; "><?php echo $row["sub3"];?></span></td>
<td><span style="color: #207FA2; "><?php echo $row["sub4"];?></span></td>
<td><span style="color: #207FA2; "><?php echo $row["sub5"];?></span></td>
<td><span style="color: #207FA2; "><?php echo $total;?></span></td>
<td><span style="color: #207FA2; "><?php echo $percent;?>%</span></td>
		
		<!--
		<td><div class="btn-group"><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" title="View" >  <i class="fa fa-eye fa-lg" style="color:#8ba83e;" aria-hidden="true"></i></a>
        <a href="<?php echo 'upd_register.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'del_confirm.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
		-->
		<td><div class="btn-group">
        <a href="<?php echo 'edit_class_marks.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div></td>
				</tr>
				
		<script>
		  function deleteme(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_class_marks.php?id='+id+'';
			  }
		  }
		  
		  </script>
	  
		<?php 
		$row_count++; 
		
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
<script>
function printDiv(class_marks) {
     var printContents = document.getElementById('class_marks').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
			
}
else
{
header("Location:login.php");
}
?>  
