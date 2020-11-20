<?php
function getConnexion()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8', 'johanj', 'domajeur0607', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}
//fonction pour afficher les articles

function getArticles()
{
    $bdd = getConnexion();
    $query = $bdd->query('SELECT * FROM articles');
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getOneArticleFromId($id)
{
    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
    $query->execute(array($id));
    return $query->fetch();
}

function getArticlesByRange($id)
{
    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT * FROM articles WHERE id_gamme = ? ");
    $query->execute(array($id));
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getRanges()
{
    $bdd = getConnexion();
    $query = $bdd->query("SELECT * FROM gammes");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}



function showArticles($articles)
{
    foreach ($articles as $article) {
        echo "<div class=\"col-md-4 blocArticle\">
        <div class=\"img-article\"><img src=\"ressources/images/" . $article["image"] . " \" class=\"imageArticle\"></div><br>
        <div class=\"libelle\">" . $article["nom"] . "</div><br>
        <div class=\"shortDescription\">" . $article["description"] . "</div><br>
        <div class=\"prixProduit\">" . sprintf('%.2f', $article["prix"]) . "€</div><br>
        </form>
        <form action=\"descriptionArticle.php\" method=\"post\">
        <input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">
        <input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" . $article["id"] . "\">
        </form>
        <form action=\"#ancre\" method=\"post\">
        <input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
        <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" . $article["id"] . "\">
        </div>";
    }
}


// afficher un seul article 

function showOneArticle($article)
{

    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT stock FROM articles WHERE id = ?");
    $query->execute(array($article['id']));
    $result = $query->fetch();
    $stock = $result['stock'];

    echo "<div class=\"img-article\"><img src=\"ressources/images/" . $article["image"] . " \" class=\"imageArticle\"></div><br>
        <div class=\"libelle\" id=\"ancre\">" . $article["nom"] . "</div><br>
        <div class=\"shortDescription\">" . $article["description"] . "</div><br>
        <div class=\"prixProduit\">" . sprintf('%.2f', $article["prix"]) . "€</div><br>
        </form>
        <form action=\"descriptionArticle.php\" method=\"post\">
        <input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">
        <input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" . $article["id"] . "\">
        </form>
        <form action=\"#ancre\" method=\"post\">";

    if ($stock < 5 && $stock > 0) {
        echo "<p class=\"stockNull\">Vite il n'en reste presque plus</p>
            <input type=\"submit\"  name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
            <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" . $article["id"] . "\">
            </form>";
    } else if ($stock <= 0) {
        echo "<p class=\"stockNull\">Victime de son succès <br> En cours de réaprovisionnement</p>";
    } else {
        echo "<input type=\"submit\"  name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
        <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" . $article["id"] . "\">
        </form>";
    }
}



function showArticleByRange()
{

    foreach (getRanges() as $gamme) {
        echo "<div class=\"col-md-12 text-center mt-5\">
                <h1>" . $gamme['nom_gamme'] . "</h1>
             </div>";


        foreach (getArticlesByRange($gamme['id']) as $article) {
            $bdd = getConnexion();
            $query = $bdd->prepare("SELECT stock FROM articles WHERE id = ?");
            $query->execute(array($article['id']));
            $result = $query->fetch();
            $stock = $result['stock'];

            echo "<div class=\"col-md-4 blocArticle\">
            <div class=\"img-article\"><img src=\"ressources/images/" . $article["image"] . " \" class=\"imageArticle\"></div><br>
            <div class=\"libelle\">" . $article["nom"] . "</div><br>
            <div class=\"shortDescription\">" . $article["description"] . "</div><br>
            <div class=\"prixProduit\">" . sprintf('%.2f', $article["prix"]) . "€</div><br>
            <form action=\"descriptionArticle.php\" method=\"post\">
            <input type=\"submit\" name=\"description\" value=\"Description\" class=\"btnDescription\">
            <input type=\"hidden\" name=\"IdDescriptionArticle\" value=\"" . $article["id"] . "\">
            </form>
            <form action=\"#ancre\" method=\"post\">";
            if ($stock < 5 && $stock > 0) {
                echo "<p class=\"stockNull\">Vite il n'en reste moins de 5</p>
            <input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
            <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" . $article["id"] . "\">";
            } else if ($stock <= 0) {
                echo "<p class=\"stockNull\">Victime de son succès <br> En cours de réaprovisionnement</p>";
            } else {
                echo "<input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
                <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" . $article["id"] . "\">";
            }
            echo "</form>
            </div>";
        }
    }
}


//récupérer id article

function getArticleFromId($listeArticles, $id)
{
    foreach ($listeArticles as $article) {
        if ($id == $article['id']) {
            return $article;
        }
    }
}

//ajouter au panier

function ajoutAuPanier($article, $id)
{
    $isArticlesAdded = verifierPanier($id);
    if ($isArticlesAdded == true) {
        echo "<script>alert(\"Article déjà présent dans le panier\")</script>";
    } else {
        $article['qte'] = 1;
        array_push($_SESSION['panier'], $article);
    }
}

//vérifier panier 

function verifierPanier($id)
{
    foreach ($_SESSION['panier'] as $article) {
        if ($article['id'] == $id) {
            return true;
        }
    }
    return false;
}

//compter les articles présents dans le panier

function nbrArticles()
{
    $qtePanier = 0;
    foreach ($_SESSION['panier'] as $article) {
        $qtePanier +=  $article['qte'];
    }

    return $qtePanier;
}



//afficher dans le panier

function showPanier($monPanier)
{
    foreach ($monPanier as $article) {
        $bdd = getConnexion();
        $query = $bdd->prepare("SELECT stock FROM articles WHERE id = ?");
        $query->execute(array($article['id']));
        $result = $query->fetch();
        $stock = $result['stock'];

        if (isset($_POST['modifier']) && $stock < $article['qte']) {
            echo "<script>alert(\"Stock insufisant\")</script>";
        }

        echo "<div class=\"row align-items-center afterLigne\">
        <div class=\"col-md-2\">
        <div class=\"img-article\"><img src=\"ressources/images/" . $article["image"] . " \" class=\"imageArticle\" width=\"100\"></div><br>
        </div>
        <div class=\"col-md-3 align-items-center\">
        <div class=\"align-items-center libelle\">" . $article["nom"] . "</div><br>
        <div class=\"align prixUnitaire\">" . sprintf('%.2f', $article["prix"]) . "€ / unité </div><br>
        </div>
        <div class=\"col-md-2\">
        <form action=\"#\" method=\"post\" class=\"align\">
        <input type=\"number\"  min=0 name=\"qteArticle\" value=\"" . $article['qte'] . "\" class=\"qteArticle\">
        <br>
        <input type=\"hidden\" name=\"idQteArticle\" value=\"" . $article["id"] . "\">
        <input type=\"submit\" name=\"modifier\" value=\"Modifier\" class=\"btnQte\">
        </div>
        </form>
        <div class=\"col-md-3\">";
        if (isset($_POST['modifier']) && $stock < $article['qte']) {
            echo "<div class=\"align prixModifie\">" . sprintf('%.2f', ($article["prix"])) . " €</div><br>
            <div class=\"consigne\">dont " . sprintf('%.2f', ($article["prix"] * 0.10)) . " € de consigne</div>
            </div>";
        } else {
            echo "<div class=\"align prixModifie\">" . sprintf('%.2f', ($article["prix"] * $article["qte"])) . " €</div><br>
            <div class=\"consigne\">dont " . sprintf('%.2f', ($article["prix"] * $article["qte"]) * 0.10) . " € de consigne</div>
            </div>";
        }
        echo "<div class=\"col-md-2\">
        <form method=\"post\" action=\"#\" class=\"btnDeleteArticle \">
        <input type=\"submit\" name=\"delete\" value=\"supprimer\" class=\"btnDelete\">
        <input type=\"hidden\" name=\"deleteArticle\" value=\"" . $article['id'] . "\">
        </form>
        </div>
        </div>";
    }
}

// afficher dans page produit

function showProduct($article)
{
    echo "<div class=\"col-md-6 blocArticle\">
    <div class=\"img-article\"><img src=\"ressources/images/" . $article["image"] . " \" class=\"imageArticle\"></div><br>
    </div>
    <div class=\"col-md-6 blocArticle\">
    <div class=\"libelle\">" . $article["nom"] . "</div><br>
    <div class=\"shortDescription\">" . $article["description"] . "</div><br>
    <div class=\"prixProduit\">" . sprintf('%.2f', $article["prix"]) . "€</div><br>
    <form action=\"panier.php\" method=\"post\">
    <input type=\"submit\" id=\"ancre\" name=\"submit\" value=\"Ajouter au panier\" class=\"btnAdd\">
    <input type=\"hidden\" name=\"IdChooseArticle\" value=\"" . $article["id"] . "\">
    </div>
    <div class=\"col-md-8 blocArticle\">
    <h2>PRÉSENTATION</h2>
    <div class=\"description\">" . $article["description_detaillee"] . "</div><br>
    </div>";
}

// ajouter produit depuis page produit 

function ajoutAuPanierPageProduct($article, $id)
{
    $isArticlesAdded = verifierPanier($id);
    if ($isArticlesAdded == false) {
        $article['qte'] = 1;
        array_push($_SESSION['panier'], $article);
    }
}





// modifier quantier panier

function modifierQtePanier()
{

    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        if ($_SESSION['panier'][$i]['id'] == $_POST['idQteArticle']) {
            $_SESSION['panier'][$i]['qte'] = $_POST['qteArticle'];
        }
    }
}



// supprimer panier

function supprimerArticle($id)
{
    foreach ($_SESSION['panier'] as $article) {
        if ($article['id'] == $id) {
            $array = $_SESSION['panier'];
            $key = array_search($article, $array);
            array_splice($_SESSION['panier'], $key, 1);
        }
    }
}


// montant panier

function montant_panier()
{
    $total = 0;
    foreach ($_SESSION['panier'] as $article) {
        $bdd = getConnexion();
        $query = $bdd->prepare("SELECT stock FROM articles WHERE id = ?");
        $query->execute(array($article['id']));
        $result = $query->fetch();
        $stock = $result['stock'];


        if (isset($_POST['modifier']) && $stock < $article['qte']) {
            $total += $article['prix'];
        } else {
            $total += $article['prix'] * $article['qte'];
        }
    }

    return $total;
}

// calcul frais de port (fdp)

function fdp()
{
    $frais = 0;
    if (isset($_SESSION['livraison'])) {
        if ($_SESSION['livraison'] == 'chronopost') {
            foreach ($_SESSION['panier'] as $article) {
                $frais += ($article['poids'] * $article['qte']) * 0.50;
            }
        } else if ($_SESSION['livraison'] == 'pigeon') {
            foreach ($_SESSION['panier'] as $article) {
                $frais += ($article['poids'] * $article['qte']) * 0.20;
            }
        } else {
            echo 'livraison non définie';
        }
    }

    return $frais;
}

// calcul TVA

function tva()
{
    $tva = 0;
    foreach ($_SESSION['panier'] as $article) {
        $tva += (($article['prix'] * $article['qte']) + 1) * (20 / 100);
    }
    return $tva;
}


// calcul montant commande

function montantCommande()
{
    if (isset($_POST['codePromo']) && $_POST['codePromo'] == "superJojo") {
        $total = 0;
        foreach ($_SESSION['panier'] as $article) {
            $total += $article['prix'] * $article['qte'];
        }

        return ($total + fdp()) - 3;
    } else {
        $total = 0;
        foreach ($_SESSION['panier'] as $article) {
            $total += $article['prix'] * $article['qte'];
        }

        return $total + fdp();
    }
}

// enregistrement des modes de livraison dans session

function livraison()
{
    if (isset($_POST['chronopost'])) {
        $_SESSION['livraison'] = 'chronopost';
    } else if (isset($_POST['pigeon'])) {
        $_SESSION['livraison'] = 'pigeon';
    }
}

// affichage du code promo

function showPromo()
{
    if (isset($_POST['codePromo']) && htmlspecialchars($_POST['codePromo'] == "superJojo")) {
        echo "votre code promotionnelle de 3 € est validé <br>";
    } else if (isset($_POST['codePromo']) && $_POST['codePromo'] != "superJojo") {
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

    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['email2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['adress']) && !empty($_POST['cp']) && !empty($_POST['city'])) {

        $firstNameLenght = strlen($firstName);
        $lastNameLenght = strlen($lastName);
        if ($firstNameLenght <= 25 && $lastNameLenght <= 25) {
            if ($email == $email2) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $bdd = getConnexion();
                    $reqmail = $bdd->prepare("SELECT * FROM clients WHERE email = ?");
                    $reqmail->execute(array($email));
                    $mailexist = $reqmail->rowCount();
                    if ($mailexist == 0) {
                        if ($mdp = $mdp2) {
                            if (preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^", $mdp)) {
                                $bdd = getConnexion();
                                $insertUser = $bdd->prepare("INSERT INTO clients(nom, prenom, email, mot_de_passe) VALUES(?, ?, ?, ?)");
                                $insertUser->execute(array($lastName, $firstName, $email, $mdp));

                                $id = $bdd->lastInsertId();

                                $insertAdressUser = $bdd->prepare("INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES(?, ?, ?, ?)");
                                $insertAdressUser->execute(array($id, $adress, $cp, $city));

                                $_SESSION['compteCree'] = "Votre compte a bien été créé.";
                                header('Location: connexion.php');
                            } else {
                                $erreur = "Mot de passe invalide";
                            }
                        } else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        $erreur = "Adresse email déjà utilisée !";
                    }
                } else {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }
            } else {
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
        } else {
            $erreur = "Votre prénom et nom dépasse 25 caractères";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés";
    }
}


// connexion 

function loginUser()
{
    if (isset($_POST['formConnect'])) {

        $emailConnect = strip_tags($_POST['emailConnect']);
        $mdpConnect =  $_POST['mdpConnect'];

        if (!empty($emailConnect) && !empty($mdpConnect)) {

            $bdd = getConnexion();
            $reqUser = $bdd->prepare("SELECT * FROM clients WHERE email = ?");
            $reqUser->execute(array($emailConnect));
            $userExist = $reqUser->rowCount();


            if ($userExist == 1) {

                $userInfo = $reqUser->fetch();
                $isPasswordCorrect = password_verify($mdpConnect, $userInfo['mot_de_passe']);

                if ($isPasswordCorrect) {

                    $bdd = getConnexion();
                    $reqAdress = $bdd->prepare("SELECT * FROM adresses WHERE id_client = ?");
                    $reqAdress->execute([$userInfo['id']]);
                    $adress = $reqAdress->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['id'] = $userInfo['id'];
                    $_SESSION['prenom'] = $userInfo['prenom'];
                    $_SESSION['nom'] = $userInfo['nom'];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['adresse'] = $adress['adresse'];
                    $_SESSION['code_postal'] = $adress['code_postal'];
                    $_SESSION['ville'] = $adress['ville'];
                } else {
                    echo "mdp incorrecte";
                }
            } else {

                $erreur = "Mauvais identifiant !";
            }
        } else {
            $erreur = "Tous les champs doivent être remplis";
        }
    }
}

// modifier utilisateur 

function editUser()
{

    if (isset($_SESSION['id'])) {

        if (isset($_POST['submitNewProfil'])) {

            $bdd = getConnexion();
            $insertFirstName = $bdd->prepare("UPDATE clients SET prenom = ?, nom = ?, email = ?  WHERE id = ?");
            $insertFirstName->execute(array($_POST['newFirstName'], $_POST['newLastName'], $_POST['newEmail'], $_SESSION['id']));
            $_SESSION['prenom'] = $_POST['newFirstName'];
            $_SESSION['nom'] = $_POST['newLastName'];
            $_SESSION['email'] = $_POST['newEmail'];
        } 
        else if (isset($_POST['submitNewAdressOrder'])) {

            $bdd = getConnexion();
            $insertFirstName = $bdd->prepare("UPDATE clients SET prenom = ?, nom = ?, email = ?  WHERE id = ?");
            $insertFirstName->execute(array($_POST['newFirstName'], $_POST['newLastName'], $_POST['newEmail'], $_SESSION['id']));
            $_SESSION['prenom'] = $_POST['newFirstName'];
            $_SESSION['nom'] = $_POST['newLastName'];
            $_SESSION['email'] = $_POST['newEmail'];
        }
    }
}
function editAdress()
{

    if (isset($_SESSION['id'])) {

        if (isset($_POST['submitNewAdress'])) {

            $bdd = getConnexion();
            $insertFirstName = $bdd->prepare("UPDATE adresses SET adresse = ?, code_postal = ?, ville = ?  WHERE id_client = ?");
            $insertFirstName->execute(array($_POST['newAdress'], $_POST['newCP'], $_POST['newCity'], $_SESSION['id']));
            $_SESSION['adresse'] = $_POST['newAdress'];
            $_SESSION['code_postal'] = $_POST['newCP'];
            $_SESSION['ville'] = $_POST['newCity'];
        }
        else if (isset($_POST['submitNewAdressOrder'])) {
            
            $bdd = getConnexion();
            $insertFirstName = $bdd->prepare("UPDATE adresses SET adresse = ?, code_postal = ?, ville = ?  WHERE id_client = ?");
            $insertFirstName->execute(array($_POST['newAdress'], $_POST['newCP'], $_POST['newCity'], $_SESSION['id']));
            $_SESSION['adresse'] = $_POST['newAdress'];
            $_SESSION['code_postal'] = $_POST['newCP'];
            $_SESSION['ville'] = $_POST['newCity'];
        }
    }
}

function getPasswordUser()
{
    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT mot_de_passe FROM clients WHERE id = ?");
    $query->execute(array($_SESSION['id']));

    $result = $query->fetch();

    return $result['mot_de_passe'];
}

function editPassword()
{

    if (isset($_POST['submitNewPassword'])) {

        if (isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmNewPassword'])) {

            $mdp1 = $_POST['newPassword'];
            $mdp2 = $_POST['confirmNewPassword'];

            if ($mdp1 == $mdp2) {

                if(preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^", $mdp1)) {

                    $oldPasswordDB = getPasswordUser();

                    $isPasswordCorrect = password_verify($_POST['oldPassword'], $oldPasswordDB);

                    if ($isPasswordCorrect) {

                        $bdd = getConnexion();
                        $insertMdp = $bdd->prepare("UPDATE clients SET mot_de_passe = ? WHERE id = ?");
                        $insertMdp->execute(array(password_hash($mdp1, PASSWORD_DEFAULT), $_SESSION['id']));

                    } 
                    else {
                        $msg = "L'ancien mot de passe saisi est incorrecte !";
                        echo $msg;
                    }
                }
                else {
                    $msg = "Votre nouveau mot de passe n'est pas terrible ! ma grand mère ";
                    echo $msg;
                }
            }
            else {
                $msg = "Votre nouveau mot de passe ne correspondent pas à sa confirmation !";
                echo $msg;
            }
        }
         else {
            $msg = "Tous les champs ne sont pas remplis !";
            echo $msg;
        }
    }
}


function saveOrderDb()
{

    $nbrOrder = random_int(1000000, 9999999);
    date_default_timezone_set('Europe/Paris');
    $date = date('d-m-y h:i:s');
    $total = sprintf('%.2f',( montantCommande() ));
    $bdd = getConnexion();

    //insertion dans la table commandes
    $insertOrder = $bdd->prepare("INSERT INTO commandes(id_client, numero, date_commande , prix) VALUES(?, ?, ?, ?)");
    $insertOrder->execute(array($_SESSION['id'], $nbrOrder, $date, $total));

    $id = $bdd->lastInsertId();

    foreach ($_SESSION['panier'] as $article) {
        $insertOrderArticle = $bdd->prepare("INSERT INTO commande_articles(id_article, id_commande, quantite) VALUES(?, ?, ?)");
        $insertOrderArticle->execute(array(
            $article['id'],
            $id,
            $article['qte']
        ));

        $query = $bdd->prepare("SELECT stock FROM articles WHERE id = ?");
        $query->execute(array($article['id']));
        $result = $query->fetch();
        $stock = $result['stock'];

        $newStock = $stock - $article['qte'];

        if ($newStock < 0) {
            $newStock = 0;
        }

        $query = $bdd->prepare("UPDATE articles SET stock = ? WHERE id = ?");
        $query->execute(array(
            $newStock,
            $article['id']
        ));
    }
}

//afficher les commandes

// function getOrder() {
//     $bdd = getConnexion();
//     $query = $bdd->prepare("SELECT * FROM commandes WHERE id = ?");
//     $query->execute(array($_SESSION['id']));
//     return $query->fetch();
// }

function showOrder(){

    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT * FROM commandes WHERE id_client = ? ORDER BY date_commande DESC");
    $query->execute(array($_SESSION['id']));
    $ordered = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<tbody>";
    foreach ($ordered as $order) {

       
                echo "<tr>
                    <th scope=\"row\">" .$order['numero']."</th>
                    <td>" .$order['date_commande']."</td>
                    <td>" .$order['prix']."</td>
                    <td><form method=\"POST\" action=\"detailCommande.php\">
                    <input type=\"hidden\" name=\"detailOrderId\" value=\"".$order['id']."\">
                    <input type=\"hidden\" name=\"numberOrder\" value=\"".$order['numero']."\">
                    <input type=\"submit\" name=\"submitDetail\" value=\"Détails\">
                    </form></td>
                </tr>";
            
    }
    echo "</tbody>";
}

function getOrderArticleById($id){

    $bdd = getConnexion();
    $query = $bdd->prepare("SELECT * FROM commande_articles ca INNER JOIN articles a ON ca.id_article = a.id WHERE id_commande = ?");
    $query->execute(array($id));
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function displayOrderArticle($orderArticle) {
    echo "<tbody>";

    foreach ($orderArticle as $details) {

                echo "<tr>
                    <th scope=\"row\">" .$details['nom']."</th>
                    <td>" .$details['prix']."</td>
                    <td>" .$details['quantite']."</td>
                    <td>" .$details['quantite'] * $details['prix']."</td>
                    </tr>";
               
    }

    echo "</tbody>"; 
}