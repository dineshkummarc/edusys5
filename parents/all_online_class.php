<?php
session_start();
if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class']))
{
$cur_academic_year=$_SESSION['academic_year'];
$present_class=$_SESSION['parents_class'];
$first_name=$_SESSION['parents_uname'];
$roll_no=$_SESSION['parents_pass'];
require("header.php");

$sql_section="select section from students where first_name='".$first_name."'  and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";
$result_section = mysqli_query($conn, $sql_section);
if($row_section=mysqli_fetch_array($result_section,MYSQLI_ASSOC))
{
    $section = $row_section["section"];
}

?>

<div class="container-fluid">
 
	 <div class="row">
	 <button onclick="goBack()" class="btn btn-default">Go Back</button>
     <div class="col-sm-1">
    </div>
    <div class="col-md-10">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  
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
	<a href="all_online_class.php" class="btn btn-success">View All Classes</a>
	
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
		<td>Present Class | Section </td>
		<td>Subject | Chapter Name </td>
		
		<td style="width:10%"></td>
	</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=200;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
	{
		if(!empty($_GET['subject_name']))
		{
			$subject_name=$_GET["subject_name"];
			
			$sql="select * from online_class where present_class='".$present_class."' and section='".$section."' and subject_name='".$subject_name."' and academic_year='".$cur_academic_year."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
			
		}
	}
		else
		{
			$sql="select * from online_class where present_class='".$present_class."' and section  ='".$section."' and academic_year='".$cur_academic_year."' ORDER BY id  LIMIT $start_from, $num_rec_per_page";
			
		}
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_class=mysqli_num_rows($result);

	foreach($result as $row)
	{
		 $id = $row["id"];
	
	
	?>
    <tr>
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><?php echo strtoupper($row["present_class"]);?><br><?php echo strtoupper($row["section"]);?></td>
		<td><a href="<?php echo 'video_description.php?id='.$id;?>>" style="color:blue;"><?php echo strtoupper($row["subject_name"]);?><br><?php echo $row["chapter"];?></a></td>
		<td><a href="<?php echo 'video_description.php?id='.$id;?>"><img src="../school/images/play.png"></a></td>
    </tr>
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
