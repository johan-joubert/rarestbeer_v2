<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

/*
function getArticles() {}
renvoie un tableau contenant les articles
chaque article est un tableau contenant les infos de l'article
(dans functions.php)
l'appeler dans index.php
$listeArticles = getArticles();
var_dump($listeArticles);
function showArticles($listeArticles){}
foreach qui va parcourir $listeArticles
et afficher du html (echo)pour les afficher un par un
$listeArticles = getArticles();
showArticles($listeArticles);
showArticles();
*/

//==========CREATION ARTICLE==========

//fonction pour creation du tableau d'articles

function getArticles() {
    return $listes = [
        "article 1" => ["id" => 1, "picture" => "beer.jpg", "libelle" => "westvleteren", "qte" => 1, "prixProduit" => 12],
        "article 2" => ["id" => 2, "picture" => "beer.jpg", "libelle" => "jojobeer", "qte" => 1, "prixProduit" => 22],
        "article 3" => ["id" => 3, "picture" => "beer.jpg", "libelle" => "jojobeer", "qte" => 1, "prixProduit" => 22],
        "article 4" => ["id" => 4, "picture" => "beer.jpg", "libelle" => "jojobeer", "qte" => 1, "prixProduit" => 22],
        "article 5" => ["id" => 5, "picture" => "beer.jpg", "libelle" => "jojobeer", "qte" => 1, "prixProduit" => 22],
        "article 6" => ["id" => 6, "picture" => "beer.jpg", "libelle" => "jojobeer", "qte" => 1, "prixProduit" => 22]
    ];
}

//fonction pour afficher les articles

function showArticles($listeArticles) {
    foreach ($listeArticles as $liste => $article) {
        echo "<form action=\"index.php\" method=\"post\">";
        echo "<div class=\"col-md-4\">";
        echo "<img src=\"ressources/images/" .$article["picture"]." \" class=\"imageArticle\"> <br>";
        echo "<div class=\"text-align\">" .$article["libelle"]. "</div><br>";
        echo "<div class=\"text-align\">" .$article["qte"]. "</div><br>";
        echo "<div class=\"text-align\">" .$article["prixProduit"]. "</div><br>";
        echo "</div>";
        echo "<input type=\"submit\" name=\"submit\" value=\"ajouter au panier\">";
        echo "<input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">";
        echo "</form>";
    }
}


//récupérer id article

function getArticleFromId($listeArticles, $id) {
    foreach ($listeArticles as $article) {
        if ($id == $article['id']) {
            return $article;
        }
    }
}


//ajouter au panier

function ajoutAuPanier($article, $id) {
    $isArticlesAdded = verifierPanier($id);
    if ($isArticlesAdded == true) {
        echo "<script>alert(\"Article déjà présent dans le panier\")</script>";
    } else {
        $article['qte'] = 1;
        array_push( $_SESSION['panier'], $article);
    }
}

//vérifier panier 

function verifierPanier ( $id ) {
    foreach ($_SESSION['panier'] as $article) {
        if ($article['id'] == $id) {
            return true;
        }
    }
    return false;
}

//compter les articles présents dans le panier

function nbrArticles() {
    return count($_SESSION['panier']);
}



//afficher dans le panier

function showPanier($monPanier) {
    foreach ($monPanier as $article) {
        echo "<div class=\"row\">";
        echo "<div class=\"col-md-2\">";
        echo "<img src=\"ressources/images/" .$article["picture"]." \" class=\"imageArticle\" width=\"200\"> <br>";
        echo "</div>";
        echo "<div class=\"col-md-2\">";
        echo "<div class=\"text-align\">" .$article["libelle"]. "</div><br>";
        echo "</div>";
        echo "<div class=\"col-md-2\">";
        echo "<div class=\"text-align\">" .$article["qte"]. "</div><br>";
        echo "</div>";
        echo "<div class=\"col-md-2\">";
        echo "<div class=\"text-align\">" .$article["prixProduit"]. "</div><br>";
        echo "</div>";
        echo "<form action=\"panier.php\" method=\"post\">";
        echo "<div class=\"col-md-2\">";
        echo "<input type=\"number\" name=\"qteArticle\" value=\"" .$article['qte']. "\" class=\"qteArticle\">";
        echo "<input type=\"hidden\" name=\"idQteArticle\" value=\"" .$article["id"]."\">";
        echo "</div>";
        echo "<div class=\"col-md-2\">";
        echo "<input type=\"submit\" name=\"modifier\" value=\"modifier\">";
        echo "</div>";
        echo "</form>";
        echo "</div>";
    }
}

