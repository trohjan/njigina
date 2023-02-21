<?php
session_start();    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Njigina Macharia Advocates</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Njigina Macharia Advocates" name="keywords">
    <meta content="Njigina Macharia Advocates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto:wght@300;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <script>
    document.addEventListener("keydown", function (event){    if (event.ctrlKey){       event.preventDefault();    }    if(event.keyCode == 123){       event.preventDefault();    }});
    </script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body oncontextmenu="return false;"> 
    <!-- Header Start -->
    <div class="container-fluid ">
        <div class="row py-2 bg-primary">
            <div class="col-lg-3  d-none d-lg-block bg-primary">
                <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 display-4 text-p text-uppercase"><img style="width: 300px;" src="img/logo.png" alt="Logo"></h1>
                </a>
            </div>
            <div class="col-lg-9 p-2" >
                <nav class="navbar navbar-expand-lg bg-primary navbar-primary p-0 float-right ">
                    <a href="index.php" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-p text-uppercase"><img style="width: 200px;" src="img/logo.png" alt="Logo"></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span  style="color:white"><i class="fa fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0 bg-primary">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="our-firm.php" class="nav-item nav-link ">Our Firm </a>
                            <a href="focus.php" class="nav-item nav-link">Focus</a>
                            <a href="insight.php" class="nav-item nav-link">Insights</a>
                            <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                        </div>
                        <a href="appointment.php" class="btn btn-light mr-1 d-none d-lg-block">Get An Appointment</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-3 pb-10">
        
        <?php if (isset($_SESSION['message'])): ?>
            <div style="text-align:center; font-size:20px;">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
            </div>
        <?php endif ?>
        <div id="header-carousel" class="carousel slide carousel-fade " data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="height: 60vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-bottom justify-content-left">
                        <div class="p-3" style=" text-align:left;margin-top:300px;">
                            <h2 class="text-white  mb-2" style="letter-spacing: 3px; ">Welcome To</h2>
                            <h1 class="text-white mb-0" style="letter-spacing: 3px; ">Law Offices of MEN Advocates </h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 60vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-bottom justify-content-left">
                        <div class="p-3" style=" text-align:left;margin-top:300px;">
                            <h2 class="text-white  mb-2" style="letter-spacing: 3px; ">Welcome To</h2>
                            <h1 class="text-white mb-0" style="letter-spacing: 3px; ">Law Offices of MEN Advocates </h1>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div style="background-color:#124B5E;" class="btn btn-lg btn-light btn-lg-square">
                    <span class="carousel-control-prev-icon"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div style="background-color:#124B5E;" class="btn btn-lg btn-light btn-lg-square">
                    <span class="carousel-control-next-icon"></span>
                </div>
            </a>
            
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-2">
        <div class="container py-2">
            <div class="row">
                <div class="col-lg-5">
                    <img class="img-fluid rounded" src="img/about.jpg" alt="about image">
                </div>
                <div class="col-lg-7 mt-2 mt-lg-0">
                    
                    <h3 class="mb-3 text-uppercase text-center" style="color: #124B5E;">Who We Are</h3>
                    <p class="text-center">We are a tech savvy boutique law firm tailored and committed to provide unique and excellent legal services personalized to the needs of our clients.</p>
                    <h3 class="mb-3 text-uppercase text-center" style="color: #124B5E;">Our Focus</h3>
                    <p class="text-center">We offer a wide gamut of legal services both locally and internationally. Primarily, our team focuses on Litigation & Dispute Resolution, Corporate & Commercial Transactions, Banking, Finance & Fintech Law, Real Estate and Development, Privacy Law & Data Protection, Intellectual Property and Energy, Gas & oil Law.</p>
                    <a href="our-firm.php" class="btn btn-light mt-2" style="border: 2px solid #114C5E; color:#114C5E">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Appointment Start -->
    <div class="container-fluid py-2">
        <div class="container py-2">
            <div class="bg-appointment rounded">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-2">
                        <div class="rounded p-5 my-5" style="background: rgba(55, 55, 63, .7);">
                            <h1 class="text-center text-white mb-2">Get An Appointment</h1>
                            <form action="appointment.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="name" placeholder="Your Name*" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="phone" placeholder="Your Phone*" required="required" />
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="date" id="date" data-target-input="nearest">
                                                <input type="text" name="date" class="form-control border-0 p-4 datetimepicker-input" placeholder="Select Date*" data-target="#date" data-toggle="datetimepicker"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="time" id="time" data-target-input="nearest">
                                                <input type="text" name="time" class="form-control border-0 p-4 datetimepicker-input" placeholder="Select Time*" data-target="#time" data-toggle="datetimepicker"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <button style="color:white;" name="appointment" class="btn btn-primary btn-block border-0 py-3" type="submit">Get An Appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
    
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white pt-2 px-sm-3 px-md-5" style="margin-top: 40px;">
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, .05);">
                    <i style="color:white" class="fa fa-2x fa-map-marker-alt text-p"></i>
                    <div class="ml-3">
                        <h6 class="text-white">Our Office</h6>
                        <p class="m-0">Kimuchu Complex Suites, 3rd Floor Suite 2C, Kimuchu Road</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, .05);">
                    <i style="color:white" class="fa fa-2x fa-envelope-open text-p"></i>
                    <div class="ml-3">
                        <h6 class="text-white">Email Us</h6>
                        <p class="m-0">info@menadvocates.co.ke | legal@menadvocates.co.ke</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, .05);">
                    <i style="color:white" class="fa fa-2x fa-phone-alt text-p"></i>
                    <div class="ml-3">
                        <h6 class="text-white">Call Us</h6>
                        <p class="m-0">+2547 0069 0060 | +2547 0046 9124</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2">

                <div class="col-lg-5 col-md-4 mb-2 pt-5">
                    <div class="col-lg-12 " >
                        <a href="index.php" class="navbar-brand"><img class="img-fluid rounded" src="img/logo3.png"  alt="about image"></a>
                    </div>
                    
                    
                </div>
                <div class="col-lg-2 col-md-4 mb-2">
                    <h4 class="font-weight-semi-bold text-p mb-2" style="color:#ffffff">Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-white mb-2" href="our-firm.php"><i class="fa fa-angle-right mr-2"></i>Our Firm</a>
                        <a class="text-white mb-2" href="focus.php"><i class="fa fa-angle-right mr-2"></i>Our Focus</a>
                        <a class="text-white mb-2" href="insight.php"><i class="fa fa-angle-right mr-2"></i>Insights</a>
                        <a class="text-white" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    </div>
                </div>

                <div class="col-lg-5 col-md-4 mb-2">
                    <div class="mt-4">
                        <p>You can also contact us or follow us on social media.</p>
                    </div>
                    <div class="d-flex justify-content-start mt-4 ">
                        
                        <a class="btn btn-sm btn-outline-light btn-sm-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    
                </div>
            </div>
            <div class="row p-4 mt-2 mx-0" style="background: rgba(256, 256, 256, .05);">
                <div class="col-md-6 text-center text-md-left mb-2 mb-md-0">
                    <p class="m-0 text-white">&copy; <a class="font-weight-bold" href="#" style="color:white;">Menadvocates.co.ke</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="#" style="color:white;">LitWebTech</a></p>
                </div>
            </div>
        
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary px-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>