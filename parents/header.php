<!DOCTYPE html>
<html lang="en">
<?php 
	require("connection.php");
	$sql = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$school_name=$row["sch_name"];
	}
	
	?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_SESSION['parents_uname'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    
	<link rel="stylesheet" href="smoothness/jquery-ui.css">
 
	
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
	<!-- Navigation -->
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
	
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
<li><a href="#">Hello, <?php echo $_SESSION['parents_uname'];?></a></li>

    <li><a href="description.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a></li>
    <li><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
    <li><a href="notifications.php"><i class="fa fa-fw fa-dashboard"></i> Notice Board</a></li>
    <li><a href="individual_notifications.php"><i class="fa fa-fw fa-dashboard"></i> Messages</a></li>
    <li><a href="assignments.php"><i class="fa fa-fw fa-dashboard"></i> Home Work</a></li>
    <li><a href="upcoming_events.php"><i class="fa fa-fw fa-dashboard"></i> Upcoming Events</a></li>
    <li><a href="upcoming_holidays.php"><i class="fa fa-fw fa-dashboard"></i> Upcoming Holidays</a></li>
    <li><a href="student_remarks.php"><i class="fa fa-fw fa-dashboard"></i> Student Remarks</a></li>
    <li><a href="shw_timetable.php"><i class="fa fa-calendar" aria-hidden="true"></i> Show Timetable</a></li>
    <li><a href="shw_exam_timetable.php"><i class="fa fa-fw fa-dashboard"></i> Exam Time Table</a></li>
    <li><a href="attendance_desc.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> All Attendance</a></li>
    <li><a href="all_online_class.php"><i class="fa fa-fw fa-video-camera"></i> Online Class</a></li>
    <li><a href="select_exam.php"><i class="fa fa-fw fa-dashboard"></i> Hall Ticket</a></li>
    <li><a href="request_study.php"><i class="fa fa-fw fa-dashboard"></i>Request Certificates</a></li>
    <li><a href="books_issued.php"><i class="fa fa-fw fa-dashboard"></i> Books Issued</a></li>
    <li><a href="all_gate_pass.php"><i class="fa fa-fw fa-dashboard"></i> Gate Pass Issued</a></li>
    <li><a href="apply_leave.php"><i class="fa fa-fw fa-dashboard"></i> Leave Applications</a></li>
    <li><a href="mes_report.php"><i class="fa fa-fw fa-dashboard"></i> SMS Notifications</a></li>

    <li><a href="marks_card.php"><i class="fa fa-money" aria-hidden="true"></i> Marks Card</a></li>
	 
	<li><a href="adm_members.php"><i class="fa fa-users" aria-hidden="true"></i> Administrative Members</a></li>
    <li><a href="teach_staff.php"><i class="fa fa-users" aria-hidden="true"></i> All Staff's</a></li>
    <li><a href="indi_paid_det.php"><i class="fa fa-money" aria-hidden="true"></i> Paid Fee Details</a></li>
    <li><a href="logout.php"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>
	
</ul>
</div>
</nav>
		
	