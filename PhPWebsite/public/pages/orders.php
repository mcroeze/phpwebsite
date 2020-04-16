<?php
if(isset($_POST)){
    session_start();

    $db = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');
    $query = "INSERT INTO orders (userName, tickets, date) VALUES ('" . $_SESSION['cusername'] . "', '" . json_encode($_SESSION['shopping_cart']) . "', now())";
    
    $db->query($query);

    $db->close();

    header("Location: profile.php");
    exit;
}else{
    echo "fout";
    // header("Location: profile.php");
    // exit;
}
?>

