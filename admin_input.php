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
    $vaccine_id = $_POST['vaccine_id'];
    $information = $_POST['information'];
    $sql = "INSERT INTO vaccine_information (vaccine_id,information)
    values ('$vaccine_id','$information')";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/admin_index.css">
</head>
<body>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap">
      <thead>       
          <tr>
              <th></th>
              <th>name</th>
              <th>phone number</th>
          </tr>
      </thead>
      <tbody>
<?php 
$sql = "SELECT * FROM parent_tbl";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
  $phonenum = $row['phonenum'];
  $firstname = $row['firstname'];

?>        
<tr>
    <td><input type="checkbox" name="mobile[]"></td>  
    <td><?php echo $firstname ?></td>            
    <td><?php echo $phonenum ?></td>
</tr>
<?php } ?>
</tbody>

<form action="#" method="post" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ehealth foods</label>
    <input type="text" name="hf" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">benefits</label>
    <input type="text" name="benefits" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <label for="exampleInputPassword1" class="form-label">reminders</label>
    <input type="text" name="reminders" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="guide" class="btn btn-primary">Submit</button>
</form>
<form action="#" method="post" >
  <div class="mb-3">
  <select name="vaccine_id">
                <?php  
                $query = "SELECT * FROM vaccine";
                $result = mysqli_query($con,$query);  
                    while($rows=mysqli_fetch_assoc($result)){
                    $vaccine_id = $rows['vaccine_id'];
                    $vaccinename = $rows['vaccinename'];
                    if ($checkvaccine_id == $vaccine_id) {
                        continue;
                      }
                    
                    echo "<option value='$vaccine_id'>$vaccinename</option>";
                    }      
                ?>
            </select> 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> vaccine information</label>
    <input type="text" name="information" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="vaccine_information" class="btn btn-primary">Submit</button>
</form>
 </body>
</html>