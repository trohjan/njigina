<?php
    require_once "config.php";
    $systemCheck = mysqli_query($con, "SELECT * FROM users");
    $row = mysqli_fetch_array($systemCheck);
    if ($row!=""){
      $newSystem=false;
    }else{
      $newSystem=true;
    }

    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
      if($_SESSION["role"]==1){
        header("location: adminDash.php");
        exit;
      }elseif($_SESSION["role"]==2){
        header("location: stockDash.php");
        exit;
      }elseif($_SESSION["role"]==3){
        header("location: userDash.php");
        exit;
      }elseif($_SESSION["role"]==4){
        header("location: customer.php");
        exit;
      }
        
    }

    $username = $email = $password = $confirm_password = "";
    $username_err = $email_err =  $password_err = $login_err = "";

    /////////////////////////
    if(isset($_POST['register'])){
      if(empty(trim($_POST["username"]))){
          $username_err = "Please enter username.";
      } else{
          $username = trim($_POST["username"]);
      }
      if(empty(trim($_POST["email"]))){
          $email_err = "Please enter your email.";
      } else{
          $email = trim($_POST["email"]);
      }
      if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
      } else{
          $password = trim($_POST["password"]);
      }
      if(empty(trim($_POST["confirm_password"]))){
          $password_err = "Please enter your confirm password.";
      } else{
          $confirm_password = trim($_POST["confirm_password"]);
      }
      if($password === $confirm_password){
        $password = trim($_POST["password"]);
          
      } else{
        $password_err = "Sorry you password does not match.";
      }

      ///------------------------
      if(empty($username_err) && empty($email_err) && empty($password_err)){
        $query = "INSERT INTO users (username, email, password, role, status)
               VALUES ('$username', '$email', '$password', 1, 1)";
        mysqli_query($con, $query);
        $reg_scc = "Success! Your Admin account has been created successfully. Now you can log in.";
        $newSystem=false;

      }else{
        echo "Oops! Something went wrong. Please try again later.";
      }
      
    }

    ////////////////////////////


    if(isset($_POST['login'])){
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT id, username, password FROM users WHERE username = ?";
            if($stmt = $con->prepare($sql)){
                $stmt->bind_param("s", $param_username);
                $param_username = $username;
                if($stmt->execute()){
                    $stmt->store_result();
                    if($stmt->num_rows == 1){                    
                        // Bind result variables
                        $stmt->bind_result($id, $username, $password);
                        if($stmt->fetch()){
                            if ($_POST['password'] === $password) {                                
                                $record = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                                if ($record->num_rows > 0) {
                                    $R = mysqli_fetch_array($record);
                                    $userRole = $R['role'];
                                    $status = $R['status'];
                                    if($userRole == 1 && $status == 1 || $status == 47){
                                        session_start();
                                        // Store data in session variables
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $id;
                                        $_SESSION["username"] = $username; 
                                        $_SESSION["role"] = $userRole;
                                        
                                        header("location: adminDash.php");


                                        $con->close();
                                        ////////////////////////////////////////////

                                    }elseif($userRole == 2 && $status == 1 || $status == 47){
                                        session_start();
                                        // Store data in session variables
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $id;
                                        $_SESSION["username"] = $username; 
                                        $_SESSION["role"] = $userRole; 
                                       
                                        header("location: stockDash.php");
                                        $con->close();
                                        ////////////////////////////////////////////
                                    }elseif($userRole == 3 && $status == 1 || $status == 47){
                                      session_start();
                                      // Store data in session variables
                                      $_SESSION["loggedin"] = true;
                                      $_SESSION["id"] = $id;
                                      $_SESSION["username"] = $username; 
                                      $_SESSION["role"] = $userRole; 
                                       
                                      header("location: userDash.php");
                                      $con->close();
                                      ////////////////////////////////////////////
                                    }elseif($userRole == 4 && $status == 1 || $status == 47){
                                      session_start();
                                      // Store data in session variables
                                      $_SESSION["loggedin"] = true;
                                      $_SESSION["id"] = $id;
                                      $_SESSION["username"] = $username; 
                                      $_SESSION["role"] = $userRole; 
                                        
                                      header("location: customer.php");
                                      $con->close();
                                      ////////////////////////////////////////////
                                    }else{
                                      $login_err = "Sorry your account has been suspended, please contact your admin.";
                                    }

                                }
                                

                                
                                
                            
                            } else{
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } else{
                        $login_err = "Invalid username or password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                $stmt->close();
            }
        }
        
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Njigina Macharia</title>
    <link rel="stylesheet" href="robot.css">
    <link rel="stylesheet" href="font.css">
    <script>
        document.addEventListener("keydown", function (event){    if (event.ctrlKey){       event.preventDefault();    }    if(event.keyCode == 123){       event.preventDefault();    }});
    </script>
    <link href="bootstrap-5/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5/js/bootstrap.bundle.min.js"></script>
    
</head>
<body oncontextmenu="return false;">
<?php if ($newSystem == true): ?>
  <section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/logo.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        $login_err = "";
                    }        
                ?>
                <?php 
                    if(!empty($reg_scc)){
                        echo '<div class="alert alert-success">' . $reg_scc . '</div>';
                        $reg_scc = "";
                    }        
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Welcome Njigina Macharia Admin</span>
                  </div>
                  
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Resister New Admin User To Be Aable To Use This System</h5>
                  <div class="form-outline mb-4">
                      <label class="form-label" for="username">Username</label>
                      <input required type="text" id="username" name="username" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" />
                      
                  </div>
                  <div class="form-outline mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input required type="text" id="email" name="email" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" />
                      
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="password">New Password</label>
                    <input required type="password" id="password" name="password" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
                    
                  </div>
                  <div class="form-outline mb-4">
                  <label class="form-label" for="confirm_password">Confirm Password</label>
                    <input required type="password" id="confirm_password" name="confirm_password" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button type="submit" name="register" class="btn btn-dark btn-lg btn-block">Register</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Contact The Developer on 0115586624 <a href="tel:+254115586624"
                      style="color: #393f81;"></a></p>
                  <a href="https://www.litwebtech.com" class="small text-muted">Developed And Maintained By LitWebTech.</a><br>
                  <a href="#!" class="small text-muted">Delveloped for Njigina Macharia.</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php else: ?>
<section class="vh-100" style="background-color: #123FBB;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/about.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
                ?>
                <?php 
                    if(!empty($reg_scc)){
                        echo '<div class="alert alert-success">' . $reg_scc . '</div>';
                    }        
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Njigina Macharia Admin Portal</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input required type="text" id="username" name="username" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" />
                    
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input required type="password" id="password" name="password" autocomplete="off" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button type="submit" name="login" class="btn btn-dark btn-lg btn-block">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Contact The Developer on 0115586624 <a href="tel:+254115586624"
                      style="color: #393f81;"></a></p>
                  <a href="https://www.litwebtech.com" class="small text-muted">Developed And Maintained By LitWebTech.</a><br>
                  <a href="#!" class="small text-muted">Delveloped for Njigina Macharia.</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif ?>
    
 <script>
    $('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
 </script>
</body>
</html>