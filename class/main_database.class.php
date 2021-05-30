<?php 
include_once 'database.class.php'; 
$DB = new Database(); 
$DB->connexion(); 
$query = "INSERT INTO users (nom_users, prenom_users, pwd, mail_users, societe) VALUES ('bache', 'nour', 'abc', 'nour@gmail.com', 'ucp')";
$DB->insertquery($query);
$querysel = "select id_users from users where prenom_userS='margot'"; 
$id = $DB->selectquery($querysel); 
echo ($id); 
?>