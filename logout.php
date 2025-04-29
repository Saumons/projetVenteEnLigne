<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Déconnexion</title>
</head>
<body>
<?php
session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['mail'])) {
    echo "Vous avez bien été déconnecté.";
} else {
    echo "Il y a eu un problème avec la déconnexion, réessayez.<br>
                  N'hésitez pas à nous contacter si le problème persiste.";
}
?>
<script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 4000);
</script>
</body>
</html>
