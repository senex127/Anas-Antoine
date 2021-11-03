<?php

	session_start();

	require_once("../modeles/Bd.php");

	require_once("../vues/Inscription_client.php");

    $host = "localhost";

    $user = "nqvb1639_tutore";

    $bdd = "nqvb1639_tutore";

    $passwd = "^@iEU}69_Zgj";

	$co = mysqli_connect($host,$user,$passwd ,$bdd) or die("erreur de connexion");
	

	if (isset($_POST["Pseudo"]) && isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Email"]) && isset($_POST["Mdp"]) && isset($_POST["Tel"]) && isset($_POST["Adresse"])){

    	$_SESSION["Pseudo"] = $_POST["Pseudo"];

		$_SESSION["Nom"] = $_POST["Nom"];

    	$_SESSION["Prenom"] = $_POST["Prenom"];

    	$_SESSION["Mdp"] = $_POST["Mdp"];

    	$_SESSION["Email"] = $_POST["Email"];

		$_SESSION["Tel"] = $_POST["Tel"];

    	$_SESSION["Adresse"] = $_POST["Adresse"];



		$Pseudo = $_SESSION["Pseudo"];

    	$Nom = $_SESSION["Nom"];

    	$Prenom = $_SESSION["Prenom"];

    	$Email = $_SESSION["Email"];

    	$Mdp = $_SESSION["Mdp"];

		$Tel = $_SESSION["Tel"];

		$Adresse = $_SESSION["Adresse"];

    	$result1 = mysqli_query($co,"SELECT user_nom FROM Utilisateur WHERE user_mail = '$Email'"); 

    	if(mysqli_num_rows($result1)!=1){



    		$result2 = mysqli_query( $co, "INSERT INTO Utilisateur (user_pseudo, user_nom, user_prenom, user_mail, user_mdp, user_adresse, user_tel) VALUES ('$Pseudo','$Nom','$Prenom','$Email','$Mdp','$Adresse','$Tel')")

            or die ("Execution de la requête impossible ".mysqli_error($co));

			

			header('Location:../vues/Client.php');

    	}

    	else{

    		

    		header("Location:../vues/Inscription_client.php?error=invalidmail");

    	}

	}

	else{



		header('Location:../vues/Inscription_client.php?error=invalidsaisie');

	}



?>

