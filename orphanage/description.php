<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");

//////////////////////////////////////Start of Searched variables /////////////////////////////////////////////////
if(isset($_GET["search_student"])){
	$searched=$_GET["typeahead"];
	
	$searched_array=explode(",",$searched);
	$first_name=$searched_array[0];
	$present_class=$searched_array[1];
	$roll_no=$searched_array[2];
	
}else{
////////////////////////////////////// End of Searched variables ///////////////////////////////////////////////////
$first_name=$_GET["first_name"];
$roll_no=$_GET["roll_no"];
}	
$sql_route="select route_name,stage_name from route_students where first_name='".$first_name."' and roll_no='".$roll_no."'";
//var_dump($sql_route);
$result_route=mysqli_query($conn,$sql_route);
if($row_route=mysqli_fetch_array($result_route,MYSQLI_ASSOC))
	{
	$route_name=$row_route["route_name"];
	$stage_name=$row_route["stage_name"];
	}else{
	$route_name="";
	$stage_name="";
	}

	$sql="select * from orph_students where first_name='".$first_name."' and  roll_no='".$roll_no."'";
	
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
		$class=$row["present_class"];
		$fee_blance=$row["tot_fee"]-$row["tot_paid"];
		$adm_fee_blance=$row["tot_admis_fee"]-$row["tot_admis_paid"];
		$cca_fee_blance=$row["tot_cca_fee"]-$row["tot_cca_paid"];
		$van_fee_blance=$row["tot_van_fee"]-$row["tot_van_paid"];
		$books_fee_blance=$row["tot_books_fee"]-$row["tot_books_paid"];
		$uniform_fee_blance=$row["tot_uniform_fee"]-$row["tot_uniform_paid"];
		$shoe_fee_blance=$row["tot_shoe_fee"]-$row["tot_shoe_paid"];
		$software_fee_blance=$row["tot_software_fee"]-$row["tot_software_paid"];
	
	
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
	<br>
	 <center><div class="panel panel-primary" style="width:80%;">
      <div class="panel-heading"><center>Student Details , Name: <?php echo $row["first_name"];?></center>
	 
	<table class="table ">
	<tr>
	<td> <a href="" onclick="goBack()"><span style="color:#fff;"><i class="fa fa-backward" aria-hidden="true"></i> Go Back</span></a></td>
	
	
	<td> <a href="<?php echo 'add_remarks.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&class='.$row['present_class'].'&section='.$row['section'];?>"><span style="color:#fff;"><i class="fa fa-check" aria-hidden="true"></i> Add Remarks</span></a></td>
	<td><a href="<?php echo 'certificates.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'];?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Certificate</span></a></td>
	
	</tr>
	
	</table>
	  </div>
		  <div class="panel-body" id="income">
				<center>
					<?php if(($row["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?><br>
				
				 
				 <div class="table-responsive"> 
				<table class="table table-bordered table-hover table-striped" style="width:90%;">

					<tbody>
					  <tr>
						<td style="width:15%;">Student Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['first_name'];?></td>
						<td style="width:15%;">Enrollment No</td>
						<td style="color:blue;width:25%;"><?php echo $row['admission_no'];?></td>
					   
					  </tr>
					  <tr>
						<td style="width:15%;">Joined Date</td>
						<td style="color:blue;width:25%;"><?php echo $row['join_date'];?></td>
						<td style="width:15%;">Blood Group</td>
						<td style="color:blue;width:25%;"><?php echo $row['blood'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Gender</td>
						<td style="color:blue;width:25%;"><?php echo $row['sex'];?></td>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $row['dob'];?></td>
						
					  </tr>
					   <tr>
						<td style="width:15%;">Admission No</td>
						<td style="color:blue;width:25%;"><?php echo $row['rollno'];?></td>
						<td style="width:15%;"></td>
						<td style="color:blue;width:25%;"></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['village']."<br>".$row['taluk']." ".$row['district']." ".$row['address'];?></td>
						<td style="width:15%;">Mobile</td>
						<td style="color:blue;width:25%;"><?php echo $row['parent_contact'];?></td>
						
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Class</td>
						<td style="color:blue;width:25%;"><?php echo $row['present_class'];?></td>
						<td style="width:15%;">Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['adhaar_no'];?></td>
						
					  </tr>
					 
					  
					  <tr>
						<td style="width:15%;">Fahter Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['father_name'];?></td>
						<td style="width:15%;">Mother Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['mother_name'];?></td>
						
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Route Name</td>
						<td style="color:blue;width:25%;"><?php echo $route_name;?></td>
						<td style="width:15%;">Stage Name</td>
						<td style="width:15%;color:blue;"><?php echo $stage_name;?></td>
					 </tr>
					 
					</tbody>
				  </table> 
				  </div>
				  
				  </center>
				  
				   
<!------------------------------------------------------Start Attendance details------------------------------------------------->
<?php 
	}
$sql_tot="select att_date,first_name,roll_no,present_class,sum(att_count) as tot_att_count,present_class from orph_attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."' group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			
			$first_name=$row_tot["first_name"];
			$roll_no=$row_tot["roll_no"];
			$present_class=$row_tot["present_class"];
			
		}	
				
		
		$sql_tot_att="select distinct att_date,present_class,sum(tot_class) as tot_class from orph_attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."'  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}

?>
<div class="row">
        <hr><div class="col-sm-12">
		 <h3>Attendance Details</h3>
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class Attended</th>
				<th>Total Class</th>
				<th>Percentage (%)</th>
				
				
				<?php
				if(isset($_GET['delete']))
				{
				?>
				<th>Delete</th>
				<?php
				}
				?>
				
				</tr>
	<?php
	$row_count_att=1;
	foreach($result_tot as $row_tot)
	{
	//$att_date= date('d-m-Y', strtotime( $row['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	$per_tot_class=($row_tot["tot_att_count"]/$tot_class)*100;
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count_att;?></td>
				<td style="text-align:center;"><a href="<?php echo 'attendance_desc.php?name='.$row_tot["first_name"].'&roll_no='.$row_tot["roll_no"].'&present_class='.$row_tot["present_class"];?>"><?php echo $row_tot["first_name"];?></a></td>
				<td style="text-align:center;"><?php echo $row_tot["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["tot_att_count"];?></td>
				<td style="text-align:center;"><?php echo $tot_class;?></td>
				<td style="text-align:center;"><?php echo $per_tot_class;?></td>
				<?php
				
				if(isset($_GET['delete']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>
			
				<?php 
					}
				?>
				
				</tr>
				
	<?php
				
	$row_count_att++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>

<!------------------------------------------------------End of Attendance details-------------------------------------------------->
	<!--------------------------------------------------Start of student Remarks--------------------------------------------------------->
		  <?php
		
					$sql_remarks="select * from remarks where first_name='".$first_name."' and roll_no='".$roll_no."' order by id desc";
					$result_remarks=mysqli_query($conn,$sql_remarks);
					  ?>
					     <div class="row">
        <div class="col-sm-12">
			 <hr><div class="table-responsive"> 
			 <h3>Student Remarks</h3>
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
                       <?php 
					  if(mysqli_num_rows($result_remarks)==0){
						echo "<tr>No Remarks to display</tr>"; 
					  }else{
					?>
					  <tr> 
					  <th>SL No</th>
					  <th>Remarks Title</th>
					  <th>Details</th>
					  <th>Added Date</th>
					  </tr>
					  
					  <?php 
					  
					  $row_count=1;
					  foreach($result_remarks as $remarks){
						  $remarks_date= date('d-m-Y', strtotime( $remarks['remarks_date'] ));
					?>
					 <tr> 
					  <td><?php echo $row_count;?></td>
					  <td><?php echo $remarks["remarks_title"];?></td>
					  <td><?php echo $remarks["remarks_desc"];?></td>
					  <td><?php echo $remarks_date;?></td>
					  </tr>
					
					<?php
					$row_count++;
					  }
					  }
					 
					  
					  ?>
					 
		
					  </table>
					  </div>
					  </div>
					  </div>
					  				  

				</tbody>
				</table></center>
				
				</div>
				</div>
		<!--------------------------------------------------End Fee paid details----------------------------------------------------------->
		
		
		</div>
		</div>
		</center>

<?php
			
}
else
{
header("Location:login.php");
}
?>  	