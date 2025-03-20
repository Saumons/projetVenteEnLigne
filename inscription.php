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
    <label for="id">Identifiant :</label>
    <input type="text" name="id" id="id" maxlength="25" size="25" placeholder="Entrez votre identifiant" required/>
    <label for="mdp">Mot de passe :</label>
    <input name="mdp" id="mdp" type="password" pattern="^[a-zA-Z' \-]+$" class="input-mdp" maxlength="25" size="25" placeholder="Entrez votre mot de passe" required >
    <label for="mdpConf">Confirmation du mot de passe :</label>
    <input name="mdpConf" id="mdpConf" type="password" pattern="^[a-zA-Z' \-]+$" class="input-mdp" maxlength="25" size="25" placeholder="Entrez à nouveau votre mot de passe" required >
    <input type="button" value="Afficher le mot de passe" id="BouttonMDP" class = "boutton"></input>
    <input type="submit" value="Valider" class = "boutton">
    <label for="bouttonDejaCompte" class = "BCompte" >Vous avez déjà un compte :</label>
    <input type="button" id="bouttonDejaCompte" value="Connectez-vous">
    <input type="button" id="bouttonLogout" value="Déconecter vous">

    <!-- Affichage des messages -->
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