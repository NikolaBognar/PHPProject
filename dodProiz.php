<?php
include("konekcija.php");
$GLOBALS["konekcija"] = konektuj();

if(isset($_POST['akcija'])) {
    if($_POST['akcija'] == 'dodaj') {
        $naziv = $_POST['naziv'];
        $cena = $_POST['cena'];
        $slika="template.png"
        $upitdod = "insert into proizvod (Naziv, Slika, Cena) values ('" . $naziv . "', '" .$slika
                . "', '" . $cena . "')";
        $rez= mysqli_query($GLOBALS["konekcija"], $upitdod);
        
    } elseif ($_POST['akcija'] == 'izmeni') {
        $id = $_POST['id'];
        $cena  = $_POST['cena'];
        $upitIzmeni = "update proizvod set Cena ='" . $cena . "' where id='" . $id . "'";
        $rez= mysqli_query($GLOBALS["konekcija"], $upitIzmeni);
    } elseif($_POST['akcija'] == 'obrisi') {
        $id = $_POST['id'];
        $upitBrisi = "delete from proizvod where id='" . $id . "'";
        $rez= mysqli_query($GLOBALS["konekcija"], $upitBrisi);
    }
} header("Location:admin.php");
