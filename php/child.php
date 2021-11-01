<?php 
include("connection.php");
// print_r($_POST);
$child_id = $_POST['child_id'];
// echo json_encode($_POST);
if(isset($_POST['child_id'])){
   
}
?>

<?php
      $sql = "SELECT * FROM child_tbl WHERE child_id = '$child_id'";
      $stmt = $con->prepare($sql);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
?>
    <form class="form-inline">
    <?php echo "<label style='border-bottom: 1px solid #77b7f6; font-size: 20px;'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</label>" ?>
        <div class="container" style="font-size: 16px; margin: 50px 20px"> 
            <label class="label" style="margin-right: 5%">Birthday:</label> 
                <?php echo "<label style='margin-right: 15%; border-bottom: 1px solid #77b7f6;'>".$row['dateofbirth']."</label>" ?>

            <label class="label" style="margin-right: 5%">Birth Place:</label> 
                <?php echo "<label style='border-bottom: 1px solid #77b7f6;'>".$row['placeofbirth']."</label>" ?>
        <br>
            <label class="label" style="margin-right: 5%">Address:</label>        
                <?php echo "<label style='border-bottom: 1px solid #77b7f6;'>".$row['address']."</label>" ?>
        <br>
            <label class="label" style="margin-right: 5%">Mother's Name:</label>
                <?php echo "<label style='margin-right: 15%; border-bottom: 1px solid #77b7f6'>".$row['mothername']."</label>" ?>

            <label class="label" style="margin-right: 5%">Father's Name:</label>
                <?php echo "<label style='border-bottom: 1px solid #77b7f6;'>".$row['fathername']."</label>" ?>
        <br>
            <label class="label" style="margin-right: 5%">Birth Height:</label>
                <?php echo "<label style='margin-right: 20.5%; border-bottom: 1px solid #77b7f6'>".$row['birthheight']."</label>" ?>

            <label class="label" style="margin-right: 5%">Birth Weight:</label>
                <?php echo "<label style='margin-right: 15%; border-bottom: 1px solid #77b7f6'>".$row['birthweight']."</label>" ?>
            <label class="label">Sex:</label>
                <?php echo "<label style='border-bottom: 1px solid #77b7f6;'>".$row['sex']."</label>" ?>
        </div>
    </form>  
<?php }
?> 

<div class="container">
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
      <thead>
          <tr>
              <th>Vaccine & Dosage</th>
              <th>Date of Vaccination</th>
              <th>Vaccinated?</th>
              <th>Vaccinator Name</th>
              <th>Health Center</th>
          </tr>
      </thead>
      <tbody>
          <?php 
          $sql = "SELECT chart.vaccinated, vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
          FROM (((chart
          INNER JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
          INNER JOIN healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
          INNER JOIN healthcare_info ON chart.healthcare_id = healthcare_info.healthcare_id)
          where child_id='$child_id'";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
          ?>
          <tr>
              <td><?php echo $row['vaccinename']; ?></td>
              <td><?php echo $row['dateofvaccination']; ?></td>
              <td><?php echo $row['vaccinated']; ?></td>
              <td><?php echo $row['vaccinatorname']; ?></td>        
              <td><?php echo $row['healthcenter']; ?></td> 
              </td>
          </tr>
          <?php } ?>
      </tbody>
  </table>
  </div>
