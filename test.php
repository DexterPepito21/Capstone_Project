<?php 
include("php/connection.php");
include("php/functions.php");

$key = "qkwjdiw239&&jdafweihbrhnan&^%'$'ggdnawhd4njshjwuuO";




  if(isset($_POST['hospital'])){
    $healthcenter_enc = encryptthis($_POST['healthcenter'], $key);
    $sql = "INSERT INTO healthcenter_tbl (healthcenter)
    values ('$healthcenter_enc')";
    $result = mysqli_query($con, $sql);
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input | Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/input.css">
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
    <li><a href="admin_index.php" ><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
    <li><a href="admin_input.php" class="active"><i class="fas fa-book"  id="icon"></i>Input</a></li>
    <li><a href="admin_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
    <li><a href="admin_sms.php"><i class="fas fa-comment"  id="icon"></i>SMS Notification</a></li>
    
    <div class="dropdown">
        <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
        <a href="php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
        </div>
    </div>
    </ul>
</nav>
  
<div class="container">
  <p>Fill this up for the new health center to be added.</p>
<!-- Vaccine with Doses -->
<form action="#" method="post" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">health center:</label>
    <input type="text" name="healthcenter">
  </div>
  <button type="submit" name="hospital" class="btn btn-primary">health center</button>
</form>
</div>


<div class="container">
<?php  
                $query = "SELECT * FROM healthcenter_tbl";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $healthcenter =  decryptthis($rows['healthcenter'], $key);
                 
                  echo "<td>$healthcenter</td><br><br>";
                }  
    ?>
    </div>

 </body>
</html>