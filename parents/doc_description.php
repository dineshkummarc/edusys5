<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{


require("header.php");	

?>
<head>
<script>
function printDiv(documents) {
     var printContents = document.getElementById('documents').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
<?php
		require("connection.php");
		
		if(isset($_GET["id"])){
		$id=$_GET["id"];
		$sql="select * from uploaded_documents where id='".$id."'";	
		}
		$result=mysqli_query($conn,$sql);
         if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$upl_doc_name=$row["upl_doc_name"];
		$upl_file_name=$row["upl_file_name"];
		$upl_file_path=$row["upl_file_path"];
		$upl_date=$row["upl_date"];
	}		
		?>
<div class="container-fluid"><br>
         <button type="button" class="btn btn-success"  onclick="printDiv('study')">Print Document</button>
         <a href="documents.php"><button type="button" class="btn btn-success">Go Back</button></a>
		 <h3>Document Name : <?php echo $upl_doc_name;?> , Uploaded Date : <?php echo $upl_date;?></h3>
		<div class="row">
		<div class="col-sm-1">
		</div>
		
		<div class="col-sm-10" id="documents"><br>
		
		
		<img src="<?php echo $upl_file_path; ?>" width="100%">
         </div>
	  <div class="col-sm-1">
	</div>
	
</div>
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
