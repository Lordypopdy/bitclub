<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/line-icons.css">
    <link rel="stylesheet" href="css/style2.css">

    <title>Home | Bitclub</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: rgba(4, 54, 54, 0.9);" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: rgb(255, 190, 70);">BITCLUB.</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" style="border: 2px solid orange; color: gray; background: orange;" type="button" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: rgb(255, 190, 70);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#services">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--hero-->
    <section id="home" class="bg-cover hero-section" style="background-image: url(https://thumbs.gfycat.com/ObviousLimpArgentinehornedfrog-size_restricted.gif);">
        <div class="overlay"></div>
        <div class="container text-white text-center">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4" data-aos="zoom-in">Focused, active management of <br> High-Growth Digital assets.
                    Build your savings without even trying</h1>
                    <p class="my-4" data-aos="fade-up">Turn on Round-up Rules and start saving up effortlessly. When you make a purchase, Goals make it easy for the things you want <br> or want to do. there's no need for spreadsheets or apps to budget and track your money.</p>
                    <a href="signUp.php" data-aos="fade-up" class="btn btn-main">Open your Account</a>
                </div>
            </div>
        </div>
    </section>

    <!--services-->
    <section id="services" class="text-center">
        <div class="container-fluid">
        <?php if(isset($_GET['success'])){ ?><script> Swal.fire({ position: 'top-center', icon: 'success', title: '<?php echo $_GET['success']; ?>', showConfirmButton: true, timer: 6000 }) </script> <?php } elseif(isset($_GET['danger'])){ ?> <script> Swal.fire({ icon: 'error', title: 'Sorry...', text: '<?php echo $_GET['danger']; ?>', }) </script> <?php } ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
            <div class="row g-4">
                <div class="col-md-6" data-aos="zoom-in">
                    <div class="service">
                        <div class="service-img">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://miro.medium.com/max/620/0*dunTLlei47QWR7NR.gif " class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                <img src="https://i.gifer.com/7rO4.gif" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://i.makeagif.com/media/12-28-2017/orWHII.gif" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 section-intros" data-aos="zoom-in" class="bg-cover " style="background-image: url();">
                    <div class="service">
                        <h4 class="card-title">Guaranteed interest but how?</h4>
                        <p class="">Digital asset is a class of asset considered dengerous and inconvenient. Many reasons such as liquidity, money laundering accusation, uncerntainty of regulation, access restriction, volatile market, functionalty inquiries reduce trust in these assets. We believe that the risk factor should be eliminated for all people who believe that finance will rise on distributed system. That's why we offer high interest to platform investors. with careful and detail examination of market conditions, daily trading volume,expectations;we change our portfolio distrubution and adjust our investment strategey. With these active funds management you enjoy the fixed interest return on the user side.</p>
                    </div>
                </div>
            </div>
        </section>

    <!--about-->
    <section id="about" class="bg-cover" style="background-image: url(https://i.gifer.com/embedded/download/ABO1.gif);">
        <div class="overlay"></div>
        <div class="container text-white section-intro">
            <h1 class="text-center">About Bitclub</h1>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="col-md-6 section-intro text-left" data-aos="fade-up">
                    <div class="card bg-transparent" style="border: none;">
                        <p style="color: aliceblue;">
                        We built BITCLUB because we thought trading was too exciting to be kept for the few. Traders ourselves, we saw how the emerging web could bring opportunity to anyone who was ready to take on a little risk and put in the time to learn. We set out three rules to guide our mission to take opportunity to the world. <br><b>Trust.</b> With the right licensing and regulation, those who chose to trade with us would be able do so with full peace of mind. We agreed to keep customer funds segregated, so no one would be out of pocket if things went south. We promised to be transparent and honest. That meant no stealth fees and no secrets in our trading stats.
                        </p>
                    </div>
                    <a href="signUp.php" data-aos="fade-up" class="btn btn-main">Open your Account</a>
                </div>
                <div class="col-md-6 section-intro text-left" data-aos="fade-up">
                    <div class="card bg-transparent" style="border: none;">
                        <p>
                        <b>Access.</b> Nothing should be out of reach. If Warren Buffet could trade it, you should be able to trade it. And since you can’t profit from what you don’t know, we offer access to a world class, money-can’t-buy education for free. Value. We agreed to work to keep the cost of trading as low as possible and to offer our services in a spirit of partnership, helping our customers to be profitable traders, not just profitable customers. After all, if you do well, we do well. We still weigh everything we do against the ‘three mores’. More trust, more access, and more value. That’s what we mean when we say BITCLUB gives you more.
                        </p>
                    </div>
                    <a href="login.php" data-aos="fade-up"class="btn btn-main">Go Bitclub</a>
                </div>
            </div>
        </div>
    </section>
    
    <!--features-->
    <section id="features" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                <h4 class="page-header">DEPOSIT WITH THE WORLD'S MOST POPULAR PAYMENT METHODS</h4>
                <div class="divider"></div>
                </div>
            </div>
            <div class="row gx-4 gy-5">
                <div class="col-md-4 feature" data-aos="fade-up">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlL2CQQG7J8sWUlanWDPWN3y-a9CcE6fZnN7iZqXOTOw&s" style="width: 150px;" alt="visa" srcset="">  
                </div>
                <div class="col-md-4 feature" data-aos="fade-up">
                     <img src="data:image/jpeg;base64,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" style="width: 150PX;" alt="" srcset="">
                </div>
                <div class="col-md-4 feature" data-aos="fade-right">
                <img src="https://www.forextime.com/s3-static/svg-icons/Kenya/Credit.svg" height="100px"; alt="" srcset="">
                </div>
                <div class="col-md-4 feature" data-aos="fade-up">
                <img src="https://www.forextime.com/themes/custom/fxi_theme/dist/assets/icons/payment/maestro.svg" alt="" srcset="">
                </div>
                <div class="col-md-4 feature" data-aos="fade-up">
                <img src="https://www.forextime.com/s3-static/svg-icons/Kenya/Equity.svg" height="100px" alt="" srcset="">
                </div>
                <div class="col-md-4 feature" data-aos="fade-right">
                <img src="https://www.forextime.com/themes/custom/fxi_theme/dist/assets/icons/payment/local-transfers.svg" alt="" srcset="">
                </div>
            </div>
        </div>
    </section>
    

     <!--counters-->
     <section class="bg-cover" style="background-image: url(img/cover_2.jpg);">
        <div class="overlay"></div>
        <div class="container text-white text-center">
            <div class="row gy-4" data-aos="fade-up">
                <div class="col-md-3">
                    <i class="icon-trophy h1"></i>
                    <h1 class="mt-3 mb-2">14M+</h1>
                    <p>Total asset</p>
                </div>
                <div class="col-md-3">
                    <i class="icon-camera h1"></i>
                    <h1 class="mt-3 mb-2">13+</h1>
                    <p>Years of experience</p>
                </div>
                <div class="col-md-3">
                    <i class="icon-happy h1"></i>
                    <h1 class="mt-3 mb-2">12M+</h1>
                    <p>Happy Clients</p>
                </div>
                <div class="col-md-3">
                    <i class="icon-paintbrush h1"></i>
                    <h1 class="mt-3 mb-2">35+</h1>
                    <p>Countries supported</p>
                </div>
            </div>
        </div>
    </section>

    <!--reviews-->
    <section id="reviews" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center">
                    <h1>Our Testimonials</h1>
                    <div class="divider"></div>
                    <p>“BITCLUB Investment understands the anxieties that come with investing and at each <br> meeting manages to reassure the client so that they leave feeling positive about the future.”</p>
                </div>
            </div>
            <div class="row g-4 text-start">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        <div class="person">
                            <img src="images/18.jpg" alt="">
                            <div class="text ms-3">
                                <h6 class="mb-0">James Popdy</h6>
                                <small>BITCLUB</small>
                            </div>
                        </div>
                        <p class="pt-4">“Just to say many thanks for a very positive meeting yesterday. Favour and I came away feeling well satisfied that we are able to continue enjoying life without too much stress on the old finances and should be able to carry on with our present lifestyles for some time to come. Very satisfied with the way you are managing affairs and hope this will continue into the future.”</p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        <div class="person">
                            <img src="img/avatar_2.jpg" alt="">
                            <div class="text ms-3">
                                <h6 class="mb-0">John Walker</h6>
                                <small>BITCLUB</small>
                            </div>
                        </div>
                        <p class="pt-4">“It is good to have financial check-ups and BITCLUB Investment have all the tools and resources to do this in a very professional yet friendly way. BITCLUB provides an independent focus on your priorities in the light of changing circumstances and legislation. I have always found his service excellent and recommend him wholeheartedly.”</p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        <div class="person">
                            <img src="images/2.jpg" alt="">
                            <div class="text ms-3">
                                <h6 class="mb-0">Jane Anderson</h6>
                                <small>BITCLUB</small>
                            </div>
                        </div>
                        <p class="pt-4">“James and his team are always welcoming and friendly. They are organised and efficient and I trust them implicitly with my finances. My annual meeting is always a joy and I would thoroughly recommend BITCLUB Investment to anyone.”</p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        <div class="person">
                            <img src="img/avatar_2.jpg" alt="">
                            <div class="text ms-3">
                                <h6 class="mb-0">John Walker</h6>
                                <small>BITCLUB</small>
                            </div>
                        </div>
                        <p class="pt-4">“BITCLUB Investment’s approach of identifying our future needs/goals and then working out how to achieve them is a vital approach to reduce the lottery of financial planning. Much bettr than the previous IFA approach of ticking the boxes of financial products that would have left the future very uncertain.”</p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        <div class="person">
                            <img src="img/avatar_1.jpg" alt="">
                            <div class="text ms-3">
                                <h6 class="mb-0">John Walker</h6>
                                <small>BITCLUB</small>
                            </div>
                        </div>
                        <p class="pt-4">“We have been very satisfied with the service provided by BITCLUB Investment and over the years and the management of our finances has remained secure to the extent that we can look forward to our late years with a degree of satisfaction knowing that our lifestyle is affordable.”</p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="review p-4">
                        <div class="person">
                            <img src="img/avatar_3.jpg" alt="">
                            <div class="text ms-3">
                                <h6 class="mb-0">John Walker</h6>
                                <small>BITCLUB</small>
                            </div>
                        </div>
                        <p class="pt-4">“Like many people, I spend the majority of my time planning for my business, but pay little or no attention to my own finances. BITCLUB Investment has developed a personal plan for me that allows me to take much greater control of my financial affairs, and plan for the future. Everything now makes much more sense, and I only wish I had got in touch with BITCLUB Investment sooner!”</p>
                        <div class="stars">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--blog-->
<section id="blog" style="margin-top: -100px;" class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://miro.medium.com/max/620/0*dunTLlei47QWR7NR.gif " class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                <img src="https://i.gifer.com/7rO4.gif" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://i.makeagif.com/media/12-28-2017/orWHII.gif" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
                </div>
                <div class="col-md-6 p-4">
                    <img src="https://d1-invdn-com.investing.com/content/pic32f9e681c05cbe3ec2d06ac8c5f31305.gif" alt="" srcset="">
                </div>
            </div>
        </div>
    </section>


    <!--contact-->
    <section id="contact" class="bg-cover text-white" style="background-image: url(img/cover_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>Get in touch</h1>
                    <div class="divider"></div>
                    <p>Bitclub platform is at your service with it user-friendly <br> features, secure infrasructure and applications that make a difference.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto" data-aos="fade-up">
                    <form action="logquery.php" method="post" class="row g-4">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="full_name" placeholder="Full name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email address" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="other_text" id="" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-main" name="message" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--footer-->
    <footer class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">Copyright © 2020-2022. Designed James Dev.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div>
                        <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-dribbble'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-github'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/app.js"></script>
</body>

</html>