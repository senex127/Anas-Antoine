<?php

    define('HOST','localhost');

    define('DB_NAME','nqvb1639_tutore');

    define('USER','nqvb1639_tutore');

    define('PASS','^@iEU}69_Zgj');

    try{

        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER,PASS);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connexion réussie > OK !";

    } catch(PDOException $e){

        echo $e;
    }

?>