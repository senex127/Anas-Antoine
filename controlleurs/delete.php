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



$id_produit = $_GET['id_produit'];

$sql = 'DELETE FROM produit WHERE id_produit=:id_produit';

$stmt=$pdo->prepare($sql);



if($stmt->execute([':id_produit' => $id_produit])) {



    header("Location: ../vues/Gestion_produit.php");



}



?>