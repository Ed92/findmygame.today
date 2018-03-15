<?php

  ob_start();
  session_start();

  require_once 'actions/db_connect.php';



  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['user'])!="" ) {
    header("Location: home.php");

    exit;
  }

  $error = false;

  $email = "";   //done
  $pass = "";  //done
  //$Amdin_status = "";

  $emailError = "";
  $passError = "";

  if( isset($_POST['btn-login']) ) {

    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // prevent sql injections / clear user invalid inputs
    if(empty($email)){

      $error = true;
      $emailError = "Please enter your email address.";

    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {

      $error = true;
      $emailError = "Please enter valid email address.";
    }

    if(empty($pass)){

      $error = true;
      $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {
      $password = hash('sha256', $pass); // password hashing using SHA256

      $res=mysqli_query($conn, "SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");

      $row=mysqli_fetch_array($res, MYSQLI_ASSOC);

      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
      if( $count == 1 && $row['user_pass']==$password ) {

        $_SESSION['user'] = $row['user_id'];
        header("Location: home.php?id=".$_SESSION['user']."");
        // echo $_SESSION['user'];
      } else {

        $errMSG = "Incorrect Credentials, Try again...";

      }
    }
  }


?>
<!DOCTYPE html>
<html>
<head>
  <title>Login V12</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/pokemon.jpg');">
      <div class="wrap-login100 p-t-190 p-b-30">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
          
          <div class="login100-form-avatar">
            <img src="images/char.jpeg" alt="AVATAR">
          </div>

          <span class="login100-form-title p-t-20 p-b-45">
            <h2>Sign In.</h2>
            <a href="register.php">Sign Up Here...</a>
          </span>

          <hr />

          <?php
            if ( isset($errMSG) ) {
              echo $errMSG;
            }

          ?>
          <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">

            <input type="email" name="email" class="input100" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />

            <span class="text-danger focus-input100"><?php echo $emailError; ?></span>
      
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
            <input type="password" name="pass" class="input100" placeholder="Your Password" maxlength="15" />

            <span class="text-danger focus-input100"><?php echo $passError; ?></span>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>

          <hr />

          <div class="container-login100-form-btn p-t-10">
            <button type="submit" name="btn-login" class="btn btn-primary btn_login">Sign In</button>
            
            <td><a href="index.php"><button type="button" class="btn btn-primary btn_login">Back</button></a></td>
          </div>

        </form>
           
      </div>
    </div>
  </div>
</body>
</html>
<?php ob_end_flush(); ?>
