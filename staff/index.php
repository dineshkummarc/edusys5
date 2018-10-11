<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	
require("header.php");
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
$today_md=date('m-d');

?>
 <head>
 <link rel="stylesheet" href="bootstrap-theme.min.css">
<script src="typeahead.min.js"></script>
<style type="text/css">
	
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 1px solid #CCCCCC;
	
	font-size: 14px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 14px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}

</style>
</head>

<div id="page-wrapper">
<div class="container-fluid">

<div class="row">
    
  <div class=".col-md-12">


          <?php
			   require("connection.php");
			   $sql="select first_name,roll_no,present_class,class_stream,class_join,village,dob,join_date,photo_name,photo_path,photo_type from students";
	           $result=mysqli_query($conn,$sql);
	           $total_students=mysqli_num_rows($result);
			   
			   
			   $sql_leave="select * from leave_appli";
	           $result_leave=mysqli_query($conn,$sql_leave);
	           $total_leave=mysqli_num_rows($result_leave);
			   
			   $sql_certi="select * from request_study";
	           $result_certi=mysqli_query($conn,$sql_certi);
	           $total_certi=mysqli_num_rows($result_certi);
			   
			   $sql_fac="select * from faculty";
	           $result_fac=mysqli_query($conn,$sql_fac);
	           $total_fac=mysqli_num_rows($result_fac);
			   
			   
			   $sql_book="select * from books";
	           $result_book=mysqli_query($conn,$sql_book);
	           $total_book=mysqli_num_rows($result_book);
			   ?>

	<!------------------------------------------End of Search Form------------------------------------------------------->
	 <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									
                                        <i class="glyphicon glyphicon-search"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									
                                       
                                       
                                    </div>
                                </div>
                            </div>
							
                                <div class="panel-footer">
                                     <form action="description.php" id="search_student"  method="get">
	
								 <div class="form-group">
								<input type="text" name="typeahead" class="form-control typeahead "  autocomplete="off" spellcheck="false" placeholder="Search Students">
								</div>
								<button type="submit" name="search_student" class="btn btn-sm btn-success">Get Details</button>
								</form>
                                </div>
                          
							
                        </div>
                    </div>
					<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									
                                        <i  class="fa fa-file-text fa-5x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Leave Application</div>
                                        <div class="huge"><?php echo $total_leave;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="leave_applications.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="leave_applications.php">View Details</a></span>
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
									
                                        <i class="glyphicon glyphicon-certificate fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Certificate Request</div>
                                        <div class="huge"><?php echo $total_certi;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="req_certificates.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="req_certificates.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
		</div>
	<!------------------------------------------End of Search Form------------------------------------------------------->
					 <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									
                                        <i class="glyphicon glyphicon-education fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Total Students</div>
                                        <div class="huge"><?php echo $total_students;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="all_students.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="all_students.php">View Details</a></span>
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
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Total Staffs</div>
                                        <div class="huge"><?php echo $total_fac;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="teach_staff.php">
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
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Staff Attendance</div>
                                        <div class="huge"></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="all_fac_attendance.php">
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
									
                                        <i class="glyphicon glyphicon-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Total Library Books</div>
                                        <div class="huge"><?php echo $total_book;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="all_books.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
                </div>
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
									    <div>Print/Store Documents</div>
                                       </div>
                                </div>
                            </div>
                            <a href="documents.php">
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
									 <div>Send Bulk SMS</div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="send_noti.php">
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
									 <div>Send Assignments & Homeworks</div>
                                       
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="send_assign.php">
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


				<!-- //////////////////////.row /////////////////////////////////////////////-->
                <div class="row">
				<div class="col-lg-3 col-md-6">
                        <div class="panel panel-red" style="background:red;">
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
                            <a href="all_attendance.php">
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
									 <div>Send Notifications</div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="send_notifications.php">
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
					?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-birthday-cake fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Todays Birthday's</div>
                                       
                                       <div class="huge"><?php echo $total_students;?></div>  
                                    </div>
                                </div>
                            </div>
                            <a href="birthday_details.php">
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
		<td><a href="<?php echo 'evt_description.php?id='.$row['id'];?>" ><?php echo $row["evt_name"];?></a></td>
		
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
		<td><a href="<?php echo 'ho_description.php?id='.$row_holi['id'];?>" ><?php echo $row_holi["ho_name"];?></a></td>
		
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

//error_reporting("0");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");
$sql_fee="select sum(adm_fee) as admission_fee from student_fee where rec_date='".$today_date."'";
$result_fee=mysqli_query($conn,$sql_fee);
if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		
		$admission_fee=$row_fee["admission_fee"];
	}
?>

<div class="col-sm-4">
	 <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									
                                        <i class="fa fa-fw fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									 <div>Fee Collected Today</div>
                                        <div class="huge"><?php echo $admission_fee;?></div>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="paid_fee_details.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
			</div>

</div>

</div>
</div>
</div>


  

<?php
 
///--------------------------------Starts of Birthday SMS ------------------------------------------------------/////
$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		
		//$approved_senderid=$row_sch["sender_id"];
		
		//$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
$sql_status="select dob_date,status from birthday_status ORDER BY ID DESC LIMIT 1";
$result_status=mysqli_query($conn,$sql_status);
if($row_status=mysqli_fetch_array($result_status,MYSQLI_ASSOC))
	{
		$dob_date=$row_status["dob_date"];
		$status=$row_status["status"];
	}
	//echo $dob_date;
	if(($dob_date != $today)||($status != 'sent'))
	{
		$today_md=date('m-d');
		
		
		$sql_dob="select first_name,parent_contact,dob from students where DATE_FORMAT(dob,'%m-%d')='".$today_md."'";
		$result_dob=mysqli_query($conn,$sql_dob);
		foreach($result_dob as $row_dob){
			$dob_name=$row_dob["first_name"];
			$dob=$row_dob["dob"];
			$mob_number=$row_dob["parent_contact"];
			
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$approved_senderid="PROMOTIONAL";
//echo "msg sent";

$message="Dear ".$dob_name.", Wish you a many many happy returns of the day. May God bless you with health, wealth and prosperity in your life. HAPPY BIRTHDAY-".$sch_name;
echo $message;
$enc_msg= rawurlencode($message); // Encoded message

//Create API URL

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=P&phonenumber=$mob_number&message=$enc_msg";


//Call API
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
//echo $result ; // For Report or Code Check
curl_close($ch);

		
	
		}
		
	$sql_insert="insert into birthday_status (dob_date,status) values('$today','sent')";
	$conn->query($sql_insert); 	 
	}
///--------------------------------End of Birthday SMS ------------------------------------------------------/////
	
	}else{
		header("Location:login.php");
	}
	

?>