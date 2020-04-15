<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Hoofdpagina" ?>
<?php include('../../private/shared/header.php'); ?>


<?php
require('../../private/functionsDB.php');
$query = "SELECT * FROM gebruikers";
$resultaat = mysqli_query($db, $query);

if(isset($_SESSION['cusername']))
{
    $usersData = getUserData(getId($_SESSION['cusername']));
}
?>


<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

<?php
if(isset($_SESSION['cusername'])) {
echo "
<div id=container>

<h2>Mijn gegevens</h2>
        <table id=resultaten class='tableLicht'>
                    <tr>
                        <td><p><b>Gebruikersnaam: </b></p>
                        <td><p>"; echo $usersData['cusername']; echo "</p></td>
                    </tr>

                    <tr>
                        <td><p><b>Voornaam: </b></p></td>
                        <td><p>"; echo $usersData['cfirstname']; echo "</p></td>
                    </tr>

                    <tr>
                        <td><p><b>Achternaam: </b</p></td>
                        <td><p>"; echo $usersData['clastname']; echo "</p></td>
                    </tr>

                    <tr>
                        <td><p><b>Telefoonnummer: </b></p></td>
                        <td><p>"; echo $usersData['cphonenumber']; echo "</p></td>
                    </tr>

                    <tr>
                        <td><p><b>Email: </b></p></td>
                        <td><p>";echo $usersData['cemail']; echo "</p></td>
                    </tr>

                    <tr>
                        <td><p><b>Adres: </b></p></td>
                        <td><p>"; echo $usersData['cadress']; echo "</p></td>
                    </tr>
        </table>

        <a class=wijzigingslink href=account_change.php>Wijzig mijn gegevens</a>

<h2 id=h2bestellingen>Mijn bestellingen</h2>

<table id=resultaten class=tableLicht>
                    <tr>
                        <td><p><b>Ticket: </b></p>
                        <td><p>"; echo $usersData['ticketname']; echo "</p></td>
                    </tr>

                    <tr>
                        <td><p><b>Aantal: </b></p></td>
                        <td><p>"; echo $usersData['ticketcount']; echo "</p></td>
                    </tr>

                    <tr>
                        <td><p><b>Prijs: </b</p></td>
                        <td><p>"; echo $usersData['ticketprice']; echo "</p></td>
                    </tr>

                    
                    <tr>
                        <td><p><b>Datum: </b</p></td>
                        <td><p>"; echo $usersData['ticketdate']; echo "</p></td>
                    </tr>

        </table>

</div>";
}  else {
	echo "<h1>Je moet eerst inloggen om je account gegevens te kunnen inzien</h1>";
}
?>

<?php
if(isset($_POST['update'])){
    //SQL Aanmaken
    $query = "UPDATE gebruikers SET cusername='" . $_POST['cusername'] . "', clastname='" . $_POST['clastname'] . "' WHERE cusername = " . $_POST['cusername'];
}
?>