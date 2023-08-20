<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    //Récupère l'id dans le lien par rapport au produit
    $id_produit = $_GET['id'];

    include_once('_requete/req.php');

    //Recherche le produit dans la BDD par rapport à son id
    $req = pageProduit($id_produit);
    $req = $req->fetch();

    //Selon l'id de la catégorie défini le genre de jeu ou objet
    switch($req['Categorie']) {
        case 1:
            //S'il return 1 alors c'est un jeu vidéo
            $cat = "Jeu vidéo";
        break;

        case 2:
            //S'il return 2 alors...
            $cat = "Figurine";
        break;

        case 3:
            $cat = "Goodies";
        break;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        //Récupère ce qu'il y a dans le fichier meta.php
        include_once('_assets/meta.php');
    ?>
    <link rel="stylesheet" href="_style/style-page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Récupère le nom pour le mettre en titre -->
    <title><?= $req['Nom'] ?></title>
</head>
<body>
    <a class="change" onclick="changeTheme()">Changer le thème</a>
    <a href="index.php" class="back">Retour arrière</a>

    <!-- Récupère l'image le nom et la Description selon le produit -->
    <div class="produit-right">
        <div class="title"><?= $req['Nom'] ?></div>
        <img src="_img/<?= $req['Img'] ?>" alt="" width="720">
    </div>

    <div class="produit-left">
        <div class="categorie"><?= $cat ?></div>
        <div class="desc"><?= $req['Description'] ?></div>
    </div>

    <script src="theme.js"></script>
</body>

<!-- Un bon gros son de Doom Eternal (Meathook par Mick Gordon) -->
<audio controls src="_music/doom_music.mp3" loop></audio>
</html>