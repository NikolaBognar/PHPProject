<?php include('kon.php'); ?>
<style>
  .error{
    color: red;
  }

  .success{
    color: #ff9966;
    text-align: center;
    font-weight: bold;
    font-size: 14px;
  }
</style>
<div class="row">
      <div class="col-md-6">
        <div class="page-header">
          <h2>Kontaktirajte nas</h2>
        </div>
        <form id="contact" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
          <div class="form-group">
            <label for="inputName">Ime i prezime</label>
            <input value="<?= $ime ?>" name="ime" type="text" class="form-control" id="inputName" placeholder="Ovde upisite vase ime i prezime" >
            <span class="error"><?= $ime_error; ?></span>
          </div>
          <div class="form-group">
            <label for="inputEmail">E-mail</label>
            <input value="<?= $email ?>" name="email" type="text" class="form-control" id="inputEmail" placeholder="Ovde upisite vas email" >
            <span class="error"><?= $email_error ?></span>
          </div>
          <div class="form-group">
            <label for="inputTel">Telefonski broj</label>
            <input value="<?= $tel ?>" name="tel" type="text" class="form-control" id="inputTel" placeholder="Ovde upisite vas telefonski broj" >
            <span class="error"><?= $tel_error ?></span>
          </div>
          <div class="form-group">
            <label for="inputSubject">Naslov poruke</label>
            <input value="<?= $naslov ?>" name="naslov" type="text" class="form-control" id="inputSubject" placeholder="Ovde upisite naslov poruke">
            <span class="error"><?= $naslov_error ?></span>
          </div>
          <div class="form-group">
            <label  for="inputText">Tekst poruke</label>
            <textarea value="<?= $poruka ?>" name="poruka" class="form-control" id="inputText" rows="5" ></textarea>
          </div>
          <button type="submit" class="btn btn-danger btn-lg btn-block">Posaljite</button>

          <div><span class="success"><?= $success ?></span></div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="page-header">
          <h2>Gde se nalazimo</h2>
          <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true">Ambrozija Sarcevica 27</span></p>
          <p><span class="glyphicon glyphicon-inbox" aria-hidden="true">381 60 442 3902</span></p>
          <p><span class="glyphicon glyphicon-envelope" aria-hidden="true">nikola22917@its.edu.rs</span></p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2783.3776071941043!2d19.109045615567492!3d45.76362217910567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475cb5c6833a47f7%3A0x856f1645572c1871!2sRoloplast%20Sombor!5e0!3m2!1sen!2srs!4v1598366772189!5m2!1sen!2srs" allowfullscreen="" ></iframe>
        </div>
      </div>
    </div>