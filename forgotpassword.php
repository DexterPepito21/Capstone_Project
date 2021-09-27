<?php
include("connection.php");
include("functions.php");
require 'mail/PHPMailerAutoload.php';
$mail = new PHPMailer;

if(isset($_POST['forgot'])){
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    if($result->num_rows==1){
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'basiliocamelleann.18@gmail.com';                 // SMTP username
  $mail->Password = 'ryaedbpabkasoytf';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom('basiliocamelleann.18@gmail.com', 'Camelle Ann Basilio');
  $mail->addAddress($row['email'], $row['firstName']);     // Add a recipient
      
  $mail->Subject = 'Reset Password Link';
  $mail->Body    = '<a href="http://localhost/Login/forgotverify.php?email='.$email.'">Click this link to reset your password</a>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $message = 'Reset Password Link Has Been Sent, Please Check your Email';
    echo "<SCRIPT>
        alert('$message')
        window.location.replace('forgotpassword.php');
    </SCRIPT>";
  }

    }else{
      $message = 'Email Does not Exist in the Database.';

      echo "<SCRIPT>
          alert('$message')
          window.location.replace('forgotpassword.php');
      </SCRIPT>";
    }

}

if(isset($_POST['cancel'])){
    header("location: login.php");

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
         body .p {font-family: Arial, Helvetica, sans-serif;}

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 12px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
} 

 /* Set a style for all buttons */
 button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbutton {
  width: auto;
  padding: 14px 20px;
  background-color: #f44336;
  margin: 10px;
}

.reset{
    margin: 10px;
}

.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
} 

</style>
</head>
<body>
      <form action="forgotpassword.php" class="modal-content" method="POST">

      <div class="container">
      <p><center><h4>Please Enter Your Email Address to Reset Your Password</h4></center></p>
      <input type="text" name="email" placeholder="example.gmail.com"><br><br>
</div>
      <button type="submit" name="forgot" class="reset" style="width:auto;">Send Reset Password Link</button>  
      <button type="submit" class="cancelbutton" name="cancel">Cancel</button>
    </form>
    
</body>
</html>