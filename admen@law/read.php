<?php
require_once "config.php";
require_once "auth_session.php";
$record = mysqli_query($con, "SELECT * FROM message ORDER BY date ASC");
?>
<!DOCTYPE html>
<html xmlns="http://www.litwebtech.com">
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
                        <h5>| Messages |</h5>
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
                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Messages
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    
                                    <?php while ($row = mysqli_fetch_array($record)) { ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <?php if($row['status']==1){
                                                echo "<td class='text-success'>Unread</td>";
                                            }else{
                                                echo "<td class='text-danger'>Read</td>";
                                            }?>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><a href="viewMS.php?view=<?php echo $row['id'];?>" class="btn btn-success col-md-12">View</a></td>  
                                            <td><a onclick="return checkDelete()" href="delete.php?delMs=<?php echo $row['id'];?>" class="btn btn-danger col-md-12" >Delete</a></td>

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
