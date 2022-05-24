<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");


	require("connection.php");
	if(isset($_GET["id"]))
	{
		
		$id=$_GET["id"];
	
	$sql="select * from non_teach where id='".$id."'";
	$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	
	?>
				
	
		<div class="container-fluid" >
		<div class="row" >
		<div class="col-sm-2" >
		</div>
		 <div class="col-sm-8" >   <br>
			
		<div class="panel panel-primary">


		<div class="panel-body">
					<h2>Staff Details</h2>
		
		<center><img width="150" height="150" alt="" class="img img-thumbnail" src="<?php echo $row['photo_path'];?>"></center>
					
<div class="table-responsive">
<table class="table table-bordered">
<tbody>
<tr>

<td>First Name</td>

<td><?php echo $row['first_name'];?></td>

<td>Last Name</td>

<td><?php echo $row['last_name'];?></td>
</tr>
<tr>

<td>Sex</td>

<td><?php echo $row['sex'];?></td>

<td>DOB</td>

<td><?php echo $dob;?></td>
</tr>
<tr>

<td>Address</td>

<td><?php echo $row['address'];?></td>



<td>Designation</td>

<td><?php echo $row['desig'];?></td>
</tr>
<tr>


<td>Joined Date</td>

<td><?php echo $join_date;?></td>
</tr>
<tr>

<td>Email</td>

<td><?php echo $row['email'];?></td>

<td>Mobile</td>

<td><?php echo $row['contact'];?></td>
</tr>
</tbody>
</table>
</div>

<h2 style="text-align: center; ">Submitted Certificates</h2>

<p style="text-align: center; ">Adhaar Card&nbsp;<a href="<?php echo $row['adhar_path'];?>">Click here</a></p>

<p style="text-align: center; ">ID Card&nbsp;<a href="<?php echo $row['id_path'];?>">Click here</a></p>

<p style="text-align: center; ">
<button class="btn btn-success" onclick="myFunction()">Print this page</button></div>
</div>
</div>
<div class="col-sm-2" >
</div>
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
}
					
			
}
else
{
header("Location:login.php");
}
	
			?>