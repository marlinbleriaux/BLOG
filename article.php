<?php
session_start();

//on verifie sion as un id 
if (!isset($_GET["id"]) || empty($_GET["id"])){
    header("Location:articles.php");
    exit;
}
//je le recuperel id
$id = $_GET["id"];

//db connect
require "includes/connect.php";
//on part chercher l' article dans la base de do
//la requete

$sql = "SELECT * FROM `articles` WHERE  `id` =:id";

//on prepare la requete
$query=$db->prepare($sql);

//on injecte
$query->bindValue(":id",$id, PDO::PARAM_INT);

//on execute  la requete
$query->execute();

//on recupere la
$article=$query->fetch();

//on verifie si article est vide 
if (!$article){
    //erreur
    http_response_code(404);
    echo "Article inexistant";
    exit; 
}

// ici on as un article 
//definie le titre la base
 $titre = strip_tags($article["title"]) ;

//inclu le header
 require 'includes/header.php';

 //inclu lanavbar
 require 'includes/navbar.php';

 ?>

     <article> 
        <h1> <?=  strip_tags($article["title"] )?></h1>
        <p>publie le <?= $article["creat_at"] ?></p>
        <div><?= strip_tags( $article["content"]   ) ?></div>
    </article>


<?php
//inclu le footer
require 'includes/footer.php';

