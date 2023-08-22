<?php require('serverConn/conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Clients | Withdraw</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
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
                    <?php if(isset($_GET['APROVED'])){ $id = $_GET['APROVED']; if(mysqli_query($conn, "UPDATE withdrawal_logs SET status='APROVED' WHERE id='{$id}'")){ header("Location: withdraw.php?success= APROVED successfuly!"); } }elseif(isset($_GET['DECLINED'])){ $declined = $_GET['DECLINED']; if(mysqli_query($conn, "UPDATE withdrawal_logs SET status='DECLINED' WHERE id='{$declined}'")){ header("Location: withdraw.php?success=DECLINED successfuly"); } } ?>
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
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> 
							<?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_8 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <img src="profiles/<?= $row_8['img_url']; ?> " class="img-circle" width="36" height="36"> <?php } ?>	
							<span ><?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"))){ $row_7 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin")); ?> <?php echo $row_7['user_name']; } ?></span></span> </a>
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
						
							</a>
						</li>
						<li class="nav-item">
							<a href="admin-plans.php">
								<i class="la la-table"></i>
								<p>Plans</p>
								
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
							
							</a>
						</li>
						<li class="nav-item active">
							<a href="client_account.php">
								<i class="la la-th"></i>
								<p>Clients account</p>
							
							</a>
						</li>
						<li class="nav-item">
							<a href="clients_plans.php">
								<i class="la la-bell"></i>
								<p>Clients plans</p>
								
							</a>
						</li>
						<li class="nav-item">
							<a href="withdraw.php">
								<i class="la la-font"></i>
								<p>Clients Withdraw</p>
								
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
						<h4 class="page-title">Withdrawal Record</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Logs.</div>
									</div>
									<div class="card-body">
										<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
											<thead  class="text-center">
												<tr>
													<th scope="col">#</th>
													<th scope="col">Amount</th>
													<th scope="col">Email</th>
													<th scope="col">Status</th>
													<th scope="col">Bank name</th>
                                                    <th scope="col">Account numb</th>
													<th scope="col">Created</th>
													<th scope="col">Update</th>
                                                    <th scope="col">Action</th>
													<th scope="col">Decline</th>
												</tr>
											</thead>
											<tbody class="text-center">
												<?php $select_1 = "SELECT * FROM withdrawal_logs ORDER BY id ASC"; $select_2 = "SELECT * FROM user_details"; $select_3 = "SELECT * FROM user_balance "; $query_1 = mysqli_query($conn, $select_1); if(mysqli_num_rows($query_1)){ while($row_1 = mysqli_fetch_assoc($query_1)){ ?>
												<tr>
													<td><?php echo $row_1['id'] ?></td>
													<td>$<?php echo $row_1['amount'] ?></td>
													<td><?php echo $row_1['email'] ?></td>
                                                    <?php if($row_1['status'] == "PENDING..."){ ?>
													<td><button class="btn btn-danger p-1"><?php echo $row_1['status'] ?></button></td>
													<?php }elseif($row_1['status'] == "DECLINED"){ ?>
                                                    <td><button class="btn btn-primary p-1"><?php echo $row_1['status'] ?></button></td>
                                                    <?php }else{ ?>
													<td><button class="btn btn-info p-1"><?php echo $row_1['status'] ?></button></td>
												 	<?php	} ?>
                                                    <td><?php echo $row_1['bank_name'] ?></td>
                                                    <td><?php echo $row_1['Account_numb'] ?></td>
													<td><?php echo $row_1['reg_date'] ?></td>
													<td><?php echo $row_1['reg_date'] ?></td>
													<td><a class="bg-success p-2 text-white" href="withdraw.php?APROVED=<?php echo $row_1['id'] ?>">Aprove</a></td>
                                                    <td><a class="bg-danger p-2 text-white" href="withdraw.php?DECLINED=<?php echo $row_1['id'] ?>">Decline</a></td>
												</tr>
												<?php } } ?>
											</tbody>
										</table>
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
							2022, made with <i class="la la-heart heart text-danger"></i> by <a href="http://www.bitclub.com">James Dev.</a>
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
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php 
    if(isset($_GET['success'])){?>
    <script>
       Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: '<?php echo $_GET['success']; ?>',
  showConfirmButton: true,
  timer: 4000
})
   </script>
    <?php } elseif(isset($_GET['danger'])) { ?>
        <script>
    Swal.fire({
  icon: 'error',
  title: 'Sorry...',
  text: '<?php echo $_GET['danger']; ?>',
}) </script>
        <?php } ?>
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