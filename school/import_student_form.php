<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	


?>
    <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
		
	  </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-primary">
        <div class="panel-heading"><h4>Import Students - csv file</h4></div>
        <div class="panel-body">
<?php
	if((isset($_GET["success"]))=="success")
	 {
 ?>
	   <div class="alert alert-success">
  <strong>Success!</strong> Uploaded successfully.
</div>
<?php
		}
		else if((isset($_GET["failed"]))=="failed")

		{
		?>
				<div class="alert alert-danger">
		  <strong>Error!</strong> Something went wrong!!!.
		</div>
<?php
		}
?>
					
<form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' enctype="multipart/form-data">

  <input type="file" name="csv_file" required accept=".csv">
  <br>
  <input type="submit" name="import" class="btn btn-primary" value="Import">
 

</form><br>
<a href="uploads/students.csv"> <i class="fa fa-download" aria-hidden="true"></i> Download Excel/CSV Template</a><br>
<?php
// Configuration
require("connection.php");
$table = 'students';       // MySQL table name

// Connect to MySQL


// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if a file was uploaded
if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
    // Temporary file name
    $tmpName = $_FILES['csv_file']['tmp_name'];

    // Read the uploaded CSV file
    if (($handle = fopen($tmpName, 'r')) !== FALSE) {
     
        fgetcsv($handle);
        
        // Truncate the table before importing new data
        // $query = "TRUNCATE TABLE $table";
        // if ($conn->query($query) === FALSE) {
        //     die('Error truncating table: ' . $conn->error);
        // }

        // Prepare the INSERT statement
        $query = "INSERT INTO $table (present_class, admission_no, blood, sex, dob, roll_no, academic_year, father_name, mother_name, caste, mother_tongue, class_join, first_name, parent_contact, rollno, section, address, adhaar_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bind_param('ssssssssssssssssss', $present_class, $admission_no, $blood, $sex, $dob, $roll_no, $academic_year, $father_name, $mother_name, $caste, $mother_tongue, $class_join, $first_name, $parent_contact, $rollno, $section, $address, $adhaar_no);

        // Read and insert data row by row
        while (($data = fgetcsv($handle)) !== FALSE) {
            // Assign CSV data to variables
            list($present_class, $admission_no, $blood, $sex, $dob, $roll_no, $academic_year, $father_name, $mother_name, $caste, $mother_tongue, $class_join, $first_name, $parent_contact, $rollno, $section, $address, $adhaar_no) = $data;

            // Execute the INSERT statement
            if ($stmt->execute() === FALSE) {
                die('Error inserting data: ' . $stmt->error);
            }
        }

        // Close the prepared statement
        $stmt->close();

        // Close the CSV file
        fclose($handle);

        echo 'Data imported successfully.';
    } else {
        echo 'Error reading the CSV file.';
    }
}

// Close the MySQL connection
$conn->close();
?>




          <br>
	 <button class="btn btn-default" onclick="goBack()" >Go Back</button>
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		
	  </div>
    </div>
    </div>
</div>
</div>
<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>

