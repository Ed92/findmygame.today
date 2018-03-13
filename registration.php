<?php
 ob_start();
 session_start(); // start a new session or continues the previous
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php"); // redirects to home.php
 }
 include_once 'dbconnect.php';
 $error = false;
 if ( isset($_POST['btn-signup']) ) {
  // sanitize user input to prevent sql injection
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain letters and spaces.";
  }
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter a valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT user_email FROM users WHERE user_email='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter a password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  // if there's no error, continue to signup
  if( !$error ) {
   $query = "INSERT INTO users(user_name,user_email,user_pass) VALUES('$name','$email','$password')";
   $res = mysqli_query($conn, $query);
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/pokemon.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
            
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
<?php
            if ( isset($errMSG) ) {
              echo $errMSG; ?>

					<div class="login100-form-avatar">
						<img src="images/char.jpeg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
						<span class="text-danger"><?php echo $emailError; ?></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
						<span class="text-danger"><?php echo $passError; ?></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" name="btn-login" class="btn btn-primary">Sign In</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="#">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
					             <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />

<br />
                <span class="text-danger"><?php echo $nameError; ?></span>


             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />



                <span class="text-danger"><?php echo $emailError; ?></span>
<br />

             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />



                <span class="text-danger"><?php echo $passError; ?></span>



             <hr />
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Register</button>
             <hr />

             <a href="index.php">Log in</a>
				</form>

				<?php
            }
          ?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>