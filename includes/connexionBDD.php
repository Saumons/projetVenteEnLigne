<?php
include_once("info.php");

try
{
$dbh = new PDO('mysql:host='.SERVEUR.';dbname='.BDD, USER, PWD);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo"Erreur de connection : ". $e->getMessage();
echo "Code : ".$e->getCode();
}