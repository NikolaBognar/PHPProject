<?php
include("konekcija.php");
$GLOBALS["konekcija"] =konektuj();

$ime = filter_input(INPUT_POST, 'ime');
$prezime = filter_input(INPUT_POST, 'prezime');
$email = filter_input(INPUT_POST, 'email');
$sifra1 = filter_input(INPUT_POST, 'password1');
$tip = $_POST['tip'];
$error = 0;

if(empty($sifra1)) {
    echo'Morate uneti šifru!';
    $error = 1;
}
if($error == 0) {
     
    $upit = "INSERT INTO korisnik (ime, prezime, email, sifra, user_type) values ('$ime', '$prezime', '$email',"
            . " '$sifra', '$tip')";
    $rez = mysqli_query($GLOBALS["konekcija"], $upit);
    if(!$rez) {
        die("Doslo je do greske prilikom cuvanja" . mysqli_error($GLOBALS["konekcija"]));
    }
    echo("Uspesno ste se registrovali");
    header("Location: admin.php");
    
}