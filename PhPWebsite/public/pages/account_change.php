<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Account Change" ?>
<?php include('../../private/shared/header.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

<?php

// Hier worden de variabeles geinitialiseerd
$errors = array();

// hier wordt er verbonden met de database
$db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

if (isset($_POST['update'])) {

    $username = mysqli_real_escape_string($db, $_POST['cusername']);
    $firstname = mysqli_real_escape_string($db, $_POST['cfirstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['clastname']);
    $adress = mysqli_real_escape_string($db, $_POST['cadress']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['cphonenumber']);
    $email = mysqli_real_escape_string($db, $_POST['cemail']);

    // Hier wordt de gebruiker geupdate

    $query = "UPDATE gebruikers SET 
    cfirstname='" . $_POST['cfirstname'] . "',
    clastname='" . $_POST['clastname'] . "',
    cphonenumber='" . $_POST['cphonenumber'] . "',
    cemail='" . $_POST['cemail'] . "',
    cadress='" . $_POST['cadress'] . "'

    WHERE cusername='" . $_SESSION['cusername'] . "'"; 
   
    mysqli_query($db, $query);
    $_SESSION['cusername'] = $username;
    $_SESSION['success'] = "Succesvol aangepast!";
    header('location: profile.php');
    }
?>

<?php
require('../../private/functionsDB.php');
$query = "SELECT * FROM gebruikers";
$resultaat = mysqli_query($db, $query);

if(isset($_SESSION['cusername']))
{
    $usersData = getUserData(getId($_SESSION['cusername']));
}
?>

<?php 
if(isset($_SESSION['cusername'])) {
?>

<div id="container">

<div id="content" class="login">

<div class="inloggen">
    <h1 class="loginh1">Update Profile</h1>
    <p class="loginp">Vul hier je nieuwe gegevens in</p>

  <form method="post" action="#"> 
  <?php include('../database/errors.php'); ?>

     <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Gebruikersnaam</p>
      <input type="text" readonly="readonly" name="cusername" style="padding-left: 40px;" value="<?php echo $usersData['cusername']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Voornaam</p>
      <input type="text" name="cfirstname" style="padding-left: 40px;" value="<?php echo $usersData['cfirstname']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Achternaam</p>
      <input type="text" name="clastname" style="padding-left: 40px;" value="<?php echo $usersData['clastname']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Adress</p>
      <input type="text" name="cadress" style="padding-left: 40px;" value="<?php echo $usersData['cadress']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Telefoonnummer</p>
      <input type="text" name="cphonenumber" style="padding-left: 40px;" value="<?php echo $usersData['cphonenumber']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-envelope icon"></i>
<p>E-Mail Adress</p>
      <input type="email" name="cemail" value="<?php echo $usersData['cemail']; ?>">
    </div>

    <input type="submit" name="update" value="Verander">
  </form>
</div>

</div>

</div>

<?php 
} else {
  echo "<h1>Je moet eerst nog inloggen</h1>";
}
?>