<?php 

include("php/connection.php");
include("php/functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Care System</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas Neue|Exo">
</head>
<body>
    <header>
         

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var id = 10;
        alert("hello ");
        $.post( "child.php", { name: id})
  .done(function( data ) {
    alert( "Data Loaded: " + data.name);
  });
    </script>
</body>
</html>