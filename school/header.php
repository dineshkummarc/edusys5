<!DOCTYPE html>
<html lang="en">

<head>
<?php 
error_reporting("0");
	require("connection.php");
	$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$school_name=$row["sch_name"];
	$web=$row["web"];
	}
	
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $school_name;?></title>
	
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!-- include summernote css/js-->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
	<!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
	
	<link rel="stylesheet" href="smoothness/jquery-ui.css">
	<!------wysiwyg------------------------------>
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="style_loading.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>

    body {
			margin-top: 80px;
        }
        
    /* Smartphones (portrait) ----------- */
		@media only screen and (max-width: 600px) {
			body {
				margin-top: 100px;
				background-color: #eee;
			}
		}
</style>
</head>

<body class="body">
<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php"><?php echo $school_name;?></a>
	</div>
	<!-- Top Menu Items -->
	
	<!-- Top Menu Items -->

	<ul class="nav navbar-right top-nav">
	 
	 <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['lkg_uname']." : Academic Year ".$_SESSION['academic_year'];?> <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li>
					<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
				</li>
			</ul>
		</li>
	</ul>
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
		<li>
				<a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Help <i class="fa fa-phone-square" aria-hidden="true"></i> 8277021524</a>
			</li>
			<li>
				<a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
			</li>
			
			<li>
				<a href="all_alumni.php"><i class="fa fa-fw fa-dashboard"></i> Alumni's</a>
			</li>
			<li>
				<a href="mes_report.php"><i class="fa fa-fw fa-dashboard"></i> SMS Delivery Report</a>
			</li>
			<li>
				<a href="all_gate_pass.php"><i class="fa fa-fw fa-dashboard"></i> Issued Gate Passes</a>
			</li>
					
 <li>
	<a href="#" data-toggle="collapse" data-target="#confi"><i class="glyphicon glyphicon-education "></i></i> Configure School <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="confi" class="collapse">
		<li>
			<a href="configure_school.php"><i class="fa fa-fw fa-cog"></i> Configure School</a>
		</li>
		<li>
			<a href="add_subj.php"><i class="fa fa-fw fa-cog"></i> Add Subjects</a>
		</li>
		<li>
			<a href="import_subjects.php"><i class="fa fa-fw fa-cog"></i> Import Subjects</a>
		</li>
		
		<li><a href="ad_members.php"><i class="fa fa-fw fa-cog"></i> Add Admin</a></li>
		<li><a href="add_fee_name.php"><i class="fa fa-fw fa-cog"></i> Add Fee Name</a></li>
		<li><a href="add_marks_admin.php"><i class="fa fa-fw fa-cog"></i> Add Marks Admin</a></li>
		<li>
			<a href="add_exams.php"><i class="fa fa-fw fa-cog"></i> Add Exams</a>
		</li>
		<li>
			<a href="add_transport_student.php"><i class="fa fa-fw fa-cog"></i> Add Student Routes</a>
		</li>
		<li>
			<a href="add_routes.php"><i class="fa fa-fw fa-cog"></i> Add Routes</a>
		</li>
		
		<li>
			<a href="add_stages.php"><i class="fa fa-fw fa-cog"></i> Add Stages</a>
		</li>
		
		<li>
			<a href="add_books_cat.php"><i class="fa fa-fw fa-cog"></i> Add Books Categories</a>
		</li>
		
	</ul>
</li>
					
<li>
	<a href="#" data-toggle="collapse" data-target="#edit_confi"><i class="glyphicon glyphicon-education "></i></i> Edit Configration <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="edit_confi" class="collapse">
		<li>
			<a href="schools.php"><i class="fa fa-fw fa-cog"></i> School Details</a>
		</li>
		<li>
			<a href="subjects.php"><i class="fa fa-fw fa-cog"></i> All Subjects</a>
		</li>
		<li>
			<a href="all_exams.php"><i class="fa fa-fw fa-cog"></i> All Exams</a>
		</li>
		
		<li>
			<a href="admins.php"><i class="fa fa-fw fa-cog"></i> Admins</a>
		</li>
		<li><a href="all_fee_name.php"><i class="fa fa-fw fa-cog"></i> All Fee Names</a></li>
		<li>
			<a href="all_marks_admin.php"><i class="fa fa-fw fa-cog"></i> Marks Admins</a>
		</li>
		
		<li>
			<a href="all_stages.php"><i class="fa fa-fw fa-cog"></i> All Stages</a>
		</li>
		<li>
			<a href="route_students.php"><i class="fa fa-fw fa-cog"></i> Route wise Students</a>
		</li>
		<li>
			<a href="all_routes.php"><i class="fa fa-fw fa-cog"></i> All Routes</a>
		</li>
		<li>
			<a href="all_books.php"><i class="fa fa-fw fa-cog"></i> All Books</a>
		</li>
		
	</ul>
</li>



<li>
<a href="#" data-toggle="collapse" data-target="#online"><i class="fa fa-fw fa-video-camera"></i> Online Class <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="online" class="collapse">
    <li><a href="add_online_class.php">Add Online Class</a></li>
    <li><a href="all_online_classes.php">All Online Class</a> </li>
</ul>
</li>


<li>
<a href="#" data-toggle="collapse" data-target="#bank"><i class="fa fa-fw fa-commenting"></i> Notice Board <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="bank" class="collapse">
    <li><a href="send_notification.php">Send Notice</a></li>
    <li><a href="notifications.php">All Notifications</a> </li>
</ul>
</li>





<li>
<a href="#" data-toggle="collapse" data-target="#assignments"><i class="fa fa-fw fa-commenting"></i> Assignments <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="assignments" class="collapse">
    <li><a href="send_assign.php">Send Assignments</a></li>
    <li><a href="assignments.php">All Assignments</a> </li>
</ul>
</li>



					
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#att"><i class="fa fa-fw fa-edit"></i> Attendance <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="att" class="collapse">
                            <li>
                                <a href="all_attendance.php">All Attendance</a>
                                
                            </li>
							<li>
                                <a href="attendance.php">Take Attendance</a>
                                
                            </li>
							<!--
                            <li>
                               <a href="exit_attendance.php">Exit Class</a>
                            </li>
							-->
                        </ul>
                    </li>  
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#staff_att"><i class="fa fa-fw fa-edit"></i> Staff Attendance <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="staff_att" class="collapse">
                            <li>
                                <a href="all_fac_attendance.php">All Attendance</a>
                                
                            </li>
							<li>
                                <a href="fac_attendance.php">Take Attendance</a>
                                
                            </li>
                            
                        </ul>
                    </li>  
					<li>
                        <a href="#" data-toggle="collapse" data-target="#student"><i class="glyphicon glyphicon-education "></i></i> Students <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="student" class="collapse">
                            <li>
                                <a href="all_students.php">All Students</a>
                            </li>
							<li>
                                <a href="register_students.php">Add Student</a>
                            </li>
							<li>
                                <a href="import.php">Import Students (CSV)</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#lib"><i class="fa fa-fw fa-table"></i> Library <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="lib" class="collapse">
                            <li>
                                <a href="all_books.php">All Books</a>
                            </li>
							
							<li>
                                <a href="chk_availibility.php">Check Availibility</a>
                            </li>
							<li>
                                <a href="add_book.php">Add Book</a>
                            </li>
                            <li>
                                <a href="issue_book.php">Issue Book</a>
                            </li>
							<li>
                                <a href="recieve_books.php">Recieve Book</a>
                            </li>
							<li>
                                <a href="returns_details.php">Returns Details</a>
                            </li>
                        </ul>
                    </li>
                    
                   
                    
					
					
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-education "></i></i> Inventory <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="inventory" class="collapse">
                            <li>
                                <a href="inventory.php">Add Inventory</a>
                            </li>
							<li>
                                <a href="all_inventory.php">All Inventory List</a>
                            </li>
							
                        </ul>
                    </li>


                    <li>
                    <a href="#" data-toggle="collapse" data-target="#income"><i class="fa fa-commenting"></i>
                        Income & Expenses <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="income" class="collapse">
					<li><a href="add_entry.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Entry</a></li>
						<li><a href="balance_sheet.php"><i class="fa fa-calculator" aria-hidden="true"></i> Balance Sheet</a></li>
						<li><a href="add_account_name.php"><i class="fa fa-plus"></i> Add Account Name</a></li>
						<li><a href="account_names.php">All Account Names</a></li>
                        <li><a href="add_entry_name.php"><i class="fa fa-plus"></i> Add Category Name</a></li>
                        <li><a href="all_entry_name.php"> Category Names</a></li>
						<!--
                        <li><a href="accounts_overview.php">Add Income/Expense</a></li>
                        <li><a href="all_incomes.php">All Incomes</a> </li>
                        <li><a href="all_expense.php">All Expenses</a> </li>
						
						-->
                    </ul>
                </li>

                <!--
					
				 <li>
                        <a href="#" data-toggle="collapse" data-target="#account_over"><i class="glyphicon glyphicon-education "></i></i> Accounts Overview <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="account_over" class="collapse">
                            <li><a href="accounts_overview.php">Add Income and Expense</a></li>
                            <li><a href="all_incomes.php">All Incomes</a></li>
							
							<li><a href="all_expense.php">All Expenses</a></li>
							
                        </ul>
                    </li>
                    -->
					
				 <li>
                        <a href="#" data-toggle="collapse" data-target="#enroll"><i class="glyphicon glyphicon-education "></i></i> Enrollment <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="enroll" class="collapse">
                            <li>
                                <a href="all_enrolled_students.php">Enrolled Students</a>
                            </li>
							<li>
                                <a href="register_enrollment.php">Enroll (Add) Students</a>
                            </li>
							
                        </ul>
                    </li>
				
					 <li>
                        <a href="#" data-toggle="collapse" data-target="#marks"><i class="glyphicon glyphicon-education "></i></i> Student Marks <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="marks" class="collapse">
                            <li>
                                <a href="marks_list.php">Mark List</a>
                            </li>
							<li>
                                <a href="marks.php">Update Marks</a>
                            </li>
                            
                        </ul>
                    </li> 
					
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#admini"><i class="fa fa-user" aria-hidden="true"></i> Administration <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="admini" class="collapse">
                            <li>
                                <a href="adm_members.php">Administrative Members</a>
                                <a href="add_adm_members.php">Add Administrative Members</a>
                               
                            </li>
                            
                        </ul>
                    </li> 


					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#emp"><i class="fa fa-user" aria-hidden="true"></i> Staff's <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="emp" class="collapse">
                            <li>
                                <a href="teach_staff.php">All Staff's</a>
								  </li>
							<li>
                                <a href="register_faculty.php">Add Staff</a>
                            </li>
							<li>
                                <a href="import_faculty.php">Import Staff (CSV)</a>
                            </li>
                           
                        </ul>
                    </li>  
					
					
                    
					 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#fee"><i class="fa fa-fw fa-money"></i> School Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="fee" class="collapse">
                            <li>
                                <a href="set_fee.php">Setup School Fee</a>
                            </li>
							<li>
                                <a href="set_fee_det.php">Setup School Fee Details</a>
                            </li>
                            <li>
                                <a href="bulk_fee_update.php">Bulk School Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual School Fee</a>
                            </li>
							<li>
                                <a href="paid_fee_details.php">Paid School Fee Details</a>
                            </li>
							<li>
                                <a href="fee_remind.php">Remind School Fee</a>
                            </li>
                        </ul>
                    </li> 

					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#adm_fee"><i class="fa fa-fw fa-money"></i> RTE Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="adm_fee" class="collapse">
                            <li>
                                <a href="set_adm_fee.php">Setup RTE Fee</a>
                            </li>
							<li>
                                <a href="set_adm_fee_det.php">RTE Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_adm_fee_update.php">Bulk RTE Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual RTE Fee</a>
                            </li>
							<li>
                                <a href="paid_adm_fee_details.php">Paid RTE Fee Details</a>
                            </li>
							<li>
                                <a href="adm_fee_remind.php">Remind RTE Fee</a>
                            </li>
                        </ul>
                    </li> 
					
                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cca_fee"><i class="fa fa-fw fa-money"></i> Teachers Children Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cca_fee" class="collapse">
                            <li>
                                <a href="set_cca_fee.php">Setup Teachers Children Fee</a>
                            </li>
							<li>
                                <a href="set_cca_fee_det.php">Teachers Children Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="bulk_cca_fee_update.php">Bulk Teachers Children Fee Update</a>
                            </li>
							<li>
                                <a href="all_students.php">Collect Individual Teachers Children Fee</a>
                            </li>
							<li>
                                <a href="paid_cca_fee_details.php">Paid Teachers Children Fee Details</a>
                            </li>
							<li>
                                <a href="cca_fee_remind.php">Remind Teachers Children Fee</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="bulk_other_fee.php"><i class="fa fa-money" aria-hidden="true"></i> Book,Uniform & Other Fee</a></li>
                    <li><a href="paid_other_fee_details.php"><i class="fa fa-money" aria-hidden="true"></i> Paid Other Fee Details</a></li>

                    <li><a href="send_assign.php"><i class="fa fa-money" aria-hidden="true"></i> Send Assignments</a></li>
	
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#van_fee"><i class="fa fa-fw fa-money"></i> School Van Fee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="van_fee" class="collapse">
                            <li>
                                <a href="set_van_fee.php">Setup Fee</a>
                            </li>
							<li>
                                <a href="set_van_fee_det.php">Van Fee Setup Details</a>
                            </li>
                            <li>
                                <a href="transport_fee_update.php">Collect Van Fee</a>
                            </li>
							
							<li>
                                <a href="collected_van_fee.php">Collected Van Fee</a>
                            </li>
                        </ul>
                    </li>  
					 <li>
                        <a href="upgrade_class.php"><i class="fa fa-fw fa-dashboard"></i> Upgrade Class</a>
                    </li>
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-table"></i> Timetable <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="shw_timetable.php">Show Timetable</a>
                            </li>
                            <li>
                                <a href="timetable.php">Set Timetable</a>
                            </li>
                        </ul>
                    </li> 
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#exam"><i class="fa fa-fw fa-table"></i> Exam Timetable <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="exam" class="collapse">
                            <li>
                                <a href="shw_exam_timetable.php">Exam Timetable</a>
                            </li>
                            <li>
                                <a href="exam_timetable.php">Set Exam Timetable</a>
                            </li>
                        </ul>
                    </li>  
					
					 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#event"><i class="fa fa-fw fa-calendar"></i> Upcoming Events <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="event" class="collapse">
                            <li>
                                <a href="all_events.php">Upcoming Events</a>
                            </li> 
							<li>
                                <a href="up_holiday.php">Upcoming Holidays</a>
                            </li>
							
                            <li>
                                <a href="up_events.php">Add Events</a>
                            </li>
							<li>
                                <a href="add_holiday.php">Add Holidays</a>
                            </li>
							<li>
                                <a href="events_all.php">All Events</a>
                            </li>
							<li>
                               <a href="holidays.php">All Govt Holidays</a>
                           </li> 
                        </ul>
                    </li> 
					<li><a href="print_student_details.php">Print Student Details</a></li> 
                   
                </ul>
            </div>
        </nav>

