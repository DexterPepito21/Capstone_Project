<?php 
include("connection.php");
$child_id = $_POST['child_id'];
$query = "SELECT * FROM child_tbl where child_id = '$child_id' limit 1";
$result = mysqli_query($con,$query);
$child_data = mysqli_fetch_assoc($result);

?>
 <form class="form-inline" action="php/update_parent_child.php" method="post"  style=" width: 100%">
    <div class="container" >
    <input type="text" hidden class="form-control"  name="child_id" value=<?php if(isset($child_id)) echo $child_id; ?>>
        <label class="label">First Name:</label>
        <input type="text" class="form-control"  name="firstname" value=<?php if(isset($child_data['firstname'])) echo $child_data['firstname']; ?>>
      <br>
        <label class="label">Middle Name:</label>
        <input type="text" class="form-control" name="middlename" value=<?php if(isset($child_data['middlename'])) echo $child_data['middlename']; ?>>

        <label class="label">Last Name:</label>
        <input type="text" class="form-control" name="lastname" value=<?php if(isset($child_data['lastname'])) echo $child_data['lastname']; ?>>
      <br>
        <label class="label">Date of Birth:</label>
        <input type="text" class="form-control" name="dateofbirth" value=<?php if(isset($child_data['dateofbirth'])) echo $child_data['dateofbirth']; ?>><br>

        <label class="label">Place of Birth:</label>
        <input type="text"class="form-control" name="placeofbirth" value=<?php if(isset($child_data['placeofbirth'])) echo $child_data['placeofbirth']; ?>>
      <br>
        <label class="label">Address:</label>
        <input type="text"class="form-control" name="address" value=<?php if(isset($child_data['address'])) echo $child_data['address']; ?>>
      <br>
        <label class="label">Mother's Name:</label>
        <input type="text"class="form-control" name="mothername" value=<?php if(isset($child_data['mothername'])) echo $child_data['mothername']; ?>>

        <label class="label">Father's Name:</label>
        <input type="text"class="form-control" name="fathername" value=<?php if(isset($child_data['fathername'])) echo $child_data['fathername']; ?>>
      <br>
        <label class="label">Birth Height:</label>
        <input type="text"class="form-control" name="birthheight" value=<?php if(isset($child_data['birthheight'])) echo $child_data['birthheight']; ?>>

        <label class="label"> Birth Weight:</label>
        <input type="text"class="form-control" name="birthweight" value=<?php if(isset($child_data['birthweight'])) echo $child_data['birthweight']; ?>>
      <br>
        <label class="label">Sex:</label><br>
        <input type="radio" id="male" name="sex" 
            <?php if(isset($child_data['sex'])) {
                if($child_data['sex']=="male") {
                  echo "checked";
                }
              }
            ?> value="male">
        <label for="male">male</label>
        <input type="radio" id="female" name="sex" 
            <?php if(isset($child_data['sex'])) {
                if($child_data['sex']=="female") {
                  echo "checked";
                }
              }
            ?> value="female">
        <label for="female">female</label>
      </div>
      <div class="clearfix">
          <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
      </div>
    </div>
  </form>