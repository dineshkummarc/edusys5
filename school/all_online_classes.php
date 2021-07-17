<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
?>

<div class="container-fluid">
 
	 <div class="row">
	 <button onclick="goBack()" class="btn btn-default">Go Back</button>
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

		<div class="form-group">
        <?php echo '<select class="form-control" name="subject_name">';
        echo '<option value="">Select Subject</option>';
        $sql="select distinct subject_name from subjects";
        $result=mysqli_query($conn,$sql);
        foreach($result as $value)
        {
        ?>
        <option value='<?php echo $value["subject_name"];?>'><?php echo $value["subject_name"];?></option>
        <?php
        }
        echo '</select>';
        ?>
        </div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	<a href="all_online_classes.php" class="btn btn-success">View All Classes</a>
	<a href="add_online_class.php" class="btn btn-primary">Add Online Class</a>
	
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
	
	<h1 style="font-weight:bold;">All Online Classes</h1>
	<div class="table-responsive">
	<table class="table table-bordered">
	<tbody>
	<tr style="background-color:#1ebeda;color:#fff;">
		<td><span style="font-weight: bold;">SL No</span></td>
		<td>Present Class | Section: </td>
		<td>Subject | Chapter Name: </td>
		<td>Video: </td>
		<td style="width:10%"><span style="font-weight: bold;">Action</span></td>
	</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=200;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
	{
		
		
		if((!empty($_GET['filt_class']))&&(!empty($_GET['section']))&&(!empty($_GET['subject_name'])))
		{
			$filt_class=$_GET["filt_class"];
			$section=$_GET["section"];
			$subject_name=$_GET["subject_name"];
			
			$sql="select * from online_class where present_class='".$filt_class."' and section='".$section."' and subject_name='".$subject_name."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
			
		}
		else if((!empty($_GET['filt_class']))&&(!empty($_GET['subject_name'])))
		{
			$filt_class=$_GET["filt_class"];
			$subject_name=$_GET["subject_name"];
			
			$sql="select * from online_class where present_class='".$filt_class."' and subject_name='".$subject_name."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
			
		}
		else if((!empty($_GET['filt_class']))&&(!empty($_GET['section'])))
		{
			$filt_class=$_GET["filt_class"];
			$section=$_GET["section"];
			
			$sql="select * from online_class where present_class='".$filt_class."' and section='".$section."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
			
		}
		else if(!empty($_GET['filt_class']))
		{
			$filt_class=$_GET["filt_class"];
			$sql="select * from online_class where present_class='".$filt_class."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
			
		}

		else
		{
			$sql="select * from online_class where present_class='".$filt_class."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
		}
		
	}
		else
		{
			
			$sql="select * from online_class   ORDER BY id  LIMIT $start_from, $num_rec_per_page";
		}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_class=mysqli_num_rows($result);

	foreach($result as $row)
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
        $id = $row["id"];
        $updated_by = $row["updated_by"];
	
	
	?>
    <tr>
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><?php echo strtoupper($row["present_class"]);?><br><?php echo strtoupper($row["section"]);?></td>
		<td><a href="<?php echo 'video_description.php?id='.$id;?>" style="color:blue;"><?php echo strtoupper($row["subject_name"]);?>  <br><?php echo $row["chapter"];?></a>    <small><span style="color:black;">Added on <?php echo $updated_at;?> by <?php echo $updated_by;?></span></small></td>
		<td><a href="<?php echo 'video_description.php?id='.$id;?>"><img src="images/play.png"></a></td>
		
		<td><div class="btn-group">
        <a href="<?php echo 'edit_online_class.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="#" onclick="deleteonline(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
	</tr>
	<script>
		  function deleteonline(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_online_class.php?id='+id+'';
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
