<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_GET["count"]);
	echo $count;
    for($i=0;$i<$count;$i++){
	
	$result = test_input($_POST["result"][$i]);
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	$present_class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	$academic_year = test_input($_POST["academic_year"][$i]);
	$taken_by = test_input($_POST["taken_by"][$i]);
	
	if($result=="pass"){
		if($present_class=="prekg"){
			$upgrade_class="lkg";
		}else if($present_class=="lkg"){
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
			$upgrade_class="eighth standard";
		}else if($present_class=="eighth standard"){
			$upgrade_class="ninth standard";
		}else if($present_class=="ninth standard"){
			$upgrade_class="tenth standard";
		}
	}
	else if($result=="fail"){
		if($present_class=="prekg"){
			$upgrade_class="prekg";
		}else if($present_class=="lkg"){
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
		}else if($present_class=="eighth standard"){
			$upgrade_class="eighth standard";
		}else if($present_class=="ninth standard"){
			$upgrade_class="ninth standard";
		}else if($present_class=="tenth standard"){
			$upgrade_class="tenth standard";
		}
		
		
	}else if($result=="absent"){
		if($present_class=="prekg"){
			$upgrade_class="prekg";
		}else if($present_class=="lkg"){
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
		}else if($present_class=="eighth standard"){
			$upgrade_class="eighth standard";
		}else if($present_class=="ninth standard"){
			$upgrade_class="ninth standard";
		}else if($present_class=="tenth standard"){
			$upgrade_class="tenth standard";
		}else if($present_class=="first puc arts"){
		$upgrade_class="first puc arts";
		}else if($present_class=="first puc commerce"){
			$upgrade_class="first puc commerce";
		}else if($present_class=="first puc science"){
			$upgrade_class="first puc science";
		}else if($present_class=="second puc arts"){
			$upgrade_class="second puc arts";
		}else if($present_class=="second puc commerce"){
			$upgrade_class="second puc commerce";
		}else if($present_class=="second puc science"){
			$upgrade_class="second puc science";
		}
		
		
	}
	
	
	else if($result=="first puc arts"){
		$upgrade_class="first puc arts";
	}else if($result=="first puc commerce"){
		$upgrade_class="first puc commerce";
	}else if($result=="first puc science"){
		$upgrade_class="first puc science";
	}else if($result=="second puc arts"){
		$upgrade_class="second puc arts";
	}else if($result=="second puc commerce"){
		$upgrade_class="second puc commerce";
	}else if($result=="second puc science"){
		$upgrade_class="second puc science";
	}else if($result=="first b.com"){
		$upgrade_class="first b.com";
	}else if($result=="second b.com"){
		$upgrade_class="second b.com";
	}else if($result=="third b.com"){
		$upgrade_class="third b.com";
	}
	
	
	
	$sql_select="select * from students where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";
	$result_select=mysqli_query($conn,$sql_select);
	if($row_select=mysqli_fetch_array($result_select,MYSQLI_ASSOC))
	{
	$class_join=$row_select["present_class"];	
	$admission=$row_select["admission_no"];	
	$blood=$row_select["blood"];	
	$join_date=$row_select["join_date"];	
	$sex=$row_select["sex"];	
	$dob=$row_select["dob"];	
	$place_birth=$row_select["place_birth"];	
	$roll_no=$row_select["roll_no"];	
	$village=$row_select["village"];	
	$town=$row_select["town"];	
	$taluk=$row_select["taluk"];	
	$district=$row_select["district"];	
	$academic_year=$row_select["academic_year"];	
	$father_name=$row_select["father_name"];	
	$mother_name=$row_select["mother_name"];	
	$stay_with=$row_select["stay_with"];	
	$father_add=$row_select["father_add"];	
	$fa_occu=$row_select["fa_occu"];	
	$ma_occu=$row_select["ma_occu"];	
	$nation=$row_select["nation"];	
	$religion=$row_select["religion"];	
	$caste=$row_select["caste"];	
	$sc_st=$row_select["sc_st"];	
	$back_caste=$row_select["back_caste"];	
	$mother_tongue=$row_select["mother_tongue"];	
	$other_lang=$row_select["other_lang"];	
	$other_lang=$row_select["other_lang"];	
	$no_bro=$row_select["no_bro"];	
	$no_sis=$row_select["no_sis"];	
	$perm_address=$row_select["perm_address"];	
	$vaccinated=$row_select["vaccinated"];	
	$illness_sick=$row_select["illness_sick"];
	$class_join=$row_select["class_join"];
	$first_name=$row_select["first_name"];
	$parent_contact=$row_select["parent_contact"];
	$rollno=$row_select["rollno"];
	$section=$row_select["section"];
	$address=$row_select["address"];
	$adhaar_no=$row_select["adhaar_no"];
	
	$filename=$row_select["photo_name"];
	$filepath=$row_select["photo_path"];
	$filetype=$row_select["photo_type"];
	
	$filename1=$row_select["adhar_name"];
	$filepath1=$row_select["adhar_path"];
	$filetype1=$row_select["adhar_type"];
	
	$filename2=$row_select["birth_name"];
	$filepath2=$row_select["birth_path"];
	$filetype2=$row_select["birth_type"];
	
			if($academic_year=="2017-2018"){
				$upg_academic_year="2018-2019";	
			}
			else if($academic_year=="2018-2019")
			{
				$upg_academic_year="2019-2020";	
			}
			else if($academic_year=="2019-2020")
			{
				$upg_academic_year="2020-2021";	
			}
			else if($academic_year=="2020-2021")
			{
				$upg_academic_year="2021-2022";	
			}
			else if($academic_year=="2021-2022")
			{
				$upg_academic_year="2022-2023";	
			}
	}
	//$sql="Update students set present_class='".$upgrade_class."' , academic_year='".$academic_year."' where first_name='".$first_name."' and roll_no='".$roll_no."'";
	
	$sql="insert into students (present_class,admission_no,blood,join_date,sex,dob,place_birth,roll_no,village,town,taluk,district,academic_year,father_name,mother_name,stay_with,father_add,fa_occu,ma_occu,nation,religion,caste,sc_st,back_caste,mother_tongue,other_lang,no_bro,no_sis,perm_address,vaccinated,illness_sick,class_join,first_name,parent_contact,rollno,section,address,adhaar_no,photo_name,photo_path,photo_type,adhar_name,adhar_path,adhar_type,birth_name,birth_path,birth_type) values('$upgrade_class','$admission','$blood','$join_date','$sex','$dob','$place_birth','$roll_no','$village','$town','$taluk','$district','$upg_academic_year','$father_name','$mother_name','$stay_with','$father_add','$fa_occu','$ma_occu','$nation','$religion','$caste','$sc_st','$back_caste','$mother_tongue','$other_lang','$no_bro','$no_sis','$perm_address','$vaccinated','$illness_sick','$class_join','$first_name','$parent_contact','$rollno','$section','$address','$adhaar_no','$filename','$filepath','$filetype','$filename1','$filepath1','$filetype1','$filename2','$filepath2','$filetype2')";

	
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
	}

	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 