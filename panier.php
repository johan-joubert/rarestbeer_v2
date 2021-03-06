<?php
session_start();
include('functions.php');

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array ();
}

if (isset($_POST['idQteArticle'])) {
    modifierQtePanier ();
}

if (isset($_POST['IdChooseArticle'])) {
    $id = $_POST['IdChooseArticle'];
    $chooseArticle = getOneArticleFromId($id);
    ajoutAuPanier($chooseArticle, $id);
}

if(isset($_POST['deleteArticle'])) {
    supprimerArticle($_POST['deleteArticle']);
    echo "<script> alert(\"Article retiré du panier\");</script>";
}


if (isset($_POST['unsetSession'])){
    $_SESSION['panier'] = array();
}

if (!isset($_SESSION['panier'])) {
    montant_panier();
}

// var_dump( $_SESSION['panier']);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--link bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--link fontawesome-->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <!--link google font-->
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--LINK CSS-->
        <link rel="stylesheet" href="ressources/css/styles-header.css">
        <link rel="stylesheet" href="ressources/css/styles-index.css">
        <link rel="stylesheet" href="ressources/css/styles-functions.css">
        <link rel="stylesheet" href="ressources/css/styles-panier.css">
        <title>Document</title>
    </head>

    <body>

        <?php
        include("header.php") 
        ?>



    <main>


            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="containArticle">
                            <div class="logoPanier">
                                <img src="ressources/images/beercart.svg" alt="panier" id="panierBeer">
                                <h1 id="titlePanier">Mon Panier ( <?php echo nbrArticles() ?> )</h1>
                            </div>
                            <?php
                            if (empty($_SESSION['panier'])) {
                                echo "<h2>Votre panier est vide</h2>";
                            } else {
                                $monPanier = $_SESSION['panier'];
                                showPanier($monPanier);
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="containMontant">
                        <?php
                        if(!empty($_SESSION['panier']) && isset($_SESSION['id'])) {
                            echo "<div class=\"total\">Total <span id=\"montantPanier\">" . sprintf('%.2f', montant_panier()) . " €</span> </div>
                            <br>
                            <form method=\"post\" action=\"panierValider.php\">
                            <input type=\"submit\" value=\"VALIDER MON PANIER\" class=\"btnValiderPanier\">
                            </form>";      

                        } else {
                            echo "<form method=\"post\" action=\"connexion.php\">
                            <input type=\"submit\" value=\"Se connecter\" class=\"btnValiderPanier\">
                            </form>";      

                        }

                        ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                            if (!empty($_SESSION['panier'])) {
                                echo "<form method=\"post\" action=\"panier.php\">
                                <input type=\"submit\" name=\"unsetSession\" value=\"vider mon panier\" class=\"deletePanier\">
                                </form>"; 
                            }
                        ?>
                    </div>
                </div>

            </div>

    </main>


    <?php include("footer.php") ?>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>

</html>