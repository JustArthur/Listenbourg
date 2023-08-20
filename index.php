<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once('_requete/req.php');

    //Recherche tout les produits grâce à la fonction toutProduit() dans req.php
    $req = toutProduit();
    $req = $req->fetchAll();


    if(isset($_COOKIE["isDarkModeOn"])) {
        $isDarkModeOn = $_COOKIE["isDarkModeOn"] === "true";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        //Récupère ce qu'il y a dans le fichier meta.php
        require_once('_assets/meta.php');
    ?>
    <link rel="stylesheet" href="_style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="main.js"></script>

    <title>Accueil</title>
</head>
<body>
    <!-- Btn pour changer le thème qui fera appelle au fichier script.php (voir plus bas pour le require_once()-->
    <a class="change" onclick="changeTheme()">Changer le thème</a>

    <!-- Titre de la page -->
    <div class="title">Nos Produits</div>

    <!-- Menu Dropdown pour le filtre -->
    <div id="filters" class="filtre">
        <span>Filtre par</span>
        <select name="fetchval" id="fetchval" class="fetchval">
            <option class="menu" value=0 selected="">Pas de filtre</option>
            <option class="menu" value=1>Jeux vidéo</option>
            <option class="menu" value=2>Figurine</option>
            <option class="menu" value=3>Goodies</option>
        </select>
    </div>

    <!-- Début de la grille pour les produits -->
    <ul class="list-produit">
    <?php
        //Parcours le tableau de la requete SQL pour placer tout les produits disponible
        foreach($req as $produit) {
            //Récupère le résultat de la colonne Img pour la mettre en cover
            $img = $produit['Img'];

            //Récupère le résultat de la colonne id pour permettre la redirection sur un produit voulu
            $id_produit = $produit['id'];
    ?>
        <!-- Ajoute un item dans la liste par rapport au résultat du foreach -->
        <li class="list-item">
            <a href="pageProduit?id=<?= $id_produit ?>">
            <img src="_img/<?= $img ?>" width="300" height="200"></a>
        </li>
    <?php
        }
    ?>
    </ul>

    <script src="theme.js"></script>
</body>

<!-- Un bon gros son de Doom Eternal (Meathook par Mick Gordon) -->
<audio controls src="_music/doom_music.mp3" loop></audio>

<?php
    //Récupère ce qu'il y a dans le fichier script.php (Le changement de thème)
    
?>
</html>