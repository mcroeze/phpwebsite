<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Hoofdpagina" ?>
<?php include('../../private/shared/header.php'); ?>
<?php include('../database/errors.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

<?php
require('../../private/functionsDB.php');
$query = "SELECT * FROM gebruikers";
$resultaat = mysqli_query($db, $query);

if(isset($_SESSION['cusername']))
{
    $usersData = getUserData(getId($_SESSION['cusername']));
}
?>

<?php
if(isset($_SESSION['cusername'])) {

    echo "<h2>Bevestig Bestelling</h2>";

    $connect = mysqli_connect('localhost', 'festivaluser', 'tsdf8E6f', 'festival');

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Ticket is al toegevoegd")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
		
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);

			}
		}
	}
}

?>
          
                <table class="table table-bordered">
					<tr>
						<th width="20%">Voornaam</th>
						<th width="20%">Achternaam</th>
						<th width="20%">Telefoon</th>
						<th width="20%">E-Mail</th>
                        <th width="20%">Adres</th>
					</tr>
					<tr>
						<td><?php echo $usersData['cfirstname']; ?></td>
						<td><?php echo $usersData['clastname']; ?></td>
                        <td><?php echo $usersData['cphonenumber']; ?></td>
                        <td><?php echo $usersData['cemail']; ?></td>
                        <td><?php echo $usersData['cadress']; ?></td>
					</tr>
                </table>

			<h3>Bestelling Gegevens</h3>
			<div class="table-responsive">
				<table class="table table-bordered">

					<tr>
						<th width="40%">Ticket Naam</th>
						<th width="10%">Aantal</th>
						<th width="20%">Prijs</th>
						<th width="15%">Totaal</th>
					</tr>

					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>

					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>€ <?php echo $values["item_price"]; ?></td>
						<td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
					</tr>

					<?php
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
					?>

					<tr>
                        <td>Totaal</td>
                        <td></td>
                        <td></td>
						<td>€ <?php echo number_format($total, 2); ?></td>
					</tr>

					<?php
						}
                    ?>
                    
                </table>
			</div>

				<form method="post" action="orders.php">
					<input type="submit" class="wijzigingslink" value="Bevestig Bestelling" style="max-width: 10%;">
				</form>
<?php              
}  

else {
     echo "<h1>Je moet eerst inloggen om tickets te bestellen</h1>";
}
?>     