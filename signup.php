<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="login.css" />
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
    <form action="php/admin_signup.php" method="POST">
    <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="first_name" placeholder="Firstname"/><br>
    <i class="fas fa-user"></i><input type="text" id="password" class="fadeIn third" name="last_name" placeholder="Lastname"/><br>
    <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="middle_name" placeholder="Middle name"/><br>
    <i class="fas fa-map-marker"></i><input type="text" id="password" class="fadeIn third" name="address" placeholder="Address"/><br>
    <i class="fas fa-phone"></i><input type="text" id="login" class="fadeIn second" name="phone_num" placeholder="Phone Number"/><br>
    <i class="fas fa-lock"></i><input type="text" id="password" class="fadeIn third" name="password" placeholder="Password"/><br>
    <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="user_name" placeholder="Username"/>
      <input type="submit" class="fadeIn fourth" value="Sign up">
  
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="admin_login.php">Already Have an Account? Login</a>
    </div>

  </div>
</div>
  </body>
</html>