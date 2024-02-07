<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

	if(isset($_GET["id"])){
		$student_id=$_GET["id"];
		}

	?>
	<head>


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

<?php
	$sql_name="select first_name,adhaar_no from students where id ='".$student_id."'";
	$result_name=mysqli_query($conn,$sql_name);
	if($value_name=mysqli_fetch_array($result_name,MYSQLI_ASSOC))
	{
		$first_name = $value_name["first_name"];
		$member_id = $value_name["adhaar_no"];
	}
?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-3">
</div> 
<div class="col-sm-6"><br><br>
	<?php
	if(isset($_GET["success"])){
	?>
		<div class="alert alert-success">
		<strong>Success</strong> Updated successfully.
	</div>
	<?php
	}
	?>
<h2>Send Individual Notification</h2>
<h4>To : <?php echo $first_name;?></h4>
<form action="insert_individual_noti.php" method="post">

<div class="form-group">
<label for="usr">Subject:</label>
<input type="text" name="subject" class="form-control" required>
</div>

<div class="form-group">
	<label for="usr">Message:</label>
	<textarea rows="6" name="message"  class="form-control" required></textarea>
</div>
	<input type="hidden" name="student_id" value="<?php echo $student_id;?>">	
	<input type="submit" name="individual" class="btn btn-success" value="Send Notifications">

</form><br>
<button onclick="goBack()" class="btn btn-primary">Go Back</button>


</div>
<div class="col-sm-3">
</div>
</div>
</div>

	<?php
	
	require("footer.php");	
	}

	else

	{

		header("Location:login.php");

	}

?>			
