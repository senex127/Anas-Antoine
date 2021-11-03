<?php

session_start(); 

?>

<html>

    <html lang="fr">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Calendrier</title>

        <link rel="stylesheet" href="bootstrap.min.css">

        <link rel="stylesheet" href="Calendrier.css">

	    <!-- Bootstrap core CSS -->  

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">


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

            <a class="nav-link"  href="Gestion_produit.php">Gerer</a>

          </li>

          <li class="nav-item">

            <a class="nav-link"  href="additem.php">Ajouter</a>

          </li>

		  <li class="nav-item">

            <a class="nav-link" aria-current="page" href="Calendrier.php">Calendrier</a>

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

<br/> <br/> <br/> <br/>

	<body>

			<h1> Voici les commandes passée: </h1>

<?php

require_once("../modeles/Bd.php");

$host = "localhost";

$user = "nqvb1639_tutore";

$bdd = "nqvb1639_tutore";

$passwd = "^@iEU}69_Zgj";

$co = mysqli_connect($host,$user,$passwd ,$bdd) or die("erreur de connexion");



$result = mysqli_query($co, "SELECT  id_commande, user_tel, com_libelle, com_date, prix_tot, type_livraison, user_pseudo, user_adresse FROM Commande c, Livraison v, Utilisateur u WHERE c.id_user=u.id_user AND c.id_livraison=v.id_livraison") or die ("erreur afficher");

echo    '<table  class="table table-bordered">

		<tr>

		<th>ID_Commande</th>

		<th>DATE_Commande</th>

		<th>PRIX_Total</th>

		<th>Type_livraison</th>

		<th>User_Pseudo</th>

		<th>Téléphone</th>

		</tr>';

while($row = mysqli_fetch_assoc($result)) {

	

		echo '<tr><td>'.$row["id_commande"].'</td>';

		echo '<td>'.$row["com_date"].'</td>';

		echo '<td>'.$row["prix_tot"].'</td>';

		echo '<td>'.$row["type_livraison"].'</td>';

		echo '<td>'.$row["user_pseudo"].'</td>';

		echo '<td>'.$row["user_tel"].'</td>';

        echo '</tr>';

               

        }

echo '</table>'		

  ?> 

			<h1> Voici les Les Livraisons à Effectuer: </h1>

<?php

require_once("../modeles/Bd.php");

$host = "localhost";

$user = "nqvb1639_tutore";

$bdd = "nqvb1639_tutore";

$password = "^@iEU}69_Zgj";


$co = mysqli_connect($host,$user,$password ,$bdd) or die("erreur de connexion");



$result = mysqli_query($co, "SELECT  v.id_livraison, id_commande, type_livraison, user_pseudo, user_nom, user_prenom, user_adresse FROM Commande c, Livraison v, Utilisateur u WHERE c.id_user=u.id_user AND c.id_livraison=v.id_livraison") or die ("erreur afficher");

echo    '<table class="table table-bordered">

		<tr>

		<th>ID_Livraison</th>

		<th>ID_Commande</th>

		<th>Type_livraison</th>

		<th>User_Pseudo</th>

		<th>User_Nom</th>

		<th>User_Prenom</th>

		<th>User_Adresse</th>

		</tr>';

while($row = mysqli_fetch_assoc($result)) {

	

		echo '<tr><td>'.$row["id_livraison"].'</td>';

		echo '<td>'.$row["id_commande"].'</td>';

		echo '<td>'.$row["type_livraison"].'</td>';

		echo '<td>'.$row["user_pseudo"].'</td>';

		echo '<td>'.$row["user_nom"].'</td>';

		echo '<td>'.$row["user_prenom"].'</td>';

		echo '<td>'.$row["user_adresse"].'</td>';

        echo '</tr>';

               

        }

echo '</table>'		


  ?> 

<br><br><br><br>

</body>

</html>