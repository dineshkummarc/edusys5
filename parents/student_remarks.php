<?php
session_start();

if(isset($_SESSION['parents_uname'])&&isset($_SESSION['parents_pass'])&&isset($_SESSION['parents_class'])&&isset($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$first_name = $_SESSION['parents_uname'];
$roll_no = $_SESSION['parents_pass'];
error_reporting("0");
require("header.php");
require("connection.php");

$sql_remarks="select * from remarks where first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."' order by id desc";
$result_remarks=mysqli_query($conn,$sql_remarks);
        ?>
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-8">
 <hr><div class="table-responsive"> 
 <h1>Student Remarks</h1>
    <table class="table table-bordered table-hover table-striped">
           <?php 
          if(mysqli_num_rows($result_remarks)==0){
            echo "<tr>No Remarks to display</tr>"; 
          }else{
        ?>
          <tr> 
          <th>SL No</th>
          <th>Remarks Title</th>
          <th>Details</th>
          <th>Added Date</th>
          </tr>
          
          <?php 
          
          $row_count=1;
          foreach($result_remarks as $remarks){
              $remarks_date= date('d-m-Y', strtotime( $remarks['remarks_date'] ));
        ?>
         <tr> 
          <td><?php echo $row_count;?></td>
          <td><?php echo $remarks["remarks_title"];?></td>
          <td><?php echo $remarks["remarks_desc"];?></td>
          <td><?php echo $remarks_date;?></td>
        
          </tr>
        
        <?php
        $row_count++;
          }
          }
          
          ?>
         

        </table>
    </div>
</div>

<div class="col-sm-2">
</div>
</div>
<?php
	
	require("footer.php");
	}
	else
	{
header("Location:login.php");

	}

?>			
