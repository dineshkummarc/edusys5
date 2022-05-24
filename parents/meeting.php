<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
error_reporting("0");
?>
<div id="page-wrapper">
<div class="container-fluid">
  
 
	
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2>All Meetings</h2></center>
     <div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Meeting Type</span></td>
		
		<td><span style="font-weight: bold;">Meeting Name</span></td>
		
		<td><span style="font-weight: bold;">Meeting Date</span></td>
	
		
		<td><span style="font-weight: bold;">Meeting Time</span></td>
		
		<td><span style="font-weight: bold;">Class</span></td>
		
		
		<td></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$sql="select * from meeting";
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	
    
	foreach($result as $row)
	{
	
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row["meeting_type"];?></a></td>
		<td><?php echo $row["meeting_name"];?></td>
		<td><?php echo $row["meeting_date"];?></td>
		<td><?php echo $row["meeting_time"];?></td>
		<td><?php echo $row["meeting_class"];?></td>
		
		<td>
        <a href="<?php echo 'upd_meeting.php?id='.$row['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="<?php echo 'del_meeting.php?id='.$row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
       </div></td>
		</tr>
		<?php $row_count++; 
		
	}
?>
		
		</table>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
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
			
}
else
{
header("Location:login.php");
}
?>  
