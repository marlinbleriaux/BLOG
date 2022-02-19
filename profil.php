<?php


session_start();

$titre = "profil";
//inclu le header
require 'includes/header.php';

 //inclu lanavbar
 require 'includes/navbar.php';

 ?>

 <h1> profil de <?= $_SESSION["user"]["pseudo"]?></h1>

 <p>pseudo :<?= $_SESSION["user"]["pseudo"]?> </p>
 <p>Email : <?= $_SESSION["user"]["email"]?></p>
 
<?php

//inclu le footer
require 'includes/footer.php';

