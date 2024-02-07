<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

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
	

    <div class="col-sm-8" style="padding-top: 50px;">
    <?php
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
		<strong>Success</strong> Submitted Successfully.
	</div>
		  <?php
	  }
	  ?>
	<h3 style="font-weight:bold;">Generate Bulk Student ID Card</h3>
    <form action="generate_id_card.php" method="post" enctype="multipart/form-data" role="form">
    
    <div class="form-group">
    <select class="form-control" name="present_class">
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
        
   <input type="hidden" name="academic_year" value="<?php echo $cur_academic_year;?>">
	
	
	<input type="submit" name="idcard" class="btn btn-success" value="Generate">
	</form><br>
  <br><button onclick="goBack()" class="btn btn-default">Go Back</button>
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
