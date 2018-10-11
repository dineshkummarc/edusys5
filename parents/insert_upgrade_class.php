<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_GET["count"]);
	echo $count;
    for($i=0;$i<$count;$i++){
	
	$result = test_input($_POST["result"][$i]);
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	$present_class = test_input($_POST["present_class"][$i]);
	$academic_year = test_input($_POST["academic_year"][$i]);
	$taken_by = test_input($_POST["taken_by"][$i]);
	
	if($result=="pass"){
		if($present_class=="lkg"){
			$upgrade_class="ukg";
		}else if($present_class=="ukg"){
			$upgrade_class="first standard";
		}else if($present_class=="first standard"){
			$upgrade_class="second standard";
		}else if($present_class=="second standard"){
			$upgrade_class="third standard";
		}else if($present_class=="third standard"){
			$upgrade_class="fourth standard";
		}else if($present_class=="fourth standard"){
			$upgrade_class="fifth standard";
		}else if($present_class=="fifth standard"){
			$upgrade_class="sixth standard";
		}else if($present_class=="sixth standard"){
			$upgrade_class="seventh standard";
		}else if($present_class=="seventh standard"){
			$upgrade_class="eigth standard";
		}else if($present_class=="eigth standard"){
			$upgrade_class="ninth standard";
		}else if($present_class=="ninth standard"){
			$upgrade_class="tenth standard";
		}else if($present_class=="tenth standard"){
			$upgrade_class="first puc";
		}else if($present_class=="first puc"){
			$upgrade_class="second puc";
		}else if($present_class=="second puc"){
			$upgrade_class="";
		}
	}
	else if($result=="fail"){
		if($present_class=="lkg"){
			$upgrade_class="lkg";
		}else if($present_class=="ukg"){
			$upgrade_class="ukg";
		}else if($present_class=="first standard"){
			$upgrade_class="first standard";
		}else if($present_class=="second standard"){
			$upgrade_class="second standard";
		}else if($present_class=="third standard"){
			$upgrade_class="third standard";
		}else if($present_class=="fourth standard"){
			$upgrade_class="fourth standard";
		}else if($present_class=="fifth standard"){
			$upgrade_class="fifth standard";
		}else if($present_class=="sixth standard"){
			$upgrade_class="sixth standard";
		}else if($present_class=="seventh standard"){
			$upgrade_class="seventh standard";
		}else if($present_class=="eigth standard"){
			$upgrade_class="eigth standard";
		}else if($present_class=="ninth standard"){
			$upgrade_class="ninth standard";
		}else if($present_class=="tenth standard"){
			$upgrade_class="tenth standard";
		}else if($present_class=="first puc"){
			$upgrade_class="first puc";
		}else if($present_class=="second puc"){
			$upgrade_class="second puc";
		}
	}
	
	$sql="Update students set present_class='".$upgrade_class."' , academic_year='".$academic_year."' where first_name='".$first_name."' and roll_no='".$roll_no."'";

	
var_dump($sql);
		  if ($conn->query($sql) === TRUE) {
			header("Location:upgrade_class.php?status=.'submitted'");
			var_dump($sql);
			
			//header("Location:att_sms.php?academic_year=".$academic_year."&present_class=".$present_class);
			}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			}
			
		
	}

	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 