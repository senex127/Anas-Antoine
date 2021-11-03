<?php



require_once("../modeles/Bd.php");

    $host = "localhost";

    $user = "nqvb1639_tutore";

    $bdd = "nqvb1639_tutore";

    $passwd = "^@iEU}69_Zgj";

    $co = mysqli_connect($host,$user,$passwd ,$bdd) or die("erreur de connexion");



    session_start();

	

		$username = mysqli_real_escape_string($co, $_POST['Email']);

		$password = mysqli_real_escape_string($co, $_POST['Mdp']);

	  

		  $query = "SELECT * FROM Producteur WHERE producteur_mail='$username' AND mdp_producteur ='$password'";

			

			$sql="SELECT nom_producteur,id_producteur FROM Producteur WHERE producteur_mail='$username' AND mdp_producteur ='$password'";

			$result=mysqli_query($co,$sql);  

			$row=mysqli_fetch_assoc($result);

		  $results = mysqli_query($co, $query);

		  $res=mysqli_num_rows($results);

		  if ($res) 

		  {

			$_SESSION['Email'] = $username;

			$_SESSION['Nom'] =$row["nom_producteur"];

			

			$_SESSION['ID'] =$row["id_producteur"];

			header('location: ../vues/Calendrier.php');

		  }

		  else 

		  {

			header("Location:../vues/Producteur.php?error=invalidmail");

		  }

  ?>	

		

	



