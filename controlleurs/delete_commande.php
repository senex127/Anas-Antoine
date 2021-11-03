<?php

require_once("../modeles/Bd.php");


$host = "localhost";

$user = "nqvb1639_tutore";

$bdd = "nqvb1639_tutore";

$passwd = "^@iEU}69_Zgj";



try {

    $pdo = new PDO($host,$user,$passwd ,$bdd);

} catch (PDOException $e) {

    echo 'Connexion échouée : ' . $e->getMessage();

}



$id_commande = $_GET['id_commande'];

$sql = 'DELETE FROM Commande WHERE id_commande=:id_commande';

$stmt=$pdo->prepare($sql);



if($stmt->execute([':id_commande' => $id_commande])) {



    header("Location: ../vues/Client_commandes.php");



}







?>