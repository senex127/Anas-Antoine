<?php

session_start();

?>

<HTML>

<HEAD>

<TITLE>Commande Ponctuelle</TITLE>

<link href="style.css" type="text/css" rel="stylesheet" />

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

        <link rel="stylesheet" href="Calendrier.css">

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

            <a class="nav-link"  href="Client_commandes.php">Mes Commandes</a>

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

<br/> <br/>

			<h1> Voici Vos commandes: </h1>

<?php

$host = "localhost";

$user = "nqvb1639_tutore";

$bdd = "nqvb1639_tutore";

$passwd = "^@iEU}69_Zgj";

$co = mysqli_connect($host,$user,$passwd ,$bdd) or die("erreur de connexion");



$email = $_SESSION["Email"];

  

	$result1= mysqli_query($co,"SELECT id_user FROM Utilisateur WHERE user_mail='$email'");

	$row = mysqli_fetch_assoc($result1);

	$id_user = $row["id_user"];

/* Connexion à une base MySQL avec l'invocation de pilote */


$dsn = 'mysql:dbname=nqvb1639_tutore;host=localhost';
$user = 'nqvb1639_tutore';
$password = '^@iEU}69_Zgj';

try {

    $pdo = new PDO($dsn, $user, $password);

} catch (PDOException $e) {

    echo 'Connexion échouée : ' . $e->getMessage();

}

$req = "SELECT  id_commande, com_date, user_tel,prix_tot, user_pseudo, user_nom, user_prenom 

							FROM Commande c, Utilisateur u 

							WHERE c.id_user=u.id_user 

							AND c.id_user='$id_user'";

   

$stmt = $pdo->prepare($req);

$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container">

  <div class="card mt-5">

    <div class="card-header">

      <h2>Tous les produits<h2>

    </div>

    <div class="card-body">

      <table class="table table-bordered">

        <tr>

			<th>ID_Commande</th>

			<th>DATE_commande</th>

			<th>PRIX_commande</th>

			<th>Telephone</th>

			<th>User_pseudo</th>

			<th>User_nom</th>

			<th>User_prenom</th>

			<th>Supprimer</th>

		</tr>

        <?php foreach($products as $prod): ?>

          <tr>

            <td><?= $prod->id_commande; ?></td>

            <td><?= $prod->com_date; ?></td>

            <td><?= $prod->prix_tot; ?></td>

			<td><?= $prod->user_tel; ?></td>

            <td><?= $prod->user_pseudo; ?></td>

            <td><?= $prod->user_nom; ?></td>

			<td><?= $prod->user_prenom; ?></td>

            

			<td> <a onclick="return confirm('Voulez vous vraiment supprimer cette commande?')" href="../controlleurs/delete_commande.php?id_commande=<?= $prod->id_commande ?>" class='btn btn-danger'>Delete</a> </td>

            

          </tr>

        <?php endforeach; ?>

      </table> 

</BODY>

</HTML>