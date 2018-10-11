<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row"><br>
<a href="documents.php"><button class="btn btn-success">Go Back</button></a><br>
 <form action="insert_letterhead.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6 col-sm-offset-3">
	  
		<div class="panel panel-primary">
		
			  <div class="panel-body">
			  <h3>Print Letterhead</h3>
			  
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Enter Title</label>
					  <input type="text"  name="lh_title"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Location</label>
					  <textarea rows="8" class="form-control" name="lh_desc"></textarea>
					</div>
					
					
			        <input type="submit" class="form-control btn btn-primary" name="letterhead" value="Print Letterhead" >
					
										
			  </div>
		</div>
	</div>

  </div>
  </form>
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
