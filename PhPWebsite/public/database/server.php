<?php
session_start();

// Hier worden de variabeles geinitialiseerd
$username = "";
$firstname = "";
$lastname = "";
$phonenumber = "";
$email    = "";
$adress = "";
$errors = array();

// hier wordt er verbonden met de database
$db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

// Gerbuiker registreren
if (isset($_POST['reg_user'])) {
    // Alle input wordt hier verzameld
    $username = mysqli_real_escape_string($db, $_POST['cusername']);
    $firstname = mysqli_real_escape_string($db, $_POST['cfirstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['clastname']);
    $adress = mysqli_real_escape_string($db, $_POST['cadress']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['cphonenumber']);
    $email = mysqli_real_escape_string($db, $_POST['cemail']);
    $password_1 = mysqli_real_escape_string($db, $_POST['cpassword_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['cpassword_2']);

    // Hier wordt er voor gezorgd dat het formulier correct wordt ingevuld
    if (empty($username)) { array_push($errors, "Vul een gebruikersnaam in."); }
    if (empty($firstname)) { array_push($errors, "Vul een voornaam in."); }
    if (empty($lastname)) { array_push($errors, "Vul een achternaam in."); }
    if (empty($adress)) { array_push($errors, "Vul een adress in."); }
    if (empty($phonenumber)) { array_push($errors, "Vul een telefoonnummer in."); }
    if (empty($email)) { array_push($errors, "Vul een emailadres in."); }
    if (empty($password_1)) { array_push($errors, "Vul een wachtwoord in."); }
    if ($password_1 != $password_2) {
        array_push($errors, "De wachtwoorden komen niet overeen.");
    }

    // Eerst in de database checken of de gebruiker al bestaat (email, naam, etc.)
    $user_check_query = "SELECT * FROM gebruikers WHERE cusername='$username' OR cemail='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // als de gebruiker bestaat:
        if ($user['cusername'] === $username) {
            array_push($errors, "Deze gebruikersnaam bestaat al.");
        }

        if ($user['cemail'] === $email) {
            array_push($errors, "Dit email adres bestaat al.");
        }
    }

    // Hier wordt de gebruiker geregistreerd
    if (count($errors) == 0) {
        $password = md5($password_1); //het wachtwoord wordt hier versleuteld

        $query = "INSERT INTO gebruikers (cusername, cfirstname, clastname, cadress, cphonenumber, cemail, cpassword) 
  			  VALUES('$username', '$firstname', '$lastname', '$adress', '$phonenumber', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['cusername'] = $username;
        $_SESSION['success'] = "Je bent succesvol ingelogd!";
        header('location: home.php');
    }
}
// Gebruiker wordt ingelogd
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['cusername']);
    $password = mysqli_real_escape_string($db, $_POST['cpassword']);

    if (empty($username)) {
        array_push($errors, "Vul een gebruikersnaam in.");
    }
    if (empty($password)) {
        array_push($errors, "Vul een wachtwoord in.");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM gebruikers WHERE cusername='$username' AND cpassword='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['cusername'] = $username;
            $_SESSION['success'] = "Je bent succesvol ingelogd!";
            header('location: home.php');
        }else {
            array_push($errors, "Gebruikersnaam of wachtwoord is onjuist.");
        }
    }
}

?>
