
<?php 
session_start();

	include("php/connection.php");
	include("php/functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $errors = array();
		
		$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $address = $_POST['address'];
    $phonenum = $_POST['phonenum'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usernameErr = "SELECT username FROM parent_tbl WHERE username='$username'";
    $usernameErrResult = mysqli_query($con,$usernameErr);
   
    
    if (empty($firstname)) {
      $errors['fn'] = 'no firstname';
    }
    if (empty($lastname)) {
        $errors['ln'] = 'no lastname';
    }
    if (empty($middlename)) {
      $errors['mn'] = 'no middlename';
    }
    if (empty($phonenum)) {
      $errors['pn'] = 'no phonenum';
    }
    if (empty($address)) {
      $errors['a'] = 'no address';
    }
    if (empty($username)) {
        $errors['u'] = 'no username';
    }else if(mysqli_num_rows($usernameErrResult) > 0){
        $errors['u'] = 'Username exist';
    } 
    if (empty($password)) {
        $errors['p'] = 'no password';
    }
    
		if(count($errors)==0){

		
      $query = "INSERT INTO parent_tbl (firstname,lastname,middlename,address,phonenum,username,password)
      values ('$firstname','$lastname','$middlename','$address','$phonenum','$username','$password')";
			mysqli_query($con, $query);

		}
    header("Location: home.php");
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
    <link rel="stylesheet" href="css/login&signup.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <title>Login</title>
    </style>
  </head>
  <body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="admin/b2.png" id="icon" alt="User Icon" />
    </div>
    <h2>Sign Up</h2>
    <!-- Login Form -->
    <form action="#" method="POST">
    <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="firstname" placeholder="Firstname"/><br>
    <p style="color:red;">  <?php if(isset($errors['fn'])) echo $errors['fn']; ?><br>
    <i class="fas fa-user"></i><input type="text" id="password" class="fadeIn third" name="lastname" placeholder="Lastname"/><br>
    <p style="color:red;">  <?php if(isset($errors['uln'])) echo $errors['uln']; ?><br>
    <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="middlename" placeholder="Middle name"/><br>
    <p style="color:red;">  <?php if(isset($errors['mn'])) echo $errors['mn']; ?><br>
    <i class="fas fa-map-marker"></i><input type="text" id="password" class="fadeIn third" name="address" placeholder="Address"/><br>
    <p style="color:red;">  <?php if(isset($errors['a'])) echo $errors['a']; ?><br>
    <i class="fas fa-phone"></i><input type="text" id="login" class="fadeIn second" name="phonenum" placeholder="Phone Number"/><br>
    <p style="color:red;">  <?php if(isset($errors['pn'])) echo $errors['pn']; ?><br>
    <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="username" placeholder="Username"/>
    <p style="color:red;">  <?php if(isset($errors['u'])) echo $errors['u']; ?><br>
    <i class="fas fa-lock"></i><input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"/><br>
    <p style="color:red;">  <?php if(isset($errors['p'])) echo $errors['p']; ?><br>
      <input type="submit" class="fadeIn fourth" value="Sign up">
  
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="admin_login.php">Already Have an Account? Login</a>
    </div>
  </div>
</div>
  </body>
</html>