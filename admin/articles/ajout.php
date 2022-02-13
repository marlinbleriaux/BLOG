<?php
// var_dump($_POST);

//on traite le formulaire
if(!empty($_POST)){
    //si les data sont present 
    if(
        isset( $_POST["titre"], $_POST["contenu"])
        && !empty( $_POST["titre"]) && !empty( $_POST["contenu"])
    ){
        //formulaire est complete
        //on recupere les donees en les protegeant 
        //on retire toute balis du titre
        $titre= strip_tags( $_POST["titre"]);

        //on neutralise toute baise du contenu
        $contenu = htmlspecialchars($_POST["contenu"]);

        //on enregistre toute
        require_once "../../includes/connect.php";

        //on ecrit la requete
        $sql= "INSERT INTO `articles`( `title`, `content`) VALUES (:title, :content)";

        //on prepare la requete
        $query = $db->prepare($sql); 

        //on injecte les valeurs en
        $query->bindValue(':title',$titre,PDO::PARAM_STR);
        $query->bindValue(':content',$contenu,PDO::PARAM_STR);

        //on execute la requete
      if( !$query->execute() )  {
          die("oups une erreur");
      }
      //on recupere l id d
      $id = $db->lastInsertId();

      die("Article ajoute sous le numero $id");

    }else{
        die("le formulaire est incomplet");
    }
}
$titre="ajouter un article ";
    //on inclut le header 
    include_once "../../includes/header.php";


    include_once "../../includes/navbar.php";

    ?>

    <h1> Ajouter un article </h1>

    <form action="" method="post">
      <div>
          <label for="">Titre</label>
          <input type="text" name="titre" id="titre">
      </div>
      <div>
          <label for="">contenu</label>
          <textarea name="contenu" id="contenu"></textarea>
      </div>
      <button type="submit"> Enregistrer </button>
    </form>

<?php
    include_once "../../includes/footer.php";
?>