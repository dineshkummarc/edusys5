<html>
<head>
<title>TEST</title>
        <script>
$.ajax({
  url : "getUser.php",
  dataType: 'json',
  type: 'POST',
  data : { user : user },
  success : function(data) {
      userData = json.parse(data);
      // $('#age').val(userData.age);
      $('#jobtitle').val(userData.jobtitle);  // Since you are selecting jobtitle, not age
      $('#email').val(userData.email);
  }
}); 
</script>
</head>
<body>
  <form>        
    User
    <select name="user" id="user">
      <option>-- Select User --</option>
      <option value="username1">name1</option>
      <option value="username1">name2</option>
      <option value="username1">name3</option>
    </select> 

            <p>
      Age 
      <input type="text" name="jobtitle" id="jobtitle">
    </p>
    <p>
      Email 
      <input type="text" name="email" id="email">
    </p>
    </form>
	
	<?php
$link = mysqli_connect("localhost", "root", "", "school");

$user = $_REQUEST['user'];

$sql = mysqli_query($link, "SELECT jobtitle, email FROM students WHERE username = '".$user."' ");
$row = mysqli_fetch_array($sql);


echo json_encode($row);
exit();
?>

</body>
</html>