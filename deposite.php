<?php session_start(); require('serverConn/conn.php'); if(isset($_SESSION['email'])){ $email =$_SESSION['email'];  ?>
<?php if(isset($_GET['logout'])){ if(session_destroy()){ header("Location.php"); } } ?>	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bitclub | Deposite</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
      <!-- Sweet alert -->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> 

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

  
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 style="color: #ffc107;"><i class="fa fa-user-edit me-2"></i>Bitclub.</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_profile WHERE email='{$email}'"))){ $row_8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_profile WHERE email='{$email}'")); ?> <img src="profiles/<?= $row_8['img_url']; ?>" style="width: 40px; height: 40px;" class="rounded-circle"> <?php } ?>
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM signup WHERE email='{$email}'"))){ $row_7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM signup WHERE email='{$email}'")); ?> <?php echo $row_7['username']; } ?></h6>
                        <span>User</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Plans</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <button  data-toggle="modal" data-target="#modalUpdate" class="dropdown-item">Starter ParK</button>
                            <button  data-toggle="modal" data-target="#premium" class="dropdown-item">Premium Park</button>
                            <a href="typography.html" class="dropdown-item"></a>
                            <a href="plans.php" class="dropdown-item">Other Parks</a>
                        </div>
                    </div>
                    <a href="deposite.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Deposite</a>
                    <a href="#" data-toggle="modal" data-target="#wallet_pass_code"  class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>My wallet</a>
                    <a href="password.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Security</a>
                    <a href="profilekey.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Account</a>
                    <a href="dashboard.php?logout" class="nav-item nav-link"><i class="fa fa-clock text-danger me-2" aria-hidden="true"></i>Log Out</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 style="color: #ffc107;" class=" mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i style="color: #ffc107;" class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_profile WHERE email='{$email}'"))){ $row_8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_profile WHERE email='{$email}'")); ?> <img src="profiles/<?= $row_8['img_url']; ?>" style="width: 40px; height: 40px;" class="rounded-circle"> <?php } ?>
                            <span class="d-none d-lg-inline-flex"><?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM signup WHERE email='{$email}'"))){ $row_7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM signup WHERE email='{$email}'")); ?> <?php echo $row_7['username']; } ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="profiles/<?= $row_8['img_url']; ?>" class="dropdown-item">My Profile</a>
                            <a href="password.php" class="dropdown-item">Settings</a>
                            <a href="dashboard.php?logout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

                    <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Start Deposite</h6>
                           <form action="#" method="post" class="form">
                           <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">*User Name</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" >
                                </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control "name="acc_number" aria-label="Default select example" placeholder="Account number"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                <span class="input-group-text" id="basic-addon2">@210883455</span>
                            </div>
                            <label for="basic-url" class="form-label">Your Email Address</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">example@gmail.com</span>
                                <input type="email" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="amount" placeholder="*Amount..." aria-label="Amount (to the nearest dollar)" required>
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="input-group mb-3">
                            <select class="form-select mb-3" name="bank_name" aria-label="Default select example" required>
                                <option selected>Select Bank</option>
                                <option value="UBA.">UBA.</option>
                                <option value="Access Diamond.">Access Diamond.</option>
                                <option value="Citybank.">Citybank.</option>
                                <option value="Heritage bank PLC.">Heritage bank PLC.</option>
                                <option value="Stanbic IBTC bank Plc.">Stanbic IBTC bank Plc.</option>
                                <option value="Standard Charted.">Standard Charted.</option>
                                <option value="Sterling bank Plc.">Sterling bank Plc.</option>
                                <option value="Titan Trust Bank LTD.">Titan Trust Bank LTD.</option>
                                <option value="Unity Bank Plc.">Unity Bank Plc.</option>
                                <option value="Wema Bank Plc.">Wema Bank Plc.</option>
                                <option value="Keystone Bank Ltd.">Keystone Bank Ltd.</option>
                            </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning m-2">Deposite<i class="fa fa-inbox ms-2"></i></button>
                           </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                             <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Payment gate ways</h6><hr>
                            <div class="owl-carousel testimonial-carousel">
                                <div class="testimonial-item text-center">
                                    <img class="img mx-auto" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/1de5b064166283.5c9265c1d1809.gif">
                                </div>
                                <div class="testimonial-item text-center">
                                <img class="img mx-auto" src="https://i.pinimg.com/originals/f8/c4/22/f8c422a0a0e6793b3f9113d419c5143a.gif" >
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4" style="margin-bottom: 25%;">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Deposite logs.</h6>
                        <a style="color: #ffc107;" href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Plan type</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  $select_2 = "SELECT * FROM plans_logs WHERE email='{$email}'"; $query = mysqli_query($conn, $select_2); if(mysqli_num_rows($query)){ while($row_1 = mysqli_fetch_assoc($query)){ ?>
                                <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td><?php echo $row_1['id'] ?></td>
                                <td><button class="btn bg-dark text-warning rounded-pill m-2"><?php echo $row_1['amount'] ?></button></td>
                                <td><button class="btn bg-dark text-warning rounded-pill m-2"><?php echo $row_1['plan_type'] ?></td>
                                <td><button class="btn bg-dark text-warning rounded-pill m-2"><?php echo $row_1['duration'] ?></td>
                                <td><button class="btn btn-warning rounded-pill m-2"><?php echo $row_1['status'] ?></button></td>
                                <td><button class="btn bg-dark text-warning rounded-pill m-2"><?php echo $row_1['reg_date'] ?></td>	
                            </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

        <!-- Modal_starter Start-->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">STARTER PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">				
                    <span>For 2 month(s)</span><br>
                    <span class="mt-2">1.0% daily top up, </span>
                    <span class="mt-2">$5,000 max price, </span>
                    <span class="mt-2">2.5% daily top up</span>				
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="text" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="starter" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_starter End-->

     <!-- Modal_premium Start -->
	<div class="modal fade" id="premium" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">PREMIUM PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">	
                    <span>For 3 month(s)</span><br>
                    <span class="mt-2">2.5% daily top up, </span>
                    <span class="mt-2">$15,000 max price, </span>
                    <span class="mt-2">2.5% daily top up</span>								
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$15,000</span>
                                <input type="text" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="premium" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_premium End -->

<!-- Modal_wallet_pass_code Start-->
<div class="modal fade" id="wallet_pass_code" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">Verify Access To Wallet</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">	
                    <span class="sm">This page is retricted.</span><br>
                    <span class="mt-2"><b>Account Password</b></span>							
					<form action="ticket-config.php"  class="mt-3" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">&#128274;</span>
                                <input type="password" name="wallet_verify" class="form-control" placeholder="******" aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="premium" class="btn btn-warning m-2">Continue..</button>
                            <button data-dismiss="modal" aria-label="Close"name="premium" style="float: right;" class="btn btn-primary m-2">Back</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_wallet_pass_code End-->

          <!-- buttom_bar Start -->
          <div class="container mobile">
        <div class="row align-items-center fixed-bottom mb-0 p-4 bg-secondry">
                    <div class="col bg-secondary p-1 rounded" style="margin-bottom: -20px;">
                        <a href="profilekey.php" class="btn  btn-dark"><i style="color: #ffc107;" class="fa fa-user-edit me-2"></i><small>Profile</small></a>
                    </div>
                    <div class="col bg-secondary p-1 rounded" style="margin-bottom: -20px;">
                        <a href="plans.php" class="btn  btn-dark"><i style="color: #ffc107;" class="fa fa-industry me-2"></i><small>Recharge</small></a>
                    </div>
                    <div class="col bg-secondary p-1 rounded" style="margin-bottom: -20px;">
                        <a href="#" data-toggle="modal" data-target="#wallet_pass_code" class="btn  btn-dark "><i style="color: #ffc107;" class="fa fa-credit-card me-2"></i><small>Wallet</small></a>
                    </div>
                    <div class="col bg-secondary p-1 rounded" style="margin-bottom: -20px;">
                        <a href="more.php" class="btn  btn-dark "><i style="color: #ffc107;" class="fa fa-ellipsis-h me-2"></i><small>More..</small></a>
                    </div>
                </div>
             
            </div>
        </div>
        <!-- buttom_bar End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg mb-5 btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php }else{header("Location: login.php"); } ?>