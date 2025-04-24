<?php
    include ("includes/header.php");
    if (isset($dbh)) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];
            $mdpConf = $_POST['mdpConf'];
            if (!empty($mail) && !empty($mdp) && $mdp === $mdpConf) {

                //Requête qui récupère le mail et le mdp du clients si il est dans la base de donnée
                $recup = $dbh->prepare("SELECT mail_client 
                    FROM clients 
                    WHERE mail_client = :mail");
                $recup->bindParam(':mail', $mail, PDO::PARAM_STR);
                $recup->execute();

                //Le client existe dans la base de donnée
                if ($recup->rowCount() == 1) {
                    $messages[] = "<p style='color:red;'>L'adresse mail est déjà utilisé. Verifier que vous n'avez pas déjà un compte. </p>";
                } //Le client n'existe pas dans la base de donnée
                else {
                    $stmt = $dbh->prepare("INSERT INTO clients (mdp_client, mail_client) 
                        VALUES (:mdp, :mail)");
                    $stmt->bindParam(':mdp', $mdp);
                    $stmt->bindParam(':mail', $mail);
                    $stmt->execute();
                }

                header('Location: connexion.php');
            }

            else {
                    $messages[] = "<p style='color:red;'>Les champs doivent être remplis et les mots de passe identiques.</p>";
                    sleep(2);
                }
        }
    }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="post" class = "Connex_Inscr">
    <label for="mail">E-Mail :</label>
    <input type="text" name="mail" id="mail" maxlength="25" size="25" placeholder="exemple@nomdedomaine.fr" required/>
    <label for="mdp">Mot de passe :</label>
    <input name="mdp" id="mdp" type="password" pattern="^[a-zA-Z' \-]+$" class="input-mdp" maxlength="25" size="25" placeholder="Entrez votre mot de passe" required >
    <label for="mdpConf">Confirmation du mot de passe :</label>
    <input name="mdpConf" id="mdpConf" type="password" pattern="^[a-zA-Z' \-]+$" class="input-mdp" maxlength="25" size="25" placeholder="Entrez à nouveau votre mot de passe" required >
    <input type="button" value="Afficher le mot de passe" id="BouttonMDP" class = "boutton"></input>
    <input type="submit" value="Valider" class = "boutton">
    <label for="bouttonDejaCompte" class = "BCompte" >Vous avez déjà un compte :</label>
    <input type="button" id="bouttonDejaCompte" value="Connectez-vous">

    <!-- Affichage des messages d'erreur si erreur-->
    <?php
    if (!empty($messages)) {
        foreach ($messages as $message) {
            echo $message;
        }
    }
    ?>

</form>
<script src="script.js"></script>
</body>
<?php include "includes/footer.php"; ?>
</html>