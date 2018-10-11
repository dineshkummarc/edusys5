<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
if(isset($_POST["submit"])){
	if($_FILES['file']['name']){
		$filename = explode(".",$_FILES['file']['name']);
		if($filename[1] == 'csv'){
			$handle = fopen($_FILES['file']['tmp_name'],"r");
			$count = 0;
			while($data = fgetcsv($handle))
			{
				$book_name = mysqli_real_escape_string($conn,$data[0]);
				$cat = mysqli_real_escape_string($conn,$data[1]);
				$book_id = mysqli_real_escape_string($conn,$data[2]);
				$author = mysqli_real_escape_string($conn,$data[3]);
				$edition = mysqli_real_escape_string($conn,$data[4]);
				$no_books = mysqli_real_escape_string($conn,$data[5]);
				
				$count++;                                      

               if($count>1){ 
				$sql="insert into books (book_name,cat,book_id,author,edition,no_books,tot_books,academic_year) values('$book_name','$cat','$book_id','$author','$edition','$no_books',tot_books+'$no_books','$cur_academic_year')";
				$conn->query($sql);
				var_dump($sql);
			}
			}
			fclose($handle);
			print "Import done";
			header('Location: all_books.php');
		}
	}
}
?>
<div class="container">
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-6"><br><br>
<div class="panel panel-primary">
     <div class="panel-heading"><h4>Import Books (CSV format)</h4></div>
      <div class="panel-body">

<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Import">Upload</button>
</form>
<br>
<a href="uploads/library_template.csv"> <i class="fa fa-download" aria-hidden="true"></i> Download CSV Template</a>
</div>

</div>
</div>
<div class="col-sm-3">
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
