<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style2.css">
    <title>Accueil</title>
</head>
<body>
    <?php
        include ("includes/header.php");
    ?>
    <!--Carrousel de produits en vogue pour chaque ou une partie des catégories-->
    <?php
    echo '<div id="c2carrousel">';
    $CheminDossierImages="./img";
    //
    $scandir = scandir($CheminDossierImages);
    //variable permettant d'enregistrer les images dans un tableau (array)
    $images=[];
    $Nbr=0;//nbr d'image
    foreach($scandir as $cle => $fichier){
        $fichier=strtolower($fichier); //Mets tous en minuscule
        //Liste toutes images avec les extensions jpg, jpeg, png, gif et bmp
        // et echappe le point, car il veut dire "tous les caractères" sinon
        if(preg_match("#\.(jpg|jpeg|png|gif|bmp)$#",$fichier)){
            $Nbr++;
            $images[$Nbr]=$fichier;
        }
    }
    //CONTROLE A ENLEVER PLUS TARD
    if(count($images)==0){
        echo "Aucune image dans ce dossier.";
    }

    else {

        $indexImage = 1; // valeur par défaut
        //Contrôle si image est bien présente et contient un chiffre
        if (isset($_GET['image']) && is_numeric($_GET['image'])) {
            $index = (int)$_GET['image'];
            if (array_key_exists($index, $images)) {
                $indexImage = $index;
            }
    }

    $ImageAffichee = $images[$indexImage];
    $indexPrecedente = $indexImage > 1 ? $indexImage - 1 : null;
    $indexSuivante = isset($images[$indexImage + 1]) ? $indexImage + 1 : null;

    echo '<div style="position: relative; width: 100%; max-width: 800px; margin: auto;">';

        echo '<div class="image-container">';

        echo '<img src="'.$CheminDossierImages.'/'.$ImageAffichee.'" alt="Image...">';

        // Lien gauche
        if ($indexPrecedente !== null) {
            echo '<a href="index.php?image='.$indexPrecedente.'" class="arrow arrow-left">
            <span>&#8592;</span>
          </a>';
        }

        // Lien droite
        if ($indexSuivante !== null) {
            echo '<a href="index.php?image='.$indexSuivante.'" class="arrow arrow-right">
            <span>&#8594;</span>
          </a>';
        }

        echo '</div>';


    }
    ?>

</body>
<script src="script.js"></script>
</html>