<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try{
        $bdd = new PDO("mysql:host=$servername; dbname=pinpix2", $username, $password);
    }
    catch(PDOExeption $e){
        echo $e->getMessage();
    }
?>