<?php 

session_start();

$pdo = new PDO(
	'mysql:host=localhost;dbname=grpb5;',
	'root',
	'root',
	array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

/* style du toast */

$_SESSION["toastConfig"]["greenToast"] = 'rounded white-text green';
$_SESSION["toastConfig"]["redToast"] = 'rounded white-text red accent-4';

/* login */

$passwordError = "Mot de passe incorrecte";
$usernameError = "Nom d'utilisateur incorrecte";

?>