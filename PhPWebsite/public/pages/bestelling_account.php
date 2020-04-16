<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Hoofdpagina" ?>
<?php include('../../private/shared/header.php'); ?>
<?php include('../database/errors.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('stylesheets/main.css'); ?>">

<?php 
if(isset($_SESSION['cusername'])) {

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

echo "<!DOCTYPE html>
<html>
	<head>
		<title>Koop uw Tickets hier!</title>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
	</head>
	<body>
		<br />
		<div class='containerProfile'>
			<br />
			<br />
			<br />
			<h3 align='center'>Koop uw Tickets Hier!</h3><br />
			<br /><br />";
				$query = "SELECT * FROM tickets ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
			echo "<div class='col-md-4'>
				<form method=post action=bestelling_account.php?action=add&id="; echo $row["id"]; echo ">";
					echo "<div style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;'>";
						echo "<img src='../images/'"; echo $row["image"]; echo "class='img-responsive' /><br />

						<h4 class=text-info>"; echo $row["name"]; echo "</h4>

						<h4 class=text-danger>"; echo $row["price"]; echo "</h4>

						<input class=btnprofile type=text name=quantity value=1 class=form-control />

						<input class=btnprofile type=hidden name=hidden_name value="; echo $row["name"]; echo " />

						<input class=btnprofile type=hidden name=hidden_price value="; echo $row["price"]; echo " />

						<input class=btnprofile type=submit name=add_to_cart style=margin-top:5px; class=btn btn-success value=Add to Cart />
					</div>
					
				</div>
			</form>";
					}
				}
				echo "
			<div style='clear:both'></div>
			<br />
			<h3>Bestelling Gegevens</h3>
			<div class='table-responsive'>
				<table class='table table-bordered'>
					<tr>
						<th width=40%>Ticket Naam</th>
						<th width=10%>Aantal</th>
						<th width=20%>Prijs</th>
						<th width=15%>Totaal</th>
						<th width=5%>Optie</th>
					</tr>";
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					echo "<tr>
						<td>"; echo $values["item_name"]; echo "</td>
						<td>"; echo $values["item_quantity"]; echo "</td>
						<td>€"; echo $values["item_price"]; echo "</td>
						<td>€"; echo number_format($values["item_quantity"] * $values["item_price"], 2); echo "</td>
						<td><a href=bestelling_account.php?action=delete&id="; echo $values["item_id"]; echo "><span class=text-danger>Verwijder</span></a></td>
					</tr>";
					
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}

					echo "<tr>
                        <td>Totaal</td>
                        <td></td>
                        <td></td>
						<td>€"; echo number_format($total, 2); echo "</td>
					</tr>";
					}
                echo "</table>
				<button class=btnprofile1 onclick=window.location.href='bevestiging_bestelling.php'>Volgende</button>

			</div>
		</div>
	</div>
	<br />
	</body>
</html>";

}  else {
	echo "<h1>Je moet eerst inloggen om tickets te bestellen</h1>";
}
?>