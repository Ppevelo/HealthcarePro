<?php

// Connexion base de donn�es

$DB_host = "localhost" ;
$DB_user= "root" ;
$DB_pass = "" ;
$DB_name = "healthcarepro" ;

try {
	$DB_con = new PDO("mysql:host = {$DB_host"}; dbname = {$DB_name}", $DB_user,$DB_pass);
	$DB_con -> setAttribut(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$DB_con -> exec("SET CHARACTERE SET utf_");
}

catch(PDOException $e) {
	echo $e -> getMessage();
}

include_once 'class.crud.php';
$crud = new crud($DB_con);

?>