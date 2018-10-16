<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");

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
$sql_route="select route_name,stage_name from route_students where first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'";
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
	
	
	//////////////////////Start Fee Balance ////////////////////////////////////////////////////////////
	
	////////////////////// Start Total Fee ////////////////////////////////////////////////////////////
	$sql_fee="select * from set_fee where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";
	$result_fee=mysqli_query($conn,$sql_fee);
	foreach($result_fee as $row_fee){
		$adm_fee+=$row_fee["adm_fee"];
		
	}
	////////////////////// End Total Fee ////////////////////////////////////////////////////////////
	
	////////////////////// Start Total Fee Paid ////////////////////////////////////////////////////////////
	$sql_paid="select * from student_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";
	$result_paid=mysqli_query($conn,$sql_paid);
	foreach($result_paid as $row_paid){
		$tot_paid+=$row_paid["tot_paid"];
		
	}
	////////////////////// End Total Fee Paid ////////////////////////////////////////////////////////////
	$fee_blance=$adm_fee-$tot_paid;
	//echo $adm_fee."Adm Fee <br>";
	//echo $tot_paid." Tot paid <br> ";
	//////////////////////End Fee Balance ////////////////////////////////////////////////////////////
	
	

	$sql="select * from students where first_name='".$first_name."' and  roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
		$class=$row["present_class"];
		$section=$row["section"];
		$student_type=$row["student_type"];
		$mother_tongue=$row["mother_tongue"];
		$admission_no=$row["admission_no"];
		//$fee_blance=$row["tot_fee"]-$row["tot_paid"];
		
	?>
	<head>
		<script>
function goBack() {
    window.history.back();
}
</script>
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
	<div class="container">
	 <center><div class="panel panel-primary" style="width:80%;">
      <div class="panel-heading"><center>Student Details , Name: <?php echo $row["first_name"];?> <a href="<?php echo 'upd_register.php?id='.$row['id']; ?>" title="Edit">  <span style="color:yellow;">  Edit info <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </a></span></center>
	<div class="table-responsive"> 
	<table class="table ">
	<tr>
	<td><button onclick="goBack()" class="btn btn-default">Go Back</button> </td>
	<td>
	<a href="<?php echo 'student_fee.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Collect School Fee</span></a>
	</td>
	
	<td> <a href="<?php echo 'add_remarks.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&class='.$row['present_class'].'&section='.$row['section'];?>"><span style="color:#fff;"><i class="fa fa-check" aria-hidden="true"></i> Add Remarks</span></a></td>
		<td><a href="<?php echo 'gate_pass.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'].'&section='.$row['section'];?>"><span style="color:#fff;"><i class="fa fa-id-card-o" aria-hidden="true"></i> Issue Gate Pass</span></a></td>
	<td><a href="<?php echo 'certificates.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'];?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Certificate</span></a></td>
	
	</tr>
	<tr>
	<td> <a href="<?php echo 'selectexam.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>">  <span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Hall Ticket</span></a> </td>
	<td> <a href="<?php echo 'marks_card.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&present_class='.$row['present_class'].'&academic_year='.$row['academic_year'];?>" ><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print Marks Card</span></a> </td>
	<td>  <a href="" onclick="printDiv('income')"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print</span></a> </td>
	<td> <a href="<?php echo 'set_fee.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>"><span style="color:#fff;"> Setup Student Fee</span></a></td>
	<td><a href="<?php echo 'issue_book.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>"><span style="color:#fff;"> Issue Book</span></a></td>
	</tr>
	

	</table>
	  </div>
	  </div>
		  <div class="panel-body" id="income">
				<center>
					<?php if(($row["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?><br>
				
				 
				 <div class="table-responsive"> 
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
					<?php 
					if(($row['student_type'])!="")
					{ 
						$student_type=$row['student_type'];
					}
					else
					{
						$student_type="Normal";
					}
					
					?>
					<tbody>
					  <tr>
						<td style="width:15%;">Student Name<br>Student Type</td>
						<td style="color:blue;width:25%;"><?php echo $row['first_name']."<br>".strtoupper($student_type);?></td>
						<td style="width:15%;">Admission No</td>
						<td style="color:blue;width:25%;"><?php echo $row['admission_no'];?>
						
						
						</td>
					   
					  </tr>
					  <tr>
						<td style="width:15%;">Joined Date</td>
						<td style="color:blue;width:25%;"><?php echo $join_date;?></td>
						<td style="width:15%;">Blood Group</td>
						<td style="color:blue;width:25%;"><?php echo $row['blood'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Gender</td>
						<td style="color:blue;width:25%;"><?php echo $row['sex'];?></td>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $dob;?></td>
						
					  </tr>
					   <tr>
						<td style="width:15%;">STS No</td>
						<td style="color:blue;width:25%;"><?php echo $row['roll_no'];?></td>
						<td style="width:15%;">Caste<br>Mother Tongue</td>
						<td style="color:blue;width:25%;"><?php echo $row['caste'];?><br><?php echo $row['mother_tongue'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['village']."<br>".$row['taluk']." ".$row['district']." ".$row['address'];?></td>
						<td style="width:15%;">Mobile</td>
						<td style="color:blue;width:25%;"><?php echo $row['parent_contact'];?></td>
						
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Class & Section</td>
						<td style="color:blue;width:25%;"><?php echo $row['present_class']." , ".$section;?></td>
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
						<td style="width:15%;">School Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $fee_blance;?></td>
						<td style="width:15%;">Van Fee Balance</td>
						<td style="color:blue;width:25%;"><?php echo $van_fee_blance;?></td>
						
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
$sql_tot="select att_date,first_name,roll_no,present_class,sum(att_count) as tot_att_count,present_class from attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."' group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			
			$first_name=$row_tot["first_name"];
			$roll_no=$row_tot["roll_no"];
			$present_class=$row_tot["present_class"];
			
		}	
				
		
		$sql_tot_att="select distinct att_date,present_class,sum(tot_class) as tot_class from attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}

?>
<div class="row">
        <hr><div class="col-sm-12">
		 <h3 style="font-weight:bold;color:GREEN;">ATTENDANCE DETAILS</h3>
		  <div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class Attended</th>
				<th>Total Class</th>
				<th>Percentage (%)</th>
				<th>Action</th>
				
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
				<td>
				 <div class="btn-group">
				<a href="<?php echo 'edit_attendance.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				
				<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div>
				 
				 </td>

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_attendance.php?id='+id+'';
					  }
				  }
				  
				  </script>
				
				</tr>
				
	<?php
				
	$row_count_att++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>

<!------------------------------------------------------End of Attendance details-------------------------------------------------->
	<!--------------------------------------------------Start of student Remarks--------------------------------------------------------->
		  <?php
		
					$sql_remarks="select * from remarks where first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."' order by id desc";
					$result_remarks=mysqli_query($conn,$sql_remarks);
					  ?>
					     <div class="row">
        <div class="col-sm-12">
			 <hr><div class="table-responsive"> 
			 <h3 style="font-weight:bold;color:BLUE;">STUDENT REMARKS</h3>
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
					  <th>Action</th>
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
					  <td><div class="btn-group">
						<a href="<?php echo 'edit_remarks.php?id='.$remarks['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
						<a href="<?php echo 'delete_remarks.php?id='.$remarks['id'].'&first_name='.$first_name.'&roll_no='.$roll_no; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
					   </div></td>
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
					  				  
					  
					  
		 
		<!---------------Start of Individual Fee paid details----------------------->
		  <hr><h3 style="font-weight:bold;color:red;">INDIVIDUAL FEE DETAILS</h3>
			
		   <?php 
		   
	  $sql_ind_all_fee="select * from set_fee where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
		$result_ind_all_fee=mysqli_query($conn,$sql_ind_all_fee);
		foreach($result_ind_all_fee as $row_all_ind_fee)
		{
		$total_adm_fee+=$row_all_ind_fee["adm_fee"];	
		}
		   ?>
		   <div class="row">
           <div class="col-sm-12">
		   <center>
		   <span style="color:red;font-weight:bold;font-size:16px;">All Student Fee : <?php echo $total_adm_fee;?></span>,
		   </center>
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<?php 
				if((mysqli_num_rows($result_ind_all_fee))==0){
				echo "<tr>No Fee details to display</tr>"; 
				}
				else if((mysqli_num_rows($result_ind_all_fee))>0)
				{
				
				?>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Fee Amount</th>
				<th>Fee Towards</th>
				<th>Updated Date</th>
				<th>Action</th>
				
				</tr>
	<?php
	 $row_ind_count_fee=1;
	
	foreach($result_ind_all_fee as $row_all_ind_fee)
	{
	$updated_ind_date= date('d-m-Y', strtotime( $row_all_ind_fee['updated_date'] ));
	?>
		<tr>
		<td style="text-align:center;"><?php echo $row_ind_count_fee;?></td>
		<td style="text-align:center;"><?php echo $row_all_ind_fee["first_name"];?></td>
		<td style="text-align:center;"><?php echo $row_all_ind_fee["roll_no"];?></td>
		<td style="text-align:center;"><?php echo $row_all_ind_fee["adm_fee"];?></td>
		<td style="text-align:center;"><?php echo $row_all_ind_fee["fee_towards"];?></td>
		<td style="text-align:center;"><?php echo $updated_ind_date;?></td>
		<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_set_fee.php?id='.$row_all_ind_fee['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_sett_fee.php?id='.$row_all_ind_fee['id'].'&first_name='.$row['first_name'].'&roll_no='.$row['roll_no'].'&class='.$row['present_class']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
		
		</tr>
				
	<?php
				
	$row_ind_count_fee++; 
	}
	}
	
	?>
	</tbody>
	</table></center>
	</div>
	</div>
	</div>
	</div>
		
		<!--------------------------------End of Individual Fee paid details--------------------------------------->
		<!------------------------------------------------------Start Fee paid details-------------------------------------------------------->
		    <hr><h3 style="font-weight:bold;color:GREEN;">FEE PAID DETAILS</h3>
			
		   <?php 
		  
		   $sql_set_fee="select sum(tot_paid) as total_paid,name,roll_no,rec_date,rec_no from student_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
		   //var_dump($sql_ind_fee);
		   $result_set_fee=mysqli_query($conn,$sql_set_fee);
		    $row_count_fee =1;
			foreach($result_set_fee as $row_set_fee)
			{
				$tot_paid= $row_set_fee["total_paid"];
				//echo "<br> ".$tot_paid."<br>";
				
			}
		   ?>
		  <div class="row">
        <div class="col-sm-12">
		 <center>
		   <span style="color:green;font-weight:bold;font-size:16px;">Total Fee Paid : <?php echo $tot_paid;?></span>,
		   </center>
		         <?php 
			$sql_ind_fee="select * from student_fee where name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."' ORDER BY id desc";
			$result_ind_fee=mysqli_query($conn,$sql_ind_fee);
			$row_count_fee =1;
			if(mysqli_num_rows($result_ind_fee)==0){
			echo "<tr>No Fee paid details to display</tr>"; 
			}
			else
			{
			?>
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Amount</th>
				<th>Action</th>
			</tr>
	<?php
	foreach($result_ind_fee as $row_tot_ind_fee)
	{
	$rec_date= date('d-m-Y', strtotime( $row_tot_ind_fee['rec_date'] ));
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count_fee;?></td>
				<td style="text-align:center;"><?php echo $row_tot_ind_fee["name"];?></td>
				<td style="text-align:center;"><?php echo $row_tot_ind_fee["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $rec_date;?></td>
				<td style="text-align:center;"><?php echo $row_tot_ind_fee["rec_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot_ind_fee["tot_paid"];?></td>
				<td>
				 <div class="btn-group">
				<a href="<?php echo 'edit_student_fee.php?id='.$row_tot_ind_fee['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
				<a href="#" onclick="deleteme(<?php echo $row_tot_ind_fee['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
			   </div>
				 
				 </td>
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_student_fee.php?id='+id+'';
					  }
				  }
				  
				  </script>
				</tr>
				
	<?php
				
	$row_count_fee++; 
	}
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>
		
		<!----------------------Start of Book Issued details------------->
	
		  <div class="row">
        <div class="col-sm-12">
	
	   <center>
	   <div class="table-responsive">
	   <h4>Library Details</h4>
		<table class="table table-bordered" style="width: 95%; ">
        <tbody>
		<tr>
		<td style="width: 10%; "><span style="font-weight: bold;">SL No</span></td>
		<td style="width: 15%; "><span style="font-weight: bold;">Borrower Name</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Borrower ID</span></td>
		
		<td style="width: 19%; "><span style="font-weight: bold;">Book Name</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Book ID</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Issued Date</span></td>
		
		<td style="width: 14%; "><span style="font-weight: bold;">Returned Date</span></td>
		<td></td>
		</tr>
		<?php
	
		$sql_book="select * from library where academic_year='".$cur_academic_year."' and bor_name='".$first_name."' and bor_id='".$roll_no."' and recie_date='0000-00-00' ORDER BY id DESC";
		
		$result_book=mysqli_query($conn,$sql_book);
		$row_count = 1;
		$total_books=mysqli_num_rows($result_book);
		foreach($result_book as $value_book)
		{
		
		$recie_date=$value_book["recie_date"];	
		$iss_date= date('d-m-Y', strtotime( $value_book['iss_date'] ));
		$rec_date= date('d-m-Y', strtotime( $value_book['recie_date'] ));
			
			
		?>
		<tr>
		
		
		
		<td style="width: 10%; "><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td style="width: 15%; "><span style="color: #207FA2; "><?php echo $value_book["bor_name"];?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php echo $value_book["bor_id"];?></span></td>
		
		<td style="width: 19%; "><span style="color: #207FA2; "><?php echo $value_book["book_name"];?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php echo $value_book["book_id"];?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php echo $iss_date;?></span></td>
		
		<td style="width: 14%; "><span style="color: #207FA2; "><?php if(($recie_date)=='0000-00-00'){ echo '<span style="color: red;">Not yet returned</span>';}else{ echo $rec_date;}?></span><br></td>
		<td>
		  <a href="<?php echo 'receive_books.php?id='.$value_book['id']; ?>" title="Edit"><button type="button" class="btn btn-success">Collect Book</button></a>
		</td>
		</tr>
		
		<?php
		$row_count++;
		}
		?>
		
		
		</tbody>
		
		</table>
		</div>
		</center>
    </div>
	
    </div>
    </div>
    </div>
		<!----------------------End of Book Issued details------------->
		
		
		</div>
		
		</center>

<?php
			
}
else
{
header("Location:login.php");
}
?>  	