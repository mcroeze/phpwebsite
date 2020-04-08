<?php
session_start();

// Hier worden de variabeles geinitialiseerd
$username = "";
$email    = "";
$errors = array();

// hier wordt er verbonden met de database
$db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

// Gerbuiker registreren
if (isset($_POST['reg_user'])) {
    // Alle input wordt hier verzameld
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // Hier wordt er voor gezorgd dat het formulier correct wordt ingevuld
    if (empty($username)) { array_push($errors, "Vul een gebruikersnaam in."); }
    if (empty($email)) { array_push($errors, "Vul een emailadres in."); }
    if (empty($password_1)) { array_push($errors, "Vul een wachtwoord in."); }
    if ($password_1 != $password_2) {
        array_push($errors, "De wachtwoorden komen niet overeen.");
    }

    // Eerst in de database checken of de gebruiker al bestaat (email, naam, etc.)
    $user_check_query = "SELECT * FROM gebruikers WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // als de gebruiker bestaat:
        if ($user['username'] === $username) {
            array_push($errors, "Deze gebruikersnaam bestaat al.");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Dit email adres bestaat al.");
        }
    }

    // Hier wordt de gebruiker geregistreerd
    if (count($errors) == 0) {
        $password = md5($password_1); //het wachtwoord wordt hier versleuteld

        $query = "INSERT INTO gebruikers (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Je bent succesvol ingelogd!";
        header('location: home.php');
    }
}
// Gebruiker wordt ingelogd
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Vul een gebruikersnaam in.");
    }
    if (empty($password)) {
        array_push($errors, "Vul een wachtwoord in.");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM gebruikers WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Je bent succesvol ingelogd!";
            header('location: home.php');
        }else {
            array_push($errors, "Gebruikersnaam of wachtwoord is onjuist.");
        }
    }
}
?>
