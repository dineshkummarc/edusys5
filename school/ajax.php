<?php

//Including Database configuration file.

require("connection.php");

//Getting value of "search" variable from "script.js".

if (isset($_POST['search'])) {

//Search box value assigning to $Name variable.

   $first_name = $_POST['search'];

//Search query.

   $sql = "SELECT first_name FROM students WHERE first_name LIKE '%".$first_name."%' LIMIT 5";
var_dump($sql);

//Query execution

   $result = mysqli_query($conn, $sql);

//Creating unordered list to display result.

   echo '

<ul>

   ';

   //Fetching result from database.

   while ($row = mysqli_fetch_array($result)) {

       ?>

   <!-- Creating unordered list items.

        Calling javascript function named as "fill" found in "script.js" file.

        By passing fetched result as parameter. -->

   <li onclick='fill("<?php echo $row['first_name']; ?>")'>

   <a>

   <!-- Assigning searched result in "Search box" in "search.php" file. -->

       <?php echo $row['first_name']; ?>

   </li></a>

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->

   <?php

}}



?>

</ul>