<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Nikola Bognar"> 
        <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/mostil" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/mojstil.css">
       
    </head>
    <style>
        .forma2 {
            padding-top: 50px;
        }
        fieldset {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 0;
            font-size: 30px;
        }
        table {
            font-size: 20px;
            padding: 10px;
        }
        table td {
            padding: 10px;
            text-align: right;
        }
        .unos {
            width: 200px;
            height: 30px;
        }
        #submit {
            width: 100px;
            height: 30px;
        }
        #submit:hover {
            background-color: lightgreen;
            cursor: pointer;
        }
        #reset {
            margin-left: 10px;
            width: 80px;
            height: 30px;
            
        }
        #reset:hover {
            background-color: orangered;
            cursor: pointer;
        }
    </style> 
    <body>
        <?php require_once('navbar.php');?>
        
        <form class="forma2" method="post" action="reg.php">
            <fieldset>
                <legend>Registruj se</legend>
                <table>
                    <tr>
                        <td><strong>Ime:</strong></td>
                        <td><input class="unos" type="text" name="ime" placeholder="Unesite Vaše ime" required></td>
                    </tr>
                    <tr>
                        <td><strong>Prezime:</strong></td>
                        <td><input class="unos" type="text" name="prezime" placeholder="Unesite Vaše prezime" required></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><input class="unos" type="email" name="email" placeholder="Unesite E-mail" required></td>
                    </tr>
                    <tr>
                        <td><strong>Šifra:</strong></td>
                        <td><input class="unos" type="password" name="password1" placeholder="Unesite Vašu šifru" required></td>
                    </tr>
                    <tr><td></td><td><input id="submit" type="submit" name="submit" value="Potvrdi">
                        <input id="reset" type="reset" name="reset" value="Poništi"></td>
                    </tr>
                    
                </table>
                    
            </fieldset>
        </form>
        
        <?php require_once('footer.php'); ?>
    </body>
</html>
