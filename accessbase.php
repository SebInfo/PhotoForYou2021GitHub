<?php
$host="127.0.0.1:8889";
$db="photoforyou2";
$user="root";
$pw="root";
// connection à la base de données avec test si il y a une erreur
try
{
    $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pw);
    // Pour afficher les erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
     die('Erreur : ' . $e->getMessage());
}
?>