<?php
session_start();
//if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))
{
$cur_academic_year=$_SESSION['academic_year'];
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];
require("header.php");
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
$today_md=date('m-d');
error_reporting("0");
?>

<div id="page-wrapper"><br>
<div class="container-fluid">
 

				<!-- //////////////////////.row /////////////////////////////////////////////-->
                <div class="row">
				<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary" style="background:red;">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bar-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									    <div>Student Attendance</div>
                                       </div>
                                </div>
                            </div>
                            <a href="attendance_desc.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
				
				
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>SMS Notifications</div>  
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="mes_report.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					<?php 
					$sql_count="select id,first_name,roll_no,present_class,class_stream,class_join,village,dob,join_date,photo_name,photo_path,photo_type from students where DATE_FORMAT(dob,'%m-%d')='".$today_md."'";
	                $result_count=mysqli_query($conn,$sql_count);
	                $total_students=mysqli_num_rows($result_count);
					
					
					$sql_status="select * from request_study where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and admission_no='".$roll_no."'";
					$result_status=mysqli_query($conn,$sql_status);
					$req_study = mysqli_num_rows($result_status);	
					
					
					$sql_leave="select * from leave_reply where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and roll_no='".$roll_no."'";
					$result_leave=mysqli_query($conn,$sql_leave);
					$leave_reply = mysqli_num_rows($result_leave);	
					
					?>
                  
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-print fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									    <div>Request Certificate</div>
										<div class="huge"><?php echo $req_study;?></div> 
                                       </div>
                                </div>
                            </div>
                            <a href="request_study.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                  
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									    <div>Exam Timetable</div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <a href="shw_exam_timetable.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
			
                <!-- /.row -->
                <div class="row">
				<div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-print fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									    <div>Apply Leave</div>
										<div class="huge"><?php echo $leave_reply;?></div> 
                                       </div>
                                </div>
                            </div>
                            <a href="apply_leave.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
				
				
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Contact School</div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="cont_school.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Assignments & Homeworks</div>
                                       
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="assignments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									    <div>Timetable</div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <a href="shw_timetable.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->	
				
<div class="row">
<div class="col-sm-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
		   <h4>Latest Upcoming Events</h4>
		</div>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tr>
		<th>SL No</th>
		<th>Event Name</th>
		<th>Date</th>
		<th>Time</th>
		<th>Venue</th>
		</tr>
	<?php
			
	$sql="select * from events where evt_date > now() ORDER BY id DESC LIMIT 5";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
	 $rowcount_evt=mysqli_num_rows($result);
	 if($rowcount_evt>=1)
	 {
    
	foreach($result as $row)
	{
	?>
     <tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row["evt_name"];?></td>
		
		<td><?php echo $row["evt_date"];?></td>
		<td><?php echo $row["evt_time"];?></td>
		<td><?php echo $row["evt_venue"];?></td>
		
		
		</tr>
		
		<?php $row_count++; 
	}
	}else{
			echo "<tr><td colspan='4'><p style='color:red;'>There are no Events to display</p></td></tr>";
		}
	?>
	</table>
		</div>
		</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Upcoming Holidays</h4>
					</div>
					<div class="table-responsive">
					<table class="table table-bordered">
		<tr>
		<th>SL No</th>
		<th>Holiday</th>
		<th>Date</th>
		<th>Details</th>
		</tr>
	<?php
			
	$sql_holi="select * from holiday where ho_date > now() ORDER BY id DESC LIMIT 3";	
	
	$result_holi=mysqli_query($conn,$sql_holi);
	$row_count =1;
	$total_holi=mysqli_num_rows($result_holi);
     $rowcount_ho=mysqli_num_rows($result_holi);
	 if($rowcount_ho>=1)
	 {
	foreach($result_holi as $row_holi)
	{
	 ?>
    <tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row_holi["ho_name"];?></td>
		
		<td><?php echo $row_holi["ho_date"];?></td>
		
		<td><?php echo $row_holi["ho_details"];?></td>
		
		
		</tr>
		
		
		<?php $row_count++; 
		}
		}else{
			echo "<tr><td colspan='4'><p style='color:red;'>There are no Holidays to display</p></td></tr>";
		}
	
	?>
	</table>
</div>
</div>
</div>

<?php
ob_start();
$first_name=$_SESSION["parents_uname"];
$admission_no=$_SESSION["parents_pass"];
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");
$sql_fee="select sum(adm_fee) as admission_fee from student_fee where name='".$first_name."' and roll_no='".$admission_no."' and academic_year='".$cur_academic_year."'";
$result_fee=mysqli_query($conn,$sql_fee);
if(mysqli_num_rows($result_fee)>0){
if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		
		$admission_fee=$row_fee["admission_fee"];
	}
	}else{
		$admission_fee="";
	}
$sql_adm_fee="select sum(adm_fee) as admission_fee from student_adm_fee where name='".$first_name."' and roll_no='".$admission_no."' and academic_year='".$cur_academic_year."'";
$result_adm_fee=mysqli_query($conn,$sql_adm_fee);
if($row_adm_fee=mysqli_fetch_array($result_adm_fee,MYSQLI_ASSOC))
	{
		
		$admission_adm_fee=$row_adm_fee["admission_fee"];
	}
$sql_cca_fee="select sum(adm_fee) as admission_fee from student_cca_fee where name='".$first_name."' and roll_no='".$admission_no."' and academic_year='".$cur_academic_year."'";
$result_cca_fee=mysqli_query($conn,$sql_cca_fee);
if($row_cca_fee=mysqli_fetch_array($result_cca_fee,MYSQLI_ASSOC))
	{
		
		$admission_cca_fee=$row_cca_fee["admission_fee"];
	}
?>

                   
				   <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									<i class="fa fa-print fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Hall Ticket</div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="select_exam.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
		       </div>
		
                <!-- /.row -->
	<div class="row">			
	<?php 
	$sql="select student_type from students where first_name='".$first_name."' and  roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		
		$student_type=$row["student_type"];
	}
	
	
	
	if($student_type==""){
	?>
	<div class="col-sm-4">
						<div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									
                                        <i class="fa fa-fw fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>School Fee Details</div>
                                        <div class="huge"><?php echo $admission_fee;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="indi_paid_det.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
			      </div>
	<?php	
	}else if($student_type=="rte"){
	?>
	<div class="col-lg-4 col-md-6">
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									
                                        <i class="fa fa-fw fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Admission Fee</div>
                                        <div class="huge"><?php echo $admission_adm_fee;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="indi_adm_paid_det.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
	<?php	
	}else if($student_type=="staff children"){
	?>
	
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									
                                        <i class="fa fa-fw fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Staff Chidren Fee</div>
                                        <div class="huge"><?php echo $admission_cca_fee;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="indi_cca_paid_det.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
	<?php	
	}
	?>
   
                </div>
                <!-- /.row -->		
				
				
		
				
               
                <!-- /.row /////////////////////////////////////////////////////////////////////////////////////-->
				
				<div class="row">

</div>
  
  
   
</div>

</div>


	<?php
///--------------------------------End of Birthday SMS ------------------------------------------------------/////
	
	}
	else
	{
		header("Location:login.php");
	}
	

?>