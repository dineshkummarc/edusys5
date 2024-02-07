<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))
{
$cur_academic_year = $_SESSION['academic_year'];
	$first_name=$_SESSION['parents_uname'];
	$roll_no=$_SESSION['parents_pass'];
	$class=$_SESSION['parents_class'];
	$academic_year=$_SESSION['academic_year'];
require("header.php");
error_reporting("0");
$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";	
	
	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sch_name=$row["sch_name"];
		$location=$row["location"];
		$city=$row["location"];
	}
	$sql_student = "SELECT * FROM students where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and roll_no='".$roll_no."'";	
	
	
	$result_student=mysqli_query($conn,$sql_student);
	//var_dump($sql_student);
	if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
	{
		$father_name=$row_student["father_name"];
		//$dob=$row_student["dob"];
		$dob= date('d-m-Y', strtotime( $row_student['dob'] ));
		$present_class=$row_student["present_class"];
		$academic_year=$row_student["academic_year"];
		$section=$row_student["section"];
		$rollno=$row_student["rollno"];
		
	}
?>

<div class="container-fluid">
  <button class="btn btn-success" onclick="printDiv('income')"><i class="fa fa-print" aria-hidden="true"></i> Print</button> <button class="btn btn-success" onclick="goBack()">Go Back</button>
  <div class="row" id="income">
  
    <div class="col-sm-12">
	 <center>
	  <h1 style="color:red;font-weight:bold;"><?php echo $row["sch_name"];?></h1>
	  <p style="color:blue;font-size:18px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
	  Phone : <?php echo $row["phone"];?> , Mob : <?php echo $row["mob"];?><br> 
	  Email : <?php echo $row["email"];?> , web : <?php echo $row["web"];?>
	  <br></p>
	</center>
	
	<center><h3 style="color:red;font-weight:bold;"><?php echo strtoupper("progress Card");?></h3></center>
	<br>
	<br>
	<center><img src="../school/<?php echo $row_student["photo_path"];?>" width="150px"></center><br><br>
	<table class="table table-bordered table-responsive">
	
	
	<tr>
	<td>Student Name</td>
	<td><?php echo strtoupper($first_name);?></td>
	</tr>
	
	<tr>
	<td>Present Class</td>
	<td><?php echo strtoupper($present_class);?></td>
	</tr>
	
	<tr>
	<td>Section</td>
	<td><?php echo strtoupper($section);?></td>
	</tr>
	
	<tr>
	<td>Date of Birth</td>
	<td><?php echo $dob;?></td>
	</tr>
	
	<tr>
	<td>Father Name</td>
	<td><?php echo strtoupper($father_name);?></td>
	</tr>
	
	<tr>
	<td>Enrollment No</td>
	<td><?php echo $roll_no;?></td>
	</tr>
	
	<table>
	
	<br><br><br><br><br><br><br><br><br><br><br>
	<table class="table table-bordered">
	<tr>
	<th>Achievements</td>	
	<th colspan="4">I Semester</td>	
	<th colspan="4">II Semester</td>	
	<th></th>	
	</tr>
	
	
	<tr>
	
	<?php 
	if($class=="first standard"){ 
	
	$fa1=15;
	$fa2=15;
	$fa3=15;
	$fa4=15;
	$sa1=20;
	$sa2=20;
	$full_mark=50;
	
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 15%</td>	
	<td>FA-2 15%</td>
	<td>SA-1 20%</td>
	<td>Total 50%</td>
	<td>FA-3 15%</td>	
	<td>FA-4 15%</td>	
	<td>SA-2 20%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="second standard"){ 
	
	$fa1=15;
	$fa2=15;
	$fa3=15;
	$fa4=15;
	$sa1=20;
	$sa2=20;
	$full_mark=50;
	
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 15%</td>	
	<td>FA-2 15%</td>
	<td>SA-1 20%</td>
	<td>Total 50%</td>
	<td>FA-3 15%</td>	
	<td>FA-4 15%</td>	
	<td>SA-2 20%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="third standard"){ 
	
	$fa1=15;
	$fa2=15;
	$fa3=15;
	$fa4=15;
	$sa1=20;
	$sa2=20;
	$full_mark=50;
	
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 15%</td>	
	<td>FA-2 15%</td>
	<td>SA-1 20%</td>
	<td>Total 50%</td>
	<td>FA-3 15%</td>	
	<td>FA-4 15%</td>	
	<td>SA-2 20%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="fourth standard"){ 
	
	$fa1=15;
	$fa2=15;
	$fa3=15;
	$fa4=15;
	$sa1=20;
	$sa2=20;
	$full_mark=50;
	
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 15%</td>	
	<td>FA-2 15%</td>
	<td>SA-1 20%</td>
	<td>Total 50%</td>
	<td>FA-3 15%</td>	
	<td>FA-4 15%</td>	
	<td>SA-2 20%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="fifth standard"){ 
	$fa1=10;
	$fa2=10;
	$fa3=30;
	$fa4=10;
	$sa1=10;
	$sa2=30;
	$full_mark=50;
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 10%</td>	
	<td>FA-2 10%</td>
	<td>SA-1 30%</td>
	<td>Total 50%</td>
	<td>FA-3 10%</td>	
	<td>FA-4 10%</td>	
	<td>SA-2 30%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="sixth standard"){ 
	$fa1=10;
	$fa2=10;
	$fa3=30;
	$fa4=10;
	$sa1=10;
	$sa2=30;
	$full_mark=50;
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 10%</td>	
	<td>FA-2 10%</td>
	<td>SA-1 30%</td>
	<td>Total 50%</td>
	<td>FA-3 10%</td>	
	<td>FA-4 10%</td>	
	<td>SA-2 30%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="seventh standard"){ 
	$fa1=10;
	$fa2=10;
	$fa3=30;
	$fa4=10;
	$sa1=10;
	$sa2=30;
	$full_mark=50;
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 10%</td>	
	<td>FA-2 10%</td>
	<td>SA-1 30%</td>
	<td>Total 50%</td>
	<td>FA-3 10%</td>	
	<td>FA-4 10%</td>	
	<td>SA-2 30%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="eighth standard"){ 
	$fa1=10;
	$fa2=10;
	$fa3=30;
	$fa4=10;
	$sa1=10;
	$sa2=30;
	$full_mark=50;
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 10%</td>	
	<td>FA-2 10%</td>
	<td>SA-1 30%</td>
	<td>Total 50%</td>
	<td>FA-3 10%</td>	
	<td>FA-4 10%</td>	
	<td>SA-2 30%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}else if($class=="ninth standard"){ 
	$fa1=10;
	$fa2=10;
	$fa3=30;
	$fa4=10;
	$sa1=10;
	$sa2=30;
	$full_mark=50;
	$f1_fa2_sa1=50;
	$f3_fa4_sa2=50;
	$f1_fa2_sa1_f3_fa4_sa2=100;
		?>
	<td>Subjects</td>	
	<td>FA-1 10%</td>	
	<td>FA-2 10%</td>
	<td>SA-1 30%</td>
	<td>Total 50%</td>
	<td>FA-3 10%</td>	
	<td>FA-4 10%</td>	
	<td>SA-2 30%</td>
	<td>Total 50%</td>
	<td rowspan="2">Overall FA+SA 100%</td>	
		
	<?php
	}
	
	echo '<tr>';
 
	require("connection.php");
	 $sql_fa1="select * from student_marks where academic_year='".$cur_academic_year."' and present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."' and exam_name='FA1' order by id desc";
	 //var_dump($sql_fa1);
	$result_fa1=mysqli_query($conn,$sql_fa1);
	if($row_fa1=mysqli_fetch_array($result_fa1,MYSQLI_ASSOC))
	{
     $sub1_fa1=$row_fa1["sub1"];
     $sub2_fa1=$row_fa1["sub2"];
     $sub3_fa1=$row_fa1["sub3"];
     $sub4_fa1=$row_fa1["sub4"];
     $sub5_fa1=$row_fa1["sub5"];
     $sub6_fa1=$row_fa1["sub6"];
     $sub7_fa1=$row_fa1["sub7"];
     $sub8_fa1=$row_fa1["sub8"];
     $sub9_fa1=$row_fa1["sub9"];
     $sub10_fa1=$row_fa1["sub10"];
     $sub11_fa1=$row_fa1["sub11"];
     $sub12_fa1=$row_fa1["sub12"];
	} 
	
	$sql_fa2="select * from student_marks where academic_year='".$cur_academic_year."' and present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."' and exam_name='FA2' order by id desc";
	$result_fa2=mysqli_query($conn,$sql_fa2);
	//var_dump($sql_fa2);
	if($row_fa2=mysqli_fetch_array($result_fa2,MYSQLI_ASSOC))
	{
     $sub1_fa2=$row_fa2["sub1"];
     $sub2_fa2=$row_fa2["sub2"];
     $sub3_fa2=$row_fa2["sub3"];
     $sub4_fa2=$row_fa2["sub4"];
     $sub5_fa2=$row_fa2["sub5"];
     $sub6_fa2=$row_fa2["sub6"];
     $sub7_fa2=$row_fa2["sub7"];
     $sub8_fa2=$row_fa2["sub8"];
	  $sub9_fa2=$row_fa2["sub9"];
     $sub10_fa2=$row_fa2["sub10"];
	 $sub11_fa2=$row_fa2["sub11"];
     $sub12_fa2=$row_fa2["sub12"];
	}
	
	$sql_fa3="select * from student_marks where academic_year='".$cur_academic_year."' and present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."' and exam_name='FA3' order by id desc";
	$result_fa3=mysqli_query($conn,$sql_fa3);
	if($row_fa3=mysqli_fetch_array($result_fa3,MYSQLI_ASSOC))
	{
     $sub1_fa3=$row_fa3["sub1"];
     $sub2_fa3=$row_fa3["sub2"];
     $sub3_fa3=$row_fa3["sub3"];
     $sub4_fa3=$row_fa3["sub4"];
     $sub5_fa3=$row_fa3["sub5"];
     $sub6_fa3=$row_fa3["sub6"];
     $sub7_fa3=$row_fa3["sub7"];
     $sub8_fa3=$row_fa3["sub8"];
	  $sub9_fa3=$row_fa3["sub9"];
     $sub10_fa3=$row_fa3["sub10"];
	 $sub11_fa3=$row_fa3["sub11"];
     $sub12_fa3=$row_fa3["sub12"];
	}
	
	$sql_fa4="select * from student_marks where academic_year='".$cur_academic_year."' and present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."' and exam_name='FA4' order by id desc";
	$result_fa4=mysqli_query($conn,$sql_fa4);
	if($row_fa4=mysqli_fetch_array($result_fa4,MYSQLI_ASSOC))
	{
     $sub1_fa4=$row_fa4["sub1"];
     $sub2_fa4=$row_fa4["sub2"];
     $sub3_fa4=$row_fa4["sub3"];
     $sub4_fa4=$row_fa4["sub4"];
     $sub5_fa4=$row_fa4["sub5"];
     $sub6_fa4=$row_fa4["sub6"];
     $sub7_fa4=$row_fa4["sub7"];
     $sub8_fa4=$row_fa4["sub8"];
	  $sub9_fa4=$row_fa4["sub9"];
     $sub10_fa4=$row_fa4["sub10"];
	    $sub11_fa4=$row_fa4["sub11"];
     $sub12_fa4=$row_fa4["sub12"];
	}
	
	 $sql_sa1="select * from student_marks where academic_year='".$cur_academic_year."' and present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."' and exam_name='SA1' order by id desc";
	$result_sa1=mysqli_query($conn,$sql_sa1);
	if($row_sa1=mysqli_fetch_array($result_sa1,MYSQLI_ASSOC))
	{
     $sub1_sa1=$row_sa1["sub1"];
     $sub2_sa1=$row_sa1["sub2"];
     $sub3_sa1=$row_sa1["sub3"];
     $sub4_sa1=$row_sa1["sub4"];
     $sub5_sa1=$row_sa1["sub5"];
     $sub6_sa1=$row_sa1["sub6"];
     $sub7_sa1=$row_sa1["sub7"];
     $sub8_sa1=$row_sa1["sub8"];
	  $sub9_sa1=$row_sa1["sub9"];
     $sub10_sa1=$row_sa1["sub10"];
	 $sub11_sa1=$row_sa1["sub11"];
     $sub12_sa1=$row_sa1["sub12"];
	}
	
	  $sql_sa2="select * from student_marks where academic_year='".$cur_academic_year."' and present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."' and exam_name='SA2' order by id desc";
	$result_sa2=mysqli_query($conn,$sql_sa2);
	if($row_sa2=mysqli_fetch_array($result_sa2,MYSQLI_ASSOC))
	{
     $sub1_sa2=$row_sa2["sub1"];
     $sub2_sa2=$row_sa2["sub2"];
     $sub3_sa2=$row_sa2["sub3"];
     $sub4_sa2=$row_sa2["sub4"];
     $sub5_sa2=$row_sa2["sub5"];
     $sub6_sa2=$row_sa2["sub6"];
     $sub7_sa2=$row_sa2["sub7"];
     $sub8_sa2=$row_sa2["sub8"];
	  $sub9_sa2=$row_sa2["sub9"];
     $sub10_sa2=$row_sa2["sub10"];
	  $sub11_sa2=$row_sa2["sub11"];
     $sub12_sa2=$row_sa2["sub12"];
	}
	 
	/* $sql_sub="select * from subjects where class='".$class."' ORDER BY id limit 1";
	 $result_sub=mysqli_query($conn,$sql_sub);
	var_dump($sql_sub);
	if($row_sub=mysqli_fetch_array($result_sub,MYSQLI_ASSOC)){ */
	?>
	
	<tr>
	<td><p>Kannada</p></td>	
	<td>
	<?php

	$sub1_fa1=($sub1_fa1/$full_mark)*$fa1;
	echo $sub1_fa1." - ";
				if((($sub1_fa1)>=(90/100)*$fa1)&&(($sub1_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub1_fa1)>=(75/100)*$fa1)&&(($sub1_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub1_fa1)>=(60/100)*$fa1)&&(($sub1_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub1_fa1)>=(50/100)*$fa1)&&(($sub1_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub1_fa1)>=(30/100)*$fa1)&&(($sub1_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub1_fa1)>=1)&&(($sub1_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub1_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub1_fa2=($sub1_fa2/$full_mark)*$fa2;
	echo $sub1_fa2." - ";
				if((($sub1_fa2)>=(90/100)*$fa2)&&(($sub1_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub1_fa2)>=(75/100)*$fa2)&&(($sub1_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub1_fa2)>=(60/100)*$fa2)&&(($sub1_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub1_fa2)>=(50/100)*$fa2)&&(($sub1_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub1_fa2)>=(30/100)*$fa2)&&(($sub1_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub1_fa2)>=1)&&(($sub1_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub1_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub1_sa1=($sub1_sa1/$full_mark)*$sa1;
	echo $sub1_sa1." - ";
				if((($sub1_sa1)>=(90/100)*$sa1)&&(($sub1_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub1_sa1)>=(75/100)*$sa1)&&(($sub1_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub1_sa1)>=(60/100)*$sa1)&&(($sub1_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub1_sa1)>=(50/100)*$sa1)&&(($sub1_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub1_sa1)>=(30/100)*$sa1)&&(($sub1_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub1_sa1)>=1)&&(($sub1_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub1_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub1_fa1_fa2_sa1 = ($sub1_fa1+$sub1_fa2+$sub1_sa1);
		 //echo $sub1_fa1_fa2_sa1." - ";
		 echo $sub1_fa1_fa2_sa1;
		 /*
				if((($sub1_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub1_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub1_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub1_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub1_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub1_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub1_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub1_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub1_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub1_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub1_fa1_fa2_sa1)>=1)&&(($sub1_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub1_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub1_fa3=($sub1_fa3/$full_mark)*$fa3;
	echo $sub1_fa3." - ";
				if((($sub1_fa3)>=(90/100)*$fa3)&&(($sub1_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub1_fa3)>=(75/100)*$fa3)&&(($sub1_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub1_fa3)>=(60/100)*$fa3)&&(($sub1_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub1_fa3)>=(50/100)*$fa3)&&(($sub1_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub1_fa3)>=(30/100)*$fa3)&&(($sub1_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub1_fa3)>=1)&&(($sub1_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub1_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub1_fa4=($sub1_fa4/$full_mark)*$fa4;
	echo $sub1_fa4." - ";
				if((($sub1_fa4)>=(90/100)*$fa4)&&(($sub1_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub1_fa4)>=(75/100)*$fa4)&&(($sub1_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub1_fa4)>=(60/100)*$fa4)&&(($sub1_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub1_fa4)>=(50/100)*$fa4)&&(($sub1_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub1_fa4)>=(30/100)*$fa4)&&(($sub1_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub1_fa4)>=1)&&(($sub1_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub1_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub1_sa2=($sub1_sa2/$full_mark)*$sa2;
	echo $sub1_sa2." - ";
				if((($sub1_sa2)>=(90/100)*$sa2)&&(($sub1_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub1_sa2)>=(75/100)*$sa2)&&(($sub1_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub1_sa2)>=(60/100)*$sa2)&&(($sub1_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub1_sa2)>=(50/100)*$sa2)&&(($sub1_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub1_sa2)>=(30/100)*$sa2)&&(($sub1_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub1_sa2)>=1)&&(($sub1_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub1_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub1_fa3_fa4_sa2 = $sub1_fa3+$sub1_fa4+$sub1_sa2;
		//echo $sub1_fa3_fa4_sa2." - ";
		echo $sub1_fa3_fa4_sa2;
				/* if((($sub1_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub1_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub1_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub1_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub1_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub1_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub1_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub1_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub1_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub1_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub1_fa3_fa4_sa2)>=1)&&(($sub1_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub1_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub1_fa1_fa2_fa3_fa4_sa1_sa2 = $sub1_fa1_fa2_sa1+$sub1_fa3_fa4_sa2;
		echo $sub1_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub1_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub1_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub1_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub1_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub1_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub1_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub1_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub1_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub1_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub1_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub1_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub1_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub1_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		<tr>
	<td><p>English</p></td>	
	<td>
	<?php

	$sub2_fa1=($sub2_fa1/$full_mark)*$fa1;
	echo $sub2_fa1." - ";
				if((($sub2_fa1)>=(90/100)*$fa1)&&(($sub2_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub2_fa1)>=(75/100)*$fa1)&&(($sub2_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub2_fa1)>=(60/100)*$fa1)&&(($sub2_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub2_fa1)>=(50/100)*$fa1)&&(($sub2_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub2_fa1)>=(30/100)*$fa1)&&(($sub2_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub2_fa1)>=1)&&(($sub2_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub2_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub2_fa2=($sub2_fa2/$full_mark)*$fa2;
	echo $sub2_fa2." - ";
				if((($sub2_fa2)>=(90/100)*$fa2)&&(($sub2_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub2_fa2)>=(75/100)*$fa2)&&(($sub2_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub2_fa2)>=(60/100)*$fa2)&&(($sub2_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub2_fa2)>=(50/100)*$fa2)&&(($sub2_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub2_fa2)>=(30/100)*$fa2)&&(($sub2_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub2_fa2)>=1)&&(($sub2_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub2_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub2_sa1=($sub2_sa1/$full_mark)*$sa1;
	echo $sub2_sa1." - ";
				if((($sub2_sa1)>=(90/100)*$sa1)&&(($sub2_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub2_sa1)>=(75/100)*$sa1)&&(($sub2_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub2_sa1)>=(60/100)*$sa1)&&(($sub2_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub2_sa1)>=(50/100)*$sa1)&&(($sub2_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub2_sa1)>=(30/100)*$sa1)&&(($sub2_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub2_sa1)>=1)&&(($sub2_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub2_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub2_fa1_fa2_sa1 = ($sub2_fa1+$sub2_fa2+$sub2_sa1);
		 //echo $sub2_fa1_fa2_sa1." - ";
		 echo $sub2_fa1_fa2_sa1;
		 /*
				if((($sub2_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub2_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub2_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub2_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub2_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub2_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub2_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub2_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub2_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub2_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub2_fa1_fa2_sa1)>=1)&&(($sub2_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub2_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub2_fa3=($sub2_fa3/$full_mark)*$fa3;
	echo $sub2_fa3." - ";
				if((($sub2_fa3)>=(90/100)*$fa3)&&(($sub2_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub2_fa3)>=(75/100)*$fa3)&&(($sub2_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub2_fa3)>=(60/100)*$fa3)&&(($sub2_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub2_fa3)>=(50/100)*$fa3)&&(($sub2_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub2_fa3)>=(30/100)*$fa3)&&(($sub2_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub2_fa3)>=1)&&(($sub2_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub2_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub2_fa4=($sub2_fa4/$full_mark)*$fa4;
	echo $sub2_fa4." - ";
				if((($sub2_fa4)>=(90/100)*$fa4)&&(($sub2_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub2_fa4)>=(75/100)*$fa4)&&(($sub2_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub2_fa4)>=(60/100)*$fa4)&&(($sub2_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub2_fa4)>=(50/100)*$fa4)&&(($sub2_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub2_fa4)>=(30/100)*$fa4)&&(($sub2_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub2_fa4)>=1)&&(($sub2_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub2_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub2_sa2=($sub2_sa2/$full_mark)*$sa2;
	echo $sub2_sa2." - ";
				if((($sub2_sa2)>=(90/100)*$sa2)&&(($sub2_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub2_sa2)>=(75/100)*$sa2)&&(($sub2_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub2_sa2)>=(60/100)*$sa2)&&(($sub2_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub2_sa2)>=(50/100)*$sa2)&&(($sub2_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub2_sa2)>=(30/100)*$sa2)&&(($sub2_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub2_sa2)>=1)&&(($sub2_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub2_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub2_fa3_fa4_sa2 = $sub2_fa3+$sub2_fa4+$sub2_sa2;
		//echo $sub2_fa3_fa4_sa2." - ";
		echo $sub2_fa3_fa4_sa2;
				/* if((($sub2_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub2_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub2_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub2_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub2_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub2_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub2_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub2_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub2_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub2_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub2_fa3_fa4_sa2)>=1)&&(($sub2_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub2_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub2_fa1_fa2_fa3_fa4_sa1_sa2 = $sub2_fa1_fa2_sa1+$sub2_fa3_fa4_sa2;
		echo $sub2_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub2_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub2_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub2_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub2_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub2_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub2_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub2_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub2_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub2_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub2_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub2_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub2_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub2_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Hindi</p></td>	
	<td>
	<?php

	$sub3_fa1=($sub3_fa1/$full_mark)*$fa1;
	echo $sub3_fa1." - ";
				if((($sub3_fa1)>=(90/100)*$fa1)&&(($sub3_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub3_fa1)>=(75/100)*$fa1)&&(($sub3_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub3_fa1)>=(60/100)*$fa1)&&(($sub3_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub3_fa1)>=(50/100)*$fa1)&&(($sub3_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub3_fa1)>=(30/100)*$fa1)&&(($sub3_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub3_fa1)>=1)&&(($sub3_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub3_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub3_fa2=($sub3_fa2/$full_mark)*$fa2;
	echo $sub3_fa2." - ";
				if((($sub3_fa2)>=(90/100)*$fa2)&&(($sub3_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub3_fa2)>=(75/100)*$fa2)&&(($sub3_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub3_fa2)>=(60/100)*$fa2)&&(($sub3_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub3_fa2)>=(50/100)*$fa2)&&(($sub3_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub3_fa2)>=(30/100)*$fa2)&&(($sub3_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub3_fa2)>=1)&&(($sub3_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub3_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub3_sa1=($sub3_sa1/$full_mark)*$sa1;
	echo $sub3_sa1." - ";
				if((($sub3_sa1)>=(90/100)*$sa1)&&(($sub3_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub3_sa1)>=(75/100)*$sa1)&&(($sub3_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub3_sa1)>=(60/100)*$sa1)&&(($sub3_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub3_sa1)>=(50/100)*$sa1)&&(($sub3_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub3_sa1)>=(30/100)*$sa1)&&(($sub3_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub3_sa1)>=1)&&(($sub3_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub3_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub3_fa1_fa2_sa1 = ($sub3_fa1+$sub3_fa2+$sub3_sa1);
		 //echo $sub3_fa1_fa2_sa1." - ";
		 echo $sub3_fa1_fa2_sa1;
		 /*
				if((($sub3_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub3_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub3_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub3_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub3_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub3_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub3_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub3_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub3_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub3_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub3_fa1_fa2_sa1)>=1)&&(($sub3_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub3_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub3_fa3=($sub3_fa3/$full_mark)*$fa3;
	echo $sub3_fa3." - ";
				if((($sub3_fa3)>=(90/100)*$fa3)&&(($sub3_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub3_fa3)>=(75/100)*$fa3)&&(($sub3_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub3_fa3)>=(60/100)*$fa3)&&(($sub3_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub3_fa3)>=(50/100)*$fa3)&&(($sub3_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub3_fa3)>=(30/100)*$fa3)&&(($sub3_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub3_fa3)>=1)&&(($sub3_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub3_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub3_fa4=($sub3_fa4/$full_mark)*$fa4;
	echo $sub3_fa4." - ";
				if((($sub3_fa4)>=(90/100)*$fa4)&&(($sub3_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub3_fa4)>=(75/100)*$fa4)&&(($sub3_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub3_fa4)>=(60/100)*$fa4)&&(($sub3_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub3_fa4)>=(50/100)*$fa4)&&(($sub3_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub3_fa4)>=(30/100)*$fa4)&&(($sub3_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub3_fa4)>=1)&&(($sub3_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub3_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub3_sa2=($sub3_sa2/$full_mark)*$sa2;
	echo $sub3_sa2." - ";
				if((($sub3_sa2)>=(90/100)*$sa2)&&(($sub3_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub3_sa2)>=(75/100)*$sa2)&&(($sub3_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub3_sa2)>=(60/100)*$sa2)&&(($sub3_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub3_sa2)>=(50/100)*$sa2)&&(($sub3_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub3_sa2)>=(30/100)*$sa2)&&(($sub3_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub3_sa2)>=1)&&(($sub3_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub3_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub3_fa3_fa4_sa2 = $sub3_fa3+$sub3_fa4+$sub3_sa2;
		//echo $sub3_fa3_fa4_sa2." - ";
		echo $sub3_fa3_fa4_sa2;
				/* if((($sub3_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub3_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub3_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub3_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub3_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub3_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub3_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub3_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub3_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub3_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub3_fa3_fa4_sa2)>=1)&&(($sub3_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub3_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub3_fa1_fa2_fa3_fa4_sa1_sa2 = $sub3_fa1_fa2_sa1+$sub3_fa3_fa4_sa2;
		echo $sub3_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub3_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub3_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub3_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub3_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub3_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub3_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub3_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub3_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub3_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub3_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub3_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub3_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub3_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Mathematics</p></td>	
	<td>
	<?php

	$sub4_fa1=($sub4_fa1/$full_mark)*$fa1;
	echo $sub4_fa1." - ";
				if((($sub4_fa1)>=(90/100)*$fa1)&&(($sub4_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub4_fa1)>=(75/100)*$fa1)&&(($sub4_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub4_fa1)>=(60/100)*$fa1)&&(($sub4_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub4_fa1)>=(50/100)*$fa1)&&(($sub4_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub4_fa1)>=(30/100)*$fa1)&&(($sub4_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub4_fa1)>=1)&&(($sub4_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub4_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub4_fa2=($sub4_fa2/$full_mark)*$fa2;
	echo $sub4_fa2." - ";
				if((($sub4_fa2)>=(90/100)*$fa2)&&(($sub4_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub4_fa2)>=(75/100)*$fa2)&&(($sub4_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub4_fa2)>=(60/100)*$fa2)&&(($sub4_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub4_fa2)>=(50/100)*$fa2)&&(($sub4_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub4_fa2)>=(30/100)*$fa2)&&(($sub4_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub4_fa2)>=1)&&(($sub4_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub4_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub4_sa1=($sub4_sa1/$full_mark)*$sa1;
	echo $sub4_sa1." - ";
				if((($sub4_sa1)>=(90/100)*$sa1)&&(($sub4_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub4_sa1)>=(75/100)*$sa1)&&(($sub4_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub4_sa1)>=(60/100)*$sa1)&&(($sub4_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub4_sa1)>=(50/100)*$sa1)&&(($sub4_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub4_sa1)>=(30/100)*$sa1)&&(($sub4_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub4_sa1)>=1)&&(($sub4_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub4_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub4_fa1_fa2_sa1 = ($sub4_fa1+$sub4_fa2+$sub4_sa1);
		 //echo $sub4_fa1_fa2_sa1." - ";
		 echo $sub4_fa1_fa2_sa1;
		 /*
				if((($sub4_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub4_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub4_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub4_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub4_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub4_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub4_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub4_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub4_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub4_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub4_fa1_fa2_sa1)>=1)&&(($sub4_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub4_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub4_fa3=($sub4_fa3/$full_mark)*$fa3;
	echo $sub4_fa3." - ";
				if((($sub4_fa3)>=(90/100)*$fa3)&&(($sub4_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub4_fa3)>=(75/100)*$fa3)&&(($sub4_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub4_fa3)>=(60/100)*$fa3)&&(($sub4_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub4_fa3)>=(50/100)*$fa3)&&(($sub4_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub4_fa3)>=(30/100)*$fa3)&&(($sub4_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub4_fa3)>=1)&&(($sub4_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub4_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub4_fa4=($sub4_fa4/$full_mark)*$fa4;
	echo $sub4_fa4." - ";
				if((($sub4_fa4)>=(90/100)*$fa4)&&(($sub4_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub4_fa4)>=(75/100)*$fa4)&&(($sub4_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub4_fa4)>=(60/100)*$fa4)&&(($sub4_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub4_fa4)>=(50/100)*$fa4)&&(($sub4_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub4_fa4)>=(30/100)*$fa4)&&(($sub4_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub4_fa4)>=1)&&(($sub4_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub4_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub4_sa2=($sub4_sa2/$full_mark)*$sa2;
	echo $sub4_sa2." - ";
				if((($sub4_sa2)>=(90/100)*$sa2)&&(($sub4_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub4_sa2)>=(75/100)*$sa2)&&(($sub4_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub4_sa2)>=(60/100)*$sa2)&&(($sub4_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub4_sa2)>=(50/100)*$sa2)&&(($sub4_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub4_sa2)>=(30/100)*$sa2)&&(($sub4_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub4_sa2)>=1)&&(($sub4_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub4_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub4_fa3_fa4_sa2 = $sub4_fa3+$sub4_fa4+$sub4_sa2;
		//echo $sub4_fa3_fa4_sa2." - ";
		echo $sub4_fa3_fa4_sa2;
				/* if((($sub4_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub4_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub4_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub4_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub4_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub4_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub4_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub4_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub4_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub4_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub4_fa3_fa4_sa2)>=1)&&(($sub4_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub4_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub4_fa1_fa2_fa3_fa4_sa1_sa2 = $sub4_fa1_fa2_sa1+$sub4_fa3_fa4_sa2;
		echo $sub4_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub4_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub4_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub4_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub4_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub4_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub4_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub4_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub4_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub4_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub4_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub4_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub4_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub4_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Science</p></td>	
	<td>
	<?php

	$sub5_fa1=($sub5_fa1/$full_mark)*$fa1;
	echo $sub5_fa1." - ";
				if((($sub5_fa1)>=(90/100)*$fa1)&&(($sub5_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub5_fa1)>=(75/100)*$fa1)&&(($sub5_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub5_fa1)>=(60/100)*$fa1)&&(($sub5_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub5_fa1)>=(50/100)*$fa1)&&(($sub5_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub5_fa1)>=(30/100)*$fa1)&&(($sub5_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub5_fa1)>=1)&&(($sub5_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub5_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub5_fa2=($sub5_fa2/$full_mark)*$fa2;
	echo $sub5_fa2." - ";
				if((($sub5_fa2)>=(90/100)*$fa2)&&(($sub5_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub5_fa2)>=(75/100)*$fa2)&&(($sub5_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub5_fa2)>=(60/100)*$fa2)&&(($sub5_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub5_fa2)>=(50/100)*$fa2)&&(($sub5_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub5_fa2)>=(30/100)*$fa2)&&(($sub5_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub5_fa2)>=1)&&(($sub5_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub5_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub5_sa1=($sub5_sa1/$full_mark)*$sa1;
	echo $sub5_sa1." - ";
				if((($sub5_sa1)>=(90/100)*$sa1)&&(($sub5_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub5_sa1)>=(75/100)*$sa1)&&(($sub5_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub5_sa1)>=(60/100)*$sa1)&&(($sub5_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub5_sa1)>=(50/100)*$sa1)&&(($sub5_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub5_sa1)>=(30/100)*$sa1)&&(($sub5_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub5_sa1)>=1)&&(($sub5_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub5_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub5_fa1_fa2_sa1 = ($sub5_fa1+$sub5_fa2+$sub5_sa1);
		 //echo $sub5_fa1_fa2_sa1." - ";
		 echo $sub5_fa1_fa2_sa1;
		 /*
				if((($sub5_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub5_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub5_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub5_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub5_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub5_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub5_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub5_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub5_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub5_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub5_fa1_fa2_sa1)>=1)&&(($sub5_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub5_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub5_fa3=($sub5_fa3/$full_mark)*$fa3;
	echo $sub5_fa3." - ";
				if((($sub5_fa3)>=(90/100)*$fa3)&&(($sub5_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub5_fa3)>=(75/100)*$fa3)&&(($sub5_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub5_fa3)>=(60/100)*$fa3)&&(($sub5_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub5_fa3)>=(50/100)*$fa3)&&(($sub5_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub5_fa3)>=(30/100)*$fa3)&&(($sub5_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub5_fa3)>=1)&&(($sub5_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub5_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub5_fa4=($sub5_fa4/$full_mark)*$fa4;
	echo $sub5_fa4." - ";
				if((($sub5_fa4)>=(90/100)*$fa4)&&(($sub5_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub5_fa4)>=(75/100)*$fa4)&&(($sub5_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub5_fa4)>=(60/100)*$fa4)&&(($sub5_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub5_fa4)>=(50/100)*$fa4)&&(($sub5_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub5_fa4)>=(30/100)*$fa4)&&(($sub5_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub5_fa4)>=1)&&(($sub5_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub5_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub5_sa2=($sub5_sa2/$full_mark)*$sa2;
	echo $sub5_sa2." - ";
				if((($sub5_sa2)>=(90/100)*$sa2)&&(($sub5_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub5_sa2)>=(75/100)*$sa2)&&(($sub5_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub5_sa2)>=(60/100)*$sa2)&&(($sub5_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub5_sa2)>=(50/100)*$sa2)&&(($sub5_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub5_sa2)>=(30/100)*$sa2)&&(($sub5_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub5_sa2)>=1)&&(($sub5_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub5_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub5_fa3_fa4_sa2 = $sub5_fa3+$sub5_fa4+$sub5_sa2;
		//echo $sub5_fa3_fa4_sa2." - ";
		echo $sub5_fa3_fa4_sa2;
				/* if((($sub5_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub5_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub5_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub5_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub5_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub5_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub5_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub5_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub5_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub5_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub5_fa3_fa4_sa2)>=1)&&(($sub5_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub5_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub5_fa1_fa2_fa3_fa4_sa1_sa2 = $sub5_fa1_fa2_sa1+$sub5_fa3_fa4_sa2;
		echo $sub5_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub5_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub5_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub5_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub5_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub5_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub5_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub5_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub5_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub5_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub5_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub5_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub5_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub5_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Social Science</p></td>	
	<td>
	<?php

	$sub6_fa1=($sub6_fa1/$full_mark)*$fa1;
	echo $sub6_fa1." - ";
				if((($sub6_fa1)>=(90/100)*$fa1)&&(($sub6_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub6_fa1)>=(75/100)*$fa1)&&(($sub6_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub6_fa1)>=(60/100)*$fa1)&&(($sub6_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub6_fa1)>=(50/100)*$fa1)&&(($sub6_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub6_fa1)>=(30/100)*$fa1)&&(($sub6_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub6_fa1)>=1)&&(($sub6_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub6_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub6_fa2=($sub6_fa2/$full_mark)*$fa2;
	echo $sub6_fa2." - ";
				if((($sub6_fa2)>=(90/100)*$fa2)&&(($sub6_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub6_fa2)>=(75/100)*$fa2)&&(($sub6_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub6_fa2)>=(60/100)*$fa2)&&(($sub6_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub6_fa2)>=(50/100)*$fa2)&&(($sub6_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub6_fa2)>=(30/100)*$fa2)&&(($sub6_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub6_fa2)>=1)&&(($sub6_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub6_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub6_sa1=($sub6_sa1/$full_mark)*$sa1;
	echo $sub6_sa1." - ";
				if((($sub6_sa1)>=(90/100)*$sa1)&&(($sub6_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub6_sa1)>=(75/100)*$sa1)&&(($sub6_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub6_sa1)>=(60/100)*$sa1)&&(($sub6_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub6_sa1)>=(50/100)*$sa1)&&(($sub6_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub6_sa1)>=(30/100)*$sa1)&&(($sub6_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub6_sa1)>=1)&&(($sub6_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub6_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub6_fa1_fa2_sa1 = ($sub6_fa1+$sub6_fa2+$sub6_sa1);
		 //echo $sub6_fa1_fa2_sa1." - ";
		 echo $sub6_fa1_fa2_sa1;
		 /*
				if((($sub6_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub6_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub6_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub6_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub6_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub6_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub6_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub6_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub6_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub6_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub6_fa1_fa2_sa1)>=1)&&(($sub6_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub6_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub6_fa3=($sub6_fa3/$full_mark)*$fa3;
	echo $sub6_fa3." - ";
				if((($sub6_fa3)>=(90/100)*$fa3)&&(($sub6_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub6_fa3)>=(75/100)*$fa3)&&(($sub6_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub6_fa3)>=(60/100)*$fa3)&&(($sub6_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub6_fa3)>=(50/100)*$fa3)&&(($sub6_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub6_fa3)>=(30/100)*$fa3)&&(($sub6_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub6_fa3)>=1)&&(($sub6_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub6_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub6_fa4=($sub6_fa4/$full_mark)*$fa4;
	echo $sub6_fa4." - ";
				if((($sub6_fa4)>=(90/100)*$fa4)&&(($sub6_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub6_fa4)>=(75/100)*$fa4)&&(($sub6_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub6_fa4)>=(60/100)*$fa4)&&(($sub6_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub6_fa4)>=(50/100)*$fa4)&&(($sub6_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub6_fa4)>=(30/100)*$fa4)&&(($sub6_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub6_fa4)>=1)&&(($sub6_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub6_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub6_sa2=($sub6_sa2/$full_mark)*$sa2;
	echo $sub6_sa2." - ";
				if((($sub6_sa2)>=(90/100)*$sa2)&&(($sub6_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub6_sa2)>=(75/100)*$sa2)&&(($sub6_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub6_sa2)>=(60/100)*$sa2)&&(($sub6_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub6_sa2)>=(50/100)*$sa2)&&(($sub6_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub6_sa2)>=(30/100)*$sa2)&&(($sub6_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub6_sa2)>=1)&&(($sub6_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub6_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub6_fa3_fa4_sa2 = $sub6_fa3+$sub6_fa4+$sub6_sa2;
		//echo $sub6_fa3_fa4_sa2." - ";
		echo $sub6_fa3_fa4_sa2;
				/* if((($sub6_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub6_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub6_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub6_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub6_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub6_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub6_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub6_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub6_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub6_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub6_fa3_fa4_sa2)>=1)&&(($sub6_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub6_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub6_fa1_fa2_fa3_fa4_sa1_sa2 = $sub6_fa1_fa2_sa1+$sub6_fa3_fa4_sa2;
		echo $sub6_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub6_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub6_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub6_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub6_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub6_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub6_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub6_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub6_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub6_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub6_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub6_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub6_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub6_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Physical & Health Education</p></td>	
	<td>
	<?php

	$sub7_fa1=($sub7_fa1/$full_mark)*$fa1;
	echo $sub7_fa1." - ";
				if((($sub7_fa1)>=(90/100)*$fa1)&&(($sub7_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub7_fa1)>=(75/100)*$fa1)&&(($sub7_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub7_fa1)>=(60/100)*$fa1)&&(($sub7_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub7_fa1)>=(50/100)*$fa1)&&(($sub7_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub7_fa1)>=(30/100)*$fa1)&&(($sub7_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub7_fa1)>=1)&&(($sub7_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub7_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub7_fa2=($sub7_fa2/$full_mark)*$fa2;
	echo $sub7_fa2." - ";
				if((($sub7_fa2)>=(90/100)*$fa2)&&(($sub7_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub7_fa2)>=(75/100)*$fa2)&&(($sub7_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub7_fa2)>=(60/100)*$fa2)&&(($sub7_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub7_fa2)>=(50/100)*$fa2)&&(($sub7_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub7_fa2)>=(30/100)*$fa2)&&(($sub7_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub7_fa2)>=1)&&(($sub7_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub7_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub7_sa1=($sub7_sa1/$full_mark)*$sa1;
	echo $sub7_sa1." - ";
				if((($sub7_sa1)>=(90/100)*$sa1)&&(($sub7_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub7_sa1)>=(75/100)*$sa1)&&(($sub7_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub7_sa1)>=(60/100)*$sa1)&&(($sub7_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub7_sa1)>=(50/100)*$sa1)&&(($sub7_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub7_sa1)>=(30/100)*$sa1)&&(($sub7_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub7_sa1)>=1)&&(($sub7_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub7_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub7_fa1_fa2_sa1 = ($sub7_fa1+$sub7_fa2+$sub7_sa1);
		 //echo $sub7_fa1_fa2_sa1." - ";
		 echo $sub7_fa1_fa2_sa1;
		 /*
				if((($sub7_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub7_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub7_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub7_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub7_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub7_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub7_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub7_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub7_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub7_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub7_fa1_fa2_sa1)>=1)&&(($sub7_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub7_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub7_fa3=($sub7_fa3/$full_mark)*$fa3;
	echo $sub7_fa3." - ";
				if((($sub7_fa3)>=(90/100)*$fa3)&&(($sub7_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub7_fa3)>=(75/100)*$fa3)&&(($sub7_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub7_fa3)>=(60/100)*$fa3)&&(($sub7_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub7_fa3)>=(50/100)*$fa3)&&(($sub7_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub7_fa3)>=(30/100)*$fa3)&&(($sub7_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub7_fa3)>=1)&&(($sub7_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub7_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub7_fa4=($sub7_fa4/$full_mark)*$fa4;
	echo $sub7_fa4." - ";
				if((($sub7_fa4)>=(90/100)*$fa4)&&(($sub7_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub7_fa4)>=(75/100)*$fa4)&&(($sub7_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub7_fa4)>=(60/100)*$fa4)&&(($sub7_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub7_fa4)>=(50/100)*$fa4)&&(($sub7_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub7_fa4)>=(30/100)*$fa4)&&(($sub7_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub7_fa4)>=1)&&(($sub7_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub7_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub7_sa2=($sub7_sa2/$full_mark)*$sa2;
	echo $sub7_sa2." - ";
				if((($sub7_sa2)>=(90/100)*$sa2)&&(($sub7_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub7_sa2)>=(75/100)*$sa2)&&(($sub7_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub7_sa2)>=(60/100)*$sa2)&&(($sub7_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub7_sa2)>=(50/100)*$sa2)&&(($sub7_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub7_sa2)>=(30/100)*$sa2)&&(($sub7_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub7_sa2)>=1)&&(($sub7_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub7_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub7_fa3_fa4_sa2 = $sub7_fa3+$sub7_fa4+$sub7_sa2;
		//echo $sub7_fa3_fa4_sa2." - ";
		echo $sub7_fa3_fa4_sa2;
				/* if((($sub7_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub7_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub7_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub7_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub7_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub7_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub7_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub7_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub7_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub7_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub7_fa3_fa4_sa2)>=1)&&(($sub7_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub7_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub7_fa1_fa2_fa3_fa4_sa1_sa2 = $sub7_fa1_fa2_sa1+$sub7_fa3_fa4_sa2;
		echo $sub7_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub7_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub7_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub7_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub7_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub7_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub7_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub7_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub7_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub7_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub7_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub7_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub7_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub7_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Art Education</p></td>	
	<td>
	<?php

	$sub8_fa1=($sub8_fa1/$full_mark)*$fa1;
	echo $sub8_fa1." - ";
				if((($sub8_fa1)>=(90/100)*$fa1)&&(($sub8_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub8_fa1)>=(75/100)*$fa1)&&(($sub8_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub8_fa1)>=(60/100)*$fa1)&&(($sub8_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub8_fa1)>=(50/100)*$fa1)&&(($sub8_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub8_fa1)>=(30/100)*$fa1)&&(($sub8_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub8_fa1)>=1)&&(($sub8_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub8_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub8_fa2=($sub8_fa2/$full_mark)*$fa2;
	echo $sub8_fa2." - ";
				if((($sub8_fa2)>=(90/100)*$fa2)&&(($sub8_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub8_fa2)>=(75/100)*$fa2)&&(($sub8_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub8_fa2)>=(60/100)*$fa2)&&(($sub8_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub8_fa2)>=(50/100)*$fa2)&&(($sub8_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub8_fa2)>=(30/100)*$fa2)&&(($sub8_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub8_fa2)>=1)&&(($sub8_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub8_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub8_sa1=($sub8_sa1/$full_mark)*$sa1;
	echo $sub8_sa1." - ";
				if((($sub8_sa1)>=(90/100)*$sa1)&&(($sub8_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub8_sa1)>=(75/100)*$sa1)&&(($sub8_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub8_sa1)>=(60/100)*$sa1)&&(($sub8_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub8_sa1)>=(50/100)*$sa1)&&(($sub8_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub8_sa1)>=(30/100)*$sa1)&&(($sub8_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub8_sa1)>=1)&&(($sub8_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub8_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub8_fa1_fa2_sa1 = ($sub8_fa1+$sub8_fa2+$sub8_sa1);
		 //echo $sub8_fa1_fa2_sa1." - ";
		 echo $sub8_fa1_fa2_sa1;
		 /*
				if((($sub8_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub8_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub8_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub8_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub8_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub8_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub8_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub8_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub8_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub8_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub8_fa1_fa2_sa1)>=1)&&(($sub8_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub8_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub8_fa3=($sub8_fa3/$full_mark)*$fa3;
	echo $sub8_fa3." - ";
				if((($sub8_fa3)>=(90/100)*$fa3)&&(($sub8_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub8_fa3)>=(75/100)*$fa3)&&(($sub8_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub8_fa3)>=(60/100)*$fa3)&&(($sub8_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub8_fa3)>=(50/100)*$fa3)&&(($sub8_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub8_fa3)>=(30/100)*$fa3)&&(($sub8_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub8_fa3)>=1)&&(($sub8_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub8_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub8_fa4=($sub8_fa4/$full_mark)*$fa4;
	echo $sub8_fa4." - ";
				if((($sub8_fa4)>=(90/100)*$fa4)&&(($sub8_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub8_fa4)>=(75/100)*$fa4)&&(($sub8_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub8_fa4)>=(60/100)*$fa4)&&(($sub8_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub8_fa4)>=(50/100)*$fa4)&&(($sub8_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub8_fa4)>=(30/100)*$fa4)&&(($sub8_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub8_fa4)>=1)&&(($sub8_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub8_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub8_sa2=($sub8_sa2/$full_mark)*$sa2;
	echo $sub8_sa2." - ";
				if((($sub8_sa2)>=(90/100)*$sa2)&&(($sub8_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub8_sa2)>=(75/100)*$sa2)&&(($sub8_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub8_sa2)>=(60/100)*$sa2)&&(($sub8_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub8_sa2)>=(50/100)*$sa2)&&(($sub8_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub8_sa2)>=(30/100)*$sa2)&&(($sub8_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub8_sa2)>=1)&&(($sub8_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub8_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub8_fa3_fa4_sa2 = $sub8_fa3+$sub8_fa4+$sub8_sa2;
		//echo $sub8_fa3_fa4_sa2." - ";
		echo $sub8_fa3_fa4_sa2;
				/* if((($sub8_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub8_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub8_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub8_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub8_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub8_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub8_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub8_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub8_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub8_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub8_fa3_fa4_sa2)>=1)&&(($sub8_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub8_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub8_fa1_fa2_fa3_fa4_sa1_sa2 = $sub8_fa1_fa2_sa1+$sub8_fa3_fa4_sa2;
		echo $sub8_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub8_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub8_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub8_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub8_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub8_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub8_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub8_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub8_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub8_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub8_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub8_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub8_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub8_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Craft</p></td>	
	<td>
	<?php

	$sub9_fa1=($sub9_fa1/$full_mark)*$fa1;
	echo $sub9_fa1." - ";
				if((($sub9_fa1)>=(90/100)*$fa1)&&(($sub9_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub9_fa1)>=(75/100)*$fa1)&&(($sub9_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub9_fa1)>=(60/100)*$fa1)&&(($sub9_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub9_fa1)>=(50/100)*$fa1)&&(($sub9_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub9_fa1)>=(30/100)*$fa1)&&(($sub9_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub9_fa1)>=1)&&(($sub9_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub9_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub9_fa2=($sub9_fa2/$full_mark)*$fa2;
	echo $sub9_fa2." - ";
				if((($sub9_fa2)>=(90/100)*$fa2)&&(($sub9_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub9_fa2)>=(75/100)*$fa2)&&(($sub9_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub9_fa2)>=(60/100)*$fa2)&&(($sub9_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub9_fa2)>=(50/100)*$fa2)&&(($sub9_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub9_fa2)>=(30/100)*$fa2)&&(($sub9_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub9_fa2)>=1)&&(($sub9_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub9_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub9_sa1=($sub9_sa1/$full_mark)*$sa1;
	echo $sub9_sa1." - ";
				if((($sub9_sa1)>=(90/100)*$sa1)&&(($sub9_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub9_sa1)>=(75/100)*$sa1)&&(($sub9_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub9_sa1)>=(60/100)*$sa1)&&(($sub9_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub9_sa1)>=(50/100)*$sa1)&&(($sub9_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub9_sa1)>=(30/100)*$sa1)&&(($sub9_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub9_sa1)>=1)&&(($sub9_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub9_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub9_fa1_fa2_sa1 = ($sub9_fa1+$sub9_fa2+$sub9_sa1);
		 //echo $sub9_fa1_fa2_sa1." - ";
		 echo $sub9_fa1_fa2_sa1;
		 /*
				if((($sub9_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub9_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub9_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub9_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub9_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub9_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub9_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub9_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub9_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub9_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub9_fa1_fa2_sa1)>=1)&&(($sub9_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub9_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub9_fa3=($sub9_fa3/$full_mark)*$fa3;
	echo $sub9_fa3." - ";
				if((($sub9_fa3)>=(90/100)*$fa3)&&(($sub9_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub9_fa3)>=(75/100)*$fa3)&&(($sub9_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub9_fa3)>=(60/100)*$fa3)&&(($sub9_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub9_fa3)>=(50/100)*$fa3)&&(($sub9_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub9_fa3)>=(30/100)*$fa3)&&(($sub9_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub9_fa3)>=1)&&(($sub9_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub9_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub9_fa4=($sub9_fa4/$full_mark)*$fa4;
	echo $sub9_fa4." - ";
				if((($sub9_fa4)>=(90/100)*$fa4)&&(($sub9_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub9_fa4)>=(75/100)*$fa4)&&(($sub9_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub9_fa4)>=(60/100)*$fa4)&&(($sub9_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub9_fa4)>=(50/100)*$fa4)&&(($sub9_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub9_fa4)>=(30/100)*$fa4)&&(($sub9_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub9_fa4)>=1)&&(($sub9_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub9_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub9_sa2=($sub9_sa2/$full_mark)*$sa2;
	echo $sub9_sa2." - ";
				if((($sub9_sa2)>=(90/100)*$sa2)&&(($sub9_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub9_sa2)>=(75/100)*$sa2)&&(($sub9_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub9_sa2)>=(60/100)*$sa2)&&(($sub9_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub9_sa2)>=(50/100)*$sa2)&&(($sub9_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub9_sa2)>=(30/100)*$sa2)&&(($sub9_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub9_sa2)>=1)&&(($sub9_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub9_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub9_fa3_fa4_sa2 = $sub9_fa3+$sub9_fa4+$sub9_sa2;
		//echo $sub9_fa3_fa4_sa2." - ";
		echo $sub9_fa3_fa4_sa2;
				/* if((($sub9_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub9_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub9_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub9_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub9_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub9_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub9_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub9_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub9_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub9_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub9_fa3_fa4_sa2)>=1)&&(($sub9_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub9_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub9_fa1_fa2_fa3_fa4_sa1_sa2 = $sub9_fa1_fa2_sa1+$sub9_fa3_fa4_sa2;
		echo $sub9_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub9_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub9_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub9_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub9_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub9_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub9_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub9_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub9_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub9_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub9_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub9_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub9_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub9_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Computer</p></td>	
	<td>
	<?php

	$sub10_fa1=($sub10_fa1/$full_mark)*$fa1;
	echo $sub10_fa1." - ";
				if((($sub10_fa1)>=(90/100)*$fa1)&&(($sub10_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub10_fa1)>=(75/100)*$fa1)&&(($sub10_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub10_fa1)>=(60/100)*$fa1)&&(($sub10_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub10_fa1)>=(50/100)*$fa1)&&(($sub10_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub10_fa1)>=(30/100)*$fa1)&&(($sub10_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub10_fa1)>=1)&&(($sub10_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub10_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub10_fa2=($sub10_fa2/$full_mark)*$fa2;
	echo $sub10_fa2." - ";
				if((($sub10_fa2)>=(90/100)*$fa2)&&(($sub10_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub10_fa2)>=(75/100)*$fa2)&&(($sub10_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub10_fa2)>=(60/100)*$fa2)&&(($sub10_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub10_fa2)>=(50/100)*$fa2)&&(($sub10_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub10_fa2)>=(30/100)*$fa2)&&(($sub10_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub10_fa2)>=1)&&(($sub10_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub10_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub10_sa1=($sub10_sa1/$full_mark)*$sa1;
	echo $sub10_sa1." - ";
				if((($sub10_sa1)>=(90/100)*$sa1)&&(($sub10_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub10_sa1)>=(75/100)*$sa1)&&(($sub10_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub10_sa1)>=(60/100)*$sa1)&&(($sub10_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub10_sa1)>=(50/100)*$sa1)&&(($sub10_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub10_sa1)>=(30/100)*$sa1)&&(($sub10_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub10_sa1)>=1)&&(($sub10_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub10_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub10_fa1_fa2_sa1 = ($sub10_fa1+$sub10_fa2+$sub10_sa1);
		 //echo $sub10_fa1_fa2_sa1." - ";
		 echo $sub10_fa1_fa2_sa1;
		 /*
				if((($sub10_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub10_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub10_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub10_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub10_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub10_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub10_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub10_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub10_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub10_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub10_fa1_fa2_sa1)>=1)&&(($sub10_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub10_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub10_fa3=($sub10_fa3/$full_mark)*$fa3;
	echo $sub10_fa3." - ";
				if((($sub10_fa3)>=(90/100)*$fa3)&&(($sub10_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub10_fa3)>=(75/100)*$fa3)&&(($sub10_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub10_fa3)>=(60/100)*$fa3)&&(($sub10_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub10_fa3)>=(50/100)*$fa3)&&(($sub10_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub10_fa3)>=(30/100)*$fa3)&&(($sub10_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub10_fa3)>=1)&&(($sub10_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub10_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub10_fa4=($sub10_fa4/$full_mark)*$fa4;
	echo $sub10_fa4." - ";
				if((($sub10_fa4)>=(90/100)*$fa4)&&(($sub10_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub10_fa4)>=(75/100)*$fa4)&&(($sub10_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub10_fa4)>=(60/100)*$fa4)&&(($sub10_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub10_fa4)>=(50/100)*$fa4)&&(($sub10_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub10_fa4)>=(30/100)*$fa4)&&(($sub10_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub10_fa4)>=1)&&(($sub10_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub10_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub10_sa2=($sub10_sa2/$full_mark)*$sa2;
	echo $sub10_sa2." - ";
				if((($sub10_sa2)>=(90/100)*$sa2)&&(($sub10_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub10_sa2)>=(75/100)*$sa2)&&(($sub10_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub10_sa2)>=(60/100)*$sa2)&&(($sub10_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub10_sa2)>=(50/100)*$sa2)&&(($sub10_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub10_sa2)>=(30/100)*$sa2)&&(($sub10_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub10_sa2)>=1)&&(($sub10_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub10_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub10_fa3_fa4_sa2 = $sub10_fa3+$sub10_fa4+$sub10_sa2;
		//echo $sub10_fa3_fa4_sa2." - ";
		echo $sub10_fa3_fa4_sa2;
				/* if((($sub10_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub10_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub10_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub10_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub10_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub10_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub10_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub10_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub10_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub10_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub10_fa3_fa4_sa2)>=1)&&(($sub10_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub10_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub10_fa1_fa2_fa3_fa4_sa1_sa2 = $sub10_fa1_fa2_sa1+$sub10_fa3_fa4_sa2;
		echo $sub10_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub10_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub10_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub10_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub10_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub10_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub10_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub10_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub10_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub10_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub10_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub10_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub10_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub10_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>G.K</p></td>	
	<td>
	<?php

	$sub11_fa1=($sub11_fa1/$full_mark)*$fa1;
	echo $sub11_fa1." - ";
				if((($sub11_fa1)>=(90/100)*$fa1)&&(($sub11_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub11_fa1)>=(75/100)*$fa1)&&(($sub11_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub11_fa1)>=(60/100)*$fa1)&&(($sub11_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub11_fa1)>=(50/100)*$fa1)&&(($sub11_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub11_fa1)>=(30/100)*$fa1)&&(($sub11_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub11_fa1)>=1)&&(($sub11_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub11_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub11_fa2=($sub11_fa2/$full_mark)*$fa2;
	echo $sub11_fa2." - ";
				if((($sub11_fa2)>=(90/100)*$fa2)&&(($sub11_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub11_fa2)>=(75/100)*$fa2)&&(($sub11_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub11_fa2)>=(60/100)*$fa2)&&(($sub11_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub11_fa2)>=(50/100)*$fa2)&&(($sub11_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub11_fa2)>=(30/100)*$fa2)&&(($sub11_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub11_fa2)>=1)&&(($sub11_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub11_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub11_sa1=($sub11_sa1/$full_mark)*$sa1;
	echo $sub11_sa1." - ";
				if((($sub11_sa1)>=(90/100)*$sa1)&&(($sub11_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub11_sa1)>=(75/100)*$sa1)&&(($sub11_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub11_sa1)>=(60/100)*$sa1)&&(($sub11_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub11_sa1)>=(50/100)*$sa1)&&(($sub11_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub11_sa1)>=(30/100)*$sa1)&&(($sub11_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub11_sa1)>=1)&&(($sub11_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub11_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub11_fa1_fa2_sa1 = ($sub11_fa1+$sub11_fa2+$sub11_sa1);
		 //echo $sub11_fa1_fa2_sa1." - ";
		 echo $sub11_fa1_fa2_sa1;
		 /*
				if((($sub11_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub11_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub11_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub11_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub11_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub11_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub11_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub11_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub11_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub11_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub11_fa1_fa2_sa1)>=1)&&(($sub11_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub11_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub11_fa3=($sub11_fa3/$full_mark)*$fa3;
	echo $sub11_fa3." - ";
				if((($sub11_fa3)>=(90/100)*$fa3)&&(($sub11_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub11_fa3)>=(75/100)*$fa3)&&(($sub11_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub11_fa3)>=(60/100)*$fa3)&&(($sub11_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub11_fa3)>=(50/100)*$fa3)&&(($sub11_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub11_fa3)>=(30/100)*$fa3)&&(($sub11_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub11_fa3)>=1)&&(($sub11_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub11_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub11_fa4=($sub11_fa4/$full_mark)*$fa4;
	echo $sub11_fa4." - ";
				if((($sub11_fa4)>=(90/100)*$fa4)&&(($sub11_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub11_fa4)>=(75/100)*$fa4)&&(($sub11_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub11_fa4)>=(60/100)*$fa4)&&(($sub11_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub11_fa4)>=(50/100)*$fa4)&&(($sub11_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub11_fa4)>=(30/100)*$fa4)&&(($sub11_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub11_fa4)>=1)&&(($sub11_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub11_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub11_sa2=($sub11_sa2/$full_mark)*$sa2;
	echo $sub11_sa2." - ";
				if((($sub11_sa2)>=(90/100)*$sa2)&&(($sub11_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub11_sa2)>=(75/100)*$sa2)&&(($sub11_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub11_sa2)>=(60/100)*$sa2)&&(($sub11_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub11_sa2)>=(50/100)*$sa2)&&(($sub11_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub11_sa2)>=(30/100)*$sa2)&&(($sub11_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub11_sa2)>=1)&&(($sub11_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub11_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub11_fa3_fa4_sa2 = $sub11_fa3+$sub11_fa4+$sub11_sa2;
		//echo $sub11_fa3_fa4_sa2." - ";
		echo $sub11_fa3_fa4_sa2;
				/* if((($sub11_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub11_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub11_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub11_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub11_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub11_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub11_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub11_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub11_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub11_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub11_fa3_fa4_sa2)>=1)&&(($sub11_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub11_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub11_fa1_fa2_fa3_fa4_sa1_sa2 = $sub11_fa1_fa2_sa1+$sub11_fa3_fa4_sa2;
		echo $sub11_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub11_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub11_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub11_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub11_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub11_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub11_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub11_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub11_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub11_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub11_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub11_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub11_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub11_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
		
		<tr>
	<td><p>Moral Science</p></td>	
	<td>
	<?php

	$sub12_fa1=($sub12_fa1/$full_mark)*$fa1;
	echo $sub12_fa1." - ";
				if((($sub12_fa1)>=(90/100)*$fa1)&&(($sub12_fa1)<=$fa1))
				{
					echo "A+";
				}
				elseif((($sub12_fa1)>=(75/100)*$fa1)&&(($sub12_fa1)<(90/100)*$fa1))
				{
					echo "A";
				}
				elseif((($sub12_fa1)>=(60/100)*$fa1)&&(($sub12_fa1)<(75/100)*$fa1))
				{
					echo "B+";
				}
				elseif((($sub12_fa1)>=(50/100)*$fa1)&&(($sub12_fa1)<(60/100)*$fa1))
				{
					echo "B";
				}
				elseif((($sub12_fa1)>=(30/100)*$fa1)&&(($sub12_fa1)<(50/100)*$fa1))
				{
					echo "C+";
				}
				elseif((($sub12_fa1)>=1)&&(($sub12_fa1)<(30/100)*$fa1))
				{
					echo "C";
				}
				elseif(($sub12_fa1=="0"))
				{
					echo "---";
				}
		
		
		
		?>
	</td>
	
	<td>
		<?php 
		$sub12_fa2=($sub12_fa2/$full_mark)*$fa2;
	echo $sub12_fa2." - ";
				if((($sub12_fa2)>=(90/100)*$fa2)&&(($sub12_fa2)<=$fa2))
				{
					echo "A+";
				}
				elseif((($sub12_fa2)>=(75/100)*$fa2)&&(($sub12_fa2)<(90/100)*$fa2))
				{
					echo "A";
				}
				elseif((($sub12_fa2)>=(60/100)*$fa2)&&(($sub12_fa2)<(75/100)*$fa2))
				{
					echo "B+";
				}
				elseif((($sub12_fa2)>=(50/100)*$fa2)&&(($sub12_fa2)<(60/100)*$fa2))
				{
					echo "B";
				}
				elseif((($sub12_fa2)>=(30/100)*$fa2)&&(($sub12_fa2)<(50/100)*$fa2))
				{
					echo "C+";
				}
				elseif((($sub12_fa2)>=1)&&(($sub12_fa2)<(30/100)*$fa2))
				{
					echo "C";
				}
				elseif(($sub12_fa2=="0"))
				{
					echo "---";
				}
		
		
		
				?>
			</td>	
	<td>
		<?php
		$sub12_sa1=($sub12_sa1/$full_mark)*$sa1;
	echo $sub12_sa1." - ";
				if((($sub12_sa1)>=(90/100)*$sa1)&&(($sub12_sa1)<=$sa1))
				{
					echo "A+";
				}
				elseif((($sub12_sa1)>=(75/100)*$sa1)&&(($sub12_sa1)<(90/100)*$sa1))
				{
					echo "A";
				}
				elseif((($sub12_sa1)>=(60/100)*$sa1)&&(($sub12_sa1)<(75/100)*$sa1))
				{
					echo "B+";
				}
				elseif((($sub12_sa1)>=(50/100)*$sa1)&&(($sub12_sa1)<(60/100)*$sa1))
				{
					echo "B";
				}
				elseif((($sub12_sa1)>=(30/100)*$sa1)&&(($sub12_sa1)<(50/100)*$sa1))
				{
					echo "C+";
				}
				elseif((($sub12_sa1)>=1)&&(($sub12_sa1)<(30/100)*$sa1))
				{
					echo "C";
				}
				elseif(($sub12_sa1=="0"))
				{
					echo "---";
				}
		
		
			?>
			</td>	
	<td><?php 
		$sub12_fa1_fa2_sa1 = ($sub12_fa1+$sub12_fa2+$sub12_sa1);
		 //echo $sub12_fa1_fa2_sa1." - ";
		 echo $sub12_fa1_fa2_sa1;
		 /*
				if((($sub12_fa1_fa2_sa1)>=(90/100)*$fa1_fa2_sa1)&&(($sub12_fa1_fa2_sa1)<=$fa1_fa2_sa1))
				{
					echo "A+";
				}
				elseif((($sub12_fa1_fa2_sa1)>=(75/100)*$fa1_fa2_sa1)&&(($sub12_fa1_fa2_sa1)<(90/100)*$fa1_fa2_sa1))
				{
					echo "A";
				}
				elseif((($sub12_fa1_fa2_sa1)>=(60/100)*$fa1_fa2_sa1)&&(($sub12_fa1_fa2_sa1)<(75/100)*$fa1_fa2_sa1))
				{
					echo "B+";
				}
				elseif((($sub12_fa1_fa2_sa1)>=(50/100)*$fa1_fa2_sa1)&&(($sub12_fa1_fa2_sa1)<(60/100)*$fa1_fa2_sa1))
				{
					echo "B";
				}
				elseif((($sub12_fa1_fa2_sa1)>=(30/100)*$fa1_fa2_sa1)&&(($sub12_fa1_fa2_sa1)<(50/100)*$fa1_fa2_sa1))
				{
					echo "C+";
				}
				elseif((($sub12_fa1_fa2_sa1)>=1)&&(($sub12_fa1_fa2_sa1)<(30/100)*$fa1_fa2_sa1))
				{
					echo "C";
				}
				elseif(($sub12_fa1_fa2_sa1=="0"))
				{
					echo "---";
				} */
		?></td>	
	<td><?php 
		$sub12_fa3=($sub12_fa3/$full_mark)*$fa3;
	echo $sub12_fa3." - ";
				if((($sub12_fa3)>=(90/100)*$fa3)&&(($sub12_fa3)<=$fa3))
				{
					echo "A+";
				}
				elseif((($sub12_fa3)>=(75/100)*$fa3)&&(($sub12_fa3)<(90/100)*$fa3))
				{
					echo "A";
				}
				elseif((($sub12_fa3)>=(60/100)*$fa3)&&(($sub12_fa3)<(75/100)*$fa3))
				{
					echo "B+";
				}
				elseif((($sub12_fa3)>=(50/100)*$fa3)&&(($sub12_fa3)<(60/100)*$fa3))
				{
					echo "B";
				}
				elseif((($sub12_fa3)>=(30/100)*$fa3)&&(($sub12_fa3)<(50/100)*$fa3))
				{
					echo "C+";
				}
				elseif((($sub12_fa3)>=1)&&(($sub12_fa3)<(30/100)*$fa3))
				{
					echo "C";
				}
				elseif(($sub12_fa3=="0"))
				{
					echo "---";
				}
		?></td>	
	<td><?php 
		$sub12_fa4=($sub12_fa4/$full_mark)*$fa4;
	echo $sub12_fa4." - ";
				if((($sub12_fa4)>=(90/100)*$fa4)&&(($sub12_fa4)<=$fa4))
				{
					echo "A+";
				}
				elseif((($sub12_fa4)>=(75/100)*$fa4)&&(($sub12_fa4)<(90/100)*$fa4))
				{
					echo "A";
				}
				elseif((($sub12_fa4)>=(60/100)*$fa4)&&(($sub12_fa4)<(75/100)*$fa4))
				{
					echo "B+";
				}
				elseif((($sub12_fa4)>=(50/100)*$fa4)&&(($sub12_fa4)<(60/100)*$fa4))
				{
					echo "B";
				}
				elseif((($sub12_fa4)>=(30/100)*$fa4)&&(($sub12_fa4)<(50/100)*$fa4))
				{
					echo "C+";
				}
				elseif((($sub12_fa4)>=1)&&(($sub12_fa4)<(30/100)*$fa4))
				{
					echo "C";
				}
				elseif(($sub12_fa4=="0"))
				{
					echo "---";
				}
		
		?>
		</td>	
	<td><?php 
		$sub12_sa2=($sub12_sa2/$full_mark)*$sa2;
	echo $sub12_sa2." - ";
				if((($sub12_sa2)>=(90/100)*$sa2)&&(($sub12_sa2)<=$sa2))
				{
					echo "A+";
				}
				elseif((($sub12_sa2)>=(75/100)*$sa2)&&(($sub12_sa2)<(90/100)*$sa2))
				{
					echo "A";
				}
				elseif((($sub12_sa2)>=(60/100)*$sa2)&&(($sub12_sa2)<(75/100)*$sa2))
				{
					echo "B+";
				}
				elseif((($sub12_sa2)>=(50/100)*$sa2)&&(($sub12_sa2)<(60/100)*$sa2))
				{
					echo "B";
				}
				elseif((($sub12_sa2)>=(30/100)*$sa2)&&(($sub12_sa2)<(50/100)*$sa2))
				{
					echo "C+";
				}
				elseif((($sub12_sa2)>=1)&&(($sub12_sa2)<(30/100)*$sa2))
				{
					echo "C";
				}
				elseif(($sub12_sa2=="0"))
				{
					echo "---";
				}
		
		
		?>
		</td>	
	<td><?php 
		$sub12_fa3_fa4_sa2 = $sub12_fa3+$sub12_fa4+$sub12_sa2;
		//echo $sub12_fa3_fa4_sa2." - ";
		echo $sub12_fa3_fa4_sa2;
				/* if((($sub12_fa3_fa4_sa2)>=(90/100)*$fa3_fa4_sa2)&&(($sub12_fa3_fa4_sa2)<=$fa3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub12_fa3_fa4_sa2)>=(75/100)*$fa3_fa4_sa2)&&(($sub12_fa3_fa4_sa2)<(90/100)*$fa3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub12_fa3_fa4_sa2)>=(60/100)*$fa3_fa4_sa2)&&(($sub12_fa3_fa4_sa2)<(75/100)*$fa3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub12_fa3_fa4_sa2)>=(50/100)*$fa3_fa4_sa2)&&(($sub12_fa3_fa4_sa2)<(60/100)*$fa3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub12_fa3_fa4_sa2)>=(30/100)*$fa3_fa4_sa2)&&(($sub12_fa3_fa4_sa2)<(50/100)*$fa3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub12_fa3_fa4_sa2)>=1)&&(($sub12_fa3_fa4_sa2)<(30/100)*$fa3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub12_fa3_fa4_sa2=="0"))
				{
					echo "---";
				} */
		?>
		</td>	
	<td><?php 
		$sub12_fa1_fa2_fa3_fa4_sa1_sa2 = $sub12_fa1_fa2_sa1+$sub12_fa3_fa4_sa2;
		echo $sub12_fa1_fa2_fa3_fa4_sa1_sa2." - ";
				if((($sub12_fa1_fa2_fa3_fa4_sa1_sa2)>=(90/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub12_fa1_fa2_fa3_fa4_sa1_sa2)<=$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A+";
				}
				elseif((($sub12_fa1_fa2_fa3_fa4_sa1_sa2)>=(75/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub12_fa1_fa2_fa3_fa4_sa1_sa2)<(90/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "A";
				}
				elseif((($sub12_fa1_fa2_fa3_fa4_sa1_sa2)>=(60/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub12_fa1_fa2_fa3_fa4_sa1_sa2)<(75/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B+";
				}
				elseif((($sub12_fa1_fa2_fa3_fa4_sa1_sa2)>=(50/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub12_fa1_fa2_fa3_fa4_sa1_sa2)<(60/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "B";
				}
				elseif((($sub12_fa1_fa2_fa3_fa4_sa1_sa2)>=(30/100)*$f1_fa2_sa1_f3_fa4_sa2)&&(($sub12_fa1_fa2_fa3_fa4_sa1_sa2)<(50/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C+";
				}
				elseif((($sub12_fa1_fa2_fa3_fa4_sa1_sa2)>=1)&&(($sub12_fa1_fa2_fa3_fa4_sa1_sa2)<(30/100)*$f1_fa2_sa1_f3_fa4_sa2))
				{
					echo "C";
				}
				elseif(($sub12_fa1_fa2_fa3_fa4_sa1_sa2=="0"))
				{
					echo "---";
				}
		?>
		</td>
		</tr>
	
	<?php 
		$sql_tot="select att_date,first_name,roll_no,present_class,sum(att_count) as tot_att_count,present_class from attendance where academic_year='".$cur_academic_year."' and   first_name='".$first_name."' and roll_no='".$roll_no."' and present_class='".$class."' group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			
			$first_name=$row_tot["first_name"];
			$roll_no=$row_tot["roll_no"];
			$present_class=$row_tot["present_class"];
			
		}	
				
		
		$sql_tot_att="select distinct att_date,present_class,sum(tot_class) as tot_class from attendance where academic_year='".$cur_academic_year."' and   first_name='".$first_name."' and roll_no='".$roll_no."' and present_class='".$class."'  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}
		
		?>
					
					<tr>
					<td><p style="font-size:13px;">NO.of working days</p></td>	
					<td colspan="4"><?php echo $tot_class; ?></td>	
					<td><p style="font-size:13px;">Days present</p></td>	
					<td colspan="4"><?php echo $tot_att_count; ?></td>	
					</tr>
					<tr>
					<td><p style="font-size:13px;">Class Teacher's Sign</p></td>	
					<td colspan="4"></td>	
					<td><p style="font-size:13px;">H.M Sign</p></td>	
					<td colspan="4"></td>	
					</tr>

					<tr>
					<td colspan="1"><p style="font-size:13px;">Parents Sign</p></td>	
					<td colspan="4"></td>	
					<td colspan="4"></td>	
					<td colspan="1"></td>	
					</tr>
					
					</table>
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
