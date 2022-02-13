<?php
require "includes/connect.php";
  
$sql = "SELECT * FROM `articles` ORDER BY `creat_at`  DESC";
//on execute la requete
$query = $db->query($sql); 

//on recupere les donnees
$articles = $query->fetchAll();

 //definie le titre la base
 $titre = "listes des article";

//inclu le header
 require 'includes/header.php';

 //inclu lanavbar
 require 'includes/navbar.php';

 ?>

<h1> LISTE DES ARTICLES </h1>
<section>

<?php  foreach($articles as $article): ?> 
    <article> 
    <h1> <a href="article.php?id=<?= $article["id"] ?>"><?=  strip_tags($article["title"]) ?></a></h1>
        <p>publie le <?= $article["creat_at"] ?></p>
        <div><?= strip_tags( $article["content"]   ) ?></div>
    </article>

<?php endforeach;?>
</section>
<?php
//inclu le footer
require 'includes/footer.php';

