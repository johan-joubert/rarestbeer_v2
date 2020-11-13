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
    return  [
        "article 1" => ["id" => 1, 
                        "picture" => "west6.jpg", 
                        "libelle" => "Westvleteren 6", 
                        "qte" => 1, 
                        "prixProduit" => 4.10,
                        "shortDescription" => "Belge, Blonde, 33 cL, 6°",
                        "description" => "La Westvleteren Abt 6 est une bière blonde trappiste reconnue dans le monde entier et auprès des plus grands amateurs de bières, pour sa qualité et sa rareté.
                        Brassée au sein de l'Abbaye de Saint Sixtus en Belgique, sa production annuelle reste fixe malgré le succès, car les moines restent attachés à la règle de St Benoit, une règle d'abbaye ancestrale qui limite la production annuelle.                        
                        La Westvleteren Abt 6 se reconnaît extérieurement à sa simple capsule verte, la bouteille étant totalement dépourvue d'étiquette.                      
                        Une fois versée, vous découvrez avec cette bière belge une robe cuivrée qui s'étend dans le verre sous une mousse blanche expressive.                       
                        Ici l'arôme semble avoir reposé quelque temps et des premiers tons d'oxydation se révèlent. Au nez, vous retrouvez les raisins secs, les fruits noirs, le miel, le caramel avec des tons sombres maltés.                     
                        La bouche révèle le caramel, le malt, et les fruits secs, accompagnés de légères notes amères.                      
                        Les Westvleteren sont ensuite appréciées également pour leur complexité aromatique, un bon moment biérologue vous attend avec ce produit.                       
                        Découvrez également les deux autres versions de l'abbaye, la Westvleteren Abt 8 et la Westvleteren Abt 12."],

        "article 2" => ["id" => 2, 
                        "picture" => "west8.jpg", 
                        "libelle" => "Westvleteren 8", 
                        "qte" => 1, 
                        "prixProduit" => 4.10,
                        "shortDescription" => "Belge, Double, 33 cL, 8°",
                        "description" => "La Westvleteren Abt 8 est une bière trappiste reconnue dans le monde entier et auprès des plus grands amateurs de bière pour sa qualité et sa rareté.
                        Brassée au sein de l'abbaye de St Sixtus en Belgique, sa production annuelle reste fixe malgrè leur succès car les moines restent attachés à la règle de St Benoit, une régle d'abbaye ancestrale qui limite la production annuelle.                        
                        La Westvleteren Abt 8 est une bière versée dans une belle couleur brune foncée avec une tête de mousse généreuse, et livre au nez un bouquet profond et fantastique dominé par la levure.                       
                        La dégustation de cette Westvleteren révèle une ambiance exquise, difficilement cernable mais tellement savoureuse. On y retrouve le caramel, quelques tons torréfiés, la levure belge et les fruits noirs dans une moindre mesure.                         
                        La Westvleteren Abt 8 reste un produit à la fois unique et propre à un savoir faire ancestal, en plus d'être un réel exercice de bièrologue !"],

        "article 3" => ["id" => 3, 
                        "picture" => "west12.jpg", 
                        "libelle" => "Westvleteren 12", 
                        "qte" => 1, 
                        "prixProduit" => 4.10,
                        "shortDescription" => "Belge, Brune, 33 cL, 12°",
                        "description" => "La bière trappiste Westvleteren 12 est une bière de type trappiste à fermentation haute, conçue par la Brasserie de l'Abbaye Saint Sixtus à Westvleteren en Belgique.

                        La plus petite des abbayes trappistes se situe dans les Flandres (entre Ypres et Poperinge) et son nom, selon Michaël Jackson, peut se traduire par ce dont nous avons besoin pour vivre. Sa date de création remonte à 1830. Si la bière Westvleteren 12 possède déjà la particularité d'être l'une des huit bières trappistes mondiales. Pour les amateurs de trésors brassicoles, c'est aussi celle qui fait le plus parler d'elle ces dernières années, cela pour le plus grand malheur des moines de l'abbaye …                      
                        En effet, cette brasserie est la seule produisant des bières \"trappistes\" à n'avoir jamais augmenté ses volumes de productions. Ceux-ci sont normalement fixés à 5000 hectolitres annuel ce qui semble dérisoire face aux 100 000 hectolitres brassés annuellement par la Brasserie trappiste Chimay. Et cela ne posait aucun problème jusqu'à ce qu'en 2005, elle soit désignée meilleure bière du monde parmi une sélection de 30 000 bières provenant de tous les continents...                    
                        Et voilà que la petite abbaye sixtine de Vleteren se retrouve plongée au cœur d'une tempête de curiosité, de cupidité et de folie humaine qui perdure encore aujourd'hui. Car les moines, malgré cette notoriété soudaine et l'afflux massif d'amateurs de bière de tous les continents, refusèrent de modifier leurs quantités de brassage, leur circuit de distribution ainsi que leur mode de vie, créant ainsi un fort déséquilibre entre la demande et l'offre. Et la bière Westvleteren 12 considérée comme la meilleure du monde devint surtout la bière la plus rare et la plus convoitée ...                      
                        Revenons en à la dégustation. La Westvleteren 12 possède une robe marron foncé et se présente sur un lit de levure qu'il convient d'éviter de verser pour ne pas trop la troubler. Sa mousse beige fine est assez peu tenace, mais persiste sur environ 2 mm. Au nez, l'arôme est complexe, sucré, riche, et présente des profondeurs aromatiques liquoreuses. On peut y trouver des notes de fruits tels le raisin, la prune, les agrumes, de malt caramélisé, de vanille ... La liste est longue et très variable en fonction des analyses de chacun.                     
                        En bouche, cette bière colle aux lèvres à cause de sa teneur en sucre. Son goût est assez sucré, avec des saveurs de levure riches et rondes qui peuvent elles aussi s'interpréter de différentes manières d'une dégustation à une autre, d'un palais à un autre ... Ce qui met tout le temps d'accord, c'est bien que la Westvleteren est une bière complexe.                      
                        Complexe, de part ses arômes et son goût. Mais également, une bière convoitée, de part son mode d'approvisionnement par l'Abbaye de Saint Sixtus qui n'est pas des plus simples et il vous faudra vous armer de patience si vous souhaitez en acheter directement là bas.                       
                        Une bière agréable pour les amateurs de bières fortes, même si certains peuvent lui reprocher un léger manque d'équilibre mais çà encore, c'est subjectif."],

        "article 4" => ["id" => 4, 
                        "picture" => "oppigardsIPA.jpg", 
                        "libelle" => "Oppigårds New Sweden IPA", 
                        "qte" => 1, 
                        "prixProduit" => 3.60,
                        "shortDescription" => "Suédoise, IPA, blonde, 33 cL, 6.2°",
                        "description" => "Oppigårds n'a plus rien à prouver dans le monde des bières artisanales, c'est certain. Il n'empêche que cette brasserie suédoise va encore et toujours chercher à nous étonner et nous rallier à la cause du \"craft\".
                        Son dernier brassin porte le nom de New Sweden IPA, et se dévoile par une robe jaune pâle et lumineuse coiffée d'une petite mousse blanche.                       
                        En terme d'aromes, il y a des parfums de fruits tropicaux, d'herbes, de houblon, de citron et de pamplemousse.                       
                        En bouche, l'ensemble est relativement peu amer pour une IPA, sachant favoriser les saveurs fruitées et houblonnées avec des notes de pamplemousse, d'orange, de houblon, de fruits tropicaux, de pin, d'herbes et de mangue.                       
                        C'est une bière légère et délicate qui s'associera facilement à vos repas."],

        "article 5" => ["id" => 5, 
                        "picture" => "oppigardsThurbo.jpg", 
                        "libelle" => "Oppigards Thurbo Double IPA", 
                        "qte" => 1, 
                        "prixProduit" => 3.60,
                        "shortDescription" => "Suédoise, IPA, double, 33 cL, 8.5°",
                        "description" => "Partons à la découverte d'une brasserie suédoise qui a du savoir-faire : Oppigards Bryggeri. Cette Oppigards Thurbo Double IPA est une bière ambrée qui plaira assurément aux amateurs d'India Pale Ale et d'Imperial IPA.
                        Dans le verre, elle dévoile une robe orange floue et foncée s'accompagnant d'une petite tête blanc cassé.                       
                        Cette double IPA laisse échapper des parfums enivrants de houblons et de pin suivis par des notes de fruits juteux tels que le pamplemousse, l'ananas et le raisin. On remarque aussi une pointe de caramel et de miel.                       
                        La bouche est légèrement sèche et développe des saveurs fruitées et florales de houblon. On remarque des nuances de fruits tropicaux, de pamplemousse et d'orange. La finition est finement amère."],

        "article 6" => ["id" => 6, 
                        "picture" => "oppigardsIndianTribute.jpg", 
                        "libelle" => "Oppigårds Indian Tribute", 
                        "qte" => 1, 
                        "prixProduit" => 3.60,
                        "shortDescription" => "Suédoise, IPA, 33 cL, 6.6°",
                        "description" => "Indian Tribute de la brasserie suédoise Oppigards est une bière au style American India Pale Ale fortement houblonnée avec des houblons américains Centennial et Cascade.
                        Orange à ambrée avec une mousse crémeuse couleur blanc cassé, elle possède des arômes de malt, de caramel, de houblon, de fleurs et de pin.                       
                        En bouche, on y retrouve des saveurs douces et fruitées avec des notes de pamplemousse, d'épices, de caramel, de houblon, de pin et d'herbes.                      
                        Amère dans l'ensemble, elle mène vers une finale sèche et houblonnée."],

        "article 7" => ["id" => 7, 
                        "picture" => "oppigardsThurboDoubleIPA.jpg", 
                        "libelle" => "Oppigårds Everyday IPA", 
                        "qte" => 1, 
                        "prixProduit" => 3.80,
                        "shortDescription" => "Suédoise, IPA, double, 33 cL, 8.5°",
                        "description" => "Everyday IPA est une Session IPA brassée avec 13g de houblon par litre de bière. Utilisant des malts Pilsnet et Carapils ainsi que des houblons Amarillo, Columbus, Citra et Simcoe, la bière possède une robe jaune et dorée avec une fine mousse blanche.
                        Au nez, elle dégage des arômes de malt, de houblon, d'herbes, d'agrumes, de fruits tropicaux, d'ananas et de pamplemousse.                      
                        En bouche, on y retrouve des saveurs de malt, de houblon, d'herbes, de pin, de pêche et d'agrumes.                      
                        C'est une bière gourmande et légère avec un caractère bien houblonné menant vers une finale sèche et fruitée."],

        "article 8" => ["id" => 8, 
                        "picture" => "darkLord.jpg", 
                        "libelle" => "Batemans Dark Lord", 
                        "qte" => 1, 
                        "prixProduit" => 3.70,
                        "shortDescription" => "Anglaise, Strong Ale, 50 cL, 5°",
                        "description" => "La Dark Lord de la Brasserie Batemans n'a aucun rapport avec le justicier, mais plutôt avec une brasserie indépendante, qui envoie des bières seigneuriales à l'assaut des amateurs de bière. 
                        <br>
                        <br>
                        Cette bière vient d'Angleterre, de la brasserie Batemans, qui est une grande famille de brasseurs. 
                        <br>
                        <br>
                        De couleur rubis sombre, cette bière se coiffe d'une mousse beige peu persistante. Les arômes de caramels vous arriveront juste avant ceux des malts torréfiés, pour s'unir dans une belle harmonie. En bouche, des saveurs de malts chocolat réhaussé par du caramel vous envahiront et seront bien équilibrés par une carbonication assez intense, mais des plus délectanles."],


        "article 9" => ["id" => 9, 
                        "picture" => "bc.jpg", 
                        "libelle" => "Le Beery Christmas", 
                        "qte" => 1, 
                        "prixProduit" => 56.50,
                        "shortDescription" => "24 bières",
                        "description" => "Partez à l’aventure et embarquez pour un réel voyage brassicole avec notre Beery Christmas, le calendrier de l’Avent dédié à  la bière. À travers ce périple, nous vous ferons découvrir des brasseries du monde entier et nous vous en apprendrons plus sur notre passion commune : la bière. Chaque soir, nous serons des milliers à travers l’Europe à découvrir une nouvelle bière et de nouvelles saveurs. Brassées exclusivement pour vous, découvrez des styles et des procédés de brassage inédits pour une expérience gustative unique et dépaysante ! "],

        "article 10" => ["id" => 10, 
                        "picture" => "tireuseD.jpg", 
                        "libelle" => "Tireuse Findrak", 
                        "qte" => 1, 
                        "prixProduit" => 189.90,
                        "shortDescription" => "Fûts de 2,5l",
                        "description" => "La toute nouvelle machine Findrak de JOJO, HD3720/26, est enfin disponible ! A acquérir pour vous ou pour en faire un cadeau de qualité hors du commun, elle servira lors de tous vos événements. 
                        <br>
                        <br>
                        Vous aimez la Westvleteren, la Oppigards ou bien les smoothies à la fraise ?
                        <br>
                        <br>
                        Grâce à cette machine Findark, vous pouvez déguster votre bière à tout moment de la journée à la température idéale. Avec un large éventail de choix de fûts de 2,5 litres, la Findark est une tireuse à bière de référence, de par sa simplicité d'utilisation, sa fiabilité, et sa conservation des fûts.
                        <br>
                        <br>
                        Jusqu'à 30 jours, votre fût de bière 2,5 litres restera sous pression et tout à fait consommable. La Findark est une pompe qui a fait ses preuves chez les professionnels, très robuste, et qui vous satisfera pleinement. Elle ne requiert pas de cartouches de gaz CO2 comme d'autres tireuses, car les fûts sont déjà sous pression.
                        <br>
                        <br>
                        Dimensions du produit (l x H x P) poignée et plateau égouttoir inclus 261 x 444 x 494 millimètre.
                        
                        Garantie à vie."],

        "article 11" => ["id" => 11, 
                        "picture" => "chopeViking.jpg", 
                        "libelle" => "Chope de Viking", 
                        "qte" => 1, 
                        "prixProduit" => 33.90,
                        "shortDescription" => "50 cl",
                        "description" => "Bière belge, produite en Abbaye"]



    ];
}

//fonction pour afficher les articles

function showArticles($listeArticles) {
    foreach ($listeArticles as $liste => $article) {
        echo "<div class=\"col-md-4 blocArticle\">";
        echo "<div class=\"img-article\"><img src=\"ressources/images/" .$article["picture"]." \" class=\"imageArticle\"></div><br>";
        echo "<div class=\"libelle\">" .$article["libelle"]. "</div><br>";
        echo "<div class=\"shortDescription\">" .$article["shortDescription"]. "</div><br>";
        echo "<div class=\"prixProduit\">" .sprintf('%.2f', $article["prixProduit"]). "€</div><br>";
        echo "</form>";
        echo "<form action=\"descriptionArticle.php\" method=\"post\">";
        echo "<input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">";
        echo "<input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" .$article["id"]."\">";
        echo "</form>";
        echo "<form action=\"#ancre\" method=\"post\">";
        echo "<input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">";
        echo "<input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">";
        echo "</div>";
    }
}

// afficher un seul article 

function showOneArticle ($article) {
        echo "<div class=\"img-article\"><img src=\"ressources/images/" .$article["picture"]." \" class=\"imageArticle\"></div><br>";
        echo "<div class=\"libelle\">" .$article["libelle"]. "</div><br>";
        echo "<div class=\"shortDescription\">" .$article["shortDescription"]. "</div><br>";
        echo "<div class=\"prixProduit\">" .sprintf('%.2f', $article["prixProduit"]). "€</div><br>";
        echo "</form>";
        echo "<form action=\"descriptionArticle.php\" method=\"post\">";
        echo "<input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">";
        echo "<input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" .$article["id"]."\">";
        echo "</form>";
        echo "<form action=\"#ancre\" method=\"post\">";
        echo "<input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">";
        echo "<input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">";
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
    $qtePanier = 0;
    foreach($_SESSION['panier'] as $article ) {
        $qtePanier +=  $article['qte'];
    }
    
    return $qtePanier;
}



//afficher dans le panier

function showPanier($monPanier) {
    foreach ($monPanier as $article) {
        echo "<div class=\"row align-items-center afterLigne\">";
        echo "<div class=\"col-md-2\">";
        echo "<div class=\"img-article\"><img src=\"ressources/images/" .$article["picture"]." \" class=\"imageArticle\" width=\"100\"></div><br>";
        echo "</div>";
        echo "<div class=\"col-md-3 align-items-center\">";
        echo "<div class=\"align-items-center libelle\">" .$article["libelle"]. "</div><br>";
        echo "<div class=\"align\">" .sprintf('%.2f', $article["prixProduit"]). "€ / unité </div><br>";
        echo "</div>";
        echo "<div class=\"col-md-2\">";
        echo "<form action=\"#\" method=\"post\" class=\"align\">";
        echo "<input type=\"number\"  max=15 name=\"qteArticle\" value=\"" .$article['qte']. "\" class=\"qteArticle\">";
        echo "<br>";
        echo "<input type=\"hidden\" name=\"idQteArticle\" value=\"" .$article["id"]."\">";
        echo "<input type=\"submit\" name=\"modifier\" value=\"Modifier\" class=\"btnQte\">";
        echo "</div>";
        echo "</form>";
        echo "<div class=\"col-md-3\">";
        echo "<div class=\"align prixModifie\">" .sprintf('%.2f', ($article["prixProduit"] * $article["qte"])). " €</div><br>";
        echo "<div class=\"consigne\">dont " .sprintf('%.2f', ($article["prixProduit"] * $article["qte"])* 0.10). " € de consigne</div>";
        echo "</div>";
        echo "<div class=\"col-md-2\">";
        echo "<form method=\"post\" action=\"#\" class=\"btnDeleteArticle \">";
        echo "<input type=\"submit\" name=\"delete\" value=\"supprimer\" class=\"btnDelete\">";
        echo "<input type=\"hidden\" name=\"deleteArticle\" value=\"" .$article['id']."\">";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
}

// afficher dans page produit

function showProduct($article) {
    echo "<div class=\"col-md-6 blocArticle\">";
    echo "<div class=\"img-article\"><img src=\"ressources/images/" .$article["picture"]." \" class=\"imageArticle\"></div><br>";
    echo "</div>";
    echo "<div class=\"col-md-6 blocArticle\">";
    echo "<div class=\"libelle\">" .$article["libelle"]. "</div><br>";
    echo "<div class=\"shortDescription\">" .$article["shortDescription"]. "</div><br>";
    echo "<div class=\"prixProduit\">" .sprintf('%.2f', $article["prixProduit"]). "€</div><br>";
    echo "<form action=\"panier.php\" method=\"post\">";
    echo "<input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">";
    echo "<input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">";
    echo "</div>";
    echo "<div class=\"col-md-8 blocArticle\">";
    echo "<h2>PRÉSENTATION</h2>";
    echo "<div class=\"description\">" .$article["description"]. "</div><br>";
    echo "</div>";

}

// ajouter produit depuis page produit 

function ajoutAuPanierPageProduct($article, $id) {
    $isArticlesAdded = verifierPanier($id);
    if ($isArticlesAdded == false) {
        $article['qte'] = 1;
        array_push( $_SESSION['panier'], $article);
    } 
}





// modifier quantier panier

function modifierQtePanier () {

    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        if($_SESSION['panier'][$i]['id'] == $_POST['idQteArticle']) {
            $_SESSION['panier'][$i]['qte'] = $_POST['qteArticle'];
        } 
    }
}

// modifier prix unitaire

function modifierPrixUnitaire () {
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        if($_SESSION['panier'][$i]['id'] == $_POST['idQteArticle']) {
            $prixLigne = $_SESSION['panier'][$i]['prixProduit'] * $_POST['qteArticle'];
        }  
    }
    echo $prixLigne;
}



// supprimer panier

function supprimerArticle($id) {
    foreach ($_SESSION['panier'] as $article) {
        if ($article['id'] == $id) {
            $array = $_SESSION['panier'];
            $key = array_search($article, $array);
            array_splice($_SESSION['panier'], $key, 1);    
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

// calcul frais de port (fdp)

function fdp() {
    $frais= 0;
    if(isset($_SESSION['livraison'])){
    if ($_SESSION['livraison'] == 'chronopost') {
        foreach($_SESSION['panier'] as $article) {
            $frais += ($article['prixProduit'] * $article['qte']) * 0.50 ;
        }
    }
    else if ($_SESSION['livraison'] == 'pigeon') {
        foreach($_SESSION['panier'] as $article) {
            $frais += ($article['prixProduit'] * $article['qte']) * 0.20 ;
        }
    }
    else {
        echo 'livraison non définie';
    }
}

    return $frais;
}

// calcul TVA

function tva() {
    $tva = 0;
    foreach($_SESSION['panier'] as $article) {
        $tva += (($article['prixProduit'] * $article['qte']) + 1) * (20/100);
    }
    return $tva;
}


// calcul montant commande

function montantCommande() {
    if(isset($_POST['codePromo']) && $_POST['codePromo'] == "superJojo") {
        $total = 0;
        foreach($_SESSION['panier'] as $article ) {
            $total += $article['prixProduit'] * $article['qte'];
        }
        
        return ($total +fdp())-3;
        }
    else {
        $total = 0;
        foreach($_SESSION['panier'] as $article ) {
            $total += $article['prixProduit'] * $article['qte'];
        }
        
        return $total+fdp();
        }
}

// enregistrement des modes de livraison dans session

function livraison() {
    if(isset($_POST['chronopost'])) {
        $_SESSION['livraison'] = 'chronopost';
    }
    else if (isset($_POST['pigeon'])) {
        $_SESSION['livraison'] = 'pigeon';

    }
}

// affichage du code promo

function showPromo () {
    if(isset($_POST['codePromo']) && htmlspecialchars($_POST['codePromo'] == "superJojo") ) {
        echo "votre code promotionnelle de 3 € est validé <br>";
    }
    else if (isset($_POST['codePromo']) && $_POST['codePromo'] != "superJojo"){
        echo "votre code promotionnelle est invalide <br>";
    }
}
