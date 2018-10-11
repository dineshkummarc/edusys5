<?php
	require("header.php");
	?>
    <main>
        <!--Main layout-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center><h1 class="h1-responsive">Welcome to <?php echo $sch_name;?></h1></center>
                </div>
            </div>
            

            <!--First row-->
            <div class="row">
                <div class="col-lg-2">
                    
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-lg-8">
                    <div class="z-depth-1">
                        
                        <div class="card-body">
                            <h4 class="card-title">Get your Result</h4>
                            <form action="marks_card_print.php">
							  
							  <div class="form-group">
								
								<input type="text" name="roll_no" placeholder="Enter your Enrollment No" class="form-control" >
							  </div>
							  
							  <button type="submit" class="btn btn-default">Submit</button>
							</form>
                        </div>

                    </div>
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-lg-2">
                    
                </div>
            </div>
			<br>
			<br>
			<br>
            <!--/.First row-->

            <!--/.Pagination-->
        </div>
        <!--/.Main layout-->
    </main>

    <?php
	require("footer.php");
	?>