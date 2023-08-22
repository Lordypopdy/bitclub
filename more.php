<?php session_start(); require('serverConn/conn.php'); if(isset($_SESSION['email'])){ 
    if(mysqli_query($conn, "UPDATE status_2 SET pending = pending + 1")){  
        $email =$_SESSION['email']; ?>	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bitclub | More</title>
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
     <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
     <script src="sweetalert2/dist/sweetalert2.min.js"></script>
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

      <?php  if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_identity WHERE email='{$email}'"))){
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_identity WHERE email='{$email}'"));
        if($row['verified'] == "UNVERIFIED"){ ?>
              <script>
                Swal.fire({
            title: 'UNVERIED ACCOUNT',
            html:'<p style="color: #6C7293;">Your account is unverified, Upload an identity document for example, driver licence, voters card, international passport, national ID. To enable you start using BITCLUB!</p>',
            background:'#191C24',
            color: '#ffc107',
            confirmButtonText: '<a href="profilekey.php?#verification" style= "color: #ffc107;">Upload</a>',
            cancelButtonText: '<span class="text-danger">Cancel</span>',
            showCancelButton: true,
            showCloseButton: false
            })
                </script>
        <?php }else{
            echo "";
           
        }
    }    
      ?>
<?php if(isset($_GET['logout'])){ 
    header("Location: logout_proccesor.php?logout=logout");
    } ?>

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
                    <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Plans</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <button  data-toggle="modal" data-target="#modalUpdate" class="dropdown-item">Starter ParK</button>
                            <button  data-toggle="modal" data-target="#premium" class="dropdown-item">Premium Park</button>
                            <a href="typography.html" class="dropdown-item"></a>
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

    
        </script>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
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


            <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BNBUSDT/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">BNBUSDT Rates</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
  {
  "symbol": "BINANCE:BNBUSDT",
  "width": 350,
  "height": 220,
  "locale": "en",
  "dateRange": "12M",
  "colorTheme": "dark",
  "trendLineColor": "rgba(41, 98, 255, 1)",
  "underLineColor": "rgba(41, 98, 255, 0.3)",
  "underLineBottomColor": "rgba(41, 98, 255, 0)",
  "isTransparent": true,
  "autosize": false,
  "largeChartUrl": ""
}
  </script>
</div>
<!-- TradingView Widget END -->


       

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <?php if(isset($_GET['success'])){ ?> <script> Swal.fire({ icon: 'success', timer: 5000, html:'<p style="color: #6C7293;"><?php echo $_GET['success'] ?></p>', background:'#191C24', color: '#ffc107', showCloseButton: false }) </script>       
                <?php } elseif(isset($_GET['danger'])){ ?> <script> Swal.fire({ icon: 'question', iconHtml: '؟', html:'<p style="color: #6C7293;"><?php echo $_GET['danger'] ?></p>', background:'#191C24', color: '#ffc107', confirmButtonText: '<a href="#" data-toggle="modal" data-target="#wallet_pass_code"  style= "color: #ffc107;">Try again.</a>', ancelButtonText: '<span class="text-danger">Cancel</span>', showCancelButton: true, showCloseButton: false }) </script> 
            <?php }elseif(isset($_GET['empty_plan'])){ ?> <script> Swal.fire({ icon: 'question', iconHtml: '؟', html:'<p style="color: #6C7293;"><?php echo $_GET['empty_plan'] ?></p>', background:'#191C24', color: '#ffc107', confirmButtonText: '<a href="plans.php" style= "color: #ffc107;">Activate plan</a>', cancelButtonText: '<span class="text-danger">Cancel</span>', showCancelButton: true, showCloseButton: false }) </script> <?php } ?>
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-line fa-3x "></i>
                            <div class="ms-3">
                                <p class="mb-2">My Balance</p>
                                <h6 class="mb-0">$ <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_balance WHERE email = '{$email}'"))) { $row_10 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_balance WHERE email = '{$email}'")); ?><?php echo $row_10['acc_balance'] ?><?php	} ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-bar fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">Referral Earning</p>
                               <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'"))){ $row_2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'")); ?>
                                <h6 class="mb-0">$ <?php echo $row_2['referral_balance'] ?></h6>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-chart-area fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Bonus</p>
                                <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'"))){ $row_2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_balance WHERE email='{$email}'")); ?>
                                <h6 class="mb-0">$ <?php echo $row_2['grind_balance'] ?></h6>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i style="color: #ffc107;" class="fa fa-link fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">Referral Code</p>
                                <?php if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM referral_earnings WHERE email='{$email}'"))){
								$row_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM referral_earnings WHERE email='{$email}'"));
									?>
                                <button class="btn btn-warning rounded-pill mb-0"><?php echo $row_3['referrals_code'] ?></button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

             <!-- live prices Start -->
        <div class="container-fluid pt-4">
                        <div class="row ">
                            <div class="col-xl-12 ">
                                <div class="bg-secondary text-center rounded p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="mb-0">Worldwide prices</h6>
                                        <a style="color: #ffc107;"  href="">Show All</a>
                                    </div>
                                    
                                        <!-- TradingView Widget BEGIN -->
                                        <div class="tradingview-widget-container">
                                        <div class="tradingview-widget-container__widget"></div>
                                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Markets</span></a> by TradingView</div>
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                                        {
                                        "symbols": [
                                            {
                                            "proName": "FOREXCOM:SPXUSD",
                                            "title": "S&P 500"
                                            },
                                            {
                                            "proName": "FOREXCOM:NSXUSD",
                                            "title": "US 100"
                                            },
                                            {
                                            "proName": "FX_IDC:EURUSD",
                                            "title": "EUR/USD"
                                            },
                                            {
                                            "proName": "BITSTAMP:BTCUSD",
                                            "title": "Bitcoin"
                                            },
                                            {
                                            "proName": "BITSTAMP:ETHUSD",
                                            "title": "Ethereum"
                                            },
                                            {
                                            "description": "",
                                            "proName": "CRYPTOCAP:DOGE"
                                            },
                                            {
                                            "description": "",
                                            "proName": "FX:USDCAD"
                                            },
                                            {
                                            "description": "",
                                            "proName": "BINANCE:BNBUSDT"
                                            }
                                        ],
                                        "showSymbolLogo": true,
                                        "colorTheme": "dark",
                                        "isTransparent": true,
                                        "displayMode": "adaptive",
                                        "locale": "en"
                                        }
                                        </script>
                                        </div>
                                        <!-- TradingView Widget END -->
                                    </div>
                                    </div>
                                </div>
                    <!-- live prices End -->


                    <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Financial Markets</span></a> by TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
            {
            "colorTheme": "dark",
            "dateRange": "12M",
            "showChart": true,
            "locale": "en",
            "largeChartUrl": "",
            "isTransparent": true,
            "showSymbolLogo": true,
            "showFloatingTooltip": true,
            "width": "360",
            "height": "660",
            "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
            "plotLineColorFalling": "rgba(41, 98, 255, 1)",
            "gridLineColor": "rgba(240, 243, 250, 0)",
            "scaleFontColor": "rgba(106, 109, 120, 1)",
            "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
            "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
            "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
            "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
            "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
            "tabs": [
                {
                "title": "Indices",
                "symbols": [
                    {
                    "s": "BINANCE:BNBUSDT"
                    },
                    {
                    "s": "BINANCE:BTCUSDT"
                    },
                    {
                    "s": "CRYPTOCAP:DOGE"
                    },
                    {
                    "s": "FX:USDCAD"
                    },
                    {
                    "s": "TVC:GOLD"
                    },
                    {
                    "s": "FX:USDCAD"
                    },
                    {
                    "s": "BINANCE:ETHUSDT"
                    },
                    {
                    "s": "BINANCE:FTMUSDT"
                    },
                    {
                    "s": "NASDAQ:AAPL"
                    },
                    {
                    "s": "NSE:RELIANCE"
                    },
                    {
                    "s": "FX:EURAUD"
                    },
                    {
                    "s": "BINANCE:XRPUSDT"
                    }
                ],
                "originalTitle": "Indices"
                },
                {
                "title": "Futures",
                "symbols": [
                    {
                    "s": "CME_MINI:ES1!",
                    "d": "S&P 500"
                    },
                    {
                    "s": "CME:6E1!",
                    "d": "Euro"
                    },
                    {
                    "s": "COMEX:GC1!",
                    "d": "Gold"
                    },
                    {
                    "s": "NYMEX:CL1!",
                    "d": "Crude Oil"
                    },
                    {
                    "s": "NYMEX:NG1!",
                    "d": "Natural Gas"
                    },
                    {
                    "s": "CBOT:ZC1!",
                    "d": "Corn"
                    }
                ],
                "originalTitle": "Futures"
                },
                {
                "title": "Bonds",
                "symbols": [
                    {
                    "s": "CME:GE1!",
                    "d": "Eurodollar"
                    },
                    {
                    "s": "CBOT:ZB1!",
                    "d": "T-Bond"
                    },
                    {
                    "s": "CBOT:UB1!",
                    "d": "Ultra T-Bond"
                    },
                    {
                    "s": "EUREX:FGBL1!",
                    "d": "Euro Bund"
                    },
                    {
                    "s": "EUREX:FBTP1!",
                    "d": "Euro BTP"
                    },
                    {
                    "s": "EUREX:FGBM1!",
                    "d": "Euro BOBL"
                    }
                ],
                "originalTitle": "Bonds"
                },
                {
                "title": "Forex",
                "symbols": [
                    {
                    "s": "FX:EURUSD",
                    "d": "EUR/USD"
                    },
                    {
                    "s": "FX:GBPUSD",
                    "d": "GBP/USD"
                    },
                    {
                    "s": "FX:USDJPY",
                    "d": "USD/JPY"
                    },
                    {
                    "s": "FX:USDCHF",
                    "d": "USD/CHF"
                    },
                    {
                    "s": "FX:AUDUSD",
                    "d": "AUD/USD"
                    },
                    {
                    "s": "FX:USDCAD",
                    "d": "USD/CAD"
                    }
                ],
                "originalTitle": "Forex"
                }
            ]
            }
            </script>
            </div>
            <!-- TradingView Widget END -->

        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4" style="margin-bottom: 30%;">
                <div class="row g-4">
                    <div class=" col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

            
        <!-- Modal_starter -->
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
                    <span class="mt-2 ">$12.88660 = &#x20A6;5,000 max price, </span>
                    <span class="mt-2">2.5% daily top up</span>								
					<form action="gold_confg.php" method="post" id="starter_park">
                    <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input type="number" name="amount" class="form-control" placeholder="Amount..." aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" name="starter" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>

    
    <!-- Modal_premium -->
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
                            <button type="submit" name="premium" class="btn btn-warning m-2">Activate plan</button>
					</form>
				</div>
			</div>
		</div>
	</div>


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
        </div>
        <!-- Content End -->


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
                        <a href="#" class="btn  btn-dark "><i style="color: #ffc107;" class="fa fa-ellipsis-h me-2"></i><small>More..</small></a>
                    </div>
                </div>
             
            </div>
        </div>
        <!-- buttom_bar End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square mb-5 back-to-top"><i class="bi bi-arrow-up"></i></a>
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
                margin-bottom: -40%;
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
<?php } }else{header("Location: login.php"); }  ?>