
<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Login pagina" ?>
<?php include('../../private/shared/header.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

<div id="content" class="login">

<div class="inloggen">
    <h1 class="loginh1">Inloggen</h1>
    <p class="loginp">Vul je gegevens in om in te loggen</p>
  <form method="post" action="login.php"> 
  <?php include('../database/errors.php'); ?>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
      <input type="text" name="username" placeholder="Je gebruikersnaam hier.." style="padding-left: 40px;">
    </div> 

    <div class="iconContainer">
    <i class="fa fa-key icon"></i>
    <input type="password" name="password" placeholder="Je wachtwoord hier..">
    </div>
  
    <input type="submit" value="Inloggen" name="login_user">

    <p class="wwvergeten"><a href="<?php echo url_for('contact.php'); ?>">Wachtwoord vergeten?<a></p>
    </form>
</div>

</div>

<div id="content2" class="register">

<div class="registreren">
<p class="registerp">Heb je nog geen festival account?</p>

<form action="<?php echo url_for('pages/register.php'); ?>">
  <button class="buttonRegister">REGISTREER</button>
</form>


</div>

</div>

<?php include('../../private/shared/footer.php'); ?>
