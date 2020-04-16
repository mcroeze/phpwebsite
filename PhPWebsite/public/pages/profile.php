<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Profile" ?>
<?php include('../../private/shared/header.php'); ?>


<?php
require('../../private/functionsDB.php');
$query = "SELECT * FROM gebruikers AND orders";
$resultaat = mysqli_query($db, $query);

    if(isset($_SESSION['cusername']))
    {
        $usersData = getUserData(getId($_SESSION['cusername']));
        $ticketData = getOrders($_SESSION['cusername']);
        $ticketDatum = getDatum($_SESSION['cusername']);
    }

?>


<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

<?php
if(isset($_SESSION['cusername'])) {
?>

<div id=container>

<h2>Mijn gegevens</h2>

        <table class="table table-bordered" id=resultaten class='tableLicht'>
                    <tr>
                        <td><p><b>Voornaam: </b></p></td>
                        <td><p><?php echo $usersData['cfirstname']; ?></p></td>
                    </tr>

                    <tr>
                        <td><p><b>Achternaam: </b</p></td>
                        <td><p><?php echo $usersData['clastname']; ?></p></td>
                    </tr>

                    <tr>
                        <td><p><b>Telefoonnummer: </b></p></td>
                        <td><p><?php echo $usersData['cphonenumber']; ?></p></td>
                    </tr>

                    <tr>
                        <td><p><b>Email: </b></p></td>
                        <td><p> <?php echo $usersData['cemail']; ?></p></td>
                    </tr>

                    <tr>
                        <td><p><b>Adres: </b></p></td>
                        <td><p><?php echo $usersData['cadress']; ?></p></td>
                    </tr>
        </table>

        <a class=wijzigingslink href=account_change.php>Wijzig mijn gegevens</a>

    <h2 id=h2bestellingen>Mijn bestellingen</h2>
<?php 
    foreach($ticketData as $ticket){?>
        <table style="float: left;" class="table table-bordered" id=resultaten class=tableLicht>
                    <tr>
                        <td><p><b>Ticket: </b></p>
                        <td><p><?php echo $ticket->item_name; ?></p></td>
                    </tr>

                    <tr>
                        <td><p><b>Aantal: </b></p></td>
                        <td><p><?php echo $ticket->item_quantity; ?></p></td>
                    </tr>

                    <tr>
                        <td><p><b>Prijs: </b</p></td>
                        <td><p><?php echo "€ " . $ticket->item_price * $ticket->item_quantity . "-,"; ?></p></td>
                    </tr>

                    <tr>
                        <td><p><b>Datum: </b></p></td>
                        <td><p><?php echo $ticketDatum['date']; ?></p></td>
                    </tr>

        </table>
<?php } ?>

</div>

<?php
}  else {
	echo "<h1>Je moet eerst inloggen om je account gegevens te kunnen inzien</h1>";
}
?>
