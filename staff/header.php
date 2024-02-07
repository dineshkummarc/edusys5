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

    <title><?php echo $_SESSION['staff_uname'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="smoothness/jquery-ui.css">
     <script src="jquery.js"></script>
     <script src="jquery-ui.js"></script>
	
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

    
	<script>
function printDiv(timetable) {
     var printContents = document.getElementById('timetable').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script src="file.js"></script>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_timetable.php?class="+str,true);
        xmlhttp.send();
    }
}

$(function() {
    $( "#name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( "#book_name" ).autocomplete({
        source: 'search_books.php'
    });
});

$(function() {
    $( "#roll_no" ).autocomplete({
        source: 'searchid.php'
    });
});
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
<script>
function goBack() {
    window.history.back();
}
</script>
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
            <!-- Top Menu Items
<ul class="nav navbar-right top-nav">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome, <?php echo $_SESSION['staff_uname'];?></a>
	
	</li>
</ul> -->
			
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
    <li><a href="tel:8277021524"><i class="fa fa-phone-square" aria-hidden="true"></i> Help:8277021524</a></li>
    <li><a href="#"><i class="fa fa-user"></i> Welcome, <?php echo $_SESSION['staff_uname'];?></a></li>

    <li><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
    <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#att"><i class="fa fa-fw fa-edit"></i> Attendance <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="att" class="collapse">
                <li>
                    <a href="all_attendance.php">All Attendance</a>
                    
                </li>
                <li>
                    <a href="attendance.php">Take Attendance</a>
                    
                </li>
            </ul>
        </li>  

  
    
    
<li>
<a href="#" data-toggle="collapse" data-target="#bank"><i class="fa fa-pencil-square" aria-hidden="true"></i> Notice Board <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="bank" class="collapse">
    <li><a href="send_notification.php">Send Notice</a></li>
    <li><a href="notifications.php">All Notifications</a> </li>
</ul>
</li>

<li>
<a href="mes_report.php"><i class="fa fa-fw fa-dashboard"></i> SMS Delivery Report</a>
</li>
<li>
<a href="all_gate_pass.php"><i class="fa fa-fw fa-dashboard"></i> Issued Gate Passes</a>
</li>

<li><a href="individual_notifications.php"> <i class="fa fa-comment" aria-hidden="true"></i> Individual Notifications</a> </li>


<li>
<a href="#" data-toggle="collapse" data-target="#assignments"><i class="fa fa-pencil-square" aria-hidden="true"></i> Assignments <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="assignments" class="collapse">
    <li><a href="send_assign.php">Send Assignments</a></li>
    <li><a href="assignments.php">All Assignments</a> </li>
</ul>
</li>

<li><a href="add_online_class.php"><i class="fa fa-fw fa-video-camera"></i> Add Online Class</a></li>
<li><a href="all_online_class.php"><i class="fa fa-fw fa-video-camera"></i> All Online Class</a></li>
<li><a href="logout.php"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>


           
	
</ul>
</div>
</nav>
		
	