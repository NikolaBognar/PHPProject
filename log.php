<?php

session_start();

if(!isset($_SESSION['id'])) {
    include("konekcija.php");
    $GLOBALS["konekcija"] = konektuj();
    
    $email = filter_input(INPUT_POST, 'email');
    $sifra = filter_input(INPUT_POST, 'password');
    
    $upit = "select * from korisnik where Email = '$email'";
    $result = mysqli_query($GLOBALS["konekcija"], $upit);
    $rez=mysqli_fetch_assoc($result);
   // $verify=password_verify($sifra, $rez['Sifra']);
    
    if($sifra==$rez['Sifra']) {
        
        $_SESSION['id'] = $rez['ID'];
        $_SESSION['ime'] = $rez['Ime'];
        $_SESSION['user_type'] = $rez['user_type'];
    } else {
        echo'Nije dobra sifra';
       // header("Location:loginPage.php");
    }
    
   if($_SESSION['user_type'] === 'admin') {
       header("Location:index.php");
   }
   else {
    header("Location:index.php");
    echo $_SESSION['id'];
   }
}
else {

    session_destroy();
    header("Location:index.php");
}
