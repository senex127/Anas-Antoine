

<?php



session_start(); 

// connect to the database

require_once("../modeles/Bd.php");

$host = "localhost";

$user = "nqvb1639_tutore";

$bdd = "nqvb1639_tutore";

$password = "^@iEU}69_Zgj";


$db = mysqli_connect($host,$user,$password ,$bdd) or die("erreur de connexion");


// Add item

if (isset($_POST['add'])) {

  // receive all input values from the form

  echo "connect";

  $Nom=mysqli_real_escape_string($db, $_POST['Nom']);

  $Prix=mysqli_real_escape_string($db, $_POST['Prix']);

  $Image=mysqli_real_escape_string($db, $_POST['Image']);

  $Description=mysqli_real_escape_string($db, $_POST['Descr']);

  $Stock=mysqli_real_escape_string($db, $_POST['Quant']);

  

  $email = $_SESSION["Email"];

  

	$result= mysqli_query($db,"SELECT id_producteur FROM Producteur WHERE producteur_mail='$email'");

	$row = mysqli_fetch_assoc($result);

	$id_pseudo = $row["id_producteur"];

	

	

   $query = "INSERT INTO produit (prod_nom, prod_image, prod_description, prod_quantité_stock, prod_prix, id_producteur) 

  			  VALUES('$Nom','$Image', '$Description', '$Stock', '$Prix', '$id_pseudo')";

      if(mysqli_query($db, $query))

      {

      $message = 'Donnée a été mise à jour';

				

    }

    else{

        echo"<script>alert('Somthing wrong!!!');</script>";

    }

  	

  	header('location: Gestion_produit.php');

  

}

?>



<!DOCTYPE html>

<html lang="fr">

<title>Add Item</title>

	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  <link rel="stylesheet" href="bootstrap.min.css">

        <link rel="stylesheet" href="Acceuil.css">

    



    <!-- Bootstrap core CSS -->

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>

      .bd-placeholder-img {

        font-size: 1.125rem;

        text-anchor: middle;

        -webkit-user-select: none;

        -moz-user-select: none;

        user-select: none;

      }

main {

	    margin-left: 35%;

	margin-top: auto;

}

      @media (min-width: 768px) {

        .bd-placeholder-img-lg {

          font-size: 3.5rem;

        }

      }

	  

	  

    </style>



    

    <!-- Custom styles for this template -->

    <link href="signin.css" rel="stylesheet">

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

            <a class="nav-link"  href="Gestion_produit.php">Gerer</a>

          </li>

          <li class="nav-item">

            <a class="nav-link" aria-current="page" href="additem.php">Ajouter</a>

          </li>

		  <li class="nav-item">

            <a class="nav-link" href="Calendrier.php">Calendrier</a>

          </li>

		  <form class="d-flex" >

			<button class="btn btn-outline-success " type="button"><?php echo 'Login: '.$_SESSION['Email']; ?></button>

			<p> <a class="btn btn-sm btn-outline-secondary" href="../controlleurs/Deconnexion.php"" role="button">Deconnexion</a></p>

		  </form>

		 </ul>

        

      </div>

    </div>

  </nav>

</header>

<main>

<div class="container">

	<div class="card mt-5">

	

			<h2 class="h3 mb-3 fw-normal">Ajouts d'un produit</h2>



		<div class="card-body">

		<?php if(!empty($message)): ?>

			<div class="alert alert-success">

			<?= $message; ?>

			</div>

    <?php endif; ?>

     		

			<form method="POST">	

	</br>

				<div class="form-group">	

					<label for="NomProduit" class="visually-hidden">Nom Produit</label>

					<input  type="text" name="Nom" class="form-control" placeholder="Nom du produit" required autofocus>

					</div>

				</br>

				<div class="form-group">	

					<label for="PrixProduit" class="visually-hidden">Prix Produit</label>

					<input type="text" name="Prix" class="form-control" placeholder="Prix du produit" required autofocus>

				</div>

	</br>

				<div class="form-group">

					<label for="stockProduit" class="visually-hidden">Stock Produit</label>

					<input  type="number" name="Quant" class="form-control" placeholder="Stock du produit" required autofocus>

				</div>

	</br>

				<div class="form-group"> 

					<label for="name">Description</label>

					<input type="text" class="form-control" name="Descr" required autofocus> 

  

				</div>	

	</br>

				<div class="form-group">

					<label for="exampleFormControlFile1">Choisir l'image du fichier</label>

					<input  type="file" name="Image" class="form-control" id="exampleFormControlFile1" placeholder="Description du produit" required autofocus>

				</div>

					</br>	</br>

				<div class="form-group">

        <button type="submit" class="btn btn-info" name="add">Ajout Produit</button>

					</div>

			</form>

		</div>

  </div>

</div>



</main><!-- /.container -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>

