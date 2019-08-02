<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
require("connection.php");
if(isset($_GET["id"])){
$id=$_GET["id"];
}
$sql="select * from student_marks where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$first_name=$value["first_name"];
	$roll_no=$value["roll_no"];
	
	
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update/Edit Marks</h4></div>
      <div class="panel-body">
	
			<?php
			if(isset($_GET["success"])){
			?>
			<div class="alert alert-success">
			<strong>Success</strong> Updated successfully.
			</div>
			<?php
			}
			
			?>
<h4 style="color:red;"><?php echo $first_name." , Admission No is ".$roll_no; ?></h4>			
							
	<form action="update_class_marks.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
	   <label for="usr">Quraan</label>
		<input type="text" name="sub1" value="<?php echo $value['sub1'];?>" class="form-control">
	  </div>
	<div class="form-group">
	   <label for="usr">Hadees</label>
		<input type="text" name="sub2" value="<?php echo $value['sub2'];?>" class="form-control">
	  </div>
	<div class="form-group">
	   <label for="usr">Aqaid Masail</label>
		<input type="text" name="sub3" value="<?php echo $value['sub3'];?>" class="form-control">
	  </div>
	<div class="form-group">
	   <label for="usr">Islamic Tarbiyat</label>
		<input type="text" name="sub4" value="<?php echo $value['sub4'];?>" class="form-control">
	  </div>
	<div class="form-group">
	   <label for="usr">Zabaan</label>
		<input type="text" name="sub5" value="<?php echo $value['sub5'];?>" class="form-control">
	  </div>
	
	 <input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="submit" class="btn btn-success" value="Update Marks">
	</form><br><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>
<?php
			
}
require("footer.php");
}
else
{
header("Location:login.php");
}
?>  
