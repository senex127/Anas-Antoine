
<html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Accueil</title>

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
		  <li class="nav-item">
            <a class="nav-link"   href="Paniers.php">Nos Paniers</a>
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

        <form method="POST" action="Producteur.php">

            <div class="img">
                <img class="mb-4" src="fruits.jpg" alt="" width="200" height="100">
            </div>
            <h1 class="h3"> Choisissez votre statut </h1>
            
            <div class="btnCo">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Producteur</button>
            </div>

        </form>

        <form method="POST" action="Client.php">

            <div class="btnIn">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Client</button>
            </div>

        </form>

    
    </body>
    
</html>