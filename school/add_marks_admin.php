<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add Admin To Marks Update</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{
                  echo '<div class="alert alert-success">
                   <strong>Success!</strong> Admin has been added successfully
                  </div>';
					

				}
		if(isset($_GET["failed"]))

				{

					echo '<div class="alert alert-danger">
                   <strong>Sorry!</strong> Something went wrong. try again.or contact your webmaster.
                  </div>';
			
				}
				?>
								
							
<form action="insert_add_marks_admin.php" method="post">
      <div class="form-group">
	   <label for="usr">Username:</label>
		<input type="text" name="username" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Password:</label>
		<input type="password" name="log_pas" class="form-control" required>
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Select Class:</label>
		<select name="class" class="form-control" required>
			<?php
			require("selectclass.php");
			?>
	  <div class="form-group">
	   <label for="usr">Select Section</label>
		<select name="section" class="form-control">
		<option value="">Select Section</option>
		<option value="Section A">Section A</option>
		<option value="Section B">Section B</option>
		</select>
	</div>
	
		<div class="form-group">
	   <label for="usr">Select Academic Year</label>
		<select name="academic_year" class="form-control">
		<option value="2016-2017">2016-2017</option>
		<option value="2017-2018">2017-2018</option>
		<option value="2018-2019">2018-2019</option>
		<option value="2019-2020">2019-2020</option>
		
		</select>
	</div>
		
		
	 <div class="form-group">
	    <label for="usr">Email:</label>
		<input type="email" name="email" class="form-control">
	 </div>
	<input type="submit" name="marks_admin" class="btn btn-success" value="Register">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
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
