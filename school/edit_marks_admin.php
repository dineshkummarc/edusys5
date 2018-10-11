<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
if(isset($_GET["id"])){
		$id=$_GET["id"];
		}

$sql="select * from class_ad_members where id ='".$id."'  and academic_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$username=$row["username"];
	$log_pas=$row["log_pas"];
	$class=$row["class"];
	$section=$row["section"];
	$academic_year=$row["academic_year"];
	$email=$row["email"];
	$id=$row["id"];
	
	}
	
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Marks Admin</h4></div>
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
								
							
<form action="update_add_marks_admin.php" method="post">
      <div class="form-group">
	   <label for="usr">Username:</label>
		<input type="text" name="username" value="<?php echo $username;?>" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Password:</label>
		<input type="password" name="log_pas" value="<?php echo $log_pas;?>" class="form-control" required>
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Select Class:</label>
		<select name="class" class="form-control"  required>
		<option value="<?php echo $class;?>"><?php echo $class;?></option>
			<?php
			require("selectclass.php");
			?>
	  <div class="form-group">
	   <label for="usr">Select Section</label>
		<select name="section" class="form-control">
		<option value="<?php echo $section;?>"><?php echo $section;?></option>
		<option value="Section A">Section A</option>
		<option value="Section B">Section B</option>
		</select>
	</div>
	
		<div class="form-group">
	   <label for="usr">Select Academic Year</label>
		<select name="academic_year" class="form-control">
		<option value="<?php echo $academic_year;?>"><?php echo $academic_year;?></option>
		<option value="2016-2017">2016-2017</option>
		<option value="2017-2018">2017-2018</option>
		<option value="2018-2019">2018-2019</option>
		<option value="2019-2020">2019-2020</option>
		
		</select>
	</div>
		
		
	 <div class="form-group">
	    <label for="usr">Email:</label>
		<input type="email" name="email" value="<?php echo $email;?>" class="form-control">
		<input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
	 </div>
	<input type="submit" name="marks_admin" class="btn btn-success" value="Update">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
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
