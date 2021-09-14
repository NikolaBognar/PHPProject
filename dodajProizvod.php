<?php
    session_start();
    if(isset($_SESSION['id'])) {
        if($_SESSION['user_type'] !== 'admin') {
            header("Location:/index.php");
            exit();
        }
    } else {
        header("Location:/loginPage.php");
        exit();
    }
    
?>
<form  action="dodProiz.php" method="post">
                   <fieldset border="0">
                       <legend>Dodaj, izmeni ili obrisi proizvod</legend>
                       <table>
                           <tr>
                               <td>Id</td>
                               <td><input type="text" name="id" placeholder="Id"></td>
                           </tr>
                           <tr>
                               <td>Naziv</td>
                               <td><input type="text" name="naziv" placeholder="Naziv"></td>
                           </tr>
                           <tr>
                               <td>Cena</td>
                               <td><input type="text" name="cena" placeholder="Cena"></td>
                           </tr>
                           <tr>
                             <td>Odaberi akciju</td>
                             <td><select name="akcija">
                                     <option value='dodaj'>Dodaj</option>
                                <option value='izmeni'>Izmeni cenu</option>
                                <option value='obrisi'>Obrisi</option>
                                 </select></td>
                           </tr>
                           <tr>
                               <td colspan="2"><input type="submit" value="Potvrdi"</td>
                           </tr>
                       </table>
                   </fieldset>
               </form>