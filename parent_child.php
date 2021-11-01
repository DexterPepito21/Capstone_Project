<?php 
error_reporting(0);
session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);
$child_data = child($con);

$parent_id = $user_data['parent_id'];


if(isset($_POST['add'])){
  $child_id = $child_data['child_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $middlename = $_POST['middlename'];
  $dateofbirth = $_POST['dateofbirth'];
  $placeofbirth = $_POST['placeofbirth'];
  $address = $_POST['address'];
  $fathername = $_POST['fathername'];
  $mothername = $_POST['mothername'];
  $birthheight = $_POST['birthheight'];
  $birthweight = $_POST['birthweight'];
  $sex = $_POST['sex'];

  $sql = "INSERT INTO child_tbl (parent_id,firstname,lastname,middlename,dateofbirth,placeofbirth,address,fathername,mothername,birthheight,birthweight,sex)
  values ('$parent_id','$firstname','$lastname','$middlename','$dateofbirth','$placeofbirth','$address','$fathername','$mothername','$birthheight','$birthweight','$sex')";
  //  ON DUPLICATE KEY UPDATE firstname='$firstname', lastname='$lastname', middlename='$middlename', dateofbirth='$dateofbirth', placeofbirth='$placeofbirth', address='$address',fathername='$fathername', mothername='$mothername', birthheight='$birthheight', birthweight='$birthweight', sex='$sex'

  $result = mysqli_query($con, $sql);

	

}

if(isset($_POST['update'])){
  $child_id = $child_data['child_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $middlename = $_POST['middlename'];
  $dateofbirth = $_POST['dateofbirth'];
  $placeofbirth = $_POST['placeofbirth'];
  $address = $_POST['address'];
  $fathername = $_POST['fathername'];
  $mothername = $_POST['mothername'];
  $birthheight = $_POST['birthheight'];
  $birthweight = $_POST['birthweight'];
  $sex = $_POST['sex'];

  $sql = "UPDATE chart SET child_id='$child_id', firstname='$firstname', lastname='$lastname', middlename='$middlename', dateofbirth='$dateofbirth', placeofbirth='$placeofbirth', address='$address',fathername='$fathername', mothername='$mothername', birthheight='$birthheight', birthweight='$birthweight', sex='$sex'";
  $result = mysqli_query($con, $sql);


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Profile | Parent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/parent_child.css">
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
    <li><a href="parent_index.php"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
    <li><a href="parent_child.php" class="active"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
    <li><a href="parent_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
    <li><a href="parent_guide.php"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
              
    <div class="dropdown">
      <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
      <a href="./php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
      </div>
    </div>
  </ul>
</nav>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
Add new User
</button>
<div class="container">
<!-- Add user Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="form-inline" action="#" method="post"  style=" width: 100%">
          <div class="container" >
              <label class="label">First Name:</label>
              <input type="text" class="form-control"  name="firstname">
            <br>
              <label class="label">Middle Name:</label>
              <input type="text" class="form-control" name="middlename">

              <label class="label">Last Name:</label>
              <input type="text" class="form-control" name="lastname">
            <br>
              <label class="label">Date of Birth:</label>
              <input type="text" class="form-control" name="dateofbirth"><br>

              <label class="label">Place of Birth:</label>
              <input type="text"class="form-control" name="placeofbirth">
            <br>
              <label class="label">Address:</label>
              <input type="text"class="form-control" name="address">
            <br>
              <label class="label">Mother's Name:</label>
              <input type="text"class="form-control" name="mothername">

              <label class="label">Father's Name:</label>
              <input type="text"class="form-control" name="fathername">
            <br>
              <label class="label">Birth Height:</label>
              <input type="text"class="form-control" name="birthheight">

              <label class="label"> Birth Weight:</label>
              <input type="text"class="form-control" name="birthweight">
            <br>
              <label class="label">Sex:</label><br>
              <input type="radio" id="male" name="sex"  value="male">
              <label for="male">male</label>
              <input type="radio" id="female" name="sex"  value="female">
              <label for="female">female</label>
            </div>
            <div class="clearfix">
                <button type="submit" class="btn btn-primary" name="add">Update</button>
            </div>
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- child table -->
<div class="container">
    <table id="example" class="table table-primary table-hover" style="width:50%;">
        <thead>
            <tr>
              <th>Child's Name</th>
              <th style="width: 10%">Details</th>
              <th style="width: 10%">Delete</th>
            </tr>
        </thead>
        <tbody class="table table-light" style="line-height: 20px">
            <?php 
            $sql = "SELECT * FROM child_tbl where parent_id='$parent_id'";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td hidden><?php echo $row['parent_id']; ?></td>
                <td hidden><?php echo $row['child_id']; ?></td>
                <td><?php echo $row['firstname']."  ".$row['lastname']; ?></td>                           
                <td><button id="id-<?php echo $row['child_id']; ?>" type="button" class="btn btn-primary editbtn" style="color: black; border: none">
                <i class="fa fa-arrow-circle-right"></i>
                </button></td>
                <td>
                <form action="php/delete.php" method="POST">
                    <input type="hidden" name="child_id" value="<?php echo $row['child_id']; ?>">
                    <button type="submit" name="deletebtn" class="btn btn-danger"><a href="php/delete.php"></a><i class="fa fa-trash"></i></button>
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="container">
<!-- Edit child Modal -->
<div class="modal fade" id="editchild" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="edit_child">

       
      </div>
      
    </div>
  </div>
</div>
    
<!-- Forms -->
<!--Step 1:Adding HTML-->
<h2><i class="fa fa-child"></i>Profile</h2>
<form class="form-inline-1" action="/action_page.php"  style="border:1px solid #ccc">
<?php 
$sql = "SELECT * FROM child_tbl where parent_id='$parent_id'";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$child_ids = array();
while($row = $result->fetch_assoc()){
$child_ids[] = $row['child_id'];
}
foreach ($child_ids as $value) {
echo "$value <br>";
$sql = "SELECT * FROM child_tbl where child_id='$value'";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row=mysqli_fetch_assoc($result)){
?>
<div class="container">
    <label class="label">First Name:</label>
  <?php if(isset($row['firstname'])) echo $row['firstname']; ?>
  <br>   
    <label class="label">Middle Name:</label>
  <?php if(isset($row['middlename'])) echo $row['middlename']; ?>

    <label class="label">Last Name:</label>
  <?php if(isset($row['lastname'])) echo $row['lastname']; ?>
  <br>
    <label class="label">Date of Birth:</label>
  <?php if(isset($row['dateofbirth'])) echo $row['dateofbirth']; ?>

<div class="container">
  <div class="row">
      <label class="label">Child's Name:</label>
  </div>
  <div class="row">
    <label class="label">First Name:</label>
    <?php if(isset($row['firstname'])) echo $row['firstname']; ?>
  </div>
  <div class="row">   
    <label class="label">Middle Name:</label>
    <?php if(isset($row['middlename'])) echo $row['middlename']; ?>  
  </div>
  <div class="row">
    <label class="label">Last Name:</label>
    <?php if(isset($row['lastname'])) echo $row['lastname']; ?>
  </div>
  <div class="row">
    <label class="label">Date of Birth:</label>
    <?php if(isset($row['dateofbirth'])) echo $row['dateofbirth']; ?>
  </div>
  <div class="row">
    <label for="pwd" class="label">Place of Birth:</label>
    <?php if(isset($row['placeofbirth'])) echo $row['placeofbirth']; ?>
  <br>
    <label class="label">Address:</label>
    <?php if(isset($row['address'])) echo $row['address']; ?>
  <br>
    <label class="label">Mother's Name:</label>
    <?php if(isset($child_data['mothername'])) echo $row['mothername']; ?>
    
    <label for="pwd" class="label">Father's Name:</label>
    <?php if(isset($row['fathername'])) echo $row['fathername']; ?>
  <br>
    <label class="label">Birth Height:</label>
    <?php if(isset($row['birthheight'])) echo $row['birthheight']; ?>
 
    <label for="pwd" class="label"> Birth Weight:</label>
<?php if(isset($row['birthweight'])) echo $row['birthweight']; ?>
  <br>
    <label  class="label">Sex:</label>
    <?php if(isset($row['sex'])) echo $row['sex']; ?>

<?php }}?>
</div>
</form>
<!-- Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
      
  $('.editbtn').on('click', function(){
      var child_id = $(this).attr("id").replace('id-','');
      // alert(chart_id);
  
      $.ajax({
          url: "php/edit_child_parent.php",
          type: "post",
          data:{child_id: child_id},
          success:function(data){
            $('#edit_child').html(data);
            $('#editchild').modal('show');
          }
        }); 
   
  });
});
</script>

</body>
</html>