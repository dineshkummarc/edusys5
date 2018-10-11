<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	error_reporting("0");
	require("header.php");
	require("connection.php");
	if((isset($_GET["present_class"]))&&(isset($_GET["section"]))&&(isset($_GET["exam_name"])))
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
					 <button type="button"  class="btn btn-success btn-md w3-card-4" onclick="printDiv('study')">Print</button> 
					  
						
					</form>
					</div>
					</div>
					</div>
					<div class="row">
					
					 <div class="col-sm-12"  id="income">
					 <center><h3><?php echo strtoupper($filt_class)." , ".$section;?> Marks List</h3></center>
					 <div class="table-responsive">
    <table class="table table-bordered">
    <thead>
      
   
		<?php 
		if((isset($_GET["filt_class"]))&&(isset($_GET["exam_name"]))){
			$filt_class=$_GET["filt_class"];
			$exam_name=$_GET["exam_name"];
			$section=$_GET["section"];
			
			}
		$sql_marks="select * from student_marks where present_class='".$filt_class."' and exam_name='".$exam_name."' and section='".$section."'";
		$result_marks=mysqli_query($conn,$sql_marks);
		//var_dump($sql_marks);
		
		?>
		<tr>
         <th>Sl No</th>
        <th>Firstname</th>
        <th>Roll No</th>
		<th>Exam Name</th>
		<th>Total</th>
        <th>Percentage</th>
        <th>Grade</th>
        
      </tr>
    </thead>
    <tbody>
	
	<?php 
		if($filt_class=="first standard"){ 
	
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
		
	}else if($filt_class=="second standard"){ 
	
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
		
	}else if($filt_class=="third standard"){ 
	
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
		
	}else if($filt_class=="fourth standard"){ 
	
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
		
	}else if($filt_class=="fifth standard"){ 
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
		
	}else if($filt_class=="sixth standard"){ 
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
		
	}else if($filt_class=="seventh standard"){ 
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
		
	}else if($filt_class=="eighth standard"){ 
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
		
	}else if($filt_class=="ninth standard"){ 
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

	}
	
	echo '<tr>';
	
	$row_count=1;
	foreach($result_marks as $value_marks){
		$id=$value_marks["id"];
		$total_obt_marks=$value_marks["sub1"]+$value_marks["sub2"]+$value_marks["sub3"]+$value_marks["sub4"]+$value_marks["sub5"]+$value_marks["sub6"]+$value_marks["sub7"]+$value_marks["sub8"]+$value_marks["sub9"]+$value_marks["sub10"]+$value_marks["sub11"]+$value_marks["sub12"];
		$total_perc=($total_obt_marks/600)*100;
		
	?>
	 <tr>
        <td><?php echo $row_count;?></td>
        <td><?php echo $value_marks["first_name"];?></td>
        <td><?php echo $value_marks["roll_no"];?></td>
        <td><?php echo $value_marks["exam_name"];?></td>
        <td><?php echo $total_obt_marks;?></td>
        <td><?php echo $total_perc;?></td>
        <td>
			<?php
			if(($total_perc >= 90)&&($total_perc <= 100))
				{
					echo "A+";
				}
				elseif(($total_perc >= 75)&&($total_perc <= 90))
				{
					echo "A";
				}
				elseif(($total_perc >= 60)&&($total_perc <= 75))
				{
					echo "B+";
				}
				elseif(($total_perc >= 50)&&($total_perc <= 60))
				{
					echo "B";
				}
				elseif(($total_perc >= 30)&&($total_perc <= 50))
				{
					echo "C+";
				}
				elseif(($total_perc >= 1)&&($total_perc <= 300))
				{
					echo "C";
				}
				elseif(($total_perc=="0"))
				{
					echo "---";
				}
			?>
			
			</td>
		
       
      
		
       
 
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
<?php
require("footer.php");
	}
    else
	{

	header("Location:login.php");

	}

?>			
