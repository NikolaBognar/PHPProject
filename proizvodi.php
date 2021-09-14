<?php
 session_start();
 echo "<!DOCTYPE html>";
 if(isset($_POST["add_to_cart"]))
 {
   if(isset($_SESSION["korpa"]))
   {
        $item_array_id=array_column($_SESSION["korpa"], "item_id");
        if(!in_array($_POST["ID"], $item_array_id))
        {
            $count=count($_SESSION["korpa"]);
            $item_array=array(
                'item_id'    =>   $_POST["ID"],
    'item_name'  =>   $_POST["naziv"],
    'item_price' =>   $_POST["cena"],
 'item_quantity' =>   $_POST["quantity"],
 
            );
            $_SESSION["korpa"][$count]=$item_array;

        }
        else
        {
           
        }
   }
    else {
    $item_array=array(
    'item_id'    =>   $_POST["ID"],
    'item_name'  =>   $_POST["naziv"],
    'item_price' =>   $_POST["cena"],
 'item_quantity' =>   $_POST["quantity"]
          );
    $_SESSION["korpa"] [0]=$item_array;
   }
 }
if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
            {   

            foreach ($_SESSION["korpa"] as $keys => $values) {
                if($values ["item_id"] == $_GET["ID"]){
                    unset($_SESSION["korpa"][$keys]);
                    echo '<script>alert("Proizvod izbrisan")</script>';
                    
                }
                }
            }
            

        }
       

            include("konekcija.php");
            $GLOBALS["conn"] = konektuj();
            ?>
            
            <html>
            <head>
                <title></title>
                <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
                <link rel="stylesheet"  href="css/proizvodi.css">
            </head>
            
                <body onload="Vreme()">
                <div class="container">
 <?php

    include "header.php";
    include "navbar.php";
    
    ?>
                    <?php 

                    $upit = "SELECT * FROM proizvod";
                    $rezultati = mysqli_query($GLOBALS['conn'],$upit);
                    while($red = mysqli_fetch_assoc($rezultati))
                        {?>
                            <div class="col-sm-4 col-md-4">
<!-- action="proizvodi.php?action=add&id=<?php echo $red['ID'] ?>" 
 -->                                <form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>" >

                                    <div class="products">
                                        <div class="row">
                                        <img src="<?php echo $red['Slika']; ?>"   style= "height: 170px; text-align: center; "/>
                                        <h4 class="text-info"><?php echo $red['Naziv']; ?></h4>
                                        <h4>$ <?php echo $red['Cena']; ?></h4>
                                        <input type="hidden" name="ID" value="<?php echo $red['ID']; ?>"/>
                                        <input type="text" name="quantity" class="form-control" value="1"/>
                                        <input type="hidden" name="naziv" value="<?php echo $red['Naziv']; ?>"/>
                                        <input type="hidden" name="cena" value="<?php echo $red['Cena']; ?>"/>
                                        <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-info" value="Dodaj u korpu"/>
                                    </div>
                                    </div>
                                </form>

                            </div>


                            <?php
                        }
                        ?>
                            <br>
                         <h3>Detalji porudzbine</h3>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <tr>
                           <th width="40%">Naziv proizvoda</th> 
                           <th width="10%">Kolicina</th> 
                           <th width="20%">Cena</th> 
                           <th width="15%">Ukupno</th> 
                           <th width="15%">Akcija</th> 
                        </tr>
                    </div>


                    <br>
                    <br>
                       

                        <?php 
                          if(!empty($_SESSION["korpa"]))
                          {
                            $total=0;
                            foreach ($_SESSION["korpa"] as $keys => $values)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $values ["item_name"]; ?></td>
                                    <td><?php echo $values ["item_quantity"]; ?></td>
                                    <td><?php echo $values ["item_price"]; ?></td>
                                    <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                    <td><a href="proizvodi.php?action=delete&ID=<?php echo $values["item_id"]; ?>"> <span class="text-danger">Izbriši</span></a></td>
                                     
                                </tr>
                                <?php 
                                    $total=$total + ($values["item_quantity"] * $values["item_price"]);

                            }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Ukupno</td>
                                <td align="right"><?php echo number_format($total,2); ?></td>
                            </tr>
                            <?php
                          }
                          ?>
                            
                           </table> 
                        </div>
                        <button>Poruci</button>
                        <?php
                        include "footer.php"; ?>

                    </body>
                    </html>

