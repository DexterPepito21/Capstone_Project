<?php 
session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Chart</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <hr>
    <div class="container">
    <hr>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM users";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id']; ?>Unique">
                Update
                </button></td>
                <td>
                <form action="php/delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_btn" class="btn btn-danger"><a href="php/delete.php"></a>Delete</button>
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php 
            $sql = "SELECT * FROM users";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
<div class="modal fade" id="exampleModalCenter<?php echo $row['id']; ?>Unique" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Vaccine Chart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
   
      <!-- removed table -->


      <div class="modal-footer">
        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
        <button type="submit" name="updateResident" class="btn btn-secondary">Save Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
            <?php } ?>
<!-- Modal -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script text="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

</body>
</html>