<?php
require_once "config.php";
session_start();
if (isset($_POST['appointment'])) {
    $name = trim(strtoupper($_POST['name']));
    $phone = trim($_POST['phone']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    $status = 1;


    $query = "INSERT INTO appointment (name, phone, d_date,d_time, status)
            VALUES ('$name', '$phone', '$date', '$time','$status')";
    mysqli_query($con, $query);

    $_SESSION['message'] = '<p><div class="alert alert-success">
    <strong>Hi '.$name.'!</strong> Your appointment request has been sent successfuly, we will contact you shortly. Thank you.</div></p>';
    header("location: index.php");
    exit();

}
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
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="our-firm.php" class="nav-item nav-link ">Our Firm </a>
                            <a href="focus.php" class="nav-item nav-link">Focus</a>
                            <a href="insight.php" class="nav-item nav-link">Insights</a>
                            <a href="contact.php" class="nav-item nav-link ">Contact Us</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Page Header Start -->
    <div class="container-fluid bg-page-header" style="margin-bottom: 20px;">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-3 text-white text-uppercase">Appointment</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Appointment</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Appointment Start -->
    <div class="container-fluid py-2">
        <div class="container py-2">
            <div class="bg-appointment rounded">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-5">
                        <div class="rounded p-2 my-5" style="background: rgba(55, 55, 63, .7);">
                            <h1 class="text-center text-white mb-4">Get An Appointment</h1>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                    <div class="d-flex justify-content-start mt-4">
                        
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