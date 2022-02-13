<?php

//inclu le header
require 'includes/header.php';

 //inclu lanavbar
 require 'includes/navbar.php';

 ?>

 <p> contenu de la page accueill </p>
 
 
<?php
require "includes/connect.php";

$username="demo";
$password="az";

$sql = "SELECT * FROM `users` WHERE `username`=:username AND `pass`=:pass";


//on prepare la reuete
$query = $db->prepare($sql); 

//on injecte les valeurs
$query->bindValue(":username",$username, PDO::PARAM_STR);
$query->bindValue(":pass",$password, PDO::PARAM_STR);

//on execute  la requete
$query->execute();

$user = $query->fetchAll();

echo "<pre>";
var_dump($user);
echo "</pre>";
//inclu le footer
require 'includes/footer.php';

