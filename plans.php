<?php session_start(); require('serverConn/conn.php'); if(isset($_SESSION['email'])){ $email =$_SESSION['email'];  ?>
<?php if(isset($_GET['logout'])){ if(session_destroy()){ header("Location.php"); } } ?>	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bitclub | Plans</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
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

	 <!-- Sweet alert -->
	 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
	<?php if(isset($_GET['success'])){ ?> <script> Swal.fire({ icon: 'success', timer: 5000, html:'<p style="color: #6C7293;"><?php echo $_GET['success'] ?></p>', background:'#191C24', color: '#ffc107', showCloseButton: false }) </script> <?php } elseif(isset($_GET['danger'])){ ?> <script> Swal.fire({ icon: 'error', title: 'Sorry...', text: '<?php echo $_GET['danger']; ?>', }) </script> <?php } 
    elseif(isset($_GET['low_balance'])){ ?>
                <script>
                Swal.fire({
            icon: 'question',
            iconHtml: '؟',
            html:'<p style="color: #6C7293;"><?php echo $_GET['low_balance'] ?></p>',
            background:'#191C24',
            color: '#ffc107',
            confirmButtonText: '<a href="dashboard.php?to_grind=#to_grind" style= "color: #ffc107;">Gring to add balance</a>',
            cancelButtonText: '<span class="text-danger">Cancel</span>',
            showCancelButton: true,
            showCloseButton: false
            })
                </script> 
   <?php } ?>
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
                <a href="index.html" class="navbar-brand mx-4 mb-3">
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
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Plans</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <button  data-toggle="modal" data-target="#modalUpdate" class="dropdown-item">Starter ParK</button>
                            <button  data-toggle="modal" data-target="#premium" class="dropdown-item">Premium Park</button>
                            <a href="plans.php" class="dropdown-item">Other Parks</a>
                        </div>
                    </div>
                    <a href="deposite.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Deposite</a>
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


            <!-- Plans section_1 start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-line fa-3x "></i>
                            <div class="ms-3">
                                <p class="mb-2">STARTER PARK</p>
                                <p class="mb-0 text-light">$12.88660 = &#x20A6;5,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#modalUpdate" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-bar fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">PREMIUM PARK</p>
                                <p class="mb-0 text-light">$33.75 = &#x20A6;15,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#premium" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-area fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">GOLD PARK</p>
                                <p class="mb-0 text-light">$67.49 = &#x20A6;30,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#gold" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-link fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">DIAMOND PARK</p>
                                <p class="mb-0 text-light">$121.49 = &#x20A6;54,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#diamond" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Plans section_1 End -->

            <!-- Plans section_2 Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-line fa-3x "></i>
                            <div class="ms-3">
                                <p class="mb-2">SILVER PARK</p>
                                <p class="mb-0 text-light">$166.72 = &#x20A6;74,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#silver" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-bar fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">MASTER PARK</p>
                                <p class="mb-0 text-light">$417.02 = &#x20A6;185,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#master" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-area fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">PLATINUM PARK</p>
                                <p class="mb-0 text-light">$274.85 = &#x20A6;122,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#platinum" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-link fa-3x"></i>
                            <div class="ms-12">
                                <p class="mb-2">SUPPER PARK</p>
                                <p class="mb-0 text-light">$507.60 = &#x20A6;225,000 max price</p>
                                <button type="button" data-toggle="modal" data-target="#supper" class="btn btn-warning btn-full mt-2">Activate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Plans section_2 End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4" style="margin-bottom: 30%;">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Plans logs.</h6>
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
                    <span class="mt-2">$12.88660 = &#x20A6;5,000 max price, </span>
                    <span class="mt-2">2.5% daily top up</span>				
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="starter" class="btn btn-sucess m-2">Activate plan</button>
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
                    <span class="mt-2">$33.75 = &#x20A6;15,000 max price, </span>
                    <span class="mt-2">2.5% daily top up</span>								
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="premium" class="btn btn-sucess m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_premium End -->

    <!-- Modal_gold Start-->
	<div class="modal fade" id="gold" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">GOLD PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
                    <span>For 4 month(s)</span><br>
                    <span class="mt-2">3.3% daily top up, </span>
                    <span class="mt-2">$67.49 = &#x20A6;30,000 max price, </span>
                    <span class="mt-2">4% daily top up</span>											
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="gold" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_gold End-->

    <!-- Modal_diamond Start-->
	<div class="modal fade" id="diamond" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">DIAMOND PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">	
                    <span>For 5 month(s)</span><br>
                    <span class="mt-2">3.8% daily top up, </span>
                    <span class="mt-2">$121.49 = &#x20A6;54,000 max price, </span>
                    <span class="mt-2">6% daily top up</span>												
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="diamond" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_diamond End-->

    <!-- Modal_silver Start-->
	<div class="modal fade" id="silver" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">SILVER PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">	
                    <span>For 7 month(s)</span><br>
                    <span class="mt-2">5.0% daily top up, </span>
                    <span class="mt-2">$166.72 = &#x20A6;74,000 max price, </span>
                    <span class="mt-2">8% daily top up</span>										
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="silver" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_silver End-->

    <!-- Modal_master Start-->
	<div class="modal fade" id="master" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">MASTER PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">				
                    <span>For 9 month(s)</span><br>
                    <span class="mt-2">5.8% daily top up, </span>
                    <span class="mt-2">$417.02 = &#x20A6;185,000 max price, </span>
                    <span class="mt-2">12% daily top up</span>						
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="master" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_master End-->

     <!-- Modal_platinum Start-->
	<div class="modal fade" id="platinum" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">PLATINUM PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">	
                    <span>For 10 month(s)</span><br>
                    <span class="mt-2">8% daily top up, </span>
                    <span class="mt-2">$274.85 = &#x20A6;122,000 max price, </span>
                    <span class="mt-2">14% daily top up</span>									
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="platinum" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_platinum End-->

<!-- Modal_supper Start-->
<div class="modal fade" id="supper" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content bg-secondary">
				<div class="modal-header" style="background: #ffc107;">
					<h6 class="modal-title text-dark">SUPPER PARK</h6>
					<button type="button" class="close" style="border: none;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">				
                    <span>For 12 month(s)</span><br>
                    <span class="mt-2">10% daily top up, </span>
                    <span class="mt-2">$507.60 = &#x20A6;225,000 max price, </span>
                    <span class="mt-2">14% daily top up</span>						
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="supper" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- Modal_supper End-->

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
       <div class="container-fluid mobile">
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
        <a href="#" class="btn btn-lg btn-primary mb-5 btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <style>
        .tradingview-widget-copyright {
            display: none !important;
        }
        .mobile{
            display: none;
        }
        @media(max-width: 578px) {
            .mobile{
                display: block;
                margin-bottom: -20%;
            }
        }
    </style>

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