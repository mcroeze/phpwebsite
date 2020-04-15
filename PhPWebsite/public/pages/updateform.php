<?php

//Database gegevens 
$dbhost = 'localhost';
$dbuser = 'festivaluser';
$dbpass = 'tsdf8E6f';
$dbname = 'festival';

// hier wordt er verbonden met de database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


//SQL Aanmaken
$query = "SELECT * FROM gebruikers WHERE cid = $cid";

$users = $conn->query($query);

//Controleren of het resultaat in een variabele opslaan
if ($users->num_rows > 0) {
    while($user = $users->fetch_assoc()) {
        ?>
        <form action="update.php" method="POST">

        <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Gebruikersnaam</p>
      <input type="text" name="cusername" style="padding-left: 40px;" value="<?php echo $user['cusername']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Voornaam</p>
      <input type="text" name="cfirstname" style="padding-left: 40px;" value="<?php echo $user['cfirstname']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Achternaam</p>
      <input type="text" name="clastname" style="padding-left: 40px;" value="<?php echo $user['clastname']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Adress</p>
      <input type="text" name="cadress" style="padding-left: 40px;" value="<?php echo $user['cadress']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-user icon"></i>
<p>Telefoonnummer</p>
      <input type="text" name="cphonenumber" style="padding-left: 40px;" value="<?php echo $user['cphonenumber']; ?>">
    </div>

    <label for="input-group"></label>
    <div class="iconContainer">
      <i class="fa fa-envelope icon"></i>
<p>E-Mail Adress</p>
      <input type="email" name="cemail" value="<?php echo $users['cemail']; ?>">
    </div>

    <input type="submit" name="update" value="Verander">
</form>
<?php
    }
} else {
    echo "Geen resultaten";
}

//Connectie sluiten met de database
$conn->close();

?>