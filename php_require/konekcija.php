<?php
  
    try{
        $serverBaze="localhost";
        $baza="blog";
        $user="root";
        $pass="";
        $konekcija= new PDO("mysql:host=$serverBaze; dbname=$baza", $user, $pass);
        $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Greska pri konekciji: ". $e->getMessage();
    }
?>