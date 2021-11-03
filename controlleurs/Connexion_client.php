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

	  

		  $query = "SELECT * FROM Utilisateur WHERE user_mail='$username' AND user_mdp ='$password'";

			

			$sql="SELECT user_nom, user_prenom FROM Utilisateur WHERE user_mail='$username' AND user_mdp ='$password'";

			$result=mysqli_query($co,$sql);  

			$row=mysqli_fetch_assoc($result);

		  $results = mysqli_query($co, $query);

		  $res=mysqli_num_rows($results);

		  if ($res) 

		  {

			$_SESSION['Email'] = $username;

			$_SESSION['Nom'] =$row["user_nom"];

			

			$_SESSION['Prenom'] =$row["user_prenom"];

			header('location: ../vues/Commande.php');

		  }

		  else 

		  {

				header("Location:../vues/Client.php?error=invalidmail");

		  }

  ?>	

		

	