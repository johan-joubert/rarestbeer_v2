

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

//création articles
function getArticles() {
    return $liste = [
        "article 1" => ["libelle" => "westvleteren", "qte" => 5, "prixProduit" => 12],
        "article 2" => ["libelle" => "jojobeer", "qte" => 8, "prixProduit" => 22]
    ];
}

function showArticles($listeArticles) {
    
}