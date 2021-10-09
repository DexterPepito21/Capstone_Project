
<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
      $query = "insert into users (user_id,user_name,password,address) values ('$user_id','$user_name','$password','$address')";
			// $query = "insert into users (user_id,user_name,password,first_name,last_name,middle_name,address,phone_num) values ('$user_id','$user_name','$password','$first_name','$last_name','$middle_name','$address','$phone_num')";

			mysqli_query($con, $query);

			header("Location: ../home.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	  }
?>






<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="signup.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="First Name" name="first_name"/>
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
            <input type="submit" class="btn" value="Sign up" />
          </form>
          
          <form action="#" class="sign-up-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <a href="forgotpassword.php">Forgot password?</a>
            <input type="submit" value="Login" class="btn solid" />
          </form>
          <a href="home.html" class="back"><i class="fas fa-arrow-circle-left"></i>Go back</a>
        </div>
      </div>
     
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Already have an account?</h3>
            <br>
            <button class="btn transparent" id="sign-up-btn">
              Sign in
            </button>
          </div>
          <img src="b1.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Don't have an account?</h3>
            <br>
            <button class="btn transparent" id="sign-in-btn">
              Sign up
            </button>
          </div>
          <img src="b2.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="style.js"></script>
  </body>
</html> -->