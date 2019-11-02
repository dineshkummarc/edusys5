<?php
	require("header_alumni.php");
	?>
    <main>
        <!--Main layout-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h1-responsive" style="color:#3c3c3c;">Welcome to <?php echo $sch_name;?>, Alumni Registration Form</h1>
					<p>Get Back to Your Roots<br>(* The information collected below is for membership purpose only)</p>
                </div>
            </div>
            
<!--First row-->
<div class="row">
	<div class="col-lg-2">
		
	</div>
	<!--/.First column-->

	<!--Second column-->
	<div class="col-lg-8" style="border:1px solid #b4b4b4;padding:50px;background-color:#f5f5dc;">
				<div class="panel panel-primary">
		
  <div class="panel-body">
  
  <?php
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
		<strong>Success.</strong> Saved successfully.
	</div>
		  <?php
	  }
	  
	  if(isset($_GET["failed"])){
		  ?>
		  <div class="alert alert-danger">
		<strong>Failed.</strong> Error,Something Went wrong.
	</div>
		  <?php
	  }
	  ?>
  <label for=""><span style="color:red">* Required</span></label><br><br>
	
	<form action="insert_alumni.php" method="post">
	  <div class="form-group">
		<label for="text">Alumni Name <span style="color:red">*</span></label>
		<input type="text" name="first_name" placeholder="Your Answer" class="form-control" required>
	  </div>
	  
	  <label for="gender">Gender <span style="color:red">*</span></label>
	 <div class="checkbox">
	  <label><input type="checkbox" name="gender" value="male"> Male</label>
	</div>
	
	<div class="checkbox">
	  <label><input type="checkbox" name="gender" value="female"> Female</label>
	</div>
	<br>
	<div class="form-group">
		<label for="text">Date of Birth, atleast date and month (dd-mm-yyyy)</label>
		<input type="text" name="dob" placeholder="dd-mm-yyyy" class="form-control" required>
	 </div>
	 
	 
	 <label for="gender">Studied upto <span style="color:red">*</span></label>
	 <div class="radio">
	  <label><input type="radio" value="1st Std" name="studied_upto" > 1st Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="2nd Std" name="studied_upto" > 2nd Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="3rd Std" name="studied_upto"> 3rd Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="4th Std" name="studied_upto"> 4th Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="5th Std" name="studied_upto"> 5th Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="6th Std" name="studied_upto"> 6th Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="7th Std" name="studied_upto"> 7th Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="8th Std" name="studied_upto"> 8th Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="9th Std" name="studied_upto"> 9th Std</label>
	</div>
	<div class="radio">
	  <label><input type="radio" value="10th Std" name="studied_upto"> 10th Std</label>
	</div>
	<br>
	<div class="form-group">
		<label for="text">Year of Passing out (if you have studied & passed out in 1985-86 enter as 1986) <span style="color:red">*</span></label>
		<input type="text" name="year_passing" placeholder="Your Answer" class="form-control" required>
	  </div>
	  
	<div class="form-group">
		<label for="text">Educational Qualification as of now <span style="color:red">*</span></label>
		<input type="text" name="qualification" placeholder="Your Answer" class="form-control" required>
	  </div>
	
	
	<label for="occupation">Occupation (Multiple can be choosen)<span style="color:red">*</span></label>
	 <div class="checkbox">
	  <label><input type="checkbox" name="occupation" value="Agriculture"> Agriculture</label>
	</div>
	
	<div class="checkbox">
	  <label><input type="checkbox" name="occupation" value="Business"> Business</label>
	</div>
	<div class="checkbox">
	  <label><input type="checkbox" name="occupation" value="Profession"> Profession</label>
	</div>
	<div class="checkbox">
	  <label><input type="checkbox" name="occupation" value="Social Service"> Social Service</label>
	</div>
	<div class="checkbox">
	  <label><input type="checkbox" name="occupation" value="Others"> Others</label>
	</div>
	<br>
	
	<div class="form-group">
		<label for="text">Area of Expertise in Business/ Profession / Others (eg. MNC franchisee/ hospitality/ Doctor/ Engineer/ govt service etc):</label>
		<input type="text" name="expertise" placeholder="Your Answer" class="form-control">
	  </div>
	
	<div class="form-group">
		<label for="text">Current Position & Organisation (egs: Doctor - govt service, General Manager- infosys, Housewife, social service.. etc. any other please specify)</label>
		<input type="text" name="current_position" placeholder="Your Answer" class="form-control">
	  </div>
	
	<div class="form-group">
		<label for="text">Present Address <span style="color:red">*</span></label>
		<input type="text" name="address" placeholder="Your Answer" class="form-control" required>
	  </div>
	
	<div class="form-group">
		<label for="text">City <span style="color:red">*</span></label>
		<input type="text" name="city" placeholder="Your Answer" class="form-control" required>
	  </div>
	
	<div class="form-group">
		<label for="text">Hometown <span style="color:red">*</span></label>
		<input type="text" name="hometown" placeholder="Your Answer" class="form-control" required>
	  </div>
	  
	<div class="form-group">
		<label for="email">Email (if you need to get regular updates of Alumni Association & school activities, pls mention)</label>
		<input type="email" name="email" placeholder="Your Answer" class="form-control">
	  </div>
	
	<div class="form-group">
		<label for="text">Phone No <span style="color:red">*</span></label>
		<input type="text" name="phone" placeholder="Your Answer" class="form-control" required>
	  </div>
	
	<div class="form-group">
		<label for="text">Comments & Suggestions</label>
		<textarea rows="5" name="comments" class="form-control"></textarea>
	  </div>
	
	<button type="submit" class="btn btn-primary" name="register">Submit</button>
	</form>
		
	</div>
	</div>
	</div>
	<!--/.Second column-->

	<!--Third column-->
	<div class="col-lg-2">
	   
	</div>
</div>
			
            
                <!--Second column-->

               
            </div>
			<br>
			<br>
			<br>
		
    </main>

    <?php
	require("footer.php");
	?>