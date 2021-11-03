<?php

	session_start();

	require_once("../modeles/Bd.php");

	require_once("../vues/Inscription_producteur.php");


    $host = "localhost";

    $user = "nqvb1639_tutore";

    $bdd = "nqvb1639_tutore";

    $passwd = "^@iEU}69_Zgj";

	$co = mysqli_connect($host,$user,$passwd ,$bdd) or die("erreur de connexion");



	if (isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Email"]) && isset($_POST["Mdp"])){

    	$_SESSION["Nom"] = $_POST["Nom"];

    	$_SESSION["Prenom"] = $_POST["Prenom"];

    	$_SESSION["Mdp"] = $_POST["Mdp"];

    	$_SESSION["Email"] = $_POST["Email"];

    	$Nom = $_SESSION["Nom"];

    	$Prenom = $_SESSION["Prenom"];

    	$Email = $_SESSION["Email"];

    	$Mdp = $_SESSION["Mdp"];

    	$result1 = mysqli_query($co,"SELECT nom_producteur FROM Producteur WHERE producteur_mail = '$Email'"); 

    	if(mysqli_num_rows($result1)!=1){

    		$result2 = mysqli_query( $co, "INSERT INTO Producteur (nom_producteur, prenom_producteur, producteur_mail, mdp_producteur) VALUES ('$Nom','$Prenom','$Email','$Mdp')")

            or die ("Execution de la requête impossible ".mysqli_error($co));

			header('Location:../vues/Producteur.php');

    	}

    	else{

    		header("Location:../vues/Inscription_producteur.php?error=invalidmail");

    	}

	}

	else{

		header('Location:../vues/Inscription_producteur.php?error=invalidsaisie');

	}



?>

