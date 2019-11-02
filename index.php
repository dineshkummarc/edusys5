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
			<br>
			<br>
			<br>
            <!--/.First row-->

            <!--Second row-->
            <div class="row">

                <!--First column-->
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/sms1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Bulk SMS</h4>
                            <p class="card-text">All type of sms communications</p>
                            <!--<a href="bulk_sms/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>-->
                        </div>

                    </div>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-lg-4">
                        <div class="z-depth-4">
                            <img class="img-fluid" src="images/newfolder/staff1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Staff Module</h4>
                                <p class="card-text">View and manage students</p>
                                 <!--<a href="staff/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>-->
                            </div>

                        </div>
                </div>
                <!--Second column-->

                <!--Third column-->
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/library.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Library Module</h4>
                            <p class="card-text">Manage library books and transactions</p>
                            <!--<a href="library/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>-->
                        </div>

                    </div>
					</div>
            </div>
            <!--/.Second row-->
			
			<br>
			<br>
			<br>
			
            <!--Second row-->
            <div class="row">
                <div class="col-lg-4">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/accounting1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Fee Management</h4>
                            <p class="card-text">All type of fee management</p>
                            <!--<a href="fee/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>-->
                        </div>

                    </div>
					
					</div>
                <div class="col-lg-4">
                        <div class="z-depth-4">
                            <img class="img-fluid" src="images/newfolder/website.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">Website Update</h4>
                                <!--Text-->
                                <p class="card-text">Update your website</p>
                                <!--<a href="<?php echo $web;?>/wp-admin" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>-->
                            </div>

                        </div>
                        
                </div>
                <!--Second column-->

                <!--Third column-->
                <div class="col-lg-4">

                    
                    <div class="z-depth-4">

                        <img class="img-fluid" src="images/newfolder/staff1.jpg" alt="Card image cap">

                        <div class="card-body">
                          
                            <h4 class="card-title">Student Marks Admin</h4>
                            
                            <p class="card-text">Students database and attendance</p>
                             <!--<a href="school/login_marks.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>-->
                        </div>

                    </div>
                    <!--/.Card-->
                
                </div>
               
            </div>
			<br>
			<br>
			<br>
			
			
            <hr>

            <!--
            <nav class="row flex-center wow fadeIn" data-wow-delay="0.2s">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#!" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#!">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item"><a class="page-link" href="#!">4</a></li>
                    <li class="page-item"><a class="page-link" href="#!">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#!" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!--/.Pagination-->
        </div>
        <!--/.Main layout-->
    </main>

    <?php
	require("footer.php");
	?>