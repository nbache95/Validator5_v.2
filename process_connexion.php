<?php
include_once("./class/authentification.class.php"); 
include_once("./class/database.class.php"); 

$login = $_GET["mail"];
$passwd = $_GET["mdp"];

$auth = new Authentification($login, $passwd); 

echo ($id_ses);
//$sess = new Session($id_ses, $login);
//$auth = new Authentification($login, $passwd);
?>