<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");
if(isset($_GET["id"])){
  $id = $_GET["id"];
}
?>
<div class="container-fluid"><br>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6" >

<div class="panel panel-primary">
    <div class="panel panel-heading">
    <h3>Generate New Certificate</h3>
    </div>
    <div class="panel-body">
    <form action="insert_certificate.php" method="post" role="form">
  


 <div class="form-group">
  <label>Certificate of(Appreciation/Completion/attending/Participation etc..)</label>
   <input type="text" class="form-control" placeholder="of Appreciation"  name="certificate_of"  id="usr">
 </div>


 <div class="form-group">
   <label for="usr"><span style="color:red;font-size:18px;">*</span>Details Line 1</label>
   <textarea name="details1" class="form-control" cols="30" rows="2" maxlength="85"></textarea>
 </div>
 <div class="form-group">
   <label for="usr"><span style="color:red;font-size:18px;">*</span>Details Line 2</label>
   <textarea name="details2" class="form-control" cols="30" rows="2" maxlength="85"></textarea>
 </div>

 <div class="form-group">
   <label for="usr"><span style="color:red;font-size:18px;">*</span>Details Line 3</label>
   <textarea name="details3" class="form-control" cols="30" rows="2" maxlength="85"></textarea>
 </div>

 <div class="form-group">
   <label for="usr"><span style="color:red;font-size:18px;">*</span>Details Line 4</label>
   <textarea name="details4" class="form-control" cols="30" rows="2" maxlength="85"></textarea>
 </div>
 <input type="hidden" name="id" value="<?php echo $id;?>">

 
 <Input type="submit" class="btn btn-primary" name="certificate" value="Generate Certificate" >
</form>
    </div> 

  </div>  

</div>	
  <div class="col-sm-3"></div>
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
