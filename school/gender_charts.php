<?php

$sql_prekg_male="select id from students where sex='male'  and present_class='prekg'  and academic_year='".$cur_academic_year."'";
$result_prekg_male=mysqli_query($conn,$sql_prekg_male);
$total_prekg_male=mysqli_num_rows($result_prekg_male);

  $sql_prekg_female="select id from students where sex='female'  and present_class='prekg'  and academic_year='".$cur_academic_year."'";
	$result_prekg_female=mysqli_query($conn,$sql_prekg_female);
	$total_prekg_female=mysqli_num_rows($result_prekg_female);

  ////////////////////////////////////////
  $sql_lkg_male="select id from students where sex='male' and present_class='lkg'  and academic_year='".$cur_academic_year."'";
	$result_lkg_male=mysqli_query($conn,$sql_lkg_male);
	$total_lkg_male=mysqli_num_rows($result_lkg_male);

  $sql_lkg_female="select id from students where sex='female' and present_class='lkg'  and academic_year='".$cur_academic_year."'";
	$result_lkg_female=mysqli_query($conn,$sql_lkg_female);
	$total_lkg_female=mysqli_num_rows($result_lkg_female);

  ////////////////////////////////////////
  $sql_ukg_male="select id from students where sex='male' and present_class='ukg'  and academic_year='".$cur_academic_year."'";
	$result_ukg_male=mysqli_query($conn,$sql_ukg_male);
	$total_ukg_male=mysqli_num_rows($result_ukg_male);

  $sql_ukg_female="select id from students where sex='female' and present_class='ukg'  and academic_year='".$cur_academic_year."'";
	$result_ukg_female=mysqli_query($conn,$sql_ukg_female);
	$total_ukg_female=mysqli_num_rows($result_ukg_female);

  ////////////////////////////////////////
  $sql_1st_male="select id from students where sex='male' and present_class='first standard'  and academic_year='".$cur_academic_year."'";
	$result_1st_male=mysqli_query($conn,$sql_1st_male);
	$total_1st_male=mysqli_num_rows($result_1st_male);

  $sql_1st_female="select id from students where sex='female' and present_class='first standard'  and academic_year='".$cur_academic_year."'";
	$result_1st_female=mysqli_query($conn,$sql_1st_female);
	$total_1st_female=mysqli_num_rows($result_1st_female);

  ////////////////////////////////////////
  $sql_2nd_male="select id from students where sex='male' and present_class='second standard'  and academic_year='".$cur_academic_year."'";
	$result_2nd_male=mysqli_query($conn,$sql_2nd_male);
	$total_2nd_male=mysqli_num_rows($result_2nd_male);

  $sql_2nd_female="select id from students where sex='female' and present_class='second standard'  and academic_year='".$cur_academic_year."'";
	$result_2nd_female=mysqli_query($conn,$sql_2nd_female);
	$total_2nd_female=mysqli_num_rows($result_2nd_female);


  ////////////////////////////////////////
  $sql_3rd_male="select id from students where sex='male' and present_class='third standard'  and academic_year='".$cur_academic_year."'";
	$result_3rd_male=mysqli_query($conn,$sql_3rd_male);
	$total_3rd_male=mysqli_num_rows($result_3rd_male);

  $sql_3rd_female="select id from students where sex='female' and present_class='third standard'  and academic_year='".$cur_academic_year."'";
	$result_3rd_female=mysqli_query($conn,$sql_3rd_female);
	$total_3rd_female=mysqli_num_rows($result_3rd_female);

  ////////////////////////////////////////
  $sql_4th_male="select id from students where sex='male' and present_class='fourth standard'  and academic_year='".$cur_academic_year."'";
	$result_4th_male=mysqli_query($conn,$sql_4th_male);
	$total_4th_male=mysqli_num_rows($result_4th_male);

  $sql_4th_female="select id from students where sex='female' and present_class='fourth standard'  and academic_year='".$cur_academic_year."'";
	$result_4th_female=mysqli_query($conn,$sql_4th_female);
	$total_4th_female=mysqli_num_rows($result_4th_female);

  ////////////////////////////////////////
  $sql_5th_male="select id from students where sex='male' and present_class='fifth standard'  and academic_year='".$cur_academic_year."'";
	$result_5th_male=mysqli_query($conn,$sql_5th_male);
	$total_5th_male=mysqli_num_rows($result_5th_male);

  $sql_5th_female="select id from students where sex='female' and present_class='fifth standard'  and academic_year='".$cur_academic_year."'";
	$result_5th_female=mysqli_query($conn,$sql_5th_female);
	$total_5th_female=mysqli_num_rows($result_5th_female);

  ////////////////////////////////////////
  $sql_6th_male="select id from students where sex='male' and present_class='sixth standard'  and academic_year='".$cur_academic_year."'";
	$result_6th_male=mysqli_query($conn,$sql_6th_male);
	$total_6th_male=mysqli_num_rows($result_6th_male);

  $sql_6th_female="select id from students where sex='female' and present_class='sixth standard'  and academic_year='".$cur_academic_year."'";
	$result_6th_female=mysqli_query($conn,$sql_6th_female);
	$total_6th_female=mysqli_num_rows($result_6th_female);

  ////////////////////////////////////////
  $sql_7th_male="select id from students where sex='male' and present_class='seventh standard'  and academic_year='".$cur_academic_year."'";
	$result_7th_male=mysqli_query($conn,$sql_7th_male);
	$total_7th_male=mysqli_num_rows($result_7th_male);

  $sql_7th_female="select id from students where sex='female' and present_class='seventh standard'  and academic_year='".$cur_academic_year."'";
	$result_7th_female=mysqli_query($conn,$sql_7th_female);
	$total_7th_female=mysqli_num_rows($result_7th_female);

  ////////////////////////////////////////

  $sql_8th_male="select id from students where sex='male' and present_class='eighth standard'  and academic_year='".$cur_academic_year."'";
	$result_8th_male=mysqli_query($conn,$sql_8th_male);
	$total_8th_male=mysqli_num_rows($result_8th_male);

  $sql_8th_female="select id from students where sex='female' and present_class='eighth standard'  and academic_year='".$cur_academic_year."'";
	$result_8th_female=mysqli_query($conn,$sql_8th_female);
	$total_8th_female=mysqli_num_rows($result_8th_female);

  ////////////////////////////////////////
  $sql_9th_male="select id from students where sex='male' and present_class='ninth standard'  and academic_year='".$cur_academic_year."'";
	$result_9th_male=mysqli_query($conn,$sql_9th_male);
	$total_9th_male=mysqli_num_rows($result_9th_male);

  $sql_9th_female="select id from students where sex='female' and present_class='ninth standard'  and academic_year='".$cur_academic_year."'";
	$result_9th_female=mysqli_query($conn,$sql_9th_female);
	$total_9th_female=mysqli_num_rows($result_9th_female);

  ////////////////////////////////////////
  $sql_10th_male="select id from students where sex='male' and present_class='tenth standard'  and academic_year='".$cur_academic_year."'";
	$result_10th_male=mysqli_query($conn,$sql_10th_male);
	$total_10th_male=mysqli_num_rows($result_10th_male);

  $sql_10th_female="select id from students where sex='female' and present_class='tenth standard'  and academic_year='".$cur_academic_year."'";
	$result_10th_female=mysqli_query($conn,$sql_10th_female);
	$total_10th_female=mysqli_num_rows($result_10th_female);

  ////////////////////////////////////////
  




	?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    </script>

      <script type="text/javascript">
      google.charts.load("current", {
          packages: ['corechart']
      });
      google.charts.setOnLoadCallback(drawStackedColChart);

      function drawStackedColChart() {
         


      var data = google.visualization.arrayToDataTable([
        ['Gender', 'Male', 'Female', { role: 'annotation' } ],
        ['PREKG', <?php echo $total_prekg_male;?>, <?php echo $total_prekg_female;?>, ''],
        ['LKG', <?php echo $total_lkg_male;?>, <?php echo $total_lkg_female;?>, ''],
        ['UKG', <?php echo $total_ukg_male;?>, <?php echo $total_ukg_female;?>, ''],
        ['1st STD', <?php echo $total_1st_male;?>, <?php echo $total_1st_female;?>, ''],
        ['2nd STD', <?php echo $total_2nd_male;?>, <?php echo $total_2nd_female;?>, ''],
        ['3rd STD', <?php echo $total_3rd_male;?>, <?php echo $total_3rd_female;?>, ''],
        ['4th STD', <?php echo $total_4th_male;?>, <?php echo $total_4th_female;?>, ''],
        ['5th STD', <?php echo $total_5th_male;?>, <?php echo $total_5th_female;?>, ''],
        ['6th STD', <?php echo $total_6th_male;?>, <?php echo $total_6th_female;?>, ''],
        ['7th STD', <?php echo $total_7th_male;?>, <?php echo $total_7th_female;?>, ''],
        ['8th STD', <?php echo $total_8th_male;?>, <?php echo $total_8th_female;?>, ''],
        ['9th STD', <?php echo $total_9th_male;?>, <?php echo $total_9th_female;?>, ''],
        ['10th STD', <?php echo $total_10th_male;?>, <?php echo $total_10th_female;?>, ''],
      ]);

      
      var options_fullStacked = {
          isStacked: 'percent',
          height: 300,
          legend: {position: 'top', maxLines: 3},
          vAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
          }
        };
    
          var chart = new google.visualization.ColumnChart(document.getElementById(
              "stackedcolumnchart_values"));
          chart.draw(data, options_fullStacked);
      }
      </script>

    
    
                      