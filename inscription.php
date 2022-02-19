<?php
session_start();

//definie le titre la base
$titre = "INSCRIPTION";

//on verifie si le form a ete envoyer 
if(!empty($_POST)){
    // var_dump($_POST);
    //le formulaire a ete envoyer 
    if(!empty($_POST)){
        //si les data sont present 
        if(
            isset( $_POST["nickname"], $_POST["email"], $_POST["pass"])
            && !empty( $_POST["nickname"]) && !empty( $_POST["email"]) && !empty( $_POST["pass"])
        ){
              //formulaire est complete
        //on recupere les donees en les protegeant
        $pseudo = strip_tags($_POST["nickname"]);
       
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            die("l' addresse mail n'est pas valide ");
        }

         //on vas hasher le mdp
         $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);


         //on se connect 
         require "includes/connect.php";

         $sql="INSERT INTO `users`( `username`, `email`, `pass`, `roles`) VALUES (:pseudo, :email, '$pass','[\"ROLE_USER\"]')";

         $query=$db->prepare($sql);

         //on injecte les valeurs en
         $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
         $query->bindValue(':email',$_POST["email"],PDO::PARAM_STR);

         $query->execute();


         //on recuper l'id de
         $id= $db->lastInsertId();

         //on connect l'utilisateur
          //on vas connecter l'utilisateur
        //on demare la session
    //    session_start();

       //on vas stocker  dans une session les infos de l'utilisateur
       $_SESSION["user"]=[
           "id" => $id,
           "pseudo" => $pseudo,
           "email" => $_POST["email"],
           "roles" => [" ROLE_USER"]
       ];  
    //on redirige vers la page de profile
      header("Location: profil.php");
      
    }else{
    die("le formulaire n'est pas complet");
    }
}
}

//inclu le header
require 'includes/header.php';

 //inclu lanavbar
 require 'includes/navbar.php';

 ?>

 <h1> inscription </h1>

 <form action="" method="post">
      <div>
          <label for="pseudo">pseudo</label>
          <input type="text" name="nickname" id="pseudo">
      </div>
      <div>
          <label for="Email">Email</label>
          <input type="Email"name="email" id="email"></input>
      </div>
      <div>
          <label for="pass">Mot de passe </label>
          <input type="password" name="pass" id="pass"></input>
      </div>
      <button type="submit"> Inscription </button>
    </form>
 
 
<?php

//inclure le footer
require 'includes/footer.php';

