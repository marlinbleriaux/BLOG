<?php

//on verifie si le form a ete envoyer 
if(!empty($_POST)){
    // var_dump($_POST);
    //le formulaire a ete envoyer 
    //on verifie que les champs on ete remplir
    if(isset($_POST["nickname"]) ,$_POST["email"], $_POST["pass"]
    && !empty($_POST["nickname"]) && !empty($_POST["email"])&& !empty($_POST["pass"])
    ){

    }else{
    die("le formulaire n'est pas complet");
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
          <input type="Email"name="email" id="Email"></input>
      </div>
      <div>
          <label for="pass">Mot de passe </label>
          <input type="password" name="pass" id="pass"></input>
      </div>
      <button type="submit"> Inscription </button>
    </form>
 
 
<?php

//inclu le footer
require 'includes/footer.php';

