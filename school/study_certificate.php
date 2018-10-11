<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");

require("connection.php");


$first_name=$_POST["first_name"];
$roll_no=$_POST["roll_no"];
$leaving=$_POST["leaving"];

$from=$_POST["from"];
$to=$_POST["to"];
$class_from=$_POST["class_from"];
$class_to=$_POST["class_to"];
$character=$_POST["character"];
$passed_class=$_POST["passed_class"];
$passed_year=$_POST["passed_year"];


if((isset($_GET["first_name"]))&&(isset($_GET["roll_no"]))){
	$first_name=$_GET["first_name"];
	$roll_no=$_GET["roll_no"];
}
$sql_student = "SELECT * FROM students where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and roll_no='".$roll_no."'";
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
<script>
function printDiv(letterhead) {
     var printContents = document.getElementById('letterhead').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
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
	  <h1 style="color:red;"><?php echo $row["sch_name"];?></h1>
	  <p style="color:blue;font-size:18px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
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
		 
	?>
	 
	 <span style="text-align:left;">DISE Code : <?php echo $sch_dise;?></span></p>
	  <br><br>
	  
	  <?php 
		if(isset($_POST["studying"]))
		{
		?>
		 <center><h3 class="print-color" style="text-decoration:underline;">Study Certificate</h3></center><br>  
		<p style="font-size:14px;line-height:40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that kumar / kumari.<span style="font-weight:bold"><?php echo $first_name;?></span> S/o or D/o <span style="font-weight:bold"><?php echo $father_name;?></span> belongs to  <?php echo $address;?> is a student of this Institution during the academic_year <?php echo $cur_academic_year;?> and studying in <?php echo $present_class;?>.
	
	 and date of admission is on <span style="font-weight:bold"><?php echo $join_date;?></span> and he / she belongs to <span style="font-weight:bold"><?php echo $caste;?></span> caste,Mother tongue <?php echo $mother_tongue;?>, STS No <?php echo $roll_no;?> and D.O.B <?php echo $dob;?> of the candidate as per the admission register of the institution.</p>
		<br>
		<center><p>The above details are correct to the best of our knowledge.</p></center>
		<p style="text-align:right;">Signature of head of the institution</p>
		
		  <?php 
		}if(isset($_POST["studied"])){
		?>
		 <center><h3 class="print-color" style="text-decoration:underline;">Study Certificate</h3></center><br>  
		<p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that Sri/Smt/Kum.<span style="font-weight:bold"><?php echo $first_name;?></span> S/o , D/o,W/o <span style="font-weight:bold"><?php echo $father_name;?></span> belongs to <span style="font-weight:bold"><?php echo $caste;?>. He / She has studied in <span style="font-weight:bold"><?php echo $sch_name;?></span> school from <span style="font-weight:bold"><?php echo $from;?></span> to <span style="font-weight:bold"><?php echo $to;?></span> and <span style="font-weight:bold"><?php echo $class_from;?></span> to <span style="font-weight:bold"><?php echo $class_to;?></span> and has passed <span style="font-weight:bold"><?php echo $passed_class;?></span> in the year <span style="font-weight:bold"><?php echo $passed_year;?></span>.</span></p>
		<br>
		<br>
	
		<p style="text-align:left;">His /Her Date of birth : <span style="font-weight:bold"><?php echo $dob;?></span></p>
		<p style="text-align:left;">His /Her Record No & Date : <span style="font-weight:bold"><?php echo $record_no." , ".$passed_year;?></span></p>
		<p style="text-align:left;">Date of Leaving school : <span style="font-weight:bold"><?php echo $leaving;?></span></p>
		<br>
		<br>
	
		
		<p style="text-align:center;">This Certificate is issued as per the records of our School.</p>
		<br>
		<p style="text-align:left;">Date : <span style="font-weight:bold"><?php echo $today_date;?></span></p>
		<p style="text-align:left;">Place : <span style="font-weight:bold"><?php echo $city;?></span></p>
		<br>
		<p style="text-align:center;font-weight:bold;">Signature of AEO / D.D.P.I with seal</p><br><br><br>
		<p style="text-align:left;"><span style="font-weight:bold">Note: </span>If the Candidate has studied in more than one School he / she has to produce separate certificates.</p>
		
		
		<?php
		}if(isset($_POST["conduct"])){
		?>
		 <center><h3 class="print-color" style="text-decoration:underline;">Conduct Certificate</h3></center><br>  
		<p style="font-size:14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that kumar / kumari.<span style="font-weight:bold"><?php echo $first_name;?></span> S/o or D/o <span style="font-weight:bold"><?php echo $father_name;?></span> was a bonafide student of this school from <span style="font-weight:bold"><?php echo $from;?></span> to <span style="font-weight:bold"><?php echo $to;?></span> studying in standand <span style="font-weight:bold"><?php echo $class_from;?></span> to <span style="font-weight:bold"><?php echo $class_to;?>.</span>His / Her Character and Conduct were <span style="font-weight:bold"><?php echo $character;?></span> during his / her stay in this school.</p>
		<br>
		<?php
		}
		?>
		
		<p style="text-align:right;font-size:16px;font-weight:bold;">Principal / Head Master / Head Mistress</p>
		
<br><br><br>

		</div>
		<div class="col-sm-1">
	</div>

  </div>

</body>
</div>

<?php
			
}
else
{
header("Location:login.php");
}
?>  
