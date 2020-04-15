<?php include('../../public/database/server.php'); ?>

<?php
if(!isset($page_title)) { $page_title = 'Website'; } 
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival - <?php echo $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

</head>

<body>


<div id="header">

<nav>

    <div class="logo">
        <a href="<?php echo url_for('pages/home.php'); ?>">Festival Site</a>
    </div>

    <img src="../../public/images/light.png" onclick="myFunction()" class="image_dark_mode">  

    <ul class="nav-links">

        <li><a href="<?php echo url_for('pages/home.php'); ?>">Home</a></li>
        <li><a href="<?php echo url_for('pages/profile.php'); ?>">Profile</a></li>
        
        <?php
        if(isset($_SESSION['cusername'])) {
            echo "<div class=dropdown>";
            echo "<li class=navwhite>".$_SESSION['cusername']."</li>";
            echo "<div class=dropdown-content>";
            echo "<a href=\"../../public/database/logout_page.php\">Uitloggen</a>";
        }
        else {
            echo "<li class=right><a href=login.php >Login</a></li>";
        }
        ?>
    </ul>
</nav>

    <script type="text/javascript" src="../../public/js/nav.js"></script>

</body>

</html>

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>
