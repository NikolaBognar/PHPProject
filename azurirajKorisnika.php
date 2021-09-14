<?php
session_start();

include("konekcija.php");
$GLOBALS["konekcija"] = konektuj();



    if(isset($_SESSION['id'])) {
        if($_SESSION['user_type'] !== 'admin') {
            header("Location:index.php");
            exit();
        }
    } else {
        header("Location:loginPage.php");
        exit();
    }

$id=  $_POST['idUpdate'];
$tip= $_POST['tipUpdate'];


$upit = "update korisnik set user_type = '" . $tip . "' where id ='" . $id ."'";

if(!$rez = mysqli_query($GLOBALS["konekcija"], $upit)) {
    die("Greska" . mysqli_error($GLOBALS["konekcija"]));
}
header("Location:admin.php");
