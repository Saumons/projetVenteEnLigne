<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

$messages = []; // Stocker les messages de succès ou d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mdp = $_POST['mdp'];
    $mdpConf = $_POST['mdpConf'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    // Vérification et mise à jour du mot de passe
    if (!empty($mdp) || !empty($mdpConf)) {
        if ($mdp == $mdpConf) {
            $_SESSION['users'][$_SESSION['user']]['mdp'] = $mdp;
            $messages[] = "<p style='color:green;'>Votre mot de passe a été changé.</p>";
        } else {
            $messages[] = "<p style='color:red;'>Les mots de passe ne correspondent pas.</p>";
        }
    }

    // Vérification et mise à jour de l'email
    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['users'][$_SESSION['user']]['email'] = $email;
            $messages[] = "<p style='color:green;'>Votre email a été mis à jour.</p>";
        } else {
            $messages[] = "<p style='color:red;'>L'email entré n'est pas valide.</p>";
        }
    }

    // Vérification et mise à jour du numéro de téléphone
    if (!empty($tel)) {
        if (preg_match('/^(?:\+33|0)[1-9](?:[\s.-]?[0-9]{2}){4}$/', $tel)) {
            $_SESSION['users'][$_SESSION['user']]['tel'] = $tel;
            $messages[] = "<p style='color:green;'>Votre numéro de téléphone a été mis à jour.</p>";
        } else {
            $messages[] = "<p style='color:red;'>Le numéro de téléphone n'est pas valide.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'includes/nav.php';
?>
<h1>Bonjour <?php echo $_SESSION['user']; ?></h1>



<form method="post">
    <h2>Modifier votre compte</h2>
    <label>Identifiant :</label>
    <input type="text" value="<?php echo $_SESSION['user']; ?>" disabled>

    <label for="mdp">Mot de passe :</label>
    <input name="mdp" id="mdp" type="password" class="input-mdp" maxlength="25" placeholder="Laissez vide pour ne pas changer">

    <label for="mdpConf">Confirmation du mot de passe :</label>
    <input name="mdpConf" id="mdpConf" type="password" class="input-mdp" maxlength="25" placeholder="Confirmez votre mot de passe">

    <input type="button" value="Afficher le mot de passe" id="BouttonMDP" class="boutton">

    <label for="email">Email :</label>
    <input type="text" name="email" id="email" maxlength="50" placeholder="Laissez vide pour ne pas changer">

    <label for="tel">Numéro de téléphone :</label>
    <input type="text" name="tel" id="tel" maxlength="20" placeholder="Laissez vide pour ne pas changer">

    <button type="submit">Modifier</button>

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

