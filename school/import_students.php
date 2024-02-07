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
} else {
    echo 'Error uploading the CSV file.';
}

// Close the MySQL connection
$conn->close();
?>
