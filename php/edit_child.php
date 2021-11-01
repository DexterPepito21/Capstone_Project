<?php 
include("connection.php");
$chart_id = $_POST['chart_id'];
$query1 = "SELECT *, vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
FROM (((chart
LEFT JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
LEFT JOIN healthcare_info ON chart.healthcare_id = healthcare_info.healthcare_id)
LEFT JOIN  healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
where chart_id='$chart_id'";
$result1 = mysqli_query($con,$query1); 
$rows1=mysqli_fetch_assoc($result1);
$checkvaccine_id = $rows1['vaccine_id'];
$vaccinename = $rows1['vaccinename'];
$checkhealthcare_id = $rows1['healthcare_id'];
$vaccinatorname = $rows1['vaccinatorname'];
$dateofvaccination = $rows1['dateofvaccination'];
$checkhealthcenter_id = $rows1['healthcenter_id'];
$healthcenter = $rows1['healthcenter'];
$vaccinated = $rows1['vaccinated'];
?>
<form action="php/newvaccine_chart.php" method="POST">    
        <input hidden class="form-control" type="text" placeholder="<?php echo (isset($chart_id))?$chart_id:'';?>" name="chart_id" value="<?php echo (isset($chart_id))?$chart_id:'';?>"/>                  
            Vaccine Name

            <select name="vaccine_id" class="form-control">
            <option value='<?php echo (isset($checkvaccine_id))?$checkvaccine_id:'';?>'><?php echo $vaccinename?></option>
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
            <br>
            Vaccinator's Name 
            <select name="vaccinatorname" class="form-control">
            <option value='<?php echo (isset($checkhealthcare_id))?$checkhealthcare_id:'';?>'><?php echo $vaccinatorname?></option>
                <?php 
                $query = "SELECT * FROM healthcare_info";
                $result = mysqli_query($con,$query);
                while($rows=mysqli_fetch_assoc($result)){
                  $healthcare_id = $rows['healthcare_id'];
                  $vaccinatorname = $rows['vaccinatorname'];
                  if ($checkhealthcare_id == $healthcare_id) {
                    continue;
                  }
                  echo "<option value='$healthcare_id'>$vaccinatorname</option>";
                } 
              ?>
            </select>    
            <br>
            Date of Vaccination    
            <input class="form-control" type="datetime-local" id="dtlocal" name="dateofvaccination" value="<?php echo (isset($dateofvaccination))?$dateofvaccination:'';?>">  
            <br>
            healthcenter
            <select name="healthcenter" class="form-control">
            <option value='<?php echo (isset($checkhealthcenter_id))?$checkhealthcenter_id:'';?>'><?php echo $healthcenter?></option>
                <?php  
                $query = "SELECT * FROM healthcenter_tbl";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $healthcenter_id = $rows['healthcenter_id'];
                  $healthcenter = $rows['healthcenter'];
                  if ($checkhealthcenter_id == $healthcenter_id) {
                    continue;
                  }
                  echo "<option value='$healthcenter_id'>$healthcenter</option>";
                }                                     
                ?>
            </select>     
            <br>
            vaccinate
            <select name="vaccinated" class="form-control">
                <option value='<?php echo (isset($vaccinated))?$vaccinated:'';?>'><?php echo $vaccinated?></option>
                <option value="yes">yes</option>
                <option value="no">no</option>
            </select>
            </br>  
            <div class="modal-footer">
                <button type="submit" name="update" class="btn btn-primary">update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>  
        </form>