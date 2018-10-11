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
			   $sql="select first_name,roll_no,present_class,class_stream,class_join,village,dob,join_date,photo_name,photo_path,photo_type from orph_students";
	           $result=mysqli_query($conn,$sql);
	           $total_students=mysqli_num_rows($result);
			   
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
                                        <i class="fa fa-bar-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									    <div>Orphanage Attendance</div>
                                       </div>
                                </div>
                            </div>
                           
                            <a href="all_attendance.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="all_attendance.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					
					
		</div>
	<!------------------------------------------End of Search Form------------------------------------------------------->
					
                <!-- /.row -->
               <?php
	
///--------------------------------End of Birthday SMS ------------------------------------------------------/////
	
	}else{
		header("Location:login.php");
	}
	

?>