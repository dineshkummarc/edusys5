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
				<h2>Contact School</h2>
				<form action="insert_contact.php" method="post">
				
				<div class="form-group">
	           <label for="usr">Subject:</label>
		       <input type="text" name="subject" class="form-control">
	            </div>
				
	            <div class="form-group">
	              <label for="usr">Message:</label>
		          <textarea rows="6" name="message" class="form-control"></textarea>
		           </div>
				   
				   	<input type="submit" name="contact" class="btn btn-success" value="Send">
		
				</form>
				
				
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
