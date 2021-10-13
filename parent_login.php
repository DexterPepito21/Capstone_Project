<?php
	include("php/connection.php");
  include("php/parent_functions.php");
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
    <title>Login</title>
    <style>
      .style{
				color: #000000;
				border-bottom: 2px solid #8f1b1c;
        background: #fadadb;
				padding: 10px;
      }
    </style>
  </head>
  <body>
<header>
<div class="wrapper fadeInDown">
<a href="home.php" class="back"><i class="fas fa-arrow-circle-left"></i></a>
  <div id="formContent">
    
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="admin/b2.png" id="icon" alt="User Icon" />
    </div>
    <h2>Login</h2>
    <!-- Login Form -->
    <form action="php/parent_login.php" method="POST">
      <i class="fas fa-user"></i><input type="text" id="login" class="fadeIn second" name="user_name" placeholder="Username"/>
      <br><i class="fas fa-lock"></i><input type="text" id="password" class="fadeIn third" name="password" placeholder="Password"/>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    <a class="underlineHover" href="forgot.php">Forgot Password?</a><br>
    <a class="underlineHover" href="signup.php">Don't have an Account? Sign up</a>
    </div>

  </div>
</div>
    </header>
  </body>
</html>