<?php
// database conection 
   $host = "localhost";
    $dbname = "login";
    $db_user = "root";
    $db_pass = "";

    try{
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);


    }
    catch(PDOException $e){
        die("connection failed");

    }