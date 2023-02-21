<?php
require_once "config.php";
require_once "auth_session.php";
header("Refresh:15");
$messages = mysqli_query($con, "SELECT * FROM message WHERE status=1 ORDER BY date DESC");

$record = mysqli_query($con, "SELECT * FROM appointment ORDER BY date LIMIT 9");
?>

<!DOCTYPE html>
<html xmlns="http://www.litwebtech.com">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Njigina Macharia</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <!---->
    
    <script>
        document.addEventListener("keydown", function (event){    if (event.ctrlKey){       event.preventDefault();    }    if(event.keyCode == 123){       event.preventDefault();    }});
    </script>
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body oncontextmenu="return false;">
    <div id="wrapper">

        <?php include("nav1.php")?>  
        <!--NAV TOP  -->
        <?php include("nav2.php")?> 
        <!--NAV SIDE  end-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>   
                        <h5>| Dashboard |</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			            <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-red set-icon"><i class="fa fa-envelope-o"></i></span>
                        <div class="text-box" >
                            <?php
                                $today = date("Y-m-d");
                                
                                $messages = mysqli_query($con, "SELECT count(*) AS message FROM message WHERE date ='$today'");
                                $row = mysqli_fetch_assoc($messages);
                                $no_messages = $row['message'];
                                $messages1 = mysqli_query($con, "SELECT count(*) AS message1 FROM message WHERE date ='$today' AND status=1");
                                $row = mysqli_fetch_assoc($messages1);
                                $no_unread = $row['message1'];
                            ?>
                            <p class="main-text"><?php echo $no_messages;?> New</p>
                            <p class="text-muted"><a href="read.php" style="text-decoration: none; color: grey;">Messages</a></p>
                            <p class="text-muted"><a href="read.php" style="text-decoration: none; color: grey;"><?php echo $no_unread;?> Unread</a></p>
                        </div>
                    </div>
		        </div>
                <div class="col-md-3 col-sm-6 col-xs-6">           
			        <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-brown set-icon"><i class="fa fa-rocket"></i></span>
                        <div class="text-box" >
                            <?php
                                $today = date("Y-m-d");
                                
                                $orders = mysqli_query($con, "SELECT count(*) AS newOrder FROM appointment WHERE date ='$today'");
                                $row = mysqli_fetch_assoc($orders);
                                $no_orders = $row['newOrder'];
                                $orders1 = mysqli_query($con, "SELECT count(*) AS newOrder1 FROM appointment WHERE date ='$today' AND status=1");
                                $row = mysqli_fetch_assoc($orders1);
                                $no_unreviewed = $row['newOrder1'];
                            ?>
                            <p class="main-text"><?php echo $no_orders;?> New</p>
                            <p class="text-muted" ><a href="units.php" style="text-decoration: none; color: grey;">Appointment</a></p>
                            <p class="text-muted"><a href="units.php" style="text-decoration: none; color: grey;"><?php echo $no_unreviewed;?> Unreviewd</a></p>
                        </div>
                    </div>
		        </div>
                
                
			</div>
            
            <div class="row">                       
                <div class="col-md-9 col-sm-12 col-xs-12">                     
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Recent Appointments
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    
                                        <?php while ($row = mysqli_fetch_array($record)) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['d_date']; ?> <?php echo $row['d_time']; ?></td>
                                            
                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>         
                </div>
 
                
                
            </div>
                      
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    
   
</body>
</html>
