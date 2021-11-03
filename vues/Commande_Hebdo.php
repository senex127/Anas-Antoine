<?php

require_once("../controlleurs/Panier_commande_Hebdo.php");

?>

<HTML>

<HEAD>

<TITLE>Commande Hebdo</TITLE>

<link href="style.css" type="text/css" rel="stylesheet" />

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">



    

    <!-- Custom styles for this template -->

    <link href="carousel.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">



</HEAD>

<BODY>

  </head>

  <body>

    

 <header>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <div class="container-fluid">

      <a class="navbar-brand" href="#">Bio à coter de chez vous</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav me-auto mb-2 mb-md-0">

          <li class="nav-item active">

            <a class="nav-link" aria-current="page" href="Commande.php">Commmande Ponctuelle</a>

          </li>

          <li class="nav-item">

            <a class="nav-link"  href="Commande_Hebdo.php">Commande Hebdomadaire</a>

          </li>

		  <li class="nav-item">

            <a class="nav-link"  href="Client_Commandes.php">Mes Commandes</a>

          </li>

		<form class="d-flex" >

			<button class="btn btn-outline-success " type="button"><?php echo 'Login: '.$_SESSION['Email']; ?></button>

			<p> <a class="btn btn-sm btn-outline-secondary" href="../controlleurs/Deconnexion.php" role="button">Deconnexion</a></p>

		  </form>

        </ul>

        

      </div>

    </div>

  </nav>

</header>



<div id="shopping-cart">

<div class="txt-heading">Shopping Cart</div>



<a id="btnEmpty" href="Commande_Hebdo.php?action=empty">Empty Cart</a>

<?php

if(isset($_SESSION["cart_item"])){

    $total_quantity = 0;

    $total_price = 0;

?>	

<table class="tbl-cart" cellpadding="10" cellspacing="1">

<tbody>

<tr>

<th style="text-align:left;">Nom</th>

<th style="text-align:left;">Nombre de personnes</th>

<th style="text-align:right;" width="5%">Quantité</th>

<th style="text-align:right;" width="10%">Prix unitaire</th>

<th style="text-align:right;" width="10%">Prix</th>

<th style="text-align:center;" width="5%">Supprimer</th>

</tr>	

<?php		

    foreach ($_SESSION["cart_item"] as $item){

        $item_price = $item["quantity"]*$item["panier_prix"];

		?>

				<tr>

				<td><?php echo $item["panier_libelle"]; ?></td>

				<td><?php echo "Pour ".$item["NB_personne"]." personnes"; ?></td>

				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>

				<td  style="text-align:right;"><?php echo "€ ".$item["panier_prix"]; ?></td>

				<td  style="text-align:right;"><?php echo "€ ". number_format($item_price,2); ?></td>

				<td style="text-align:center;"><a href="Commande_Hebdo.php?action=remove&code=<?php echo $item["NB_personne"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>

				</tr>

				<?php

				$total_quantity += $item["quantity"];

				$total_price += ($item["panier_prix"]*$item["quantity"]);

		}

		?>



<tr>

<td colspan="2" align="right">Total:</td>

<td align="right"><?php echo $total_quantity; ?></td>

<td align="right" colspan="2"><strong><?php echo "€ ".number_format($total_price, 2); ?></strong></td>

<td></td>

</tr>

</tbody>

</table>		

  <?php

} else {

?>

<div class="no-records">Your Cart is Empty</div>

<?php 

}

?>

</div>

<form method="post" >

	<button type="submit" class="btn btn-info" name="Commander">Commander</button>

</form>

<?php

// connect to the database

require_once("../vues/Commande_Hebdo.php");

$host = "localhost";

$user = "nqvb1639_tutore";

$bdd = "nqvb1639_tutore";

$password = "^@iEU}69_Zgj";


$db = mysqli_connect($host,$user,$password ,$bdd) or die("erreur de connexion");


// Add item

if (isset($_POST['Commander'])) {
	
	$email = $_SESSION["Email"];

	$result1= mysqli_query($db,"SELECT id_user FROM Utilisateur WHERE user_mail='$email'");

	$row = mysqli_fetch_assoc($result1);

	$id_user = $row["id_user"];



$query = "INSERT INTO Commande (com_libelle, statut, com_date, prix_tot, id_user, id_livraison)

VALUES ( 'blablabla','non livreé', now(), '$total_price', '$id_user', 2);";

      if(mysqli_query($db, $query))

      {

      echo'Commande ajoutée';

	}

  }

?>

<div id="product-grid">

	<div class="txt-heading">Products</div>

	<?php

	$product_array = $db_handle->runQuery("SELECT * FROM Panier");

	if (!empty($product_array)) { 

		foreach($product_array as $key=>$value){

	?>

		<div class="product-item">

		<form method="post" action="Commande_Hebdo.php?action=add&code=<?php echo $product_array[$key]["NB_personne"]; ?>">

			<div class="images"><img src="images/<?= $product_array[$key]["image_panier"] ?>"></div>

			<div class="product-tile-footer">

			<div class="product-title"><?php echo $product_array[$key]["panier_libelle"]; ?></div>

			<div class="product-price"><?php echo "€".$product_array[$key]["panier_prix"]." Kg"; ?></div>

			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Ajoutez" class="btnAddAction" /></div>

			</div>

			</form>

		</div>

	<?php

		}

	}

	?>

</div>

</BODY>

</HTML>