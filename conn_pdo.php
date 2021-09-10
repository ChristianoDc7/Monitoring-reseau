<?php 
$user = "root";
$pass="";
$host="localhost";
$bdd ="reseau";
$dsn = 'mysql:host='. $host. ';dbname='. $bdd;

try
{
	$dbh= new PDO($dsn, $user, $pass);
} 
catch (PDOException $e)
{
	print "Erreur ! :" . $e->getMessage() . "<br/>";
	die();
}
?>
