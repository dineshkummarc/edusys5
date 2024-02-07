<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id'])) 
{
require("header.php");
$student_id=$_SESSION['student_id'];
$present_class=$_SESSION['parents_class'];
$cur_academic_year = $_SESSION['academic_year'];
$today_date = date("Y-m-d");
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];

require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
$today_md=date('m-d');
error_reporting("0");

$sql_section="select section,academic_year from students where id='".$student_id."'";
$result_section = mysqli_query($conn, $sql_section);
if($row_section=mysqli_fetch_array($result_section,MYSQLI_ASSOC))
{
    $section = $row_section["section"];
    $academic_year = $row_section["academic_year"];
}


$sqltest = "SELECT  id FROM notifications WHERE  NOT EXISTS (SELECT notification_id FROM opened_notifications WHERE notifications.id = opened_notifications.notification_id and opened_notifications.student_id='".$student_id."') and (present_class='".$present_class."' or present_class='all') and section='".$section."'";

$resulttest = mysqli_query($conn, $sqltest);
$notification_count = mysqli_num_rows($resulttest);


$sqlassign = "SELECT  id FROM assign WHERE  NOT EXISTS (SELECT homework_id FROM opened_homework WHERE assign.id = opened_homework.homework_id and opened_homework.student_id='".$student_id."') and (class='".$present_class."' or class='all') and section='".$section."'";

$resultassign = mysqli_query($conn, $sqlassign);
$assign_count = mysqli_num_rows($resultassign);




/*
$sql_assign="select * from assign where academic_year='".$cur_academic_year."' and class='".$present_class."' and section='".$section."'  and date_posted <= DATE_ADD(date_posted, INTERVAL 7 DAY)";
             
$result_assign=mysqli_query($conn,$sql_assign);
$assign_count = mysqli_num_rows($result_assign);
*/

$sql_contact="select * from reply_messages where academic_year='".$cur_academic_year."' and student_id='".$student_id."'  and rep_viewed=''";
             
$result_contact=mysqli_query($conn,$sql_contact);
$contact_count = mysqli_num_rows($result_contact);

$sql_evt = "select * from events where evt_date > now()  ORDER BY id DESC LIMIT 5";

$result_evt = mysqli_query($conn, $sql_evt);
$row_count = 1;
$total_events = mysqli_num_rows($result_evt);
$rowcount_evt = mysqli_num_rows($result_evt);

$sql_holi="select * from holiday where ho_date >= '".$today_date."' ORDER BY id DESC LIMIT 3";
$result_holi=mysqli_query($conn,$sql_holi);
$rowcount_holiday = mysqli_num_rows($result_holi);

$sql_indi_noti="select * from individual_notifications where academic_year='".$cur_academic_year."' and student_id='".$student_id."'  and indi_viewed='False'";
$result_indi_noti=mysqli_query($conn,$sql_indi_noti);
$rowcount_indi_noti = mysqli_num_rows($result_indi_noti);

?>


<div class="container-fluid">
    <?php
    if($rowcount_holiday>0){ 
?>
<div class="row">
		<div class="col-md-12">
		<p id="blink_parents">
		<span style="font-weight:bold;">Holidays: </span>
		
			<?php
			foreach ($result_holi as $holiday) {
				$holiday_date = date('d-m-Y', strtotime($holiday['ho_date']));
			?>
			<a href="<?php echo 'holiday_description.php?id=' . $holiday['id']; ?>"><span
							style="font-size:16px;color:red;"><?php echo $holiday["ho_name"]; ?>
							<?php echo $holiday_date; ?> </span></a> ---
			<?php
}
?>
</p>
		</div>
</div>

<?php 
}
if($total_events>0){ 

?>

    <div class="row" style="background-color:#3172c5;padding: 10px;">
		<div class="col-md-12">
		<marquee behavior="scroll" direction="left" onmouseover="this.stop();"
						onmouseout="this.start();">
			<?php
			foreach ($result_evt as $evt) {
				$evt_date = date('d-m-Y', strtotime($evt['evt_date']));
			?>
			<a href="<?php echo 'evt_description.php?id=' . $evt['id']; ?>"><span
							style="font-size:16px;color:white;"><?php echo $evt["evt_name"]; ?>
							<?php echo $evt_date; ?> </span></a>&nbsp;<span class="badge badge-success"
					style="background-color:#fee00c;color:red;"> Upcoming
					Events</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
            }
            ?>
            </marquee>
            </div>
            </div><br>
        <?php 
        } 
        $sql_id_cards="select * from student_id_cards where  student_id='".$student_id."'";
        $result_id_cards=mysqli_query($conn,$sql_id_cards);
        if($row_id_cards=mysqli_fetch_array($result_id_cards,MYSQLI_ASSOC))
	    {
            $student_id_path = $row_id_cards["photo_path"];
        }
        
      
      ?>

<div class="row">
	<div class="col-md-12">
	<a href="individual_notifications.php"><button type="button" class="btn btn-primary">
    Messages <span class="badge badge-danger" style="background-color:yellow;color:red;font-size:14px;"><?php echo $rowcount_indi_noti;?></span></button></a>

    <a href="../school/<?php echo $student_id_path;?>" class="btn btn-success" ><i class="fa fa-user" title="My ID Card" aria-hidden="true"></i> My ID Card</a>
                  
    <a href="logout.php" class="btn btn-danger" ><i class="fa fa-power-off" aria-hidden="true" title="Logout"></i> </a>
	</div>
</div>
<br>

				<!-- //////////////////////.row /////////////////////////////////////////////-->
                <div class="row">
                
                

                <div class="col-md-3">
				<div class="panel panel-blue">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-comments fa-3x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div> <?php if ($notification_count > 0) { ?><span class="w3-badge w3-yellow" >New</span><?php } ?> Notice Board </div>
								<div class="huge"><span class="w3-badge w3-red" ><?php if ($notification_count > 0) {
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
                                        <i class="fa fa-file-text fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
								<div> <?php if ($assign_count > 0) { ?><span class="badge badge-success" style="background-color:yellow;color:red;">Latest</span><?php } ?> Home Work </div>
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

                    
            

                   
				    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bar-chart fa-3x"></i>
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
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-3x"></i>
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


                <?php
                    
                    $sql_status="select * from leave_appli where academic_year='".$cur_academic_year."' and student_id='".$student_id."'  and from_date > '".$today_date."' order by id desc limit 1";
                    
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
                            $badge = '<span class="badge badge-default" style="background-color:blue; color:#000;"> Pending</span>';
                        }
                    }
                    ?>

				
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-3x"></i>
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
            

                    <div class="col-md-3">
				<div class="panel panel-blue">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-video-camera fa-3x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div>Live Online Class</div>


							</div>
						</div>
					</div>
					<a href="all_online_class.php">
						<div class="panel-footer">
							<span class="pull-left">Watch Online Class</span>
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
                                        <i class="fa fa-comments fa-3x"></i>
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
					
					
					$sql_status="select * from request_study where academic_year='".$cur_academic_year."' and student_id='".$student_id."' and status='approved' and ready_date>='".$today_date."'";
					$result_status=mysqli_query($conn,$sql_status);
					$req_study = mysqli_num_rows($result_status);	
					
					
					$sql_leave="select * from leave_reply where academic_year='".$cur_academic_year."' and student_id='".$student_id."'";
					$result_leave=mysqli_query($conn,$sql_leave);
					$leave_reply = mysqli_num_rows($result_leave);	
					
					?>
                  
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-print fa-3x"></i>
                                    </div>
                                  
                                       <div class="col-xs-9 text-right">
								<div> <?php if ($req_study > 0) { ?><span class="w3-badge w3-yellow">New</span><?php } ?> Request Certificate</div>
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
                    
                </div>
                <!-- /.row -->	
				

		
                <!-- /.row -->
	<div class="row">

    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-3x"></i>
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
        
    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-3x"></i>
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
    

	<div class="col-sm-3">
    <div class="panel panel-blue">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                
                    <i class="fa fa-fw fa-money fa-3x"></i>
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
	
    
        
    <div class="col-lg-3 col-md-6">
    <div class="panel panel-blue">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                <i class="fa fa-user fa-3x"></i>
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
  <!----//////////////////////////////////////////////////////////////////////////---->
  <div class="row">
<div class="col-md-6">
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
			<div class="col-md-6">
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
			
	$sql_holi="select * from holiday where ho_date >= '".$today_date."' ORDER BY id DESC LIMIT 3";	
	
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
		<td><a href="upcoming_holidays.php"><?php echo $row_holi["ho_name"];?> <span class="badge badge-success" style="background-color:blue;"> Active</span></a></td>
		
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
$sql_fee="select sum(tot_paid) as admission_fee from student_fee where student_id='".$student_id."' and academic_year='".$cur_academic_year."'";
$result_fee=mysqli_query($conn,$sql_fee);
if(mysqli_num_rows($result_fee)>0){
if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		
		$admission_fee=$row_fee["admission_fee"];
	}
	}else{
		$admission_fee="";
	}
?>

    </div>

  <!-----/////////////////////////////////////////////////////////////////////////--->

</div>



<?php
require("footer.php");
}

else
{
    header("Location:login.php");
}
	

?>