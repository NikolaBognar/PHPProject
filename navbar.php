
<nav class="navbar navbar-default"> <!--pocetak navigacionog menija-->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
        print("<a  class='navbar-brand' href='admin.php'><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Admin</a>");
      } else  {  ?>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Pocetna strana</a>
      <?php  } ?>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="onama.php">O nama</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
        <li><a href="proizvodi.php">Proizvodi</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      </li>  <?php 
            if(isset($_SESSION['id'])) {
                print("<div class='reg'><a id='logime' >" . $_SESSION['ime'] . "</a><br><a id='logoff' href='log.php'>Izloguj se</a></div>");
            } else {
                print("<div class='reg'><a href='loginPage.php'>Uloguj se</a></div>");
            }
        ?> <li>
   </ul> 
       

        
       

   
  </div>
</div>
</nav>
   