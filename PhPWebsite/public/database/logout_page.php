<?php
session_start();
session_destroy();
header('Location: ../../public/pages/home.php');
exit;
?>
