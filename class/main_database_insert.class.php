<?php 
include_once 'database.class.php'; 
$DB = new Database("mysql-validator5.alwaysdata.net", "validator5_db", "232514_projet5", "mdpProjet5*"); 
$DB->connexion(); 
//$query = "INSERT INTO `users` (`nom_users`, `prenom_users`, `pwd`, `mail_users`, `societe`) VALUES ('bache', 'nour', 'abc', 'nour@gmail.com', 'ucp')"; 
//$DB->insertquery($query);


?>