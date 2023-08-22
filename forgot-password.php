<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bitclub | Resset-password</title>
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 style="color: #ffc107;"><i class="fa fa-user-edit me-2"></i>Bitclub.</h3>
                            </a>
                        </div>
                        <?php if(isset($_GET['danger'])){ ?><div class="alert alert-danger text-center" style="border: none; margin-bottom: -1px;"><?php echo $_GET['danger']; ?></div><?php }elseif(isset($_GET['info'])){ ?> <div class="alert alert-info text-center"><?php echo $_GET['info']; ?></div> <?php } ?>
                      <form action="logquery.php" method="post"  class="form mt-2">
                      <h5>Recover account</h5>
                      <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control p-1" id="floatingPassword" placeholder="example@gmail.com" required>
                            <label for="floatingPassword">example@gmail.com</label>
                        </div>


                        <div class="form-floating mb-3">
                            <div class="row">
                                <div class="col-sm-7">
                                <select class="form-select p-3" name="question" aria-label="Default select example" required>
                                <option selected>Select question</option>
                                <option value="What is your nickname.">What is your nickname.</option>
                                <option value="Waht is your pet name.">Waht is your pet name.</option>
                                <option value="What is your mother`s name.">What is your mother`s name.</option>
                                <option value="What is the name of your job.">What is the name of your job.</option>
                                <option value="What is the name of your grand father">What is the name of your grand father</option>
                                <option value="What is the name of your NOK">What is the name of your NOK</option>
                                <option value="Time of birth">Time of birth</option>
                                <option value="Others">Others</option>
                                </select>
                                </div>
                                <div class="col-sm-5">
                                <input type="text" name="answer" class="form-control p-3" id="floatingInput" placeholder="Answer..">
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="new_password" class="form-control p-1" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">New password..</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a style="color: #ffc107;" href="forgot-password.php">Forgot Password</a>
                        </div>
                        <button type="submit" name="forgot-password" style="background: #ffc107; border: none;" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a style="color: #ffc107;" href="signUp.php">Sign Up</a></p>
                    </div>
                      </form>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>