<link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/mostil" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/mojstil.css">
<?php
  include "header.php";
    include "navbar.php"; ?>


  <h1>Korisnici</h1>
        <table>
            <th>Id</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Tip korisnika</th>
        <?php
            include("konekcija.php");
            $GLOBALS["konekcija"] = konektuj();
            
            $upit = "select * from korisnik";
            $rez = mysqli_query($GLOBALS["konekcija"], $upit);
            
            while($value = mysqli_fetch_assoc($rez)) {
                
                    print("<tr><td>". $value['ID'] . "</td><td>" . $value['Ime'] 
                            . "</td><td>" . $value['Prezime'] . "</td><td>" . $value['user_type'] . "</td></tr>");
                
            }
        ?>
        </table>

        <br>
              
    <div class='admin'>
        <form id="formdod" action="dodajKorisnika.php" method="post">
            <fieldset>
                <legend>Registruj korisnika</legend>
                <table>
                    <tr>
                        <td><strong>Ime:</strong></td>
                        <td><input class="unos" type="text" name="ime" placeholder="Unesite ime" required></td>
                    </tr>
                    <tr>
                        <td><strong>Prezime:</strong></td>
                        <td><input class="unos" type="text" name="prezime" placeholder="Unesite prezime" required></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><input class="unos" type="email" name="email" placeholder="Unesite E-mail" required></td>
                    </tr>
                    <tr>
                        <td><strong>Šifra:</strong></td>
                        <td><input class="unos" type="password" name="password1" placeholder="Unesite šifru" required></td>
                    </tr>
                    <tr>
                        <td><strong>Potvrdite šifru:</strong></td>
                        <td><input class="unos" type="password" name="password2" placeholder="Potvrdite šifru" required></td>
                    </tr>
                    <tr>
                        <td><strong>Tip korisnika:</strong></td>
                        <td><select name='tip'>
                                <option value='user'>User</option>
                                <option value='admin'>Administrator</option>
                            </select></td>
                    </tr>
                    <tr><td></td><td><input id="submit" type="submit" name="submit" value="Potvrdi">
                        <input id="reset" type="reset" name="reset" value="Poništi"></td>
                    </tr>
                    
                </table>
                    
            </fieldset>
        </form>
    </div>
    <br>

   
    <div class='admin'>
        <form id='formdel' action='obrisiKorisnika.php' method='post'>
            <input type='text' name='idZaBrisanje' placeholder="Upisi Id za brisanje"><input type='submit' value='Obrisi korisnika (id)'>
        </form>
        
    </div>

    <br>
           <div class="admin">
               <form id="formupdate" action="azurirajKorisnika.php" method="post">
                   <fieldset border="0">
                       <legend>Azuriraj tip korisnika</legend>
                       <table>
                           <tr>
                               <td>Unesi id korisnika za azuriranje</td>
                               <td><input type="text" name="idUpdate" placeholder="Id korisnika za update"></td>
                           </tr>
                           <tr>
                             <td>Odaberi tip</td>
                             <td><select name="tipUpdate">
                                     <option value='user'>User</option>
                                <option value='admin'>Administrator</option>                               
                                 </select></td>
                           </tr>
                           <tr>
                               <td colspan="2"><input type="submit" value="Potvrdi"</td>
                           </tr>
                       </table>
                   </fieldset>
               </form>
           </div>


  <body>
         
        
        <h1>PVC prozori</h1>
        <table>
            <th>Id</th>
            <th>Naziv</th>
            <th>Cena (kom)</th>
        <?php
        
           
            
            $upit1 = "select * from proizvod";
            $rez1 = mysqli_query($GLOBALS["konekcija"], $upit1);
            
            while($value = mysqli_fetch_assoc($rez1)) {
                
                    print("<tr><td>". $value['ID'] . "</td><td>" . $value['Naziv'] .
                             "</td><td>" . $value['Cena'] . "</td></tr>");
                
            }
        ?>
            <?php
                if(isset($_SESSION['id'])) {
                if($_SESSION['user_type'] === 'admin') {
                    print("<tr><td colspan=3><a href=dodajProizvod.php>Dodaj, izmeni ili obrisi prozor</a></td><tr>");
                            
                }
    }
            ?>
            
        </table> 
        
       
        <?php include "footer.php"; ?>
        
    </body>

        

