<?php require('serverConn/conn.php'); require('settings_config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Home | Admin</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php 
    if(isset($_GET['succes'])){
    ?>
   <script>
       Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: '<?php echo $_GET['succes']; ?>',
  showConfirmButton: true,
  timer: 4000
})
   </script>
    <?php } elseif(isset($_GET['danger'])){ ?>
        <script>
    Swal.fire({
  icon: 'error',
  title: 'Sorry...',
  text: '<?php echo $_GET['danger']; ?>',
}) </script>
        <?php } ?>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Bitclub.
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <img src="profiles/<?= $row_8['img_url']; ?>" class="img-circle" height="36" width="36"> <?php } ?><span ><?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <?php echo $row_7['user_name']; } ?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <img src="profiles/<?= $row_8['img_url']; ?>"> <?php } ?></div>
										<div class="u-text">
											<h4><?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <?php echo $row_7['user_name']; } ?></h4>
											<p class="text-muted"><?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <?php echo $row_7['email']; } ?></p><a href="profiles/<?= $row_8['img_url']; ?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="profiles/<?= $row_8['img_url']; ?>"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="settings.php"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="index.php"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
						<?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <img src="profiles/<?= $row_8['img_url']; ?>"> <?php } ?>
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
								<?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <?php echo $row_7['user_name']; } ?>
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="profiles/<?= $row_8['img_url']; ?>">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="settings.php">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="settings.php">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="admin.php">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="admin-plans.php">
								<i class="la la-table"></i>
								<p>Plans</p>
								<?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM plans ORDER BY id DESC"))){ $row_4 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans ORDER BY id DESC")) ?> <span class="badge badge-count"><?php echo $row_4['id'] ?></span> <?php } ?>
							</a>
						</li>
						<li class="nav-item">
							<a href="transfer.php">
								<i class="la la-fonticons"></i>
								<p>Transfer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="clients-ticket.php">
								<i class="la la-keyboard-o"></i>
								<p>Ticket</p>
								<span class="badge badge-count">50</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="client_account.php">
								<i class="la la-th"></i>
								<p>Clients account</p>
								<?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM signup ORDER BY id DESC"))){ $row_4 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM signup ORDER BY id DESC")) ?> <span class="badge badge-count"><?php echo $row_4['id'] ?></span> <?php } ?>
							</a>
						</li>
						<li class="nav-item active">
							<a href="clients_plans.php">
								<i class="la la-bell"></i>
								<p>Clients plans</p>
								<?php $select_1 = "SELECT * FROM plans_logs ORDER BY id DESC"; $query_1 = mysqli_query($conn, $select_1); if($query_1) { $row_1 = mysqli_fetch_assoc($query_1); if(!$row_1['id'] == ""){ ?> <span class="badge badge-success"><?php echo $row_1['id'] ?></span> <?php }else{ echo "0"; } } ?>
							</a>
						</li>
						<li class="nav-item">
							<a href="withdraw.php">
								<i class="la la-font"></i>
								<p>Clients Withdraw</p>
                                <?php $select_1 = "SELECT * FROM withdrawal_logs ORDER BY id DESC"; $query_1 = mysqli_query($conn, $select_1); if($query_1) { $row_1 = mysqli_fetch_assoc($query_1); if(!$row_1['id'] == "") { ?> <span class="badge badge-success"><?php echo $row_1['id'] ?></span> <?php }else{ echo "0"; } } ?>
							</a>
						</li>
						<li class="nav-item update-pro">
							<button  data-toggle="modal" data-target="#modalUpdate">
								<i class="la la-hand-pointer-o"></i>
								<p>Update To Pro</p>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Account settings</h4>
						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Resset password.</div>
									</div>
									<div class="card-body">
										<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="form">
										<div class="form-group has-success">
											<label for="successInput">Old</label>
											<input type="password" id="successInput" name="old" placeholder="Old password" class="form-control">
											<small id="" class="form-text text-danger"><?php echo $errors['old'] ?? '' ?></small>
										</div>
										<div class="form-group has-success has-feedback">
											<label for="errorInput">New</label>
											<input type="password" id="successInput" name="new" placeholder="New password" class="form-control">
											<small id="" class="form-text text-danger"><?php echo $errors['new'] ?? '' ?></small>
											<small id="" class="form-text text-muted">Youre advice to provide atleast 6-12 chars & alpha numeric.</small>
										</div>
										</div>
											<button class="btn btn-success" name="update">Submit</button>
										</form>
									</div>
								</div>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Update profile.</div>
										</div>
										<div class="card-body">
											<form action="settings_config.php" class="form" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<input type="file" class="form-control input-square" name="profile" id="squareInput" placeholder="Square Input">
											</div>
											<button class="btn btn-success">Update.</button>
											</form>							
									</div>
									<div class="card mt-2">
										<div class="card-header">
											<div class="card-title">Change account email.</div>
										</div>
										<div class="card-body">
											<form action="settings_config.php" method="post" class="form">
												<label for="email">Email.</label>
												<input type="email" name="email" id="email" placeholder="Enter to edit Email." class="form-control">
												<button class="btn btn-success m-3">Edit.</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<footer class="footer">
						<div class="container-fluid">
							<nav class="pull-left">
								<ul class="nav">
									<li class="nav-item">
										<a class="nav-link" href="http://www.bitclub.com">
											Bitclub.
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">
											Help
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="http://www.bitclub.com">
											Licenses
										</a>
									</li>
								</ul>
							</nav>
							<div class="copyright ml-auto">
								2022, made with <i class="la la-heart heart text-danger"></i> by <a href="http://www.bitclub.com">James Dav.</a>
							</div>				
						</div>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
					<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
</html>