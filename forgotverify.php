<?php
include("connection.php");
include("functions.php");
$email = $_GET['email'];

if(isset($_POST['reset'])){
    $password = $_POST['pass'];

    $sql = "UPDATE users SET password=? WHERE email='$email'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $password);
    if($stmt->execute()){

    echo "<script>
         alert('Password Reset Successfully');
         window.location.href='login.php';
           </script>
";

}else{
    echo "<script>
    alert('Password Reset UnSuccessfully');
    window.location.href='login.php';
      </script>
";

}
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
         body{font-family: Arial, Helvetica, sans-serif;}

    /* Full-width input fields */
    input[type=password] {
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



.resett{
    margin: 20px;
}

.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
} 

.resett{
    margin: 10px;
}

</style>

</head>


<body>
    <form action="forgotverify.php?email=<?php echo $email?>" class="modal-content" method="POST">
    <div class="container">
    <input type="password"  name="pass" placeholder="Enter New Password"/><br>
</div>
    <button type="submit" class="resett" style="width:auto;" name="reset">Reset Password</button> 

</form>
    
</body>
</html>