<?php
	require("header.php");
	?>
    <main>
        <!--Main layout-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h1-responsive">Welcome to <?php echo $sch_name;?></h1>
                </div>
            </div>
            <hr>

            <!--First row-->
            <div class="row">
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/admin1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Admin</h4>
                            <p class="card-text">Main admin login.Manage everything.</p>
                            <a href="school/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/attendance2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Alumni Registration</h4>
                            <p class="card-text">Alumni Registration Form</p>
                            <a href="registration.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/parents2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Parents Module</h4>
                            <p class="card-text">View student status and reports</p>
                            <a href="parents/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>


            </div>
<br><br>
            <div class="row">
                 <!--Third column-->
                 <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/staff.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Staff Module</h4>
                            <p class="card-text">Staff Module Login</p>
                            <a href="staff/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>
            </div>
			<br>
			<br>
			<br>
            <!--/.First row-->

            <!--
            <div class="row">

            <div class="col-lg-4">
                        <div class="z-depth-4">
                            <img class="img-fluid" src="images/newfolder/staff1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Staff Module</h4>
                                <p class="card-text">View and manage students</p>
                                 <a href="staff/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>
                </div>
                </div>

                
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/sms1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Bulk SMS</h4>
                            <p class="card-text">All type of sms communications</p>
                            <!--<a href="bulk_sms/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>
              
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/library.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Library Module</h4>
                            <p class="card-text">Manage library books and transactions</p>
                            <!--<a href="library/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
					</div>
            </div>
            -->
			
			<br>
			<br>
			<br> <hr>

   
        </div>
        <!--/.Main layout-->
    </main>

    <?php
	require("footer.php");
	?>