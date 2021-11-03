<?php 
 session_start(); 

?>

<html>

    <html lang="fr">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Gestion Produit</title>

        <link rel="stylesheet" href="bootstrap.min.css">

        <link rel="stylesheet" href="Acceuil.css">

	    <!-- Bootstrap core CSS -->  

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>

	    img{

    width: 125px !important;

    height: 120px !important;

    object-fit:contain

	}

table, td 

	{ 

		text-align: center; 

	}

    </style>

    <!-- Custom styles for this template -->

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

            <a class="nav-link" aria-current="page" href="Gestion_produit.php">Gerer</a>

          </li>

          <li class="nav-item">

            <a class="nav-link"  href="additem.php">Ajouter</a>

          </li>

		  <li class="nav-item">

            <a class="nav-link" href="Calendrier.php">Calendrier</a>

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

            

 <?php

/* Connexion à une base MySQL avec l'invocation de pilote */

$host = "localhost";

$user = "nqvb1639_tutore";

$password = "^@iEU}69_Zgj";

$bdd = "nqvb1639_tutore";

$dsn = 'mysql:dbname=nqvb1639_tutore;host=localhost';
$user = 'nqvb1639_tutore';
$password = '^@iEU}69_Zgj';
try {

    $pdo = new PDO($dsn, $user, $password);

} catch (PDOException $e) {

    echo 'Connexion échouée : ' . $e->getMessage();

}

$req = "SELECT * FROM Produit";

$stmt = $pdo->prepare($req);

$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_OBJ);

?>


<br><br><br>

<div class="container">

  <div class="card mt-5">

    <div class="card-header">

      <h2>Tous les produits<h2>

    </div>

    <div class="card-body">

      <table class="table table-bordered">

        <tr>

			<th>ID_Produit</th>

			<th>Nom_Produit</th>

			<th>image</th>

			<th>Description</th>

			<th>Quantité_stock</th>

			<th>Prix</th>

			<th>Action</th>

		</tr>

        <?php foreach($products as $prod): ?>

          <tr>

            <td><?= $prod->id_produit; ?></td>

            <td><?= $prod->prod_nom; ?></td>

            <td><img class="card-img-top" width="100" src="images/<?= $prod->prod_image; ?>"alt="Card image cap"></td>

			<td><?= $prod->prod_description; ?></td>

            <td><?= $prod->prod_quantité_stock; ?></td>

            <td><?= $prod->prod_prix; ?></td>

            <td>

              <a onclick="return confirm('Voulez vous vraiment supprimer ce produit du catalogue?')" href="../controlleurs/delete.php?id_produit=<?= $prod->id_produit ?>" class='btn btn-danger'>Delete</a>

            </td>

          </tr>

        <?php endforeach; ?>

      </table>

    </div>

  </div>

</div>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>