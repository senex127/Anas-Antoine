
<html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Accueil</title>

        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="Acceuil.css">
    </head>
    
    <body>

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