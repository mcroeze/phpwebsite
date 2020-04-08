<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Hoofdpagina" ?>
<?php include('../../private/shared/header.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="content" class="login">

<div class="inloggen">
    <h1 class="loginh1">Registreren</h1>
    <p class="loginp">Vul je gegevens in om te registreren</p>

  <form method="post" action="register.php"> 
  <?php include('../database/errors.php'); ?>

     <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>

      <input type="text" name="username" placeholder="Je gebruikersnaam hier.." style="padding-left: 40px;">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-envelope icon"></i>

      <input type="email" name="email" placeholder="Je e-mail hier..">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
    <i class="fa fa-key icon"></i>

    <input type="password" name="password_1" placeholder="Je wachtwoord hier..">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
    <i class="fa fa-key icon"></i>

    <input type="password"  name="password_2" placeholder="Herhaal je wachtwoord...">
    </div>
  
    <input type="submit" name="reg_user" value="Registreren">
    <p class="wwvergeten"><a href="<?php echo url_for('Contact/index.php'); ?>">Problemen met registreren?<a></p>
  </form>
</div>

</div>


</div>

<?php include('../../private/shared/footer.php'); ?>