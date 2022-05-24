<?php 
	require("connection.php");
	require("header.php");
$sql="select * from students";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
$row_count=1;
$percent= round(($row_count/$count)*100,1);
echo "$row_count is $percent % of $count.</p>" ;
foreach($result as $row){
?>
<head>
	<script type="text/javascript">
$(window).load(function() {
	$(".outter").fadeOut("slow");
})
</script>
	<style>
	.outter{
	height:25px;
	width:1000px;
	border: solid 1px black;
	
	}
	
	.inner{
	height:25px;
	width:<?php echo $percent;?>
	border: solid 1px black;
	background-color:lightblue;
	
	}
	</style>
</head>



  
<?php
$row_count++;	
}
?>
<div class="outter">
<div class="inner">
	<?php echo $percent;?>%
</div>
</div>
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $row_count;?>" aria-valuemin="0" aria-valuemax="<?php echo $count;?>" style="width:<?php echo $percent;?>%">
      <span class="sr-only">70% Complete</span>
    </div>
  </div>