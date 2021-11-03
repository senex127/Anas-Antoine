
<html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Client</title>

        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="Acceuil.css">

	
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
            <a class="nav-link"  href="Principale.html">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Identification.php">Identification</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="Catalogue.php">Catalogue</a>
          </li>
		  
        </ul>
        
      </div>
    </div>
  </nav>
</header>

    
        <div id="header"></div>

        <div class="haut">
        
            <h1> Bienvenue </h1>
        
        </div>

        <form method="POST" action="../controlleurs/Connexion_client.php">

           
            <h1 class="h3">Client: Enregistrez vous</h1>
			
			<div class="error">
            
                <?php
                if(isset($_GET['error'])){
                 if($_GET['error'] == "invalidmail") {
                    echo "Adresse mail ou mdp invalid";
                 }
                 else if($_GET['error'] == "invalisaisie") {
                    echo 'Saisie incorrecte';
                 }
                }
                ?>
			</div>
			
            <label for="Email" class="sr-only">Email</label>
            <div class="mail">
                <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            </div>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <div class="mdp">
                <input type="password" name="Mdp" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="btnCo">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
            </div>

        </form>

        <form method="POST" action="Inscription_client.php">

            <div class="btnIn">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
            </div>

        </form>

    
    </body>
    
</html>