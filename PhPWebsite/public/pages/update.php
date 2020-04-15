<?php

//Database gegevens 
$dbhost = 'localhost';
$dbuser = 'festivaluser';
$dbpass = 'tsdf8E6f';
$dbname = 'festival';

// hier wordt er verbonden met de database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Controleren of formulier verzonden is
if(isset($_POST['update'])){
    //SQL Aanmaken
    $query = "UPDATE gebruikers SET cusername='" . $_POST['cusername'] . "', clastname='" . $_POST['clastname'] . "' WHERE cusername = " . $_POST['cusername'];

    //SQL Query uitvoeren
    $conn->query($query);

    //Connectie sluiten met de database
    $conn->close();

    header('Location profile.php');
    exit;
}

?>