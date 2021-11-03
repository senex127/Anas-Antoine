<html>

    <html lang="fr">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Inscription</title>

        <link rel="stylesheet" href="bootstrap.min.css">

        <link rel="stylesheet" href="Acceuil.css">

    </head>

    <body>

        <div id="header"></div>

        <div class="haut">

            <h1> Inscription </h1>

        </div>

        <form method="POST" action="../controlleurs/Verif_Inscription.php">

            <div class="img">

                <img class="mb-4" src="fruits.jpg" alt="" width="200" height="100">

            </div>

			<h1 class="h3">PRODUCTEUR</h1>

            <h1 class="h3">Inscrivez vous</h1>

            <label for="text" class="sr-only">Nom</label>

            <div class="nom">

                <input type="text" name="Nom" id="inputEmail" class="form-control" placeholder="Nom" required autofocus>

            </div>

            <label for="text" class="sr-only">Prenom</label>

            <div class="prenom">

                <input type="text" name="Prenom" id="inputPassword" class="form-control" placeholder="Prenom" required>

            </div>

            <label for="Email" class="sr-only">Email</label>

            <div class="mail">

                <input type="email" name="Email" id="inputPassword" class="form-control" placeholder="Email" required>

            </div>

            <label for="inputPassword" class="sr-only">Mot de passe</label>

            <div class="mdp">

                <input type="password" name="Mdp" id="inputPassword" class="form-control" placeholder="Mot de passe" required>

            </div>

            <div class="btnIn2">

                <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>

            </div>

        </form>

    </body>

</html>





<!--<form method="POST" action="../modeles/Verif_Inscription.php">



            <div class="textNom">

                <input type="text" name="Nom" value placeholder="Nom"/>

            </div>



            <div class="textPrenom">

                <input type="text" name="Prenom" value placeholder="Prenom"/>

            </div>



            <div class="textLog">

                <input type="Email" name="Email" value placeholder="Email" type="Email"/>

            </div>



            <div class="textMdp">

                <input type="password" name="Mdp" value placeholder="Mot de passe"/>

            </div>



            <div class="btnIn">

                <input type="submit" value="Inscription">

            </div>



        </form>-->