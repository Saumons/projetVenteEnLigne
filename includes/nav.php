<nav class="navbar">    
        <div class="close menuham" id="menu-tel">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="contacte.php">Nous contacter</a></li>
            <li><a href="messages.php">Messages</a></li>
        </ul>
        
        <div class="profile-menu">
            <div class="profile-icon" onclick="toggleMenu()">
                <img src="img/icon.png" alt="" class ="icon">
            </div>
            <div class="menu" id="menu">

                <?php
                    if(isset($_SESSION['mail']))
                    {
                        if (isset($_SESSION['nom']))
                            {echo $_SESSION['nom'];}
                        else
                            {echo "<p style='font-size: 0.6rem; text-align: center'> " .$_SESSION['mail']."</p>";}
                        echo "<a href='parametre.php'>Paramètres</a>";
                        echo "<a href='logout.php'>Déconnexion</a>";
                    }

                    else
                    {
                        echo "<a href='../connexion.php'>Connectez-vous</a>";
                        echo "<a href='../inscription.php'>Inscrivez-vous</a>";
                    }
                    ?>


            </div>
        </div>
</nav>