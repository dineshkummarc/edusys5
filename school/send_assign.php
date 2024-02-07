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
     <div class="panel-heading"><h4>Send Assignments and Homeworks</h4></div>
      <div class="panel-body">
		<?php
		if(isset($_GET["success"]))
		{
		$success=$_GET["success"];

		echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Assignments has been sent successfully</span><br></p>';
		}
		if(isset($_GET["failed"]))
		{
		$failed=$_GET["failed"];
		echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';
		}
		?>
								
							
<form action="insert_assign.php" method="post">
 
<div class="form-group">
	<label for="sel1">Select Class</label>
	<select class="form-control" name="class">
	<option value="">Select Class</option>
	<?php
	$sql="select distinct present_class from students where academic_year='".$cur_academic_year."'";
	$result=mysqli_query($conn,$sql);
	foreach($result as $value)
	{
	?>
	<option value='<?php echo $value["present_class"];?>'><?php echo $value["present_class"];?></option>
	<?php
	}
	?>
	</select>
	</div>

		<div class="form-group">
    <select class="form-control" name="section">
    <option value="">Select Section</option>
		<?php
    $sql="select distinct section from students where academic_year='".$cur_academic_year."'";
    $result=mysqli_query($conn,$sql);
    foreach($result as $value)
    {
    ?>
    <option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
    <?php
    }
    ?>
		</select>
    </div>
		
		
	  <div class="form-group">
	    <label for="usr">Title:</label>
		<input type="text" name="assign_title" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Description:</label>
		 <textarea class="form-control" name="assign_desc"  rows="5"></textarea>
	  </div>
	  
	  
	<input type="submit" name="assignment" class="btn btn-success" value="Send Assignments">
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
}else{
		header("Location:login.php");
	}
?>