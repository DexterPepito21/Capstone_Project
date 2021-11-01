<?php 

include("php/connection.php");
include("php/functions.php");

if(isset($_POST['guide'])){
    $hf = $_POST['hf'];
    $benefits = $_POST['benefits'];
    $reminders = $_POST['reminders'];
    $sql = "INSERT INTO guide (hf,benefits,reminders)
    values ('$hf','$benefits','$reminders')";
    $result = mysqli_query($con, $sql);
  }
  if(isset($_POST['vaccine_information'])){
    $vaccinename = $_POST['vaccinename'];
    $information = $_POST['information'];
    $sql = "INSERT INTO vaccine_information (vaccinename,information)
    values ('$vaccinename','$information')";
    $result = mysqli_query($con, $sql);
  }
  if(isset($_POST['vaccine'])){
    $vaccinename = $_POST['vaccinename'];
    $doses = $_POST['doses'];
    $sql = "INSERT INTO vaccine (vaccinename,doses)
    values ('$vaccinename','$doses')";
    $result = mysqli_query($con, $sql);
  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_chart.css">
</head>
<body>
  

<!-- Nutrition Guide -->
<form action="#" method="post" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ehealth foods</label>
    <textarea id="w3review" name="hf" rows="5" cols="100"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">benefits</label>
    <textarea id="w3review" name="benefits" rows="5" cols="100"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">reminders</label>
    <textarea id="w3review" name="reminders" rows="5" cols="100"></textarea>
  </div>
  <button type="submit" name="guide" class="btn btn-primary">Guide</button>
</form>


<br><br><br>


<!-- Vaccine with Doses -->
<form action="#" method="post" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Vaccine name</label>
    <input type="text" name="vaccinename">
  </div>
  <div class="mb-3">
  <select name="doses">
      <option value=''></option>
      <option value='1st'>1st</option>
      <option value='2nd'>2nd</option>
      <option value='3rd'>3rd</option>
  </select>
  </div>
  <button type="submit" name="vaccine" class="btn btn-primary">vaccine</button>
</form>


<br><br><br>

<!-- Vaccine Information -->
<form action="#" method="post" >
Vaccine Name & Dosage
<select name="vaccinename">
  <?php  
  $query = "SELECT DISTINCT vaccinename FROM vaccine";
  $result = mysqli_query($con,$query);  
  while($rows=mysqli_fetch_assoc($result)){

    $vaccinename = $rows['vaccinename'];
    echo "<option value='$vaccinename'>$vaccinename</option>";
  }                                     
    ?>
</select> 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> vaccine information</label>
    <textarea id="w3review" name="information" rows="5" cols="100"></textarea>
  </div>
  <button type="submit" name="vaccine_information" class="btn btn-primary">Submit</button>
</form>


 </body>
</html>