        <?php 
        $dashboard=true;
        $report = false;
        $product = false;
        $unit = false;
        $unit1 = false;
        $stock = false;
        $system = false;
        $profile = false;
        $message = false;
        $orders = false;
        if(isset($_GET['profile'])){
            $id = $_GET['profile'];
            $dashboard = false;
            $system = false;
            $rec1 = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
            $u_profile = mysqli_fetch_array($rec1);
            $username = $u_profile['username'];
            $email = $u_profile['email'];
            $password = $u_profile['password'];

        }
        if(isset($_GET['system'])){
            $dashboard = false;
            $system = true;
        }
        if(isset($_GET['product'])){
            $dashboard = false;
            $product = true;
        }
        if(isset($_GET['unit'])){
            $dashboard = false;
            $unit = true;
        }
        if(isset($_GET['unit1'])){
            $dashboard = false;
            $unit1 = true;
        }
        if(isset($_GET['message'])){
            $dashboard = false;
            $message = true;
        }
        if(isset($_GET['orders'])){
            $dashboard = false;
            $orders = true;
        }
        if(isset($_GET['stock'])){
            $dashboard = false;
            $stock = true;
        }
        if(isset($_GET['report'])){
            $dashboard = false;
            $report = true;
        }
        if(isset($_GET['suspended'])){
            $dashboard = false;
            $system = true;
            $record = mysqli_query($con, "SELECT * FROM users WHERE status = 2");
        }
        $id = $_SESSION['id'];
        $rec = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
        $row = mysqli_fetch_array($rec);
        $username = $row['username'];
        $email = $row['email'];


        ?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <a href="user-profile.php?profile=<?php echo $id;?>"><img src="img/logo.png" style="width:200px;" class="user-image img-responsive"/></a>
                        <p style="color: white;">Username : <?php echo $username;?></p>
                    </li>
                    


                    <li><a <?php if($dashboard==true){echo 'class="active-menu"';}?> href="adminDash.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a></li>
                    <li><a <?php if($unit1==true){echo 'class="active-menu"';}?> href="read.php?unit1=true;"><i class="fa fa-user fa-3x"></i> Messages</a></li>
                    <li><a <?php if($unit==true){echo 'class="active-menu"';}?> href="units.php?unit=true;"><i class="fa fa-folder fa-3x"></i> Appointments</a></li>
                    
                                
                	
                </ul>               
            </div>
        </nav>