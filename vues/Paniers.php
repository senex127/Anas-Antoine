<!doctype html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <meta name="generator" content="Hugo 0.79.0">

    <title>Nos Paniers</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="catalogue.css" rel="stylesheet">

  </head>

 <body class="text-center">

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

            <a class="nav-link"  href="Principale.html">Accueil</a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="Identification.php">Identification</a>

          </li>

		  <li class="nav-item">

            <a class="nav-link"   href="Catalogue.php">Fruits/Legumes</a>

          </li>

		   <li class="nav-item">

            <a class="nav-link" aria-current="page"  href="Paniers.php">Nos Paniers</a>

          </li>

        </ul>

      </div>

    </div>

  </nav>

</header>


<?php

/* Connexion à une base MySQL avec l'invocation de pilote */

$dsn = 'mysql:dbname=nqvb1639_tutore;host=localhost';
$user = 'nqvb1639_tutore';
$password = '^@iEU}69_Zgj';

try {

    $pdo = new PDO($dsn, $user, $password);

} catch (PDOException $e) {

    echo 'Connexion échouée : ' . $e->getMessage();

}

$req = "SELECT * FROM Panier";

$stmt = $pdo->prepare($req);

$stmt->execute();

$panier = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

	<div class="row">

		<?php foreach($panier as $p) : ?>

				<div class="card" >

				  <img class="card-img-top" src="images/<?= $p['image_panier'] ?>" alt="Card image cap">

				  <div class="card-body">

					<h5 class="card-title"><?= $p['panier_libelle'] ?></h5>

					<p class="card-text"></p><?= 'Pour '.$p['NB_personne'].' personnes' ?>

					<p class="card-text"></p><?= 'Prix '.$p['panier_prix'].' €' ?>

					<br/>

					<a href="Client.php" class="btn btn-primary">Commander</a>

				  </div>

				</div>

		<?php endforeach; ?>

	</div>

</body>

</html>