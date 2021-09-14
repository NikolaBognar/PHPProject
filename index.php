<?php
session_start();
include("konekcija.php");
$GLOBALS["conn"] = konektuj();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fenster System</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/mostil" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/mojstil.css">


</head>
<body onload="Vreme()"> 
  <div class="container"> 
    <?php

    include "header.php";
    include "navbar.php";
    include "slider.php";
    include "article.php";
    
    if(isset($_SESSION['id'])){
      echo $_SESSION['ime'];
    }

    ?>
    <?php include "footer.php"; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/vremeje.js"></script>
  <script src="js/citati.js"></script>

</body>
</html>