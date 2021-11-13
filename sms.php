<?php
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Module</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <form action="sms.php" method="POST">
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
                        <p class="text-right" id="charNum">100</p>
                        <button type="submit" class="btn btn-success">Send</button>
                    </form>
                </div>
            </div>
        </div>

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