<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Nikola Bognar">
       
    </head>
    <style>
        table {
            width: 400px;
            margin: auto;
            margin-top: 40px;
            border: 1px solid;
        }
        td {
            width: 180px;
            padding-right: 20px;
            border: 1px solid;
            text-align: right;
        }
        #podatak {
            padding-left: 10px;
            text-align: left;
            width: 150px;
        }
    </style>
    <body>
        
        <?php require_once('navbar.php');?>
        <?php
            include("konekcija.php");
            $GLOBALS["konekcija"] = konektuj();
            
            $upit = "select * from users where id = " . $_SESSION['id'];
            $rez = mysqli_query($GLOBALS["konekcija"], $upit);
            if(!$red = mysqli_fetch_assoc($rez)) {
                die("Greska" . mysqli_error($rez));
            } 
        ?>
        <table>
            <tr>
                <th colspan="2">Vaši Podaci</th>
            </tr>
            <tr>
                <td><strong>Ime:</strong></td>
                <td id='podatak'><?php print($red['Ime']); ?></td>
            </tr>
            <tr>
                <td><strong>Prezime:</strong></td>
                <td id='podatak'><?php print($red['Prezime']); ?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td id='podatak'><?php print($red['Email']); ?></td>
            </tr>
            <tr>
                <td><strong>Vrsta korisnika:</strong></td>
                <td id='podatak'><?php print($red['user_type']); ?></td>
            </tr>
        </table>
        
        
        <?php require_once('footer.php'); ?>
    </body>
</html>