<?php
session_start();
include('functions.php');

// addNewArticleAdmin ();

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
        <link rel="stylesheet" href="ressources/css/styles-admin.css">
        <title>Document</title>
    </head>

    <body>

        <!--HEADER-->
        <?php include("header.php") ?>

        <div class="container">
            <div class="row">
                <div class="col-md6">
                    <?php

                    echo "<form method=\"POST\" action=\"admin.php\">    
                            <div class= \"form-group\">
                                <label for=\"exampleInputEmail1\">Nom article</label>
                                <input type=\"text\" name=\"nameArticle\" class=\"form-control\" id=\"exampleInputEmail1\" aria-describedby=\"emailHelp\">
                            </div>

                            <div class=\"form-group\">
                                <label for=\"exampleFormControlFile1\">Gamme</label>
                                <input type=\"number\" name=\"gammeArticle\" min=1 max=2 class=\"form-control-file\" id=\"exampleFormControlFile1\">
                                <small id=\"emailHelp\" class=\"form-text text-muted\">1 = Bière , 2 = Accessoires</small>
                            </div>


                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Description courte</label>
                                <input type=\"text\" name=\"shortDescription\" class=\"form-control\" id=\"exampleInputPassword1\">
                            </div>

                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Description détaillée</label>
                                <textarea class=\"form-control\" name=\"longDescription\" id=\"exampleFormControlTextarea1\" rows=\"3\"></textarea>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Prix</label>
                                <input type=\"text\" name=\"price\" class=\"form-control\" id=\"exampleInputPassword1\">
                            </div>

                            <div class=\"form-group\">
                                <label for=\"exampleFormControlFile1\">Stock</label>
                                <input type=\"number\" name=\"stock\" class=\"form-control-file\" id=\"exampleFormControlFile1\">
                            </div>

                            <div class=\"form-group\">
                                <label for=\"exampleFormControlFile1\">Poids</label>
                                <input type=\"text\" name=\"weight\" class=\"form-control-file\" id=\"exampleFormControlFile1\">
                            </div>

                            <div class=\"form-group\">
                                <label for=\"exampleFormControlFile1\">Nom image</label>
                                <input type=\"text\" name=\"nameImage\" class=\"form-control-file\" id=\"exampleFormControlFile1\">
                            </div>


                            <input type=\"submit\" name=\"submitNewArticle\" class=\"btn btn-primary\" value=\"Ajouter article\">
                        </form>";

                    if (isset($_POST['submitNewArticle'])) {

                        $id_gamme = $_POST['gammeArticle'];
                        $nom = $_POST['nameArticle'];
                        $descrition = $_POST['shortDescription'];
                        $description_detaillee = $_POST['longDescription'];
                        $image = $_POST['nameImage'];
                        $prix = $_POST['price'];
                        $stock = $_POST['stock'];
                        $poids = $_POST['weight'];

                        $bdd = getConnexion();
                        $query = $bdd->prepare("INSERT INTO articles(id_gamme, nom, description, description_detaillee, image, prix, stock, poids) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                        $query->execute(array($id_gamme, $nom, $descrition, $description_detaillee, $image, $prix, $stock, $poids));

                        echo "article bien ajouté";
                    }


                    ?>

                </div>
                <div class="col-md-6">

                    <h2>Dernier article ajouté</h2>

                    <?php

                        if(isset($_POST['submitNewArticle'])) {

                            $id = $bdd->lastInsertId();

                            $bdd = getConnexion();
                            $query = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
                            $query->execute(array($id));
                            $article = $query->fetchAll(PDO::FETCH_ASSOC);
                            $article = $article[0];

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
                    

                        }

                    ?>
                </div>
            </div>
        </div>

        <!--FOOTER-->
        <?php include("footer.php") ?>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>

</html>