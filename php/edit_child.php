<form action="php/newvaccine_chart.php" method="POST">    
        <input type="text" placeholder="chart_id" name="chart_id" id="chart_id"/>                  
            Vaccine Name

            <select name="vaccine_id">
            <option value='vaccinename'></option>
                <?php  
                $query = "SELECT * FROM vaccine";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $vaccine_id = $rows['vaccine_id'];
                  $vaccinename = $rows['vaccinename'];
                  echo "<option value='$vaccine_id'>$vaccinename</option>";
                }                                     
                ?>
            </select> 
            <br>
            Vaccinator's Name 
            <select name="vaccinatorname">
                <?php 
                $query = "SELECT * FROM healthcare_info";
                $result = mysqli_query($con,$query);
                while( $rows=mysqli_fetch_assoc($result)){
                  $healthcare_id = $rows['healthcare_id'];
                  $vaccinatorname = $rows['vaccinatorname'];
                  echo "<option value='$healthcare_id'>$vaccinatorname</option>";
                } 
              ?>
            </select>    
            <br>
            Date of Vaccination    
            <input type="datetime-local" id="dtlocal" name="dateofvaccination">  
            <br>
            healthcenter
            <select name="healthcenter">
                <?php  
                $query = "SELECT * FROM healthcenter_tbl";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $healthcenter_id = $rows['healthcenter_id'];
                  $healthcenter = $rows['healthcenter'];
                  echo "<option value='$healthcenter_id'>$healthcenter</option>";
                }                                     
                ?>
            </select>     
            <br>
            vaccinate
            <select name="vaccinated">
                <option value="no">not vaccinated</option>
                <option value="yes">vaccinated</option>
            </select>
            </br>  
            <div class="modal-footer">
                <button type="submit" name="update" class="btn btn-primary">update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>  
        </form>