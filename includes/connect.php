<?php
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","teste");

//DSN
$dsn = "mysql:dbname=".DBNAME. ";host=".DBHOST ;

//on vas se conecter a la bd
    try {
        //on instancie pdo
        $db = new PDO($dsn, DBUSER, DBPASS);

        echo "on est connecter";

        //on s assure d ennvoyer les donnees en utf8
        $db->exec("SET NAMES utf8");

        //on precise le mode de recuperation de donnees en
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
         PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        die($e->getMessage());



    }
//     //requete de selection
//     $sql = "SELECT * FROM `users`";

//     //requete d insetion de

  // $sql = "INSERT INTO `users`(`email`,`pass`,`roles`) VALUES ('az@gmail;com','azer','[\"user\"]')";
   
   
//    //modiffier
//    $sql= "UPDATE `users` SET`pass`='qsd' WHERE `ìd`=3";

//    //supprimer
//    $sql="DELETE FROM `users` WHERE `id`>1";
//    //on recupere les donnees en
   // $query = $db->query($sql);



//      $user = $query->fetch();

//      echo "<pre>";
//      var_dump($user); 
//      echo "</pre>";


     

?>