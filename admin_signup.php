<?php 
	include("php/connection.php");
	include("php/functions.php");

	if(isset($_POST['signup']))
  {
    $errors = array();
		
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];



    $usernameErr = "SELECT username FROM admin_tbl WHERE username='$username'";
    $usernameErrResult = mysqli_query($con,$usernameErr);
   
    

    if (empty($username)) {
        $errors['u'] = 'no username';
    }else if(mysqli_num_rows($usernameErrResult) > 0){
        $errors['u'] = 'Username exist';
    } 
    if (empty($password)) {
        $errors['p'] = 'no password';
    }
    
		if(count($errors)==0){

		
      $query = "INSERT INTO admin_tbl (email,username,password)
      values ('$email','$username','$password')";
			mysqli_query($con, $query);
      header("Location: admin_login.php");
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/login.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <title>Signup</title>
    </style>
  </head>
  <body>
<div class="wrapper fadeInDown">
<a href="index.php" class="back"><i class="fas fa-arrow-circle-left"></i></a>
  <div id="formContent">
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="admin/b2.png" id="icon" alt="User Icon" />
    </div>
    <h2>Sign Up</h2>
    <p style="color:red;">  <?php if(isset($errors['u'])) echo $errors['u']; ?></p>
    <p style="color:red;">  <?php if(isset($errors['p'])) echo $errors['p']; ?>
    <form action="#" method="POST" class="form-inline">

    <i class="fas fa-user"></i><input type="email" id="login" class="fadeIn second" name="email" placeholder="Email"/>
    <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="username" placeholder="Username"/>
    <i class="fas fa-lock"></i><input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"/><br>
    <br>
      <input type="submit" name="signup" class="fadeIn fourth" value="Sign up">
  
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="login.php">Already Have an Account? Login</a>
    </div>
  </div>
</div>
  </body>
</html>