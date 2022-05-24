<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");

////////////////////////////////////// End of Searched variables ///////////////////////////////////////////////////
//$first_name=$_GET["first_name"];
$id=$_GET["id"];

	$sql="select * from alumni where id='".$id."'";
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$dob= date('d-m-Y', strtotime( $row['dob'] ));
	$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	$class=$row["present_class"];
	$section=$row["section"];
	}
	?>
	<head>
		<script>
function goBack() {
    window.history.back();
}
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
	</head>
	<br>
	
	 <center><div class="panel panel-primary" style="width:80%;">
      <div class="panel-heading"><center>Alumni Details , Name: <?php echo $row["first_name"];?></span></center>
	
	  </div>
		  <div class="panel-body" id="income">
				<center>
				<div class="table-responsive"> 
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
					
					<tbody>
					  <tr>
						<td style="width:15%;">Alumni Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['first_name']."<br>".strtoupper($student_type);?></td>
						<td style="width:15%;">Gender</td>
						<td style="color:blue;width:25%;"><?php echo $row['gender'];?>
						
						
						</td>
					   
					  </tr>
					  <tr>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $row['dob'];?></td>
						<td style="width:15%;">Studied Upto</td>
						<td style="color:blue;width:25%;"><?php echo $row['studied_upto'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Year of Passing</td>
						<td style="color:blue;width:25%;"><?php echo $row['year_passing'];?></td>
						<td style="width:15%;">Qualification</td>
						<td style="color:blue;width:25%;"><?php echo $row['qualification'];?></td>
						
					  </tr>
					   <tr>
						<td style="width:15%;">Occupation</td>
						<td style="color:blue;width:25%;"><?php echo $row['occupation'];?></td>
						<td style="width:15%;">Expertise</td>
						<td style="color:blue;width:25%;"><?php echo $row['expertise'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['address']."<br>".$row['city']." ".$row['hometown'];?></td>
						<td style="width:15%;">Email</td>
						<td style="color:blue;width:25%;"><?php echo $row['email'];?></td>
						
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Phone</td>
						<td style="color:blue;width:25%;"><?php echo $row['phone']." , ".$section;?></td>
						<td style="width:15%;">Comments</td>
						<td style="color:blue;width:25%;"><?php echo $row['comments'];?></td>
						
					  </tr>
					 
					  
					</tbody>
				  </table> 
				  </div>
				  
				  </center>
				  
				 
	</div>
	</div>
	
	</center>

<?php
require("footer.php");	
	
}
else
{
header("Location:login.php");
}
?>  	