<?php
session_start();

if(isset($_SESSION['class_uname'])&&isset($_SESSION['class_pass'])&&isset($_SESSION['class'])&&isset($_SESSION['academic_year']))

{
require("att_header.php");
require("connection.php");
?>

        <div id="page-wrapper">
<br>
            <div class="container-fluid">
          
            

               <?php
			   require("connection.php");
			   $sql="select first_name,roll_no,present_class,class_stream,class_join,village,dob,join_date,photo_name,photo_path,photo_type from students";
	           $result=mysqli_query($conn,$sql);
	           $total_students=mysqli_num_rows($result);
			   
			   $sql_fac="select * from faculty";
	           $result_fac=mysqli_query($conn,$sql_fac);
	           $total_fac=mysqli_num_rows($result_fac);
			   
			   
			   $sql_book="select * from books";
	           $result_book=mysqli_query($conn,$sql_book);
	           $total_book=mysqli_num_rows($result_book);
			   ?>

             
                <!-- /.row -->
                <div class="row">
				<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check-square-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									    <div>Attendance</div>
                                       </div>
                                </div>
                            </div>
                            <a href="attendance.php">
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
									 <div>Send Notifications</div>
                                        
                                       
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
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
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
                        <div class="panel panel-red">
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
<div class="col-sm-6">
	<div class="panel panel-yellow">
		<div class="panel-heading">
		   <h4>Latest Upcoming Events</h4>
		</div>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tr>
		<th>SL No</th>
		<th>Event Name</th>
		<th>Event Date</th>
		<th>Event Time</th>
		<th>Event Venue</th>
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
			echo "<tr><td colspan='4'><h4 style='color:red;'>There are no Events to display</h4></td></tr>";
		}
	?>
	</table>
		</div>
		</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<h4>Upcoming Holidays</h4>
					</div>
					<div class="table-responsive">
					<table class="table table-bordered">
		<tr>
		<th>SL No</th>
		<th>Day</th>
		<th>Date</th>
		<th>Holiday</th>
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
		<td><a href="<?php echo 'ho_description.php?id='.$row_holi['id'];?>" ><?php echo $row_holi["ho_day"];?></a></td>
		
		<td><?php echo $row_holi["ho_date"];?></td>
		<td><?php echo $row_holi["ho_name"];?></td>
		<td><?php echo $row_holi["ho_details"];?></td>
		
		
		</tr>
		
		<?php $row_count++; 
		}
		}else{
			echo "<tr><td colspan='4'><h4 style='color:red;'>There are no Holidays to display</h4></td></tr>";
		}
	
	?>
	</table>
				</div>
				</div>
			</div>
		 </div>
		
                <!-- /.row -->
	 
</div>

</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

<?php 

	}else{
		header("Location:login.php");
	}
	

?>