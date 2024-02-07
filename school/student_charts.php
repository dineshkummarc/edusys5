<?php
//require("connection.php");
  $sql_prekg="select id from students where present_class='prekg' and academic_year='".$cur_academic_year."'";
	$result_prekg=mysqli_query($conn,$sql_prekg);
	$total_prekg=mysqli_num_rows($result_prekg);

  $sql_lkg="select id from students where present_class='lkg' and academic_year='".$cur_academic_year."'";
	$result_lkg=mysqli_query($conn,$sql_lkg);
	$total_lkg=mysqli_num_rows($result_lkg);

  $sql_ukg="select id from students where present_class='ukg' and academic_year='".$cur_academic_year."'";
	$result_ukg=mysqli_query($conn,$sql_ukg);
	$total_ukg=mysqli_num_rows($result_ukg);

$sql_1st="select id from students where present_class='first standard' and academic_year='".$cur_academic_year."'";
	$result_1st=mysqli_query($conn,$sql_1st);
	$total_1st=mysqli_num_rows($result_1st);
  

  $sql_2nd="select id from students where present_class='second standard' and academic_year='".$cur_academic_year."'";
	$result_2nd=mysqli_query($conn,$sql_2nd);
	$total_2nd=mysqli_num_rows($result_2nd);

  $sql_3rd="select id from students where present_class='third standard' and academic_year='".$cur_academic_year."'";
	$result_3rd=mysqli_query($conn,$sql_3rd);
	$total_3rd=mysqli_num_rows($result_3rd);

  $sql_4th="select id from students where present_class='fourth standard' and academic_year='".$cur_academic_year."'";
	$result_4th=mysqli_query($conn,$sql_4th);
	$total_4th=mysqli_num_rows($result_4th);

  $sql_5th="select id from students where present_class='fifth standard' and academic_year='".$cur_academic_year."'";
	$result_5th=mysqli_query($conn,$sql_5th);
	$total_5th=mysqli_num_rows($result_5th);

  $sql_6th="select id from students where present_class='sixth standard' and academic_year='".$cur_academic_year."'";
	$result_6th=mysqli_query($conn,$sql_6th);
	$total_6th=mysqli_num_rows($result_6th);

  $sql_7th="select id from students where present_class='seventh standard' and academic_year='".$cur_academic_year."'";
	$result_7th=mysqli_query($conn,$sql_7th);
	$total_7th=mysqli_num_rows($result_7th);

  $sql_8th="select id from students where present_class='eighth standard' and academic_year='".$cur_academic_year."'";
	$result_8th=mysqli_query($conn,$sql_8th);
	$total_8th=mysqli_num_rows($result_8th);

  $sql_9th="select id from students where present_class='ninth standard' and academic_year='".$cur_academic_year."'";
	$result_9th=mysqli_query($conn,$sql_9th);
	$total_9th=mysqli_num_rows($result_9th);

  $sql_10th="select id from students where present_class='tenth standard' and academic_year='".$cur_academic_year."'";
	$result_10th=mysqli_query($conn,$sql_10th);
	$total_10th=mysqli_num_rows($result_10th);


	?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    </script>

      <script type="text/javascript">
      google.charts.load("current", {
          packages: ['corechart']
      });
      google.charts.setOnLoadCallback(drawColChart);

      function drawColChart() {
          var colData = google.visualization.arrayToDataTable([
              ["Element", "Total", {
                  role: "style"
              }],
              ["PREKG", <?php echo $total_prekg; ?>, "#4285f4"],
              ["LKG", <?php echo $total_lkg; ?>, "#34a853"],
              ["UKG", <?php echo $total_ukg; ?>, "#fbbc05"],
              ["1st STD", <?php echo $total_1st; ?>, "#4285f4"],
              ["2nd STD", <?php echo $total_2nd; ?>, "#ea4335"],
              ["3rd STD", <?php echo $total_3rd; ?>, "#fbbc05"],
              ["4th STD", <?php echo $total_4th; ?>, "#ff8f00"],
              ["5th STD", <?php echo $total_5th; ?>, "#34a853"],
              ["6th STD", <?php echo $total_6th; ?>, "#4285f4"],
              ["7th STD", <?php echo $total_7th; ?>, "#ea4335"],
              ["8th STD", <?php echo $total_8th; ?>, "#fbbc05"],
              ["9th STD", <?php echo $total_9th; ?>, "#ff8f00"],
              ["10th STD", <?php echo $total_10th; ?>, "#34a853"],
          ]);

          var colView = new google.visualization.DataView(colData);
          colView.setColumns([0, 1,
              {
                  calc: "stringify",
                  sourceColumn: 1,
                  type: "string",
                  role: "annotation"
              },
              2
          ]);

          var colOptions = {
              //title: "Members Details",
              //width: 600,
              height: 400,
              bar: {
                  groupWidth: "95%"
              },
              legend: {
                  position: "none"
              },
          };
          var chart = new google.visualization.ColumnChart(document.getElementById(
              "columnchart_values"));
          chart.draw(colView, colOptions);
      }
      </script>
                      