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


//==========CREATION ARTICLE==========

//fonction pour creation du tableau d'articles

function getArticles() {
    return $listes = [
        "article 1" => ["id" => 1, "picture" => "beer.jpg", "libelle" => "westvleteren", "qte" => 1, "prixProduit" => 12],
        "article 2" => ["id" => 2, "picture" => "beer.jpg", "libelle" => "jojobeer", "qte" => 1, "prixProduit" => 22],
        "article 3" => ["id" => 3, "picture" => "beer.jpg", "libelle" => "megajobeer", "qte" => 1, "prixProduit" => 22],
        "article 4" => ["id" => 4, "picture" => "beer.jpg", "libelle" => "Superbeer", "qte" => 1, "prixProduit" => 22],
        "article 5" => ["id" => 5, "picture" => "beer.jpg", "libelle" => "Ultrabeer", "qte" => 1, "prixProduit" => 22],
        "article 6" => ["id" => 6, "picture" => "beer.jpg", "libelle" => "Gigajobeer", "qte" => 1, "prixProduit" => 22]
    ];
}

//fonction pour afficher les articles

function showArticles($listeArticles) {
    foreach ($listeArticles as $liste => $article) {
        echo "<form action=\"#ancre\" method=\"post\">";
        echo "<div class=\"col-md-4\">";
        echo "<img src=\"ressources/images/" .$article["picture"]." \" class=\"imageArticle\"> <br>";
        echo "<div class=\"text-align\">" .$article["libelle"]. "</div><br>";
        echo "<div class=\"text-align\">" .$article["qte"]. "</div><br>";
        echo "<div class=\"text-align\">" .$article["prixProduit"]. "</div><br>";
        echo "</div>";
        echo "<input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"ajouter au panier\">";
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
        echo "<input type=\"number\"  max=15 name=\"qteArticle\" value=\"" .$article['qte']. "\" class=\"qteArticle\">";
        echo "<input type=\"hidden\" name=\"idQteArticle\" value=\"" .$article["id"]."\">";
        echo "<input type=\"submit\" name=\"modifier\" value=\"modifier\">";
        echo "</div>";
        echo "</form>";
        echo "<form method=\"post\" action=\"panier.php\">";
        echo "<input type=\"submit\" name=\"delete\" value=\"supprimer\">";
        echo "<input type=\"hidden\" name=\"deleteArticle\" value=\"" .$article['id']."\">";
        echo "</form>";
        echo "</div>";
    }
}


// modifier quantier panier

function modifierQtePanier () {

    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        if($_SESSION['panier'][$i]['id'] == $_POST['idQteArticle']) {
            $_SESSION['panier'][$i]['qte'] = intval($_POST['qteArticle']);
        }
        
    }
}


// supprimer panier

// function supprimerArticle($id) {
//     foreach ($_SESSION['panier'] as $article) {
//         if ($article['id'] == $id) {
//             $array = $_SESSION['panier'];
//             $key = array_search($article, $array);
//             array_splice($_SESSION['panier'], $key);    
//         }
//     }
// }

function supprimerArticle($id) {
    for ($i = 0; $i < count($_SESSION['panier']); $i++){
        if($_SESSION['panier'][$i]['id'] == $id) {
            array_splice($_SESSION['panier'], $i, 1);
        }
    }
}


// montant panier

function montant_panier() {
    $total = 0;
    foreach($_SESSION['panier'] as $article ) {
        $total += $article['prixProduit'] * $article['qte'];
    }
    
    return $total;
}
