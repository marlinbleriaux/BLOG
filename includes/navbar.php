<nav> 
            <h1>Title</h1>

            <ul>
                <li>Accuell</li>
                <li>Services</li>
                <li>Contact</li>
                <?php
                    if(!isset($_SESSION["user"])) : 
                ?>
                <li> <a href="../connexion.php">Connexion</a> </li>
                <li> <a href="../inscription.php">Inscription</a></li>
                <?php else: ?>
              
                <li> <a href="../deconnexion.php ">Déconnexion</a></li>
                <?php  endif;?>
            </ul>     
        </nav>