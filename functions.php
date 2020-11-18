<?php
function getConnexion() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8','johanj','domajeur0607',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' .$e->getMessage());
    }
    return $bdd;
}
//fonction pour afficher les articles

function getArticles() {
    $bdd = getConnexion();
    $query = $bdd->query('SELECT * FROM articles');
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getOneArticleFromId($id) {
    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
    $query->execute(array($id));
    return $query->fetch();
}

function getArticlesByRange($id) {
    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT * FROM articles WHERE id_gamme = ? ");
    $query->execute(array($id));
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getRanges() {
    $bdd = getConnexion();
    $query = $bdd->query("SELECT * FROM gammes");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}



function showArticles($articles) {
        foreach ($articles as $article) {
        echo "<div class=\"col-md-4 blocArticle\">
        <div class=\"img-article\"><img src=\"ressources/images/" .$article["image"]." \" class=\"imageArticle\"></div><br>
        <div class=\"libelle\">" .$article["nom"]. "</div><br>
        <div class=\"shortDescription\">" .$article["description"]. "</div><br>
        <div class=\"prixProduit\">" .sprintf('%.2f', $article["prix"]). "€</div><br>
        </form>
        <form action=\"descriptionArticle.php\" method=\"post\">
        <input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">
        <input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" .$article["id"]."\">
        </form>
        <form action=\"#ancre\" method=\"post\">
        <input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
        <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">
        </div>";
    }
}


// afficher un seul article 

function showOneArticle ($article) {
        echo "<div class=\"img-article\"><img src=\"ressources/images/" .$article["image"]." \" class=\"imageArticle\"></div><br>
        <div class=\"libelle\">" .$article["nom"]. "</div><br>
        <div class=\"shortDescription\">" .$article["description"]. "</div><br>
        <div class=\"prixProduit\">" .sprintf('%.2f', $article["prix"]). "€</div><br>
        </form>
        <form action=\"descriptionArticle.php\" method=\"post\">
        <input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">
        <input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" .$article["id"]."\">
        </form>
        <form action=\"#ancre\" method=\"post\">
        <input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
        <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">";
    }



function showArticleByRange () {

    foreach (getRanges() as $gamme) {
        echo "<div class=\"col-md-12 text-center mt-5\">
                <h1>".$gamme['nom_gamme']."</h1>
             </div>";
        

        foreach (getArticlesByRange($gamme['id']) as $article) {
            echo "<div class=\"col-md-4 blocArticle\">
            <div class=\"img-article\"><img src=\"ressources/images/" .$article["image"]." \" class=\"imageArticle\"></div><br>
            <div class=\"libelle\">" .$article["nom"]. "</div><br>
            <div class=\"shortDescription\">" .$article["description"]. "</div><br>
            <div class=\"prixProduit\">" .sprintf('%.2f', $article["prix"]). "€</div><br>
            </form>
            <form action=\"descriptionArticle.php\" method=\"post\">
            <input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">
            <input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" .$article["id"]."\">
            </form>
            <form action=\"#ancre\" method=\"post\">
            <input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
            <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">
            </div>";
        }
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
    $qtePanier = 0;
    foreach($_SESSION['panier'] as $article ) {
        $qtePanier +=  $article['qte'];
    }
    
    return $qtePanier;
}



//afficher dans le panier

function showPanier($monPanier) {
    foreach ($monPanier as $article) {
        echo "<div class=\"row align-items-center afterLigne\">
        <div class=\"col-md-2\">
        <div class=\"img-article\"><img src=\"ressources/images/" .$article["image"]." \" class=\"imageArticle\" width=\"100\"></div><br>
        </div>
        <div class=\"col-md-3 align-items-center\">
        <div class=\"align-items-center libelle\">" .$article["nom"]. "</div><br>
        <div class=\"align prixUnitaire\">" .sprintf('%.2f', $article["prix"]). "€ / unité </div><br>
        </div>
        <div class=\"col-md-2\">
        <form action=\"#\" method=\"post\" class=\"align\">
        <input type=\"number\"  max=15 name=\"qteArticle\" value=\"" .$article['qte']. "\" class=\"qteArticle\">
        <br>
        <input type=\"hidden\" name=\"idQteArticle\" value=\"" .$article["id"]."\">
        <input type=\"submit\" name=\"modifier\" value=\"Modifier\" class=\"btnQte\">
        </div>
        </form>
        <div class=\"col-md-3\">
        <div class=\"align prixModifie\">" .sprintf('%.2f', ($article["prix"] * $article["qte"])). " €</div><br>
        <div class=\"consigne\">dont " .sprintf('%.2f', ($article["prix"] * $article["qte"])* 0.10). " € de consigne</div>
        </div>
        <div class=\"col-md-2\">
        <form method=\"post\" action=\"#\" class=\"btnDeleteArticle \">
        <input type=\"submit\" name=\"delete\" value=\"supprimer\" class=\"btnDelete\">
        <input type=\"hidden\" name=\"deleteArticle\" value=\"" .$article['id']."\">
        </form>
        </div>
        </div>";
    }
}

// afficher dans page produit

function showProduct($article) {
    echo "<div class=\"col-md-6 blocArticle\">
    <div class=\"img-article\"><img src=\"ressources/images/" .$article["image"]." \" class=\"imageArticle\"></div><br>
    </div>
    <div class=\"col-md-6 blocArticle\">
    <div class=\"libelle\">" .$article["nom"]. "</div><br>
    <div class=\"shortDescription\">" .$article["description"]. "</div><br>
    <div class=\"prixProduit\">" .sprintf('%.2f', $article["prix"]). "€</div><br>
    <form action=\"panier.php\" method=\"post\">
    <input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
    <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" .$article["id"]."\">
    </div>
    <div class=\"col-md-8 blocArticle\">
    <h2>PRÉSENTATION</h2>
    <div class=\"description\">" .$article["description_detaillee"]. "</div><br>
    </div>";

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

// function modifierPrixUnitaire () {
//     for ($i = 0; $i < count($_SESSION['panier']); $i++) {
//         if($_SESSION['panier'][$i]['id'] == $_POST['idQteArticle']) {
//             $prixLigne = $_SESSION['panier'][$i]['prixProduit'] * $_POST['qteArticle'];
//         }  
//     }
//     echo $prixLigne;
// }



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
        $total += $article['prix'] * $article['qte'];
    }
    
    return $total;
}

// calcul frais de port (fdp)

function fdp() {
    $frais= 0;
    if(isset($_SESSION['livraison'])){
    if ($_SESSION['livraison'] == 'chronopost') {
        foreach($_SESSION['panier'] as $article) {
            $frais += ($article['poids'] * $article['qte']) * 0.50 ;
        }
    }
    else if ($_SESSION['livraison'] == 'pigeon') {
        foreach($_SESSION['panier'] as $article) {
            $frais += ($article['poids'] * $article['qte']) * 0.20 ;
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
        $tva += (($article['prix'] * $article['qte']) + 1) * (20/100);
    }
    return $tva;
}


// calcul montant commande

function montantCommande() {
    if(isset($_POST['codePromo']) && $_POST['codePromo'] == "superJojo") {
        $total = 0;
        foreach($_SESSION['panier'] as $article ) {
            $total += $article['prix'] * $article['qte'];
        }
        
        return ($total +fdp())-3;
        }
    else {
        $total = 0;
        foreach($_SESSION['panier'] as $article ) {
            $total += $article['prix'] * $article['qte'];
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



// ======compte utilisateur=======

// inscription

if (isset($_POST['formInscription'])) {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $mdp2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);
    $adress = htmlspecialchars($_POST['adress']);
    $cp = htmlspecialchars($_POST['cp']);
    $city = htmlspecialchars($_POST['city']);

    if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['email2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['adress']) && !empty($_POST['cp']) && !empty($_POST['city'])) {
        
        $firstNameLenght = strlen($firstName);
        $lastNameLenght = strlen($lastName);
        if($firstNameLenght <= 25 && $lastNameLenght <= 25) {
            if($email == $email2) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $bdd = getConnexion();
                    $reqmail = $bdd->prepare("SELECT * FROM clients WHERE email = ?");
                    $reqmail->execute(array($email));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                        if($mdp = $mdp2) {
                            if(preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^", $mdp)) {
                                $bdd = getConnexion();
                                $insertUser = $bdd->prepare("INSERT INTO clients(nom, prenom, email, mot_de_passe) VALUES(?, ?, ?, ?)");
                                $insertUser->execute(array($lastName, $firstName, $email, $mdp));

                                $id = $bdd->lastInsertId();

                                $insertAdressUser = $bdd->prepare("INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES(?, ?, ?, ?)");
                                $insertAdressUser->execute(array($id, $adress, $cp, $city));
                            
                                $_SESSION['compteCree'] = "Votre compte a bien été créé.";
                                header('Location: connexion.php');
                            }
                            else {
                                $erreur = "Mot de passe invalide";
                            }
                        }
                        else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }    

                    }
                    else {
                        $erreur = "Adresse email déjà utilisée !";
                    }
                }
                else {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }
            }
            else {
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
        }
        else {
            $erreur = "Votre prénom et nom dépasse 25 caractères";
        }
    }
    else {
        $erreur = "Tous les champs doivent être complétés";
    }
}




