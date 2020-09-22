<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
?>

<div class="container-fluid">
 
	 <div class="row">
     <div class="col-sm-1">
    </div>
    <div class="col-md-10">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		<select class="form-control" name="filt_class">
		<?php require("selectclass.php");?>
		
        <div class="form-group">
		 <?php echo '<select class="form-control" name="section">';
			echo '<option value="">Select Section</option>';
				$sql="select distinct section from students where academic_year='".$cur_academic_year."'";

				 $result=mysqli_query($conn,$sql);

				foreach($result as $value)
				{
				?>
				<option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
				<?php
				}
				echo '</select><br>';

				?>
		</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	</form>
	
	</div>
	</div>
    <div class="col-sm-1">
    </div>
	</div>
	<br><br>

	<div class="row">
	
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
	
	<h2>All Students</h2>
	<div class="table-responsive">
	<table class="table table-bordered">
	<tbody>
	<tr style="background-color:#1ebeda;color:#fff;">
		<td><span style="font-weight: bold;">SL No</span></td>
		<td>Present Class: <br>Section: </td>
		<td>Subject: <br>Chapter Name: </td>
		<td>Video: </td>
		
		<td style="width:10%"><span style="font-weight: bold;">Action</span></td>
	</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=500;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
	{
	if((isset($_GET["filt_class"]))&&(isset($_GET["section"])))
	{
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
		
		$sql="select * from online_class where present_class='".$filt_class."' and section='".$section."' and academic_year='".$cur_academic_year."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
	}
	else
	{
		$sql="select * from online_class where present_class='".$filt_class."' and academic_year='".$cur_academic_year."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
	}
	
	}
    else
    {
		
        $sql="select * from online_class where  academic_year='".$cur_academic_year."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_class=mysqli_num_rows($result);

	foreach($result as $row)
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
        $dob= date('d-m-Y', strtotime( $row['dob'] ));
        $id = $row["id"];
	
	
	?>
    <tr>
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><?php echo strtoupper($row["present_class"]);?><br><?php echo strtoupper($row["section"]);?></td>
		<td><a href="<?php echo 'video_description.php?id='.$id;?>>" style="color:blue;"><?php echo strtoupper($row["subject_name"]);?><br><?php echo $row["chapter"];?></a></td>
		<td><a href="<?php echo $row["url"];?>"><img src="images/play.png"></a></td>
		
		<td><div class="btn-group"><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" title="View" >  <i class="fa fa-eye fa-lg" style="color:#8ba83e;" aria-hidden="true"></i></a>
        <a href="<?php echo 'upd_register.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
	</tr>
	<script>
		  function deleteme(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='del_students.php?id='+id+'';
			  }
		  }
		  
		  </script>
		<?php 
		$row_count++; 
	}
	?>
	</table>
	</div>
	</div>

    <div class="col-sm-1">
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
