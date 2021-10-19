<?php 
session_start();

include("php/connection.php");
include("php/admin_functions.php");

$user_data = check_login($con);

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}
//##########################################################################

if($_POST){
    $number = $_POST['number'];
    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $api = "TR-CAMEL935366_PTYY2";
    $pass = "kpdz9}}!9]";
    $text = $name.":   ".$msg;

    if(!empty($_POST['name']) && ($_POST['number']) && ($_POST['msg'])){
$result = itexmo($number,$text,$api,$pass);
    if ($result == ""){
    echo "iTexMo: No response from server!!!
    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
    Please CONTACT US for help. ";	
    }else if ($result == 0){
    echo "Message Sent!";
    }
    else{	
    echo "Error Num ". $result . " was encountered!";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS Notification | Admin</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin_sms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    
</head>
<body>
      <!-- Navigation Bar -->
     <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Child Care System</label>
        <ul>
          <li><a href="admin_index.php"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
          <li><a href="admin_child.php"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
          <li><a href="admin_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
          <li><a href="admin_guide.php"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
          <li><a href="admin_sms.php" class="active"><i class="fas fa-comment"  id="icon"></i>SMS Notification</a></li>
        
          <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
            <a href="php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
            </div>
          </div>
        </ul>
      </nav>

<div class="content">
    <select class="sms-options toShow" name="status" id="status">
        <option value="1">Single or Multiple SMS</option>
        <option value="0">Scheduled SMS</option>
    </select>
    <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <form action="admin_sms.php" method="POST">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" maxlength="15" class="form-control" id="name" placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Recipient's Mobile Number</label>
                            <input type="text" maxlength="11" class="form-control" id="number" placeholder="Mobile Number" name="number" required>
                        </div>
                        <div class="form-group">
                            <label for="msg">Your Message</label>
                            <textarea class="form-control" rows="3" name="msg" placeholder="Message here" onkeyup="countChar(this)" required></textarea>
                        </div>
                        <!-- <div class="form-group toShowSched" style="display: none;">
                <label>Scheduled At:</label>
                <input type="date" class="date" name="date" required>
            </div> -->
                        <p class="text-right" id="charNum">100</p>
                        <button type="submit" class="btn btn-success">Send</button>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="admin_sms.js"></script>
<div name="on" class="toggle" id="status" onclick="toggleMenu()"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

   // for 700px screen 
   function toggleMenu(){
            let navigation = document.querySelector('.navigation');
            let toggle = document.querySelector('.toggle');
            let show = document.querySelector('#show');

            navigation.classList.toggle('active');
            toggle.classList.toggle('active');
            
            show.addEventListener('click', () => {
                
                if(navigation.classList.contains('active')){
                    navigation.classList.toggle('active');
                }else{
                    navigation.classList.remove('active');
                }
            })

           }
        
        // for desktop
        $(document).ready(function(){
            $("#show").click(function(){
                $("div.toShow").fadeIn(50).show();
                if($("div.toShow").show()){
                    $("div.toShow").fadeIn(50).hide();
                }
            });

        });
        
    </script>

    <!-- sms -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script>
            function countChar(val){
                var len = val.value.length;
                if (len >=85){
                    val.value = val.value.substring(0,85);
                }else{
                    $('#charNum').text(85-len);
                }
            };
        </script>
</body>
</html>