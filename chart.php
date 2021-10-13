<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin_chart.css">
</head>
<body>
    <form action="controller.php" method="POST">
        <!-- Table -->
        <center><div class="row">
               <div class="col">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:70%">
              <thead>
                  <tr>
                      <th style="width: 20%;">Vaccine Name</th>
                      <th style="width: 20%;">Doses <br> (Recommended Age)</th>
                      <th style="width: 30%;">Date of Vaccination</th>
                      <th style="width: 20%;">Vaccinator's Name</th>
                      <th style="width: 20%;">Health Center</th>
                  </tr>
              </thead>
              <tbody>
                    <tr>
                      <td> BCG </td>
                      <td> 1 <br>(Birth) </td>
                      <td>
                        <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="bcg_1st">
                        </form>
                      </td>
                      <td>
                        <br>
                        <input type="text" id="vname" name="bcg_vaccinator_name">
                      </td>
                      <td>
                        <br>
                        <input type="text" id="place" name="bcg_health_center">
                      </td>
                    </tr>
                    <tr>
                      <td> HEPATITIS B </td>
                      <td> 1 <br>(Birth) </td>
                      <td>
                        <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="hepatitis_1st">
                        </form>
                        <td>
                          <br>
                        <input type="text" id="vname" name="hepatitis_vaccinator_name">
                      </td>
                      <td>
                        <br>
                        <input type="text" id="place" name="hepatitis_health_center">
                      </td>
                      </td>
                    </tr>
                    <tr>
                      <td> PENTAVALENT VACCINE </td>
                      <td> 3 <br> (1 ½, 2 ½, 3 ½ months) </td>
                      <td>
                        <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal"  name="pentavalent_1st">
                        <br>
                        <label for="datetime"> 2nd Dose: </label>
                        <input type="datetime-local" id="dtlocal"  name="pentavalent_2nd">
                        <br>
                        <label for="datetime"> 3rd Dose: </label>
                        <input type="datetime-local" id="dtlocal"  name="pentavalent_3rd">
                        </form>
                      </td>
                      <td>
                        <br><br>
                        <input type="text" id="vname" name="pentavalent_vaccinator_name_1st">
                        <br><br>
                        <input type="text" id="vname" name="pentavalent_vaccinator_name_2nd">
                        <br><br>
                        <input type="text" id="vname" name="pentavalent_vaccinator_name_3rd">
                      </td>
                      <td>
                        <br><br>
                        <input type="text" id="place" name="pentavalent_health_center_1st">
                        <br><br>
                        <input type="text" id="place" name="pentavalent_health_center_2nd">
                        <br><br>
                        <input type="text" id="place" name="pentavalent_health_center_3rd">
                      </td>
                    </tr>
                    <tr>
                      <td> ORAL POLIO VACCINE (OPV) </td>
                      <td> 3 <br> (1 ½, 2 ½, 3 ½ months) </td>
                      <td>
                        <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="opv_1st">
                        <br>
                        <label for="datetime"> 2nd Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="opv_2st">
                        <br>
                        <label for="datetime"> 3rd Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="opv_3st">
                        </form>
                      </td>
                      <td>
                        <br><br>
                        <input type="text" id="vname" name="opv_vaccinator_name_1st">
                        <br><br>
                        <input type="text" id="vname" name="opv_vaccinator_name_2nd">
                        <br><br>
                        <input type="text" id="vname" name="opv_vaccinator_name_3rd">
                      </td>
                      <td>
                        <br><br>
                        <input type="text" id="place" name="opv_health_center_1st">
                        <br><br>
                        <input type="text" id="place" name="opv_health_center_2nd">
                        <br><br>
                        <input type="text" id="place" name="opv_health_center_3rd">
                      </td>
                    </tr>
                    <tr>
                      <td> INACTIVATED POLIO VACCINE </td>
                      <td> 1 <br> (3 ½ months) </td>
                      <td>
                        <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="inactive_polio_1st">
                        </form>
                      </td><br>
                      <td>
                        <br>
                        <input type="text" id="vname" name="inactive_polio_vaccinator_name">
                      </td>
                      <td>
                        <br>
                        <input type="text" id="place" name="inactive_polio_health_center">
                      </td>
                    </tr>
                    <tr>
                      <td> PNEUMOCOCCAL CONJUGATE VACCINE </td>
                      <td> 3 <br> (1 ½, 2 ½, 3 ½ months) </td>
                      <td>
                        <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="pneumococcal_1st">
                        <br>
                        <label for="datetime"> 2nd Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="pneumococcal_2nd">
                        <br>
                        <label for="datetime"> 3rd Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="pneumococcal_3rd">
                        </form>
                      </td>
                      <td>
                        <br><br>
                        <input type="text" id="vname" name="pneumococcal_vaccinator_name_1st">
                        <br><br>
                        <input type="text" id="vname" name="pneumococcal_vaccinator_name_2nd">
                        <br><br>
                        <input type="text" id="vname" name="pneumococcal_vaccinator_name_3rd">
                      </td>
                      <td>
                        <br><br>
                        <input type="text" id="place" name="pneumococcal_health_center_1st">
                        <br><br>
                        <input type="text" id="place" name="pneumococcal_health_center_1nd">
                        <br><br>
                        <input type="text" id="place" name="pneumococcal_health_center_1rd">
                      </td>
                    </tr>
                    <tr>
                      <td> MEASLES, MUMPS, RUBELLA (MMR) </td>
                      <td> 2 <br> (9 months, 1 year old) </td>
                      <td>
                        <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="mmr_1st">
                        <br>
                        <label for="datetime"> 2nd Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="mmr_2nd">
                        </form>
                      </td>
                      <td>
                      <br><br>
                        <input type="text" id="vname" name="mmr_vaccinator_name_1st">
                        <br><br>
                        <input type="text" id="vname" name="mmr_vaccinator_name_2nd">
                      </td>
                      <td>
                      <br><br>
                        <input type="text" id="place" name="mmr_health_center_1st">
                        <br><br>
                        <input type="text" id="place" name="mmr_health_center_2nd">
                      </td>
                    </tr>
                    <tr>
                      <td> OTHERS </td>
                      <td> -- </td>
                      <td> -- </td>
                      <td> -- </td>
                      <td> -- </td>
                    </tr>
       </tbody>
       </table>
  </div>
  </div>
  </div></center>
  <div class="clearfix">
    <button type="submit" class="signupbtn" name="submit">Update</button>
</div>
        </form>
</body>
</html>