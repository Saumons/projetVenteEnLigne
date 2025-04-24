<?php
    include("includes/header.php");
    if (isset($dbh)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];

            //Si les champ sont remplis
            if (!empty($mail) && !empty($mdp)) {

                //Requête qui récupère le mail et le mdp du clients si il est dans la base de donnée
                $recup = $dbh->prepare("SELECT mail_client,mdp_client 
                    FROM clients 
                    WHERE mail_client = :mail AND mdp_client = :mdp");
                $recup->bindParam(':mail', $mail, PDO::PARAM_STR);
                $recup->bindParam(':mdp', $mdp, PDO::PARAM_STR);
                $recup->execute();

                //Le client est dans la base
                if ($recup->rowCount() == 1) {
                    header('Location: contenu.php');
                }
                //Le client n'est pas dans la base
                else {
                    $messages = "<p style='color:red;'>L'adresse mail ou le mot de passe est incorrecte </p>";
                }
            }

            //Les champs sont vides
            else {
                $messages = "<p style='color:red;'>Les champs doivent être remplis.</p>";
                sleep(2);
            }
        }
    }
?>
<body>
    <!--Formulaire de connexion-->
    <form method="post" class="Connex_Inscr">
        <label for="mail">Mail :</label>
        <input type="text" name="mail" id="mail" maxlength="25" size="25" placeholder="exemple@nomdedomaine.fr" required>

        <label for="mdp">Mot de passe :</label>
        <input name="mdp" id="mdp" type="password" pattern="^[a-zA-Z' \-]+$" class="input-mdp" maxlength="25" size="25" placeholder="Entrez votre mot de passe" required />

        <input type="button" value="Afficher le mot de passe" id="BouttonMDP" class="boutton">
        <input type="submit" value="Valider" class="boutton">

        <label for="bouttonNVCompte" class="BCompte">Vous n'avez pas de compte :</label>
        <input type="button" id="bouttonNVCompte" value="Créés en un">

        <!-- Affichage du message d'erreur si message d'erreur-->
        <?php
        if (!empty($messages)) {
            echo $messages;
        }
        ?>
    </form>
    <script src="script.js"></script>
</body>
<?php include "includes/footer.php"; ?>

