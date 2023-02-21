<?php
require_once "config.php";
require_once "auth_session.php";
$edit=false;
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];
    $role = $_POST['role'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {
        $_SESSION['message'] = '<div class="alert alert-danger">
        <strong>Sorry!</strong> User already exist.</div>';
        header("location: users.php");
        exit();


    }elseif($password === $confirm_pass){
          $query = "INSERT INTO users (username, email, password, role, status)
               VALUES ('$username', '$email', '$confirm_pass', '$role', 1)";
        mysqli_query($con, $query);

        $_SESSION['message'] = '<p><div class="alert alert-success">
        <strong>Successful!</strong> User Registred.</div></p>';
        header("location: users.php");
        exit();

    }else{
        $_SESSION['message'] = '<p><div class="alert alert-danger">
        <strong>Sorry!</strong> Your password does not match.</div></p>';
        header("location: users.php");
        exit();

    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];
    $role = $_POST['role'];
    if($password === $confirm_pass){
        mysqli_query($con, "UPDATE users SET username='$username', email='$email', password='$confirm_pass',role='$role' WHERE id='$id'");
        $_SESSION['message'] = '<div class="alert alert-success">
        <strong>Successful!</strong> Changes saved.</div>';
        header('location: users.php');
        exit();
    
    }else{
        $_SESSION['message'] = '<p><div class="alert alert-danger">
        <strong>Sorry!</strong> Your password does not match.</div></p>';
        header("location: users.php");
        exit();
    }
    
}

if (isset($_GET['edit'])) {
    $user = $_GET['edit'];
    $edit = true;
    $record = mysqli_query($con, "SELECT * FROM users WHERE id ='$user'");
    $row = mysqli_fetch_array($record);
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];

}

?>

<!DOCTYPE html>
<html xmlns="http://www.litwebtech.com">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lit Web Tech</title>
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
        
        <!--FormSection-->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>System Management</h2>   
                        <h5>| Sysytem | Users | New User |</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                        <?php if ($edit == true): ?>
                            <div class="panel-heading">
                                Editing Form
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Edit User Details</h3>
                                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <input type="hidden" name="id" value="<?php echo $user?>" />
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" required value="<?php echo $username?>" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" required value="<?php echo $email?>" />
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Old Password</label>
                                                <input type="text" name="pass1" class="form-control" required value="<?php echo $password?>" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>New Password</label>
                                                <input type="password" name="pass" class="form-control" required />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_pass" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Select User Role & Privilage</label>
                                                <select name="role" class="form-control" required>
                                                    <option selected disabled value="">Select Privilages</option>
                                                    <option value="1">Administrator | All Privilages</option>
                                                    <option value="2">Stock Manger | Medium Privilages</option>
                                                    <option value="3">Starndard User | Limited Access</option>
                                                    <option value="4">Customer</option>
                                                </select>
                                            </div>
                                            <div class="form-group " style="text-align:center;">
                                                <button type="submit" name="edit" class="btn btn-success col-md-3"  style="margin-right: 50px;">Save Changes</button>
                                                <button type="buton" class="btn btn-danger col-md-3" style="margin-right: 50px;" onclick="history.back()">Cancel</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>


                        <?php else: ?>
                            <div class="panel-heading">
                                Regstration Form
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Register New User</h3>
                                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" placeholder="PLease Enter Username" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="PLease Enter email address" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" name="pass" class="form-control" placeholder="PLease Enter password" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_pass" class="form-control" placeholder="PLease Confrm password" />
                                            </div>
                                            <div class="form-group">
                                                <label>Select User Role & Privilage</label>
                                                <select name="role" class="form-control">
                                                    <option value="1">Administrator | All Privilages</option>
                                                    <option value="2">Stock Manger | Medium Privilages</option>
                                                    <option value="3">Starndard User | Limited Access</option>
                                                    <option value="4">Customer</option>
                                                </select>
                                            </div>
                                            <div class="form-group " style="text-align:center;">
                                                <button type="submit" name="save" class="btn btn-success col-md-3"  style="margin-right: 50px;">Register User</button>
                                                <button type="reset" class="btn btn-warning col-md-3" style="margin-right: 50px;">Reset Input</button>
                                                <button type="buton" class="btn btn-danger col-md-3" style="margin-right: 50px;" onclick="history.back()">Cancel</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

