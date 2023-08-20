<?php
    session_start();

    //Demande le fichier pour se connecter à la BDD
    include_once('connexionBD.php');


    //Récupère tout les produit disponible dans la BDD
    function toutProduit() {
        //Connexion à la BDD
        $DBB = new connexionDB();
        $DB = $DBB->DB();
        
        //Requete pour les informations voulu
        $req = $DB->prepare("SELECT id, Img, Categorie FROM produits");
        $req->execute();

        return $req;
    }

    //Récupère tout les produits selon la filtre choisi
    function filtreOk($id_cat) {
        $DBB = new connexionDB();
        $DB = $DBB->DB();

        $req = $DB->prepare("SELECT id, Img, Categorie FROM produits WHERE Categorie = ?");
        $req->execute(array($id_cat));

        return $req;
    }

    //Récupère les information par rapport à l'id du produit choisi
    function pageProduit($id_produit) {
        $DBB = new connexionDB();
        $DB = $DBB->DB();

        $req = $DB->prepare("SELECT Nom, Description, Img, Categorie FROM produits Where id = ?");
        $req->execute(array($id_produit));

        return $req;
    }
?>