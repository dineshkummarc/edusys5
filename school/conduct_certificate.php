<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");

require("connection.php");


if(isset($_GET["id"])){
	$id=$_GET["id"];
}
$sql_student = "SELECT * FROM students where id='".$id."'";
$result_student=mysqli_query($conn,$sql_student);
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row_student['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row_student['join_date'] ));
		$first_name= $row_student['first_name'];
		$class_join= $row_student['class_join'];
		$present_class= $row_student['present_class'];
		$academic_year= $row_student['academic_year'];
		$father_name= $row_student['father_name'];
		$roll_no= $row_student['roll_no'];
		$address= $row_student['address'];
		$caste= $row_student['caste'];
		$record_no= $row_student['roll_no'];
		$sts= $row_student['roll_no'];
		$admission_no= $row_student['admission_no'];
		$mother_tongue= $row_student['mother_tongue'];
		
	}	
	
	$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	
	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sch_name=$row["sch_name"];
		$location=$row["location"];
		$city=$row["location"];
		
	}
$today_date=date("d-m-Y");


?>

<style>

</style>
<div class="container-fluid"><br>
<div class="inline">
<button class="btn btn-success" onclick="printDiv('letterhead')">Print Page</button>
<button class="btn btn-success" onclick="goBack()">Go Back</button>
</div>
<div class="row">
 
    <div class="col-sm-1">
	</div>
    <div class="col-sm-10" id="letterhead">
	  <center>
	  <h2 style="color:red;"><?php echo $row["sch_name"];?></h2>
	  <p style="color:blue;font-size:16px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
	  Phone : <?php echo $row["phone"];?> , Mob : <?php echo $row["mob"];?><br> 
	  Email : <?php echo $row["email"];?> , web : <?php echo $row["web"];?>
	  <br></p>
	
	  
	  
	  </center>
	  <p>
	 <span style="text-align:right;">Date : <?php echo $today_date;?></span><br>
	 <?php 
	
	switch ($present_class) {
    case "prekg":
        $sch_dise="";
        break;
	case "lkg":
        $sch_dise="";
        break;
	case "ukg":
        $sch_dise="";
        break;
	case "first standard":
        $sch_dise=$row["sch_dise1"];
        break;
	case "second standard":
        $sch_dise=$row["sch_dise1"];
        break;
    case "third standard":
        $sch_dise=$row["sch_dise1"];
        break;
    case "fourth standard":
        $sch_dise=$row["sch_dise1"];
        break;
    case "fifth standard":
        $sch_dise=$row["sch_dise1"];
        break;
    case "sixth standard":
        $sch_dise=$row["sch_dise1"];
        break;
    case "seventh standard":
        $sch_dise=$row["sch_dise1"];
        break;
   case "eighth standard":
        $sch_dise=$row["sch_dise2"];
        break;
   case "ninth standard":
        $sch_dise=$row["sch_dise2"];
        break;
   case "tenth standard":
        $sch_dise=$row["sch_dise2"];
        break;
   case "first puc":
        $sch_dise=$row["sch_dise3"];
        break;
   case "second puc":
        $sch_dise=$row["sch_dise3"];
        break;
   
    default:
        $sch_dise=$row["sch_dise4"];
}

$sql_att = "select att_date from attendance where student_id='".$id."' order by id desc limit 1";
$result_att = mysqli_query($conn, $sql_att);
if($row_attend=mysqli_fetch_array($result_att,MYSQLI_ASSOC))
{
  $last_date= date('d-m-Y', strtotime( $row_attend['att_date'] ));
}	 
	?>
	 
	 <span style="text-align:left;">DISE Code : <?php echo $sch_dise;?></span></p>
	 <div style="text-align:right;">
	 <?php if(($row_student["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="<?php echo $row_student['photo_path'];?>"  width="130" height="130"><?php }else{};?><br>
	</div>

	  <br>
	   <center><h3 class="print-color" style="text-decoration:underline;font-weight:bold;">CONDUCT CERTIFICATE</h3></center><br>  
	
		<p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that kumar / kumari.<span style="font-weight:bold"><?php echo $first_name;?></span> S/o or D/o <span style="font-weight:bold"><?php echo $father_name;?></span> was a bonafide student of this school from <span style="font-weight:bold"><?php echo $join_date;?></span> to <span style="font-weight:bold"><?php echo $last_date;?></span> studying in standand <span style="font-weight:bold"><?php echo $class_join;?></span> to <span style="font-weight:bold"><?php echo $present_class;?>.</span>His / Her Character and Conduct were <span style="font-weight:bold"><?php echo $character;?></span> during his / her stay in this school.</p>
		<br>
	
		
		<p>The above details are correct to the best of our knowledge.</p></center>
		<br><br><br><br><br><br>
		<p style="text-align:right;">Signature of head of the institution</p>
		
		 
		<p style="text-align:right;font-size:16px;font-weight:bold;">Principal / Head Master / Head Mistress</p>
		
<br><br><br>

		</div>
		<div class="col-sm-1">
	</div>

  </div>

</body>
</div>

<?php
require("footer.php");
?>
<script>
function printDiv(letterhead) {
     var printContents = document.getElementById('letterhead').innerHTML;
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
