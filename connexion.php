
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="post" class="Connex_Inscr">
    <label for="id">Identifiant :</label>
    <input type="text" name="id" id="id" maxlength="25" size="25" placeholder="Entrez votre identifiant" required>

    <label for="mdp">Mot de passe :</label>
    <input name="mdp" id="mdp" type="password" pattern="^[a-zA-Z' \-]+$" class="input-mdp" maxlength="25" size="25" placeholder="Entrez votre mot de passe" required />

    <input type="button" value="Afficher le mot de passe" id="BouttonMDP" class="boutton">
    <input type="submit" value="Valider" class="boutton">

    <label for="bouttonNVCompte" class="BCompte">Vous n'avez pas de compte :</label>
    <input type="button" id="bouttonNVCompte" value="Créés en un">

    <!-- Affichage du loader d'abord, puis du message -->
    <?php
    if (!empty($messages)) {
        echo $messages;
    }
    ?>
</form>
<script src="script.js"></script>
</body>
<?php include "includes/footer.php"; ?>
</html>

