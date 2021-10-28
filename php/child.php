<?php 
include("connection.php");
// print_r($_POST);
$child_id = $_POST['child_id'];
// echo json_encode($_POST);
if(isset($_POST['child_id'])){
   
}
?>

<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
      <thead>
          <tr>
              <th>vaccine</th>
              <th>vaccinatorname</th>
              <th>dateofvaccination</th>
              <th>healthcenter</th>
              <th>vaccinated</th>
          </tr>
      </thead>
      <tbody>
          <?php 
          $sql = "SELECT chart.vaccinated, vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
          FROM (((chart
          INNER JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
          INNER JOIN healthcare_info ON chart.healthcare_id = healthcare_info.healthcare_id)
          INNER JOIN  healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
          where child_id='$child_id'";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
          ?>
          <tr>
              <td><?php echo $row['vaccinename']; ?></td>
              <td><?php echo $row['vaccinatorname']; ?></td>
              <td><?php echo $row['dateofvaccination']; ?></td>
              <td><?php echo $row['healthcenter']; ?></td>        
              <td><?php echo $row['vaccinated']; ?></td> 
              </td>
          </tr>
          <?php } ?>
      </tbody>
  </table>
</div>