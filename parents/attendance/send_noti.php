<?php
session_start();
if(isset($_SESSION['class_uname'])&&isset($_SESSION['class_pass'])&&isset($_SESSION['class'])&&isset($_SESSION['academic_year']))

{


require("att_header.php");	
require("connection.php");	
$sql="select distinct present_class,parent_contact,first_name,section,roll_no from students";
$result=mysqli_query($conn,$sql);


?>
<HEAD>
<script src="file.js"></script>
<script>
function doc(id){return document.getElementById(id);}
function buildCounty(){
var opts=doc('class_noti').options;
for(var i=0;i<arr.length;i++){
opts[opts.length]=new Option(arr[i][0],arr[i][0]);
}
doc('class_noti').onchange=function(){
this.blur();
var val=this.value;
if(!val){return;}
var co=doc('section_noti').options;
co.length=1;
for(var j=0;j<arr.length;j++){
if(arr[j][0]!==val){continue;}
else{
var temp=arr[j][1];
for(var k=0;k<temp.length;k++){
co[co.length]=new Option(temp[k],temp[k]);
}
break;
}
}
}
}

window.onload=buildCounty;
</script>

<script type="text/javascript">

    $(function () {

        $("input[name='parents']").click(function () {

            if ($("#admission").is(":checked")) {

                $("#admission").show();
				 $("#parents").hide();

            } else {

                $("#admission").hide();
				 $("#parents").show();

            }

        });

    });

</script>
</HEAD>
                               
                                                
		<div class="container-fluid">
		
		<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Send Parents meeting alerts</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation. Meeting notification has been sent successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="send_sms_noti.php" method="post">
      <div class="form-inline">
		   <div class="form-group">
		    <label for="usr">Class</label>
           <select class="form-control" name="class_noti" id="class_noti">
			<option value="">Select Class:</option>
			</select>
          </div>
		  <div class="form-group">
		   <label for="usr">Section</label>
          <select class="form-control" name="section_noti" id="section_noti">
			<option value="">Select Section:</option>
			</select>
          </div>
	  </div>
	
	  <div class="form-group">
	    <label for="usr">Date</label>
		<input type="date" name="f1" class="form-control">
	  </div>
	 
	  
	   <div class="form-group">
	   <label for="usr">Day:</label>
		<select class="form-control" name="f2" id="sel1">
         <option value="monday">Monday</option>
         <option value="tuesday">Tuesday</option>
         <option value="wednesday">Wednesday</option>
         <option value="thursday">Thursday</option>
         <option value="friday">Friday</option>
         <option value="saturday">Saturday</option>
         <option value="sunday">Sunday</option>
       </select>
	  </div>
	  <div class="form-group">
	    <label for="usr">Time</label>
		<input type="time" name="f3" class="form-control">
	  </div>
	 
	 <input type="submit" value="Send SMS" class="btn btn-success"> 
	  
   
</form>
   
    </div>
    </div>
   </div>
   <div class="col-sm-2">
		</div>
</div>



    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>



<?php
			
}
else
{
header("Location:login.php");
}
?>  
