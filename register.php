<?php

	ob_start();

	session_start(); // start a new session or continues the previous

	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php"); // redirects to home.php
	}

	//to insurt the dbconnect.php
 	include_once 'actions/db_connect.php';

 	$error = false;

 	$avatar = "";
 	$name = "";  //done
 	$email = "";   //done
 	$dob = "";  //done
 	$fave_games = "";  //done without validations
 	$discord = "";	//done without validations
 	$pass = "";  //done
 	//$Amdin_status = "";


 	$nameError ="";
	$emailError = "";
	$passError = "";
	$dobError = "";
	


 	if ( isset($_POST['btn-signup']) ) {

		  // sanitize user input to prevent sql injection
		$name = trim($_POST['name']);
		$name = strip_tags($name);		//schutz for fremdangriffen (code/sql)
		$name = htmlspecialchars($name);

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$dob = trim($_POST['dob']);
		$dob = strip_tags($dob);
		$dob = htmlspecialchars($dob);

		$fave_games = trim($_POST['fave_games']);
		$fave_games = strip_tags($fave_games);
		$fave_games = htmlspecialchars($fave_games);

		$discord = trim($_POST['discord']);
		$discord = strip_tags($discord);
		$discord = htmlspecialchars($discord);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		// basic name validation

		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
		   	$error = true;
		   	$nameError = "Name must have at least 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}

		//basic email validation

		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
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
		   	$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
		   	$error = true;
		   	$passError = "Password must have atleast 6 characters.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);

		//dob
		if (empty($dob)){
			$error = true;
		   	$dobError = "Please enter your date of birth.";
		   }
		// } else if(strlen($dob) = 2) {
		//    	$error = true;
		//    	$dobError = "You have to be at least 10.";
		// }


		// if there's no error, continue to signup
		if( !$error ) {
		   	$query = "INSERT INTO users(user_name,user_email,user_pass,dob,avatar,discord,favorite_game) VALUES('$name','$email','$password','$dob','$avatar','$discord','$fave_games')";
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
				        <h2>Sign Up.</h2>
						
						<a href="login.php">Sign in Here...</a>
				        <hr />
			    	</span>

			        <?php
						if ( isset($errMSG) ) {
					?>

					        <div class="alert">
					 			<?php echo $errMSG; ?>
							</div>

					<?php

			   			}
					?>
					
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input type="text" name="name" class="input100" placeholder="Enter Name" maxlength="50"/>

						<span class="text-danger"><?php echo $nameError; ?></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">

						<input type="email" name="email" class="input100" placeholder="Enter Your Email" maxlength="40"/>

						<span class="text-danger"><?php echo $emailError; ?></span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "date of birth is required">

						<input type="text" name="dob" class="input100" placeholder="Enter your date of birth" maxlength="50"/>

						<span class="text-danger"><?php echo $dobError; ?></span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "pic is required">
						<input type="text" name="avatar" class="input100" placeholder="Insert a picture" maxlength="50"/>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "discord is required">
						<input type="text" name="discord" class="input100" placeholder="Your Discord name" maxlength="50"/>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "fave games is required">
						<input type="text" name="fave_games" class="input100" placeholder="Enter your favourite game" maxlength="50"/>
					</div>
					
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input type="password" name="pass" class="input100" placeholder="Enter Password" maxlength="15" />

						<span class="text-danger"><?php echo $passError; ?></span>
					</div>

					<hr />
					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
					</div>
				 </form>
           	</div>
        </div>
    </div>
   
</body>
</html>
<?php ob_end_flush(); ?>