<?php
require_once "config.php";
require_once "auth_session.php";



if(isset($_GET['view'])){
    $id = $_GET['view'];
    $dashboard = false;
    $message = true;
    $rec1 = mysqli_query($con, "SELECT * FROM message WHERE id='$id'");
    mysqli_query($con, "UPDATE message SET status = 2 WHERE id='$id'");
    $_SESSION['message'] = '<div class="alert alert-success">
    <strong>Successful!</strong>The message has been marked as read.</div>';
    $u_profile = mysqli_fetch_array($rec1);
    $name = $u_profile['name'];
    $email1 = $u_profile['email'];
    $phone = $u_profile['phone'];
    $message1 = $u_profile['message'];
    $date = $u_profile['date'];
    
    $id = $u_profile['id'];

} 

?>
<!DOCTYPE html>
<html xmlns="http://www.menadvocates.com">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="assets/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript">
        function checkDelete(){
            return confirm('Are you sure you want to delete the account?');
        }
    </script>
    <script language="JavaScript" type="text/javascript">
        function sus_confirm(){
            return confirm('Are you sure you want to continue?');
        }
    </script>
    <script src="bootstrap-5/js/bootstrap.bundle.min.js"></script>
</head>
<body oncontextmenu="return false;">
    <div id="wrapper">

        <?php include("nav1.php")?>  
        <!--NAV TOP  -->
        <?php include("nav2.php")?> 
        <!--NAV SIDE  end-->
        
        <!--FormSection-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Messages</h2>   
                        <h5>| messages | View |</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['message'])): ?>
                            <div style="text-align:center; font-size:20px;">
                                <?php
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                ?>
                            </div>
                        <?php endif ?>
                        
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h5>Name : <?php echo $name;?></h5>
                                <h5>Email: <?php echo $email1;?></h5>
                                <h5>Phone: <?php echo $phone;?></h5>
                            </div>
                            <div class="panel-body">
                                <p><?php echo $message1;?></p>
                            </div>
                            <div class="panel-footer">
                                Sent on <?php echo $date?>>
                            </div>
                            
                        </div>
                        <div class="form-group  col-md-12" style="text-align:center;">
                            
                            <a onclick="history.back()" class="btn btn-primary col-md-3" >Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
