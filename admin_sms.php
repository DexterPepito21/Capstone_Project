<?php 
session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);
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
            <a href="logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
            </div>
          </div>
        </ul>
      </nav>

<div class="content" style="overflow-x: auto;">
    <select class="sms-options toShow" name="status" id="status">
        <option value="1">Single or Multiple SMS</option>
        <option value="0">Scheduled SMS</option>
    </select>
    <div class="sms-notification">
        <form class="my-form">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Sender:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Number:</label>
                <input type="number" data-maxlength="11" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" required/>
            </div>
            <div class="form-group">
                <label class="message">Message:</label>
                <textarea name="message" cols="40" rows="10" required></textarea>
            </div>
            <div class="form-group toShowSched" style="display: none;">
                <label>Scheduled At:</label>
                <input type="date" class="date" name="date" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Send">
            </div>
        </form>
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
</body>
</html>