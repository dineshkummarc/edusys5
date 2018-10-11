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
				<?php
				if(isset($_GET["success"])){
				?>
				<br>
				<div class="alert alert-success">
				  <strong>Success!</strong> Leave Application has been submitted successfully.
				</div>
				<?php
				}
				?>
				<h2>Send Leave letter</h2>
				<form action="insert_leave.php" method="post">
				
				<div class="form-group">
	           <label for="usr">Reason:</label>
		       <input type="text" name="reason" class="form-control">
	            </div>
				
				<div class="form-group">
	            <label for="usr">Date from:</label>
		        <input type="date" name="from_date" class="form-control" >
	            </div>
				
	            <div class="form-group">
	            <label for="usr">Date to:</label>
		        <input type="date" name="to_date" class="form-control" >
	            </div>
	 
	              <div class="form-group">
	              <label for="usr">Details:</label>
		          <textarea rows="6" name="details" class="form-control"></textarea>
		           </div>
				   
				   	<input type="submit" name="leave" class="btn btn-success" value="Send Leave letter">
		
				</form>
				
				
				</div>
				<div class="col-sm-3">
				</div>
				</div>
				</div>


	<?php
	
	}

	else

	{

		header("Location:login.php");

	}

?>			
