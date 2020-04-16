<?php

$dbuser="festivaluser";
$dbpass="tsdf8E6f";
$host="localhost";
$dbname = "festival";

$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!empty($_POST['cusername'])){
$cusername=$_POST['cusername'];
$result ="SELECT count(*) FROM gebruikers WHERE cusername=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$cusername);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if($count>0)
	echo "<span style='color:red'> Gebruikersnaam bestaat al .</span>";
}

?>