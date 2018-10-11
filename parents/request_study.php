<?php
session_start();

if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))
{
	error_reporting("0");
	require("header.php");
	require("connection.php");
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
			<div class="container-fluid">
                <div class="row">
                <div class="col-sm-3">
				</div> 
				<div class="col-sm-6">
				<h2>Request Certificate</h2>
				<form action="insert_study_req.php" method="post">
				
				<div class="form-group">
	           <label for="usr">Certificate Name:</label>
		       <input type="text" name="certi_name" class="form-control">
	            </div>
				<div class="form-group">
	           <label for="usr">Reason:</label>
		       <input type="text" name="reason" class="form-control">
	            </div>
				
				<input type="submit" name="study" class="btn btn-success" value="Send Request">
		
				</form>
				
				
				</div>
				<div class="col-sm-3">
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

	else

	{

		header("Location:login.php");

	}

?>			
