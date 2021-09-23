<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHILD PROFILE | Parent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="child.css">
</head>
<body>
  <!-- Side MenuBar -->
  <div class="navigation">
    <center>
        <img src="bg.jpg" class="profile" alt="">
    </center>
    <ul>
        <li>
            <a href="index.html">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="child.html">
                <span class="icon"><i class="fa fa-child"></i></span>
                <span class="title">Child Profile</span>
            </a>
        </li>
        <li>
            <a href="chart.html">
                <span class="icon"><i class="fas fa-chart-bar"></i></span>
                <span class="title">Vaccine Chart</span>
            </a>
        </li>
        <li>
            <a href="guide.html">
                <span class="icon"><i class="fa fa-book"></i></span>
                <span class="title">Nutrition Guide</span>
            </a>
        </li>
    </ul>
</div>
<div class="toggle" onclick="toggleMenu()"></div>
<script type="text/javascript">
 function toggleMenu(){
     let navigation = document.querySelector('.navigation');
     let toggle = document.querySelector('.toggle');
     navigation.classList.toggle('active');
     toggle.classList.toggle('active');
 }
</script>
<!-- Forms -->
<h2><i class="fa fa-child"></i>Profile</h2>
<!--Step 1:Adding HTML-->
<form class="form-inline" action="/action_page.php"  style="border:1px solid #ccc">
  <div class="container">
      <label for="email">Child's Name:</label>
      <?php echo $user_data['user_name']; ?>
  <br>
    <label for="email">Date of Birth:</label>
    <input type="text" id="email"   name="email">

    <label for="pwd">Place of Birth:</label>
    <input type="text" id="pwd"  name="pswd">
  <br>
    <label for="email">Address:</label>
    <input type="text" id="email"   name="email">
  <br>
    <label for="email">Mother's Name:</label>
    <input type="text" id="email"   name="email">

    <label for="pwd">Father's Name:</label>
    <input type="text" id="pwd"  name="pswd">
  <br>
    <label for="email">Birth Height:</label>
    <input type="text" id="email"   name="email">

    <label for="pwd">Birth Weight:</label>
    <input type="text" id="pwd"  name="pswd">
  <br>
    <label for="email">Sex:</label>
    <input type="radio" id="email" name="email">Female
    <input type="radio" id="email" name="email">Male
<br>
<br>
        <div class="clearfix">
            <button type="submit" class="signupbtn">Update</button>
        </div>
    </div>
  </div>
</form>
</body>
</html>