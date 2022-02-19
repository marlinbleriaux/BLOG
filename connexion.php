<?php
session_start();

$titre = "connexion";

//on verifie si le form a ete envoyer 

    // var_dump($_POST);
    //le formulaire a ete envoyer 
    if(!empty($_POST)){
        //si les data sont present 
        if(
            isset(  $_POST["email"], $_POST["pass"])
            && !empty( $_POST["email"]) && !empty( $_POST["pass"])
        ){
              //formulaire est complete
        //on recupere les donees en les protegeant
      
       //on verifie si l email existe et si c' est bien un email
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            die("l' addresse mail n'est pas valide ");
        }

        //on se connect 
         require "includes/connect.php";

         $sql="SELECT * FROM `users` WHERE `email`= :email";

         $query=$db->prepare($sql);

         //on injecte les valeurs en
        
         $query->bindValue(':email',$_POST["email"], PDO::PARAM_STR);

         $query->execute();


         $users = $query->fetch(); 

      if (!$users){
           die("l' utilisateur ou le mot d epasse n'est pas correct ");
      }
        

         //ici on as un user qui existe 
         if(!password_verify($_POST["pass"], $user["pass"])){
            die("l' utilisateur ou le mot de passe n'est pas correct ");
         }
         //ici l' utilisateuret le mot de passe sont correct 
        //on vas connecter l'utilisateur
        //on demare laa session
    //    session_start();

       //on vas stocker  dans une session les infos de l'utilisateur
       $_SESSION["user"] = [
           "id"=>$user["id"],
           "pseudo"=>$user["pseudo"],
           "email"=>$user["email"],
           "roles"=>$user["roles"]
       ];  
    //on redirige vers la page de profile
      header("Location: profile.php");
    }else{
    die("le formulaire n'est pas complet");
    }
}


//inclu le header
require 'includes/header.php';

 //inclu lanavbar
 require 'includes/navbar.php';

 ?>

 <h1> connexion </h1>

 <form action="" method="post">
     
      <div>
          <label for="Email">Email</label>
          <input type="Email"name="email" id="email"></input>
      </div>
      <div>
          <label for="pass">Mot de passe </label>
          <input type="password" name="pass" id="pass"></input>
      </div>
      <button type="submit"> connecter </button>
    </form>
 
 
<?php

//inclu le footer
require 'includes/footer.php';

