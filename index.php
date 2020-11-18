<?php
session_start();
include('functions.php');

//vérifier si panier existe
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array ();
}


if (isset($_POST['IdChooseArticle'])) {
    $id = $_POST['IdChooseArticle'];
    $chooseArticle = getOneArticleFromId($id);
    ajoutAuPanier($chooseArticle, $id);
}

if (isset($_POST['retourIndex'])){
    $_SESSION['panier'] = array();
}

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
    <link rel="stylesheet" href="ressources/css/styles-footer.css">
    <title>Document</title>
</head>

<body>

<!--HEADER-->
    <?php include("header.php") ?>


    <section class="contain-header">
        <div>
            <h1>LES BIERES LES PLUS RARES <br>A TRAVERS LE MONDE</h1>
            <a href="boutique.php">JE COMMANDE</a>
        </div>
    </section>

    <!--MAIN-->
    <main>

        <!--Bloc suggestion-->
            <div class="container">
                <div class="row"> 
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 newBeer">
                                <h2>BIÈRES SUÈDOISES</h2>
                                <p>La bière des Vikings</p>
                                <a href="boutique.php" class="linkNews">J'en profite</a>
                            </div>
                            <div class="col-md-6 newBeer vikingBeerBG">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                    <div class="row no-wrap">
                            <div class="col-md-6 newBeer">
                            <h2>BIÈRES D'ABBAYE</h2>
                                <p>La WESTVLETEREN</p>
                                <a href="boutique.php" class="linkNews">J'en profite</a>

                            </div>
                            <div class="col-md-6 newBeer westvleterenBG">

                            </div>
                        </div>

                    </div>                    
                </div>
            </div>

        <!--News-->
            <div class="container blocNews">
                <h2>NOUVEAUTÉES DU MOIS</h2>
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="borderNew">
                            <p>NEW</p>
                            <?php
                                $article = getOneArticleFromId(4);

                                showOneArticle($article);

                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="borderNew">
                            <p>NEW</p>
                            <?php
                                $article = getOneArticleFromId(5);

                                showOneArticle($article);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="borderNew">
                            <p>NEW</p>
                            <?php
                                $article = getOneArticleFromId(6);

                                showOneArticle($article);
                            ?>
                        </div>
                    </div>
                </div>
            </div>


    </main>

<!--FOOTER-->
    <?php include("footer.php") ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>