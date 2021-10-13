<?php 
// session_start();

// include("php/connection.php");
// include("php/functions.php");
//   $m = "wew";
// if($_SERVER['REQUEST_METHOD'] == "POST") {

//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $middle_name = $_POST['middle_name'];
//     $address = $_POST['address'];
//     $phone_num = $_POST['phone_num'];
//     $user_name = $_POST['user_name'];
//     $password = $_POST['password'];

//     $errors = array();

//     $user_nameErr = "SELECT user_name FROM users WHERE username='$user_name'";
//     $user_nameErrResult = mysqli_query($con,$user_nameErr);

    



//     if (empty($first_name)) {
//       $GLOBALS['err'] = "Username Requires";
//     }else if(mysqli_num_rows($user_nameErrResult > 0)) {
//         $errors['fn'] = "username exist";
//     }
//     if (empty($first_name)) {
//       $errors['fn'] = "Username Requires";
//     }
//     if (empty($first_name)) {
//       $errors['fn'] = "Username Requires";


      
//     }
// }

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
    <title>Sign in & Sign up Form</title>
    <style>
      .style{
        width: 70%;
				color: #000000;
				border-bottom: 2px solid #8f1b1c;
        background: #fadadb;
				padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">


          <form action="php/admin_login.php" class="sign-in-form" method="POST">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="user_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <a href="forgotpassword.php">Forgot password?</a>
            <input type="submit" name="login" value="Login" class="btn solid"/>
          </form>


          <form action="php/admin_signup.php" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <!-- INSERT CODE HERE FOR ERROR -->
            <p style="color:red;"><?php echo 'wew'?></p>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="First Name" name="first_name" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Last Name" name="last_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Middle Name" name="middle_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-map-marker"></i>
              <input type="text" placeholder="Address" name="address"/>
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" placeholder="Phone Number" name="phone_num"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="user_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" class="btn" value="Signup"/>
          </form>
          <a href="home.php" class="back"><i class="fas fa-arrow-circle-left"></i>Go back</a>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Don't have an account?</h3>
            <br>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="admin/b1.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already have an account?</h3>
            <br>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="admin/b2.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/login&signup_style.js"></script>
  </body>
</html>