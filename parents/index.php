<?php
session_start();
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))
{
$cur_academic_year=$_SESSION['academic_year'];
$present_class=$_SESSION['parents_class'];
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];
require("header.php");
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
$today_md=date('m-d');
error_reporting("0");

$sql_section="select section,academic_year from students where first_name='".$first_name."' and present_class='".$present_class."'  and roll_no='".$roll_no."'";
$result_section = mysqli_query($conn, $sql_section);
if($row_section=mysqli_fetch_array($result_section,MYSQLI_ASSOC))
{
    $section = $row_section["section"];
    $academic_year = $row_section["academic_year"];
}


$sqltest = "SELECT  id FROM notifications WHERE  NOT EXISTS (SELECT notification_id,member_name,roll_no FROM opened_notifications WHERE notifications.id = opened_notifications.notification_id and opened_notifications.member_name='".$first_name."' and opened_notifications.roll_no = '" . $roll_no . "') and (present_class='".$present_class."' or present_class='all') and section='".$section."'";


//$sqltest = "SELECT * FROM notifications where notifi_date>DATE_SUB(notifi_date, INTERVAL 3 DAY) and (present_class='".$present_class."' or present_class='all') and section='".$section."' and academic_year='".$academic_year."'";

//var_dump($sqltest);
$resulttest = mysqli_query($conn, $sqltest);
$notification_count = mysqli_num_rows($resulttest);





$sql_assign="select * from assign where academic_year='".$cur_academic_year."' and class='".$present_class."' and section='".$section."'  and date_posted <= DATE_ADD(date_posted, INTERVAL 7 DAY)";
             
$result_assign=mysqli_query($conn,$sql_assign);
$assign_count = mysqli_num_rows($result_assign);


$sql_contact="select * from reply_messages where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and admission_no='".$roll_no."'  and rep_viewed=''";
             
$result_contact=mysqli_query($conn,$sql_contact);
$contact_count = mysqli_num_rows($result_contact);

?>

<div id="page-wrapper"><br>
<div class="container-fluid">


                <div class="row">
                <div class="col-md-12"><br>
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <?php
                        $sql="select * from events where evt_date > now() ORDER BY id DESC LIMIT 5";	
	
                        $result_evt=mysqli_query($conn,$sql);
                        foreach ($result_evt as $evt) {
                            $evt_date = date('d-m-Y', strtotime($evt['evt_date']));
                        ?>
                            <a href="<?php echo 'upcoming_events.php?id=' . $evt['id']; ?>"><span style="font-size:16px;color:red;"><?php echo $evt["evt_name"]; ?> <?php echo $evt_date; ?> </span></a>&nbsp;<span class="badge badge-success" style="background-color:#28a745;"> Upcoming Events</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                        }
                        ?>
                    </marquee>
                </div>
                </div>

				<!-- //////////////////////.row /////////////////////////////////////////////-->
                <div class="row">


                <div class="col-md-3">
				<div class="panel panel-blue">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-comments fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div> <?php if ($notification_count > 0) { ?><span class="w3-badge w3-yellow">New</span><?php } ?> Notice Board </div>
								<div class="huge"><span class="w3-badge w3-red"><?php if ($notification_count > 0) {
                                    echo $notification_count;
                                } ?></span></div>
							</div>
						</div>
					</div>
					<a href="notifications.php">
						<div class="panel-footer">
							<span class="pull-left">View Details</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
            </div>


            <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
								<div> <?php if ($assign_count > 0) { ?><span class="badge badge-success" style="background-color:yellow;color:#000;">Latest</span><?php } ?> Home Work </div>
								<div class="huge"><span class="w3-badge w3-red"><?php if ($assign_count > 0) {
                                    echo $assign_count;
                                } ?></span></div>
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
            

                    <?php
                    $today_date = date("Y-m-d");
                    $sql_status="select * from leave_appli where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and admission_no='".$roll_no."'  and from_date > '".$today_date."' order by id desc limit 1";
                    
                    $result_status=mysqli_query($conn,$sql_status);
                    $leave_pending = mysqli_num_rows($result_status);
                    if($row_leave=mysqli_fetch_array($result_status,MYSQLI_ASSOC))
                    {
                        $leave_status = $row_leave["leave_status"];
                    // echo $leave_status;
                    

                        if($leave_status == "approved"){
                            $badge = '<span class="badge badge-success" style="background-color:#28a745;"> Approved</span>';
                        }else if($leave_status == "rejected"){
                            $badge = '<span class="badge badge-danger" style="background-color:#dc3545;"> Rejected</span>';
                        }else if($leave_status == ""){
                            $badge = '<span class="badge badge-default" style="background-color:yellow; color:#000;"> Pending</span>';
                        }
                    }
                    ?>

				
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
								<div> <?php  echo $badge; ?> Leave Letter Status </div>
								<div class="huge"><span class="w3-badge w3-red"><?php if ($leave_pending > 0) {
                                    echo $leave_pending;
                                } ?></span></div>
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
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
								<div> <?php if ($contact_count > 0) { ?><span class="w3-badge w3-yellow">New</span><?php } ?> Contact Reply </div>
								<div class="huge"><span class="w3-badge w3-red"><?php if ($contact_count > 0) {
                                    echo $contact_count;
                                } ?></span></div>
							</div>
                                </div>
                            </div>
                            <a href="contact_reply.php">
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
                        <div class="panel panel-blue">
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
                        <div class="panel panel-red">
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
					
					
					$sql_status="select * from request_study where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and admission_no='".$roll_no."' and status='approved' and ready_date>='".$today_date."'";
					$result_status=mysqli_query($conn,$sql_status);
					$req_study = mysqli_num_rows($result_status);	
					
					
					$sql_leave="select * from leave_reply where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and roll_no='".$roll_no."'";
					$result_leave=mysqli_query($conn,$sql_leave);
					$leave_reply = mysqli_num_rows($result_leave);	
					
					?>
                  
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-print fa-5x"></i>
                                    </div>
                                  
                                       <div class="col-xs-9 text-right">
								<div> <?php if ($req_study > 0) { ?><span class="w3-badge w3-blue">New</span><?php } ?> Request Certificate</div>
								<div class="huge"><span class="w3-badge w3-red"><?php if ($req_study > 0) {
                                    echo $req_study;
                                } ?></span></div>
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
				

		
                <!-- /.row -->
	<div class="row">
        
    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
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
	<div class="col-sm-3">
    <div class="panel panel-red">
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
	<div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
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
	<div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
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
    
        
    <div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                <i class="fa fa-user fa-5x"></i>
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
   <div class="row">
<div class="col-sm-6">
	<div class="panel panel-blue">
		<div class="panel-heading">
		   <h4>Latest Upcoming Events</h4>
		</div>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tr>
		<th>SL No</th>
		<th>Event Name</th>
		<th>Date</th>
		
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
    $evt_date= date('d-m-Y', strtotime( $row['evt_date'] ));
	?>
     <tr>
		<td><?php echo $row_count;?></td>
		<td><a href="upcoming_events.php"><?php echo $row["evt_name"];?> <span class="badge badge-success" style="background-color:#28a745;"> Upcoming</span></a></td>
		
		<td><?php echo $evt_date;?></td>
		
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
			<div class="col-sm-6">
				<div class="panel panel-blue">
					<div class="panel-heading">
						<h4>Upcoming Holidays</h4>
					</div>
					<div class="table-responsive">
					<table class="table table-bordered">
		<tr>
		<th>SL No</th>
		<th>Holiday</th>
		<th>Date</th>
	
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
        $ho_date= date('d-m-Y', strtotime( $row_holi['ho_date'] ));
	 ?>
    <tr>
		<td><?php echo $row_count;?></td>
		<td><a href="upcoming_holidays.php"><?php echo $row_holi["ho_name"];?> <span class="badge badge-success" style="background-color:orange;"> Upcoming</span></a></td>
		
		<td><?php echo $ho_date;?></td>
		
		
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